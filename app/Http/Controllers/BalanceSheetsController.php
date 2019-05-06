<?php

#Legendas
# dmp = depreciacao mensal percentual

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\BalanceSheetRepository;
use SisCad\Repositories\BalanceSheetPreviousRepository;
use SisCad\Repositories\ManagementUnitRepository;
use SisCad\Repositories\AccountingAccountRepository;
use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialMaterialRepository;
use SisCad\Repositories\PatrimonialServiceRepository;

use Auth;

use Carbon\Carbon;
use DB;

class BalanceSheetsController extends Controller
{
    private $balance_sheetRepository;
    private $balance_sheet_previousRepository;
    private $management_unitRepository;
    private $accounting_accountRepository;
    private $patrimonialRepository;
    private $patrimonial_materialRepository;
    private $patrimonial_serviceRepository;

    public function __construct(BalanceSheetRepository $balance_sheetRepository, BalanceSheetPreviousRepository $balance_sheet_previousRepository, ManagementUnitRepository $management_unitRepository, AccountingAccountRepository $accounting_accountRepository, PatrimonialRepository $patrimonialRepository, PatrimonialMaterialRepository $patrimonial_materialRepository, PatrimonialServiceRepository $patrimonial_serviceRepository)
    {
        $this->balance_sheetRepository = $balance_sheetRepository;
        $this->balance_sheet_previousRepository = $balance_sheet_previousRepository;
        $this->management_unitRepository = $management_unitRepository;
        $this->accounting_accountRepository = $accounting_accountRepository;
        $this->patrimonialRepository = $patrimonialRepository;
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
        $this->patrimonial_serviceRepository = $patrimonial_serviceRepository;
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search()
    {
        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        return view('balance_sheets.search', compact('management_units'));
    }

    public function search_results(Requests\BalanceSheetSearchRequest $request)
    { 
        $user_id = Auth::User()->id;

        $input = $request->all();
        
        $management_unit_id = $input['srch_management_unit_id'];
        #dd($management_unit_id)."<br>";

        $management_unit = $this->management_unitRepository->findManagementUnitById($management_unit_id);
            $management_unit_code = $management_unit->code;
            $management_unit_description = $management_unit->description;


        $srch_balance_sheet_date_start = $input['srch_balance_sheet_date_start'];
        $srch_balance_sheet_date_end = $input['srch_balance_sheet_date_end'];

        $input['srch_balance_sheet_date_start'] = \DateTime::createFromFormat('d/m/Y', $input['srch_balance_sheet_date_start']);
        $input['srch_balance_sheet_date_start'] = $input['srch_balance_sheet_date_start']->format('Y-m-d');
        $date_start = $input['srch_balance_sheet_date_start'];

        $input['srch_balance_sheet_date_end'] = \DateTime::createFromFormat('d/m/Y', $input['srch_balance_sheet_date_end']);
        $input['srch_balance_sheet_date_end'] = $input['srch_balance_sheet_date_end']->format('Y-m-d');
        $date_end = $input['srch_balance_sheet_date_end'];

        
        #========================================================================================
        #            |                            Bem partimonial
        #------------+------------------------------------+--------------------------------------
        #            |            (previous)              |               (interval)
        # ---------->|<---------------------------------->|<----------------------------------->|
        # 2014-12-31 |     (Aquisicoes + Depeciacoes)     |        (Aquisicoes + Depeciacoes)
        #   (1.0)    |         (1.1)        (1.2)         |           (2.1)         (2.2)
        #========================================================================================

        #========================================================================================
        # Etapa: 1.0 > Limpa dados da tabela balance_sheets por usuario - inicio
        #----------------------------------------------------------------------------------------
        
            $balance_sheet_delete = $this->balance_sheetRepository->deleteBalanceSheetsByUserId($user_id);

            #Lista todas as contas contabeis
            $accounting_accounts = $this->accounting_accountRepository->allAccountingAccountsByCode();
            foreach($accounting_accounts as $accounting_account)
            {
                #echo $accounting_account->id."<br>";

                $this->balance_sheetRepository
                     ->insertBalanceSheets
                        (
                            $user_id, 
                            $date_start,
                            $date_end,
                            $management_unit_id,
                            $accounting_account->id
                        );

                $balance_sheet_previouses = $this->balance_sheet_previousRepository
                    ->findBalanceSheetPreviousByManagementUnitIdAccountId($management_unit_id, $accounting_account->id);

                foreach($balance_sheet_previouses as $balance_sheet_previous)
                {
                    #Atualiza saldo em DEZ/2015
                    $this->balance_sheetRepository
                        ->updateBalanceSheets
                        (
                            $user_id, 
                            $management_unit_id, 
                            $accounting_account->id,
                            $balance_sheet_previous->balance_previous
                        );
                }
            }
        #----------------------------------------------------------------------------------------
        # Etapa: 1.0 > Limpa dados da tabela balance_sheets por usuario - fim
        #========================================================================================


        #========================================================================================
        # Bens Patrimoniais
        #----------------------------------------------------------------------------------------
            $previous_date_end = date('Y-m-d', strtotime($date_start. ' - 1 days'));
            ##echo "previous_date_end: ".$previous_date_end."<br>";

            $patrimonials = $this->patrimonialRepository->allPatrimonialsByManagementUnitId($management_unit_id);

            foreach($patrimonials as $patrimonial)
            {
                #Custo de aquisicao anteriores a Data Inicio Depreciacao - inicio
                    $total_materials_intervention_type_1_before    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdBefore($patrimonial->id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
                    
                    $total_services_intervention_type_1_before    = $this->patrimonial_serviceRepository->totalServicesByPatrimonialIdInterventionTypeIdBefore($patrimonial->id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
                    
                    $total_materials_services_intervention_type_1_before = $total_materials_intervention_type_1_before +$total_services_intervention_type_1_before;
                
                    $purchase_cost = $total_materials_intervention_type_1_before + $total_services_intervention_type_1_before;
                #Custo de aquisicao anteriores a Data Inicio Depreciacao - fim

                #============================================================================
                # Etapa: 1.1 > Previous - Aquisicoes de 2015-01-01 ate inicio intervalo     
                #              ($date_start) - inicio
                #----------------------------------------------------------------------------
                    if(($patrimonial->invoice_date->format('Y-m-d') >= '2016-01-01') && ($patrimonial->invoice_date->format('Y-m-d') < $date_start) && ($patrimonial->patrimonial_type->asset_accounting_account_id > 1))
                        {
                            $balance_sheets =  $this->balance_sheetRepository->findBalanceSheetByUserIdManagementUnitIdAccountId($user_id, $management_unit_id, $patrimonial->patrimonial_type->asset_accounting_account_id);

                            foreach($balance_sheets as $balance_sheet)
                            {
                                # Soma o valor de aquisicao
                                $balance_previous = $balance_sheet->balance_previous + $patrimonial->purchase_value + $purchase_cost;
                                #echo $balance_previous."<br>";

                                #Atualiza balance_previous da conta Pai
                                $this->balance_sheetRepository
                                    ->updateBalanceSheets
                                    (
                                        $user_id, 
                                        $management_unit_id, 
                                        $patrimonial->patrimonial_type->asset_accounting_account_id,
                                        $balance_previous
                                    );  
                            }
                        } 
                #----------------------------------------------------------------------------
                # Etapa: 1.1 > Previous - Aquisicoes de 2015-01-01 ate inicio intervalo     
                #              ($date_start) - fim
                #============================================================================

                #=================================================================================
                # Etapa: 2.1 > Interval - Aquisiçoes dentro do intervalo - inicio
                #---------------------------------------------------------------------------------
            
                    if(($patrimonial->invoice_date->format('Y-m-d') >= $date_start) && ($patrimonial->invoice_date->format('Y-m-d') <= $date_end) && ($patrimonial->patrimonial_type->asset_accounting_account_id > 1))
                    {
                        $balance_sheets =  $this->balance_sheetRepository->findBalanceSheetByUserIdManagementUnitIdAccountId($user_id, $management_unit_id, $patrimonial->patrimonial_type->asset_accounting_account_id);

                        foreach($balance_sheets as $balance_sheet)
                        {
                            if($patrimonial->patrimonial_type->asset_accounting_account->account_balance_type_id==1)
                            {
                                # Soma o valor de aquisicao
                                $credit = $balance_sheet->credit + $patrimonial->purchase_value + $purchase_cost;
                              
                                #Atualiza balance_previous da conta Pai
                                $this->balance_sheetRepository
                                    ->updateCreditBalanceSheet
                                    (
                                        $user_id, 
                                        $management_unit_id, 
                                        $patrimonial->patrimonial_type->asset_accounting_account_id,
                                        $credit
                                    ); 
                            }
                        else
                            { 
                                # Soma o valor de aquisicao
                                $debit = $balance_sheet->debit + $patrimonial->purchase_value + $purchase_cost;
                                #echo "debit: ".$balance_sheet->debit." + ".$patrimonial->purchase_value."<br>";

                                #Atualiza balance_previous da conta Pai
                                $this->balance_sheetRepository
                                    ->updateDebitBalanceSheet
                                    (
                                        $user_id, 
                                        $management_unit_id, 
                                        $patrimonial->patrimonial_type->asset_accounting_account_id,
                                        $debit
                                    );  

                            }
                        }
                    } 
                #----------------------------------------------------------------------------------
                # Etapa: 2.1 > Interval - Aquisiçoes dentro do intervalo - fim
                #==================================================================================

                #============================================================================
                # Etapa: 1.2 > Previous - Depreciações ate inicio intervalo 
                #              ($previous_date_end) - inicio
                #----------------------------------------------------------------------------
                    if($patrimonial->patrimonial_type->depreciation_accounting_account_id > 1) 
                    {
                        if($patrimonial->patrimonial_type->useful_life_years > 0)
                        {
                        #if($patrimonial->patrimonial_type->id == 8)
                        #{
                            #echo "patrimonial->code: ".$patrimonial->code."<br>";
                            #if($patrimonial->code == '2482')
                            #{
                                if(($patrimonial->patrimonial_status_id == 4) || ($patrimonial->patrimonial_status_id == 5)) //Desativado ou Baixado
                                {
                                    $date_end = new Carbon($this->patrimonial_status_date);

                                    $depreciation_date_start = new Carbon($this->attributes['depreciation_date_start']);
                    
                                    $date_end_Y = substr($date_end, 0, 4);
                                    $date_end_m = substr($date_end, 5, 2);

                                    $depreciation_date_start_Y = substr($depreciareturntion_date_start, 0, 4);
                                    $depreciation_date_start_m = substr($depreciation_date_start, 5, 2);

                                    $uselful_life_months = ($date_end_Y - $depreciation_date_start_Y - 1) * 12;
                                    $uselful_life_months += 12 - $date_end_m + $depreciation_date_start_m + 1;
                                }
                                else
                                {
                                    $uselful_life_months = $this->patrimonialRepository->UsefulLifeMonthsQty($patrimonial->patrimonial_type->useful_life_years);

                                    ##echo $patrimonial->code."<br>";
                                }

                                #echo "uselful_life_months: ".$uselful_life_months."<br>";

                                #echo "patrimonial->depreciation_date_start: ".$patrimonial->depreciation_date_start."<br>";

                                #Obter a qte de meses ate ate um dia antes 2015-31-12 da migracao
                                #Já somado mais 1 mês na $this->patrimonialRepository->DepreciationAccumulatedMonthQty
                                $patrimonial_depreciation_accumulated_month_qty_previous_2015 = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->patrimonial_type->useful_life_years, $patrimonial->depreciation_date_start->format('Y-m-d'), '2015-12-31');
                                #echo "patrimonial_depreciation_accumulated_month_qty_previous_2015: ".$patrimonial_depreciation_accumulated_month_qty_previous_2015."<br>";

                                #Obter a qte de meses ate um dia antes do inicio do intervalo ($previous_date_end)
                                #Já somado mais 1 mês na $this->patrimonialRepository->DepreciationAccumulatedMonthQty
                                $patrimonial_depreciation_accumulated_month_qty_previous_date_end = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->patrimonial_type->useful_life_years, $patrimonial->depreciation_date_start, $previous_date_end);
                                #echo "patrimonial_depreciation_accumulated_month_qty_previous_date_end: ".$patrimonial_depreciation_accumulated_month_qty_previous_date_end."<br>";

                                if($uselful_life_months >= $patrimonial_depreciation_accumulated_month_qty_previous_2015)
                                {
                                    if($uselful_life_months <= $patrimonial_depreciation_accumulated_month_qty_previous_date_end)
                                    {
                                        $patrimonial_depreciation_accumulated_month_qty_previous = $uselful_life_months - $patrimonial_depreciation_accumulated_month_qty_previous_2015;
                                        #echo "1 patrimonial_depreciation_accumulated_month_qty_previous: ".$patrimonial_depreciation_accumulated_month_qty_previous."<br>";
                                    }
                                    else
                                    {
                                        $patrimonial_depreciation_accumulated_month_qty_previous = $patrimonial_depreciation_accumulated_month_qty_previous_date_end - $patrimonial_depreciation_accumulated_month_qty_previous_2015;
                                        #echo "2 patrimonial_depreciation_accumulated_month_qty_previous: ".$patrimonial_depreciation_accumulated_month_qty_previous."<br>";
                                    }
                                }
                                else
                                {
                                    $patrimonial_depreciation_accumulated_month_qty_previous = 0;
                                }

                                #echo "patrimonial_depreciation_accumulated_month_qty_previous: ".$patrimonial_depreciation_accumulated_month_qty_previous."<br>";

                                $patrimonial_depreciation_accumulated_previous_value = $patrimonial_depreciation_accumulated_month_qty_previous * number_format($this->patrimonialRepository->DepreciationMonthlyValue($patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value, $patrimonial->patrimonial_type->useful_life_years), '2');
                                #echo "3 patrimonial_depreciation_accumulated_previous_value: ".$patrimonial_depreciation_accumulated_previous_value."<br>";

                                $balance_sheets =  $this->balance_sheetRepository->findBalanceSheetByUserIdManagementUnitIdAccountId($user_id, $management_unit_id, $patrimonial->patrimonial_type->depreciation_accounting_account_id);

                                foreach($balance_sheets as $balance_sheet)
                                {
                                    # Soma o valor de depreciacao
                                    $balance_previous = $balance_sheet->balance_previous + $patrimonial_depreciation_accumulated_previous_value;

                                    #Atualiza balance_previous da conta depreciacao
                                    $this->balance_sheetRepository
                                        ->updateBalanceSheets
                                        (
                                            $user_id, 
                                            $management_unit_id, 
                                            $patrimonial->patrimonial_type->depreciation_accounting_account_id,
                                            $balance_previous
                                        ); 
                                }                                
                                 
                            
                                #---------------------------------------------------------------------------------
                                # Etapa: 1.2 > Previous - Depreciações de 2015-01-01 ate inicio intervalo 
                                #              ($date_start) - fim
                                #=================================================================================

                            
                                #==================================================================================
                                # Etapa: 2.2 > Interval - Depreciacoes dentro do intervalo - inicio
                                #----------------------------------------------------------------------------------
                                # depreciation_interval_value = depreciation_value_date_end - 
                                # depreciation_value_date_start
                                #----------------------------------------------------------------------------------
                                    
                                #==================================================================================
                                #  Bem partimonial
                                #-----------------------------------+--------------------------------------
                                #           (previous)              |               (interval)
                                # --------------------------------->|<----------------------------------->|
                                #  --id1------------------------fd1>Ok
                                #    1m                          60m 
                                # --------------id2---------------------------------------------------fd2>|     
                                #                1m              40m                                   100m
                                #                                                    60m<----------------+
                                #                                40m                   ^
                                #                                  +-------------------|
                                #==================================================================================
                        
                                # $uselful_life_months = $this->patrimonialRepository->UsefulLifeMonthsQty($patrimonial->patrimonial_type->useful_life_years);
                                #echo "uselful_life_months: ".$uselful_life_months."<br>";

                                #echo "INTERVALO"."<br>";
                                #Obter a qte de meses no dia anterior a data inicial do intervalo
                                #Já somado mais 1 mês na $this->patrimonialRepository->DepreciationAccumulatedMonthQty
                                $patrimonial_depreciation_accumulated_month_qty_previous_date_end = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->patrimonial_type->useful_life_years, $patrimonial->depreciation_date_start, $previous_date_end);
                                #echo "patrimonial_depreciation_accumulated_month_qty_previous_date_start: ".$patrimonial_depreciation_accumulated_month_qty_previous_date_end."<br>";

                                #Obter a qte de meses no dia inicial do intervalo ($date_start)
                                #Já somado mais 1 mês na $this->patrimonialRepository->DepreciationAccumulatedMonthQty
                                $patrimonial_depreciation_accumulated_month_qty_interval_start = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->patrimonial_type->useful_life_years, $patrimonial->depreciation_date_start, $date_start);
                                #echo "patrimonial_depreciation_accumulated_month_qty_interval_start: ".$patrimonial_depreciation_accumulated_month_qty_interval_start."<br>";

                                #Obter a qte de meses no dia final do intervalo ($date_end)
                                #Já somado mais 1 mês na $this->patrimonialRepository->DepreciationAccumulatedMonthQty
                                #echo "patrimonial->depreciation_date_start: ".$patrimonial->depreciation_date_start."<br>";

                                $patrimonial_depreciation_accumulated_month_qty_interval_end = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->patrimonial_type->useful_life_years, $patrimonial->depreciation_date_start, $date_end);
                                #echo "X patrimonial_depreciation_accumulated_month_qty_interval_end: ".$patrimonial_depreciation_accumulated_month_qty_interval_end."<br>";

                                #echo "uselful_life_months: ".$uselful_life_months."<br>";

                                if($uselful_life_months >= $patrimonial_depreciation_accumulated_month_qty_previous_date_end)
                                {
                                    if($uselful_life_months <= $patrimonial_depreciation_accumulated_month_qty_interval_end)
                                    {
                                        $patrimonial_depreciation_accumulated_month_qty_interval = $uselful_life_months - $patrimonial_depreciation_accumulated_month_qty_interval_start + 1;

                                        #echo "4 patrimonial_depreciation_accumulated_month_qty_interval: ".$patrimonial_depreciation_accumulated_month_qty_interval."<br>";
                                    }
                                    else
                                    {
                                        $patrimonial_depreciation_accumulated_month_qty_interval = $patrimonial_depreciation_accumulated_month_qty_interval_end - $patrimonial_depreciation_accumulated_month_qty_interval_start + 1;
                                    
                                        #echo "5 patrimonial_depreciation_accumulated_month_qty_interval: ".$patrimonial_depreciation_accumulated_month_qty_interval."<br>";
                                    }
                                }
                                else
                                {
                                     $patrimonial_depreciation_accumulated_month_qty_interval = 0;
                                }
                               
                                #echo $patrimonial_depreciation_accumulated_month_qty_interval_end." - ".$patrimonial_depreciation_accumulated_month_qty_interval_start." = ".$patrimonial_depreciation_accumulated_month_qty_interval."<br>";


                                $patrimonial_depreciation_accumulated_interval_value = $patrimonial_depreciation_accumulated_month_qty_interval * number_format($this->patrimonialRepository->DepreciationMonthlyValue($patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value, $patrimonial->patrimonial_type->useful_life_years), '2');
                                #echo "patrimonial_depreciation_accumulated_interval_value: ".$patrimonial_depreciation_accumulated_interval_value."<br>";



                                #echo "patrimonial_depreciation_accumulated_interval_value: ".$patrimonial_depreciation_accumulated_month_qty_interval_start * $this->patrimonialRepository->DepreciationMonthlyValue($patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value, $patrimonial->patrimonial_type->useful_life_years)."<br>";

                                $balance_sheets =  $this->balance_sheetRepository->findBalanceSheetByUserIdManagementUnitIdAccountId($user_id, $management_unit_id, $patrimonial->patrimonial_type->depreciation_accounting_account_id);

                                foreach($balance_sheets as $balance_sheet)
                                {
                                    if($patrimonial->patrimonial_type->depreciation_accounting_account->account_balance_type_id==1)
                                    {
                                        # Soma o valor de aquisicao
                                        $credit = $balance_sheet->credit + $patrimonial_depreciation_accumulated_interval_value;
                                        #echo "credit: ".$credit."<br>";
                                         
                                        #Atualiza balance_previous da conta Pai
                                        $this->balance_sheetRepository
                                            ->updateCreditBalanceSheet
                                            (
                                                $user_id, 
                                                $management_unit_id, 
                                                $patrimonial->patrimonial_type->depreciation_accounting_account_id,
                                                $credit
                                            ); 
                                    }
                                    else
                                    { 
                                        # Soma o valor de aquisicao
                                        $debit = $balance_sheet->debit + $patrimonial_depreciation_accumulated_interval_value;
                                        #echo "debit: ".$balance_sheet->debit." + ".$patrimonial->purchase_value."<br>";

                                        #Atualiza balance_previous da conta Pai
                                        $this->balance_sheetRepository
                                            ->updateDebitBalanceSheet
                                            (
                                                $user_id, 
                                                $management_unit_id, 
                                                $patrimonial->patrimonial_type->depreciation_accounting_account_id,
                                                $debit
                                            );  

                                    }                              
                                } 

                                #echo "<br>";
                            #}
                        #}
                        }   
                    }

                    
                #----------------------------------------------------------------------------------
                # Etapa: 2.2 > Interval - Depreciacoes dentro do intervalo - Fim
                #----------------------------------------------------------------------------------
                # depreciation_inteechorval_value = depreciation_value_date_end - 
                # depreciation_value_date_start
                #==================================================================================
                
            }
        #========================================================================================
        # Etapa: 3.1 > Interval - Atualizar saldos  - inicio
        #----------------------------------------------------------------------------------------

            # Atualização de saldos
            $accounting_accounts = $this->accounting_accountRepository->allAccountingAccountsByCoverageTypeIdOrberByCodeDesc(1);//Sinteticas
            foreach($accounting_accounts as $accounting_account)
            {
                $total_balance_previous_children = 0;
                $total_debit_children = 0;
                $total_credit_children = 0;

                #Identifica as contas filhas
                $accounting_account_children = $this->accounting_accountRepository->findChildrenByParentId($accounting_account->id);
                #Acumula balance_previous por Conta Pai
                foreach($accounting_account_children as $accounting_account_child)
                { 
                    $balance_sheet_previouses = $this->balance_sheetRepository->findBalancePreviousByAccountingAccountId($user_id, $management_unit_id, $accounting_account_child->id);
                    
                    foreach($balance_sheet_previouses as $balance_sheet_previous)
                    {   
                        if($accounting_account->account_balance_type_id == $accounting_account_child->account_balance_type_id)
                        {
                            $total_balance_previous_children = $total_balance_previous_children + $balance_sheet_previous->balance_previous;
                            $total_debit_children = $total_debit_children + $balance_sheet_previous->debit;
                            $total_credit_children = $total_credit_children + $balance_sheet_previous->credit;
                        }
                        else
                        {
                            $total_balance_previous_children = $total_balance_previous_children - $balance_sheet_previous->balance_previous;
                            $total_debit_children = abs($total_debit_children - $balance_sheet_previous->debit);
                            $total_credit_children = abs($total_credit_children - $balance_sheet_previous->credit);
                        }
                    }

                    #echo "debit: ".$total_debit_children."<br>";
                    #echo "credit: ".$total_credit_children."<br>";

                    
                    #Atualiza balance_previous da conta
                    $this->balance_sheetRepository
                        ->updateBalanceSheets
                        (
                            $user_id, 
                            $management_unit_id, 
                            $accounting_account->id,
                            $total_balance_previous_children
                        );

                    #Atualiza debit/credit da conta
                    $this->balance_sheetRepository
                        ->updateDebitCreditBalanceSheets
                        (
                            $user_id, 
                            $management_unit_id, 
                            $accounting_account->id,
                            $total_debit_children,
                            $total_credit_children
                        );
                }
            }        

            $accounting_accounts = $this->balance_sheetRepository->showBalanceSheets($user_id);
            #Atualiza balance_current
            foreach($accounting_accounts as $accounting_account)
            {
                if($accounting_account->account_balance_type_id==1)
                {
                    $balance_current = $accounting_account->balance_previous + $accounting_account->credit - $accounting_account->debit;
                }
                else
                {
                    $balance_current = $accounting_account->balance_previous - $accounting_account->credit + $accounting_account->debit;
                }

                #echo "balance_current: ".$balance_current."<br>";

                $this->balance_sheetRepository
                    ->updateBalanceCurrent
                    (
                        $user_id,
                        $accounting_account->id,
                        $balance_current
                   );
            }
        #----------------------------------------------------------------------------------------
        # Etapa: 3.1 > Interval - Atualizar saldos  - fim
        #========================================================================================

        $accounting_accounts = $this->balance_sheetRepository->showBalanceSheets($user_id);

        return view('balance_sheets.search_results', compact('accounting_accounts', 'srch_balance_sheet_date_start', 'srch_balance_sheet_date_end', 'management_unit_code', 'management_unit_description'));
    }
}
