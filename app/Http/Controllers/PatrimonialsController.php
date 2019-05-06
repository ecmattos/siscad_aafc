<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use JasperPHP\JasperPHP as JasperPHP;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\AccountingAccountRepository;
use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialTypeRepository;
use SisCad\Repositories\PatrimonialSubTypeRepository;
use SisCad\Repositories\PatrimonialBrandRepository;
use SisCad\Repositories\PatrimonialModelRepository;
use SisCad\Repositories\ProviderRepository;
use SisCad\Repositories\ManagementUnitRepository;
use SisCad\Repositories\CompanySectorRepository;
use SisCad\Repositories\CompanySubSectorRepository;
use SisCad\Repositories\PatrimonialStatusRepository;
use SisCad\Repositories\PatrimonialMovementRepository;
use SisCad\Repositories\MaterialRepository;
use SisCad\Repositories\PatrimonialMaterialRepository;
use SisCad\Repositories\ServiceRepository;
use SisCad\Repositories\PatrimonialServiceRepository;
use SisCad\Repositories\PatrimonialInterventionTypeRepository;
use SisCad\Repositories\EmployeeRepository;
use SisCad\Repositories\PatrimonialFileRepository;

use SisCad\Services\PatrimonialService;

use Session;
use Storage;
use File;


class PatrimonialsController extends Controller
{
    private $patrimonialRepository;
    private $accounting_accountRepository;
    private $patrimonial_typeRepository;
    private $patrimonial_sub_typeRepository;
    private $patrimonial_brandRepository;
    private $patrimonial_modelRepository;
    private $providerRepository;
    private $management_unitRepository;
    private $company_sectorRepository;
    private $company_sub_sectorRepository;
    private $patrimonial_statusRepository;
    private $patrimonial_movementRepository;
    private $materialRepository;
    private $patrimonial_materialRepository;
    private $serviceRepository;
    private $patrimonial_serviceRepository;
    private $patrimonial_intervention_typeRepository;
    private $employeeRepository;
    private $patrimonial_fileRepository;
    private $patrimonialService;

    public function __construct(
        PatrimonialRepository $patrimonialRepository, 
        AccountingAccountRepository $accounting_accountRepository, 
        PatrimonialTypeRepository $patrimonial_typeRepository, 
        PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, 
        PatrimonialBrandRepository $patrimonial_brandRepository, 
        PatrimonialModelRepository $patrimonial_modelRepository, 
        ProviderRepository $providerRepository, 
        ManagementUnitRepository $management_unitRepository, 
        CompanySectorRepository $company_sectorRepository, 
        CompanySubSectorRepository $company_sub_sectorRepository, 
        PatrimonialStatusRepository $patrimonial_statusRepository, 
        PatrimonialMovementRepository $patrimonial_movementRepository, 
        MaterialRepository $materialRepository, 
        PatrimonialMaterialRepository $patrimonial_materialRepository, 
        ServiceRepository $serviceRepository, 
        PatrimonialServiceRepository $patrimonial_serviceRepository, 
        PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository, 
        EmployeeRepository $employeeRepository, 
        PatrimonialFileRepository $patrimonial_fileRepository,
        PatrimonialService $patrimonialService
        )
    {
        $this->patrimonialRepository = $patrimonialRepository;
        $this->accounting_accountRepository = $accounting_accountRepository;
        $this->patrimonial_typeRepository = $patrimonial_typeRepository;
        $this->patrimonial_sub_typeRepository = $patrimonial_sub_typeRepository;
        $this->patrimonial_brandRepository = $patrimonial_brandRepository;
        $this->patrimonial_modelRepository = $patrimonial_modelRepository;
        $this->providerRepository = $providerRepository;
        $this->management_unitRepository = $management_unitRepository;
        $this->company_sectorRepository = $company_sectorRepository;
        $this->company_sub_sectorRepository = $company_sub_sectorRepository;
        $this->patrimonial_statusRepository = $patrimonial_statusRepository;
        $this->patrimonial_movementRepository = $patrimonial_movementRepository;
        $this->materialRepository = $materialRepository;
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
        $this->serviceRepository = $serviceRepository;
        $this->patrimonial_serviceRepository = $patrimonial_serviceRepository;
        $this->patrimonial_intervention_typeRepository = $patrimonial_intervention_typeRepository;
        $this->employeeRepository = $employeeRepository;
        $this->patrimonial_fileRepository = $patrimonial_fileRepository;
        $this->patrimonialService = $patrimonialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonials = $this->patrimonialRepository->allPatrimonials();
        #dd($patrimonials);
        return view('patrimonials.index', compact('patrimonials'));
    }

    public function search()
    { 
        $this->authorize('patrimonials-search');

        session()->forget('srch_asset_accounting_account_id');
        session()->forget('srch_patrimonial_code');
        session()->forget('srch_patrimonial_description');
        session()->forget('srch_patrimonial_serial');
        session()->forget('srch_patrimonial_type_id');
        session()->forget('srch_patrimonial_sub_type_id');
        session()->forget('srch_patrimonial_brand_id');
        session()->forget('srch_patrimonial_model_id');
        session()->forget('srch_patrimonial_provider_id');
        session()->forget('srch_patrimonial_employee_id');
        session()->forget('srch_patrimonial_management_unit_id');
        session()->forget('srch_company_sector_id');
        session()->forget('srch_company_sub_sector_id');
        session()->forget('srch_patrimonial_status_id');
        session()->forget('srch_patrimonial_invoice');
        session()->forget('srch_patrimonial_invoice_date_start');
        session()->forget('srch_patrimonial_invoice_date_end');
        session()->forget('srch_patrimonial_status_date_start');
        session()->forget('srch_patrimonial_status_date_end');

        $accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $patrimonial_types = array(''=>'') + $this->patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $this->patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $this->patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $this->patrimonial_modelRepository
            ->allPatrimonialModels()
            ->pluck('description', 'id')
            ->all();

        $providers = array(''=>'') + $this->providerRepository
            ->allProviders()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $employees = array(''=>'') + $this->employeeRepository
            ->allEmployees()
            ->pluck('name', 'id')
            ->all();

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('code_description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $this->patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->pluck('description', 'id')
            ->all();

        return view('patrimonials.search', compact('accounting_accounts', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'employees','management_units', 'company_sectors', 'company_sub_sectors', 'patrimonial_statuses'));
    }

    public function search_results(Requests\PatrimonialSearchRequest $request)
    { 
        $data = $request->all();

        $request->flash();

        session(['srch_asset_accounting_account_id'         => $data['srch_asset_accounting_account_id']]);
        session(['srch_patrimonial_description'             => $data['srch_patrimonial_description']]);
        session(['srch_patrimonial_code'                    => $data['srch_patrimonial_code']]);
        session(['srch_patrimonial_serial'                  => $data['srch_patrimonial_serial']]);
        session(['srch_patrimonial_type_id'                 => $data['srch_patrimonial_type_id']]);
        session(['srch_patrimonial_sub_type_id'             => $data['srch_patrimonial_sub_type_id']]);
        session(['srch_patrimonial_brand_id'                => $data['srch_patrimonial_brand_id']]);
        session(['srch_patrimonial_model_id'                => $data['srch_patrimonial_model_id']]);
        session(['srch_patrimonial_provider_id'             => $data['srch_patrimonial_provider_id']]);
        session(['srch_patrimonial_employee_id'             => $data['srch_patrimonial_employee_id']]);
        session(['srch_patrimonial_management_unit_id'      => $data['srch_patrimonial_management_unit_id']]);
        session(['srch_company_sector_id'                   => $data['srch_company_sector_id']]);
        session(['srch_company_sub_sector_id'               => $data['srch_company_sub_sector_id']]);
        session(['srch_patrimonial_invoice_date_start'      => $data['srch_patrimonial_invoice_date_start']]);
        session(['srch_patrimonial_invoice'                 => $data['srch_patrimonial_invoice']]);
        session(['srch_patrimonial_invoice_date_end'        => $data['srch_patrimonial_invoice_date_end']]);
        session(['srch_patrimonial_status_id'               => $data['srch_patrimonial_status_id']]);
        session(['srch_patrimonial_status_date_start'       => $data['srch_patrimonial_status_date_start']]);
        session(['srch_patrimonial_status_date_end'         => $data['srch_patrimonial_status_date_end']]);

        session(['srch_depreciation_date_BR'                => $data['srch_depreciation_date']]);
        $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');

        session(['srch_depreciation_date_EN'                => \DateTime::createFromFormat('d/m/Y', $srch_depreciation_date_BR)->format('Y-m-d')]);
        $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');

        $patrimonials = $this->patrimonialRepository->searchPatrimonials();

        return view('patrimonials.search_results', compact('patrimonials', 'srch_depreciation_date_BR', 'srch_depreciation_date_EN'));
    }

    public function search_results_back()
    { 
        $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');
        $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');

        $patrimonials = $this->patrimonialRepository->searchPatrimonials();

        return view('patrimonials.search_results', compact('patrimonials', 'srch_depreciation_date_BR', 'srch_depreciation_date_EN'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonials-create');

        $accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $patrimonial_types = array(''=>'') + $this->patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $this->patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $this->patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $this->patrimonial_modelRepository
            ->allPatrimonialModels()
            ->pluck('description', 'id')
            ->all();

        $providers = array(''=>'') + $this->providerRepository
            ->allProviders()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        $employees = array(''=>'') + $this->employeeRepository
            ->allEmployees()
            ->pluck('name', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $this->patrimonial_statusRepository
            ->allPatrimonialNewStatuses()
            ->pluck('description', 'id')
            ->all();
        
        return view('patrimonials.create', compact('accounting_accounts', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'management_units', 'company_sectors', 'company_sub_sectors', 'employees', 'patrimonial_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialRequest $request)
    {
        $data = $request->all();
        
        $data['code'] = strtoupper($data['code']);

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($data['patrimonial_sub_type_id']);
        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($data['patrimonial_brand_id']);
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($data['patrimonial_model_id']);

        $data['serial'] = strtoupper($data['serial']);

        #$data['description'] = strtoupper($data['description']);

        $data['description'] = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$data['serial'];

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_value'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['purchase_value']));

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['residual_value'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['residual_value']));
        #dd($data['purchase_value']);

        $data['invoice'] = strtoupper($data['invoice']);

        $data['depreciation_date_start'] = \DateTime::createFromFormat('d/m/Y', $data['depreciation_date_start']);
        $data['depreciation_date_start'] = $data['depreciation_date_start']->format('Y-m-d');

        $data['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $data['invoice_date']);
        $data['invoice_date'] = $data['invoice_date']->format('Y-m-d');

        $data['purchase_process'] = strtoupper($data['purchase_process']);

        $data['patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $data['patrimonial_status_date']);
        $data['patrimonial_status_date'] = $data['patrimonial_status_date']->format('Y-m-d');

        $data['comments'] = strtoupper($data['comments']);

        $patrimonial = $this->patrimonialRepository->storePatrimonial($data);

        $last_patrimonial = $this->patrimonialRepository->allPatrimonialsById()->last();
        $data['patrimonial_id'] = $last_patrimonial->id;

        $data['date_start'] = $data['patrimonial_status_date'];
        $patrimonial_movement = $this->patrimonial_movementRepository->storePatrimonialMovement($data);      
    
        return redirect()->route('patrimonials.show', ['id' => $last_patrimonial->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonials-show');

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        if (session()->has('srch_depreciation_date_EN')) 
        {
            $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');
            $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');
        }
        else
        {
            session(['srch_depreciation_date_BR' => date('d/m/Y')]);
            $srch_depreciation_date_BR  = session('srch_depreciation_date_BR');

            session(['srch_depreciation_date_EN'  => date('Y-m-d')]);
            $srch_depreciation_date_EN  = session('srch_depreciation_date_EN');
        }

        $today = $srch_depreciation_date_EN;

        # Lista todas as movimentacoes
        $patrimonial_movements = $this->patrimonial_movementRepository->allPatrimonialMovementsByPatrimonialId($id);
        $patrimonial_movement_date_last = $this->patrimonial_movementRepository->lastPatrimonialMovementDateByPatrimonialId($id);
        
        # Lista todos os arquivos associados
        $patrimonial_files = $this->patrimonial_fileRepository->allFilesByPatrimonialId($id);

        # Lista todos os materiais associados
        $patrimonial_materials = $this->patrimonial_materialRepository->allPatrimonialMaterialsByPatrimonialId($id);
        
        $total_materials = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialId($id);
        $total_materials_intervention_type_1_before    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdBefore($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));

        # Lista todos os servicos associados
        $patrimonial_services = $this->patrimonial_serviceRepository->allPatrimonialServicesByPatrimonialId($id);
        $total_services = $this->patrimonial_serviceRepository->totalServicesByPatrimonialId($id);

        $patrimonial_depreciation_month_percentage = $this->patrimonialRepository->DepreciationMonthlyPercentage($patrimonial->patrimonial_type->useful_life_years);

        $patrimonial_useful_life_months_qty = $this->patrimonialRepository->UsefulLifeMonthsQty($patrimonial->patrimonial_type->useful_life_years);


        $logs = $patrimonial->revisionHistory;

        #Custo de aquisicao anteriores a Data Inicio Depreciacao - inicio
            $total_materials_intervention_type_1_before    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdBefore($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
            $total_services_intervention_type_1_before    = $this->patrimonial_serviceRepository->totalServicesByPatrimonialIdInterventionTypeIdBefore($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
            $total_materials_services_intervention_type_1_before = $total_materials_intervention_type_1_before +$total_services_intervention_type_1_before;
            $purchase_cost = $total_materials_intervention_type_1_before + $total_services_intervention_type_1_before;
        #Custo de aquisicao anteriores a Data Inicio Depreciacao - fim

        $patrimonial_depreciation_month_value = $this->patrimonialRepository->DepreciationMonthlyValue($patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value, $patrimonial->patrimonial_type->useful_life_years);

        $patrimonial_depreciation_accumulated_month_qty = $this->patrimonialRepository->DepreciationAccumulatedMonthQty($patrimonial->depreciation_date_start, $today, $patrimonial->patrimonial_type->useful_life_years);

        $patrimonial_depreciation_accumulated_value = $this->patrimonialRepository->DepreciationAccumulatedValue($patrimonial->depreciation_date_start, $today, $patrimonial->patrimonial_type->useful_life_years, $patrimonial->purchase_value, $purchase_cost, $patrimonial->residual_value);

        $patrimonial_accounting_balance_value = $this->patrimonialRepository->AccountingBalance($patrimonial->purchase_value, $purchase_cost, $patrimonial_depreciation_accumulated_value, $patrimonial->residual_value);

        #Custo de aquisicao posteriores a Data Inicio Depreciacao (ERRO) - inicio
            $total_materials_intervention_type_1_after    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdAfter($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
            $total_services_intervention_type_1_after    = $this->patrimonial_serviceRepository->totalServicesByPatrimonialIdInterventionTypeIdAfter($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));

            if(($total_materials_intervention_type_1_after + $total_services_intervention_type_1_after)>'0')
            {
                Session::flash('flash_message_danger', 'Existem R$ '.($total_materials_intervention_type_1_after + $total_services_intervention_type_1_after).' referente a MATERIAIS e/ou SERVIÇOS em intervenções do tipo AQUISIÇAO posteriores a Data de início da Depreciação que NÃO serão considerados como Custos de Aquisição !');
            }
        #Custo de aquisicao posteriores a Data Inicio Depreciacao (ERRO) - fim

        return view('patrimonials.show', compact('patrimonial', 'patrimonial_files', 'patrimonial_useful_life_months_qty', 'patrimonial_depreciation_month_percentage', 'patrimonial_depreciation_month_value', 'patrimonial_depreciation_accumulated_month_qty', 'patrimonial_depreciation_accumulated_value', 'patrimonial_accounting_balance_value', 'patrimonial_movements', 'patrimonial_movement_date_last', 'patrimonial_materials', 'total_materials', 'total_materials_intervention_type_1_before', 'total_services_intervention_type_1_before', 'purchase_cost', 'patrimonial_services', 'total_services', 'logs', 'srch_depreciation_date_BR', 'srch_depreciation_date_EN'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonials-edit');

        $accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $patrimonial_types = array(''=>'') + $this->patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_sub_types = array(''=>'') + $this->patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $this->patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $this->patrimonial_modelRepository
            ->allPatrimonialModels()
            ->pluck('description', 'id')
            ->all();

        $providers = array(''=>'') + $this->providerRepository
            ->allProviders()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);

        $purchase_value = number_format($patrimonial->purchase_value, 2);
        $residual_value = number_format($patrimonial->residual_value, 2);
        #dd($purchase_value);
        
        return view('patrimonials.edit', compact('accounting_accounts', 'patrimonial', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'purchase_value', 'residual_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function copy($id)
    {
        $this->authorize('patrimonials-copy');

        $patrimonial_types =  $this->patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_sub_types = $this->patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_brands = $this->patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_models = $this->patrimonial_modelRepository
            ->allPatrimonialModels()
            ->pluck('description', 'id')
            ->all();

        $employees = array(''=>'') + $this->employeeRepository
            ->allEmployees()
            ->pluck('name', 'id')
            ->all();

        $providers = $this->providerRepository
            ->allProviders()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $management_units = $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_sectors = $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_statuses = $this->patrimonial_statusRepository
            ->allPatrimonialNewStatuses()
            ->pluck('description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);

        $purchase_value = number_format($patrimonial->purchase_value, 2);
        $residual_value = number_format($patrimonial->residual_value, 2);
        #dd($purchase_value);               

        return view('patrimonials.copy', compact('patrimonial', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'employees', 'providers', 'management_units', 'company_sectors', 'company_sub_sectors', 'patrimonial_statuses', 'purchase_value', 'residual_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\PatrimonialUpdateRequest $request)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);

        $patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($data['patrimonial_sub_type_id']);
        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($data['patrimonial_brand_id']);
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($data['patrimonial_model_id']);

        $data['serial'] = strtoupper($data['serial']);

        #$data['description'] = strtoupper($data['description']);

        $data['description'] = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$data['serial'];

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_value'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['purchase_value']));
        #dd($data['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['residual_value'] = $numberFormatter_ptBR2en->parse(str_replace(['_','.'], '', $data['residual_value']));
        #dd($data['residual_value']);

        $data['invoice'] = strtoupper($data['invoice']);

        $data['depreciation_date_start'] = \DateTime::createFromFormat('d/m/Y', $data['depreciation_date_start']);
        $data['depreciation_date_start'] = $data['depreciation_date_start']->format('Y-m-d');

        $data['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $data['invoice_date']);
        $data['invoice_date'] = $data['invoice_date']->format('Y-m-d');

        $data['purchase_process'] = strtoupper($data['purchase_process']);

        $data['patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $data['patrimonial_status_date']);
        $data['patrimonial_status_date'] = $data['patrimonial_status_date']->format('Y-m-d');

        $data['comments'] = strtoupper($data['comments']);

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        $patrimonial->update($data);

        $total_materials_intervention_type_1_after    = $this->patrimonial_materialRepository->totalMaterialsByPatrimonialIdInterventionTypeIdAfter($id, 1, $patrimonial->depreciation_date_start->format('Y-m-d'));
        if($total_materials_intervention_type_1_after>'0')
        {
            Session::flash('flash_message_danger', 'Existem R$ '.$total_materials_intervention_type_1_after.' em intervenções do tipo AQUISIÇAO posteriores a Data de início da Depreciação que NÃO serão considerados como Custos de Aquisição !');
        }

        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonials-destroy');

        if($this->patrimonialService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) movimentação(ões) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('patrimonials.show', ['id' => $id]);
        }
        
        Session::flash('flash_message_patrimonial_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('patrimonials.show', ['id' => $id]);
    }


    public function trashed($id)
    {
        $patrimonial = $this->patrimonialRepository->findPatrimonialTrashedById($id);
            
        return view('patrimonials.trashed', compact('patrimonial'));
    }


    public function restore($id)
    {
        $patrimonial = $this->patrimonialRepository->findPatrimonialTrashedById($id);
        $patrimonial->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function create_movement($id)
    {
        $accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccounts()
            ->pluck('code_description', 'id')
            ->all();

        $patrimonial_types = $this->patrimonial_typeRepository
            ->allPatrimonialTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_sub_types = $this->patrimonial_sub_typeRepository
            ->allPatrimonialSubTypes()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_brands = array(''=>'') + $this->patrimonial_brandRepository
            ->allPatrimonialBrands()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_models = array(''=>'') + $this->patrimonial_modelRepository
            ->allPatrimonialModels()
            ->pluck('description', 'id')
            ->all();

        $providers = array(''=>'') + $this->providerRepository
            ->allProviders()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $this->patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->pluck('description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.movements.create', compact('patrimonial', 'accounting_accounts', 'patrimonial_types', 'patrimonial_sub_types', 'patrimonial_brands', 'patrimonial_models', 'providers', 'management_units', 'company_sectors', 'company_sub_sectors', 'patrimonial_statuses'));
    }

    public function store_movement($id, Requests\PatrimonialMovementRequest $request)
    {
        $data = $request->all();

        #$patrimonial = $this->patrimonialRepository->findPatrimonialById($id);

        $data['patrimonial_id'] = $id;

        $data['patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $data['patrimonial_status_date']);
        $data['patrimonial_status_date'] = $data['patrimonial_status_date']->format('Y-m-d');

        $patrimonial_movement = $this->patrimonial_movementRepository->findPatrimonialMovementByVariousParams1($data['patrimonial_id'], $data['patrimonial_status_id'], $data['patrimonial_status_date'], $data['management_unit_id'], $data['company_sector_id'], $data['company_sub_sector_id']);

        if($patrimonial_movement->isEmpty())
        {
            $patrimonial_movement = $this->patrimonial_movementRepository->storePatrimonialMovement($data);

            $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
            $patrimonial->update($data);

            Session::flash('flash_message_success', 'MOVIMENTAÇÃO incluída com sucesso !');
        }
        else
        {
            Session::flash('flash_message_danger', 'MOVIMENTAÇÃO já existente !');
        }

        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function create_material($id, MaterialRepository $materialRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->pluck('description', 'id')
            ->all();

        $materials = array(''=>'') + $materialRepository
            ->allMaterials()
            ->pluck('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.materials.create', compact('patrimonial', 'patrimonial_intervention_types', 'materials', 'providers'));
    }

    public function store_material($id, Requests\PatrimonialMaterialRequest $request)
    {
        $data = $request->all();

        $data['patrimonial_id'] = $id;

        $data['purchase_process'] = strtoupper($data['purchase_process']);

        $data['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $data['intervention_date']);
        $data['intervention_date'] = $data['intervention_date']->format('Y-m-d');

        $data['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $data['invoice_date']);
        $data['invoice_date'] = $data['invoice_date']->format('Y-m-d');

        $data['invoice'] = strtoupper($data['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_value'] = $numberFormatter_ptBR2en->parse($data['purchase_value']);
        #dd($data['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_qty'] = $numberFormatter_ptBR2en->parse($data['purchase_qty']);

        $patrimonial_material = $this->patrimonial_materialRepository->storePatrimonialMaterial($data);
        
        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function edit_material($id, MaterialRepository $materialRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->pluck('description', 'id')
            ->all();

        $materials = array(''=>'') + $materialRepository
            ->allMaterials()
            ->pluck('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $patrimonial_material = $this->patrimonial_materialRepository->findPatrimonialMaterialById($id);

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial_material->patrimonial_id);
        
        return view('patrimonials.materials.edit', compact('patrimonial', 'patrimonial_intervention_types', 'patrimonial_material', 'materials', 'providers'));
    }

    public function update_material($id, Requests\PatrimonialMaterialRequest $request)
    {
        $data = $request->all();

        $data['patrimonial_id'] = $id;

        $data['purchase_process'] = strtoupper($data['purchase_process']);

        $data['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $data['intervention_date']);
        $data['intervention_date'] = $data['intervention_date']->format('Y-m-d');

        $data['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $data['invoice_date']);
        $data['invoice_date'] = $data['invoice_date']->format('Y-m-d');

        $data['invoice'] = strtoupper($data['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_value'] = $numberFormatter_ptBR2en->parse($data['purchase_value']);
        #dd($data['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_qty'] = $numberFormatter_ptBR2en->parse($data['purchase_qty']);

        $patrimonial_material = $this->patrimonial_materialRepository->findPatrimonialMaterialById($id);
        $patrimonial_material->update($data);

        return redirect()->route('patrimonials.show', ['id' => $patrimonial_material->patrimonial_id]);
    }

    public function create_service($id, ServiceRepository $serviceRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->pluck('description', 'id')
            ->all();
            
        $services = array(''=>'') + $serviceRepository
            ->allServices()
            ->pluck('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($id);
        
        return view('patrimonials.services.create', compact('patrimonial', 'patrimonial_intervention_types', 'services', 'providers'));
    }

    public function store_service($id, Requests\PatrimonialServiceRequest $request)
    {
        $data = $request->all();

        $data['patrimonial_id'] = $id;

        $data['purchase_process'] = strtoupper($data['purchase_process']);

        $data['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $data['intervention_date']);
        $data['intervention_date'] = $data['intervention_date']->format('Y-m-d');

        $data['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $data['invoice_date']);
        $data['invoice_date'] = $data['invoice_date']->format('Y-m-d');

        $data['invoice'] = strtoupper($data['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_value'] = $numberFormatter_ptBR2en->parse($data['purchase_value']);
        #dd($data['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_qty'] = $numberFormatter_ptBR2en->parse($data['purchase_qty']);


        $patrimonial_service = $this->patrimonial_serviceRepository->storePatrimonialService($data);
        
        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function edit_service($id, ServiceRepository $serviceRepository, ProviderRepository $providerRepository, PatrimonialInterventionTypeRepository $patrimonial_intervention_typeRepository)
    {
        $patrimonial_intervention_types = array(''=>'') + $patrimonial_intervention_typeRepository
            ->allPatrimonialInterventionTypes()
            ->pluck('description', 'id')
            ->all();
            
        $services = array(''=>'') + $serviceRepository
            ->allServices()
            ->pluck('code_description_unit', 'id')
            ->all();

        $providers = array(''=>'') + $providerRepository
            ->allProviders2()
            ->pluck('cnpj_mask_description', 'id')
            ->all();

        $patrimonial_service = $this->patrimonial_serviceRepository->findPatrimonialServiceById($id);

        $patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial_service->patrimonial_id);
        
        return view('patrimonials.services.edit', compact('patrimonial', 'patrimonial_intervention_types', 'patrimonial_service', 'services', 'providers'));
    }

    public function update_service($id, Requests\PatrimonialServiceRequest $request)
    {
        $data = $request->all();

        $data['purchase_process'] = strtoupper($data['purchase_process']);

        $data['intervention_date'] = \DateTime::createFromFormat('d/m/Y', $data['intervention_date']);
        $data['intervention_date'] = $data['intervention_date']->format('Y-m-d');

        $data['invoice_date'] = \DateTime::createFromFormat('d/m/Y', $data['invoice_date']);
        $data['invoice_date'] = $data['invoice_date']->format('Y-m-d');

        $data['invoice'] = strtoupper($data['invoice']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_value'] = $numberFormatter_ptBR2en->parse($data['purchase_value']);
        #dd($data['purchase_value']);

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $data['purchase_qty'] = $numberFormatter_ptBR2en->parse($data['purchase_qty']);

        $patrimonial_service = $this->patrimonial_serviceRepository->findPatrimonialServiceById($id);
        $patrimonial_service->update($data);

        return redirect()->route('patrimonials.show', ['id' => $patrimonial_service->patrimonial_id]);
    }

    public function file_upload($id, Requests\PatrimonialFileRequest $request)
    {
        $this->authorize('patrimonial_files-upload');

        $data = $request->all();

        $file = $data['filename'];

        $data['extension'] = $file->getClientOriginalExtension();
        #dd($data['extension']);

        $data['patrimonial_id'] = $id;

        $data['description'] = strtoupper($data['description']);

        $this->patrimonial_fileRepository->storePatrimonialFile($data);

        $patrimonial_file = $this->patrimonial_fileRepository->allFilesByPatrimonialId($id)->last();

        Storage::disk('local_public_patrimonial_files')->put($id.'_'.$patrimonial_file->id.'.'.$data['extension'], File::get($file));

        return redirect()->route('patrimonials.show', ['id' => $id]);
        
    }

    public function file_download($id, $file_id)
    {        
        $this->authorize('patrimonial_files-download');

        $file_check = $this->patrimonial_fileRepository->checkFileByPatrimonialId($id, $file_id);

        if ($file_check)
        {
            #$headers = array('Content-Type: application/pdf',);

            #$file_path = Storage::disk('local_public_patrimonial_files')->get($id.'_'.$file_id.'.'.$file_check->extension);

            $file_path = public_path('uploads/patrimonials/'.$id.'_'.$file_id.'.'.$file_check->extension);

            return response()->download($file_path);
        }
    }

    public function file_destroy($id, $file_id)
    {        
        $this->authorize('patrimonial_files-destroy');

        $patrimonial_file = $this->patrimonial_fileRepository->patrimonialFileById($file_id);

        if(file_exists(public_path().'/uploads/patrimonials/'.$id.'_'.$file_id.'.'.$patrimonial_file->extension))
            {       
                Storage::disk('local_public_patrimonial_files')->delete($id.'_'.$file_id.'.'.$patrimonial_file->extension);
            }
            
        $patrimonial_file->delete($file_id);

        return redirect()->route('patrimonials.show', ['id' => $id]);
    }

    public function rpt_purchases_search(ManagementUnitRepository $management_unitRepository)
    {
        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        return view('reports.patrimonials.purchases.search', compact('management_units'));
    }

    public function rpt_purchases_search_results(Requests\PatrimonialPurchaseSearchRequest $request)
    {
        $data = $request->all();

        $srch_management_unit_id            = $data['srch_management_unit_id'];
        
        $srch_purchase_date_start_ptBR      = $data['srch_purchase_date_start'];

        $data['srch_purchase_date_start']   = \DateTime::createFromFormat('d/m/Y', $data['srch_purchase_date_start']);
        $data['srch_purchase_date_start']   = $data['srch_purchase_date_start']->format('Y-m-d');
        $srch_purchase_date_start           = $data['srch_purchase_date_start'];

        $srch_purchase_date_end_ptBR        = $data['srch_purchase_date_end'];

        $data['srch_purchase_date_end']     = \DateTime::createFromFormat('d/m/Y', $data['srch_purchase_date_end']);
        $data['srch_purchase_date_end']     = $data['srch_purchase_date_end']->format('Y-m-d');
        $srch_purchase_date_end             = $data['srch_purchase_date_end'];

        #dd($srch_purchase_date_end);

        $output = storage_path() . '/reports/patrimonials/allPurchasesByManagementUnitPeriod_'.date("Ymd_His");  
        $data = public_path() . '/reports/patrimonials/allPurchasesByManagementUnitPeriod.jrxml'; 

        $conditions = array("jsp_management_unit_id" => $srch_management_unit_id, "jsp_purchase_date_start" => $srch_purchase_date_start, "jsp_purchase_date_start_ptBR" => $srch_purchase_date_start_ptBR, "jsp_purchase_date_end" => $srch_purchase_date_end, "jsp_purchase_date_end_ptBR" => $srch_purchase_date_end_ptBR);
               
        $ext = "pdf";
       
        $database = \Config::get('database.connections.mysql');

        $report = new JasperPHP;
        $report->process
        (
            $data, 
            $output, 
            array('pdf'),
            $conditions,
            $database  
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=allPurchasesByManagementUnitPeriod_'.date("Ymd_His").'.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext);
    }

    public function rpt_employee()
    {
        $employees = array(''=>'') + $this->employeeRepository
            ->allEmployees()
            ->pluck('name', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $this->patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->pluck('description', 'id')
            ->all();

        return view('patrimonials.reports.employee.search', compact('employees', 'patrimonial_statuses'));
    }

    public function Xreport_employee_search_results()
    {

    }

    public function rpt_company_sector()
    {
        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('code_description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $this->patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->pluck('description', 'id')
            ->all();

        return view('patrimonials.reports.company_sector.search', compact('management_units', 'company_sectors', 'company_sub_sectors', 'patrimonial_statuses'));
    }

    public function rpt_company_sector_search_results(Requests\PatrimonialReportCompanySectorSearchRequest $request)
    {
        $data = $request->all();

        $srch_management_unit_id    = 1;
        $srch_company_sector_id     = 4;
        $srch_company_sub_sector_id = 1;
        $srch_patrimonial_status_id = 1;
        
        #$srch_management_unit_id    = $data['srch_management_unit_id'];
        #$srch_company_sector_id     = $data['srch_company_sector_id'];
        #$srch_company_sub_sector_id = $data['srch_company_sub_sector_id'];
        #$srch_patrimonial_status_id = $data['srch_patrimonial_status_id'];
        
        $output = storage_path() . '/reports/patrimonials/allPatrimonialsByCompanySector_'.date("Ymd_His");  
        $data = public_path() . '/reports/patrimonials/allPatrimonialsByCompanySector.jrxml'; 

        $conditions = array("jsp_management_unit_id" => $srch_management_unit_id, "jsp_company_sector_id" => $srch_company_sector_id, "jsp_company_sub_sector_id" => $srch_company_sub_sector_id, "jsp_patrimonial_status_id" => $srch_patrimonial_status_id);
               
        $ext = "pdf";
       
        $database = \Config::get('database.connections.mysql');

        $report = new JasperPHP;
        $report->process
        (
            $data, 
            $output, 
            array('pdf'),
            $conditions,
            $database  
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=allPatrimonialsByCompanySector_'.date("Ymd_His").'.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext);
    }

}
