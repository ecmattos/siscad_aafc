<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\BalanceSheetPreviousRepository;
use SisCad\Repositories\AccountingAccountRepository;
use SisCad\Repositories\ManagementUnitRepository;

use Session;

class BalanceSheetPreviousesController extends Controller
{
    private $balance_sheet_previousRepository;
    private $accounting_accountRepository;
    private $management_unitRepository;

    public function __construct(BalanceSheetPreviousRepository $balance_sheet_previousRepository,AccountingAccountRepository $accounting_accountRepository, ManagementUnitRepository $management_unitRepository)
    {
        $this->balance_sheet_previousRepository = $balance_sheet_previousRepository;
        $this->accounting_accountRepository = $accounting_accountRepository;
        $this->management_unitRepository = $management_unitRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $balance_sheet_previouses = $this->balance_sheet_previousRepository->allBalanceSheetPreviousesByManagementUnitId($id);
        #dd($balance_sheet_previouses);
        return view('balance_sheet_previouses', compact('balance_sheet_previouses'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search(AccountingAccountRepository $accounting_accountRepository, ManagementUnitRepository $management_unitRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        return view('balance_sheet_previouses.search', compact('accounting_accounts', 'management_units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search_results(Requests\BalanceSheetPreviousSearchRequest $request)
    {
        $input = $request->all();

        $request->flash();

        session(['srch_management_unit_id' => $input['srch_management_unit_id']]);

        $balance_sheet_previouses = $this->balance_sheet_previousRepository->searchBalanceSheetPrevious();

        ##dd($balance_sheet_previouses);

        return view('balance_sheet_previouses.search_results', compact('balance_sheet_previouses'));
    }

    public function search_results_back()
    { 
        $balance_sheet_previouses = $this->balance_sheet_previousRepository->searchBalanceSheetPrevious();

        return view('balance_sheet_previouses.search_results', compact('balance_sheet_previouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(AccountingAccountRepository $accounting_accountRepository, ManagementUnitRepository $management_unitRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        return view('balance_sheet_previouses.create', compact('accounting_accounts', 'management_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\BalanceSheetPreviousRequest $request)
    {
        $input = $request->all();

        $management_unit_id     = $input['management_unit_id'];
        $accounting_account_id  = $input['accounting_account_id'];

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['balance_previous'] = $numberFormatter_ptBR2en->parse($input['balance_previous']);

        $balance_sheet_previous = $this->balance_sheet_previousRepository->findBalanceSheetPreviousByManagementUnitIdAccountId($management_unit_id, $accounting_account_id);

        if($balance_sheet_previous->isEmpty())
        {
            $balance_sheet_previous = $this->balance_sheet_previousRepository->storeBalanceSheetPrevious($input);

            return redirect()->route('balance_sheet_previouses');
        }
    else
        {   
            return redirect('balance_sheet_previouses.create')->withInput()->withErrors(['error' => '<b>Operação CANCELADA</b> >> Já existe o lançamento informado !']);
        }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $balance_sheet_previous = $this->balance_sheet_previousRepository->findBalanceSheetPreviousById($id);
        $logs = $balance_sheet_previous->revisionHistory;

        return view('balance_sheet_previouses.show', compact('balance_sheet_previous', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, AccountingAccountRepository $accounting_accountRepository, ManagementUnitRepository $management_unitRepository)
    {
        $accounting_accounts = array(''=>'') + $accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeId(2)
            ->pluck('code_description', 'id')
            ->all();

        $management_units = array(''=>'') + $management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $balance_sheet_previous = $this->balance_sheet_previousRepository->findBalanceSheetPreviousById($id);
        
        return view('balance_sheet_previouses.edit', compact('balance_sheet_previous', 'accounting_accounts', 'management_units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\BalanceSheetPreviousRequest $request, $id)
    {
        $input = $request->all();

        $management_unit_id     = $input['management_unit_id'];
        $accounting_account_id  = $input['accounting_account_id'];

        $numberFormatter_ptBR2en = new \NumberFormatter('pt_BR', \NumberFormatter::DECIMAL);
        $input['balance_previous'] = $numberFormatter_ptBR2en->parse($input['balance_previous']);

        $balance_sheet_previous = $this->balance_sheet_previousRepository->findBalanceSheetPreviousByManagementUnitIdAccountIdBalancePrevious($management_unit_id, $accounting_account_id, $input['balance_previous']);

        if($balance_sheet_previous->isEmpty())
        {
            $balance_sheet_previous = $this->balance_sheet_previousRepository->findBalanceSheetPreviousById($id);
            $balance_sheet_previous->update($input);

            #return redirect()->route('balance_sheet_previouses.search_results_back');
        }
        
        return redirect()->route('balance_sheet_previouses.edit', ['id' => $id])->withInput()->withErrors(['error' => '<b>Operação CANCELADA</b> >> Já existe o lançamento informado !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->balance_sheet_previousRepository->findBalanceSheetPreviousById($id)->delete();

        return redirect('balance_sheet_previouses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->balance_sheet_previousRepository->withTrashed()->findBalanceSheetPreviousById($id)->restore();

        return redirect('balance_sheet_previouses');
    }
}
