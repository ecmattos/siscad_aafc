<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\AccountingAccountRepository;
use SisCad\Repositories\AccountTypeRepository;
use SisCad\Repositories\AccountBalanceTypeRepository;
use SisCad\Repositories\AccountCoverageTypeRepository;


class AccountingAccountsController extends Controller
{
    private $accounting_accountRepository;
    private $account_typeRepository;
    private $account_balance_typeRepository;
    private $account_coverage_typeRepository;

    public function __construct(AccountingAccountRepository $accounting_accountRepository, AccountTypeRepository $account_typeRepository, AccountBalanceTypeRepository $account_balance_typeRepository, AccountCoverageTypeRepository $account_coverage_typeRepository)
    {
        $this->accounting_accountRepository = $accounting_accountRepository;
        $this->account_typeRepository = $account_typeRepository;
        $this->account_balance_typeRepository = $account_balance_typeRepository;
        $this->account_coverage_typeRepository = $account_coverage_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('accounting_accounts-index');

        $accounting_accounts = $this->accounting_accountRepository->allAccountingAccountsByCode();
        #dd($accounting_accounts);
        return view('accounting_accounts.index', compact('accounting_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('accounting_accounts-create');

        $accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccounts()
            ->pluck('code_description', 'id')
            ->all();

        $account_types = array(''=>'') + $this->account_typeRepository
            ->allAccountTypes()
            ->pluck('description', 'id')
            ->all();

        $account_balance_types = array(''=>'') + $this->account_balance_typeRepository
            ->allAccountBalanceTypes()
            ->pluck('description', 'id')
            ->all();

        $account_coverage_types = array(''=>'') + $this->account_coverage_typeRepository
            ->allAccountCoverageTypes()
            ->pluck('description', 'id')
            ->all();

        return view('accounting_accounts.create', compact('accounting_accounts', 'account_types', 'account_balance_types', 'account_coverage_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AccountingAccountRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['code_short'] = strtoupper($input['code_short']);
        $input['description'] = strtoupper($input['description']);
        
        $accounting_account = $this->accounting_accountRepository->storeAccountingAccount($input);

        return redirect('accounting_accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('accounting_accounts-show');

        $accounting_account = $this->accounting_accountRepository->findAccountingAccountById($id);
        $logs = $accounting_account->revisionHistory;

        return view('accounting_accounts.show', compact('accounting_account', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('accounting_accounts-edit');

        $accounting_accounts = array(''=>'') + $this->accounting_accountRepository
            ->allAccountingAccountsByCoverageTypeIdExceptionId(1, $id)
            ->pluck('code_description', 'id')
            ->all();

        $account_types = array(''=>'') + $this->account_typeRepository
            ->allAccountTypes()
            ->pluck('description', 'id')
            ->all();

        $account_balance_types = array(''=>'') + $this->account_balance_typeRepository
            ->allAccountBalanceTypes()
            ->pluck('description', 'id')
            ->all();

        $account_coverage_types = array(''=>'') + $this->account_coverage_typeRepository
            ->allAccountCoverageTypes()
            ->pluck('description', 'id')
            ->all();
    
        $accounting_account = $this->accounting_accountRepository->findAccountingAccountById($id);
        
        return view('accounting_accounts.edit', compact('accounting_account', 'accounting_accounts', 'account_types', 'account_balance_types', 'account_coverage_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\AccountingAccountRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['code_short'] = strtoupper($input['code_short']);
        $input['description'] = strtoupper($input['description']);

        $accounting_account = $this->accounting_accountRepository->findAccountingAccountById($id);
        $accounting_account->update($input);

        return redirect('accounting_accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('accounting_accounts-destroy');

        if($this->memberRepository->findMembersByAccountingAccountId($id)->count()>0)
        {
           return redirect('accounting_accounts')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->accounting_accountRepository->findAccountingAccountById($id)->delete();

        return redirect('accounting_accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->accounting_accountRepository->withTrashed()->findAccountingAccountById($id)->restore();

        return redirect('accounting_accounts');
    }
}
