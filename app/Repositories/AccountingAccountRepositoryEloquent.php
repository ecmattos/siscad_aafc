<?php

namespace SisCad\Repositories;

use SisCad\Entities\AccountingAccount;

use Prettus\Repository\Eloquent\BaseRepository;

class AccountingAccountRepositoryEloquent extends BaseRepository implements AccountingAccountRepository
{
	public function model()
	{
		return AccountingAccount::class;
	}

	private $accounting_account;

	public function __construct(AccountingAccount $accounting_account)
	{
		$this->accounting_account = $accounting_account;
	}

	public function allAccountingAccounts()
	{
		return $this->accounting_account
			->where('id','>',1)
			->orderBy('description', 'asc')
			->get();
	}

	public function allAccountingAccountsByCoverageTypeId($id)
	{
		return $this->accounting_account
			->where('id','>',1)
			->whereAccountCoverageTypeId($id)
			->orderBy('description', 'asc')
			->get();
	}

	public function allAccountingAccountsByCoverageTypeIdOrberByCodeDesc($id)
	{
		return $this->accounting_account
			->where('id','>',1)
			->whereAccountCoverageTypeId($id)
			->orderBy('code', 'desc')
			->get();
	}

	public function allAccountingAccountsByCoverageTypeIdExceptionId($account_coverage_type_id, $id)
	{
		return $this->accounting_account
			->whereAccountCoverageTypeId($account_coverage_type_id)
			->where('id','>',1)
			->where('id','<>',$id)
			->orderBy('description', 'asc')
			->get();
	}

	public function allAccountingAccountsByCode()
	{
		return $this->accounting_account
			->where('id','>',1)
			->orderBy('code', 'asc')
			->get();
	}

	public function findAccountingAccountById($id)
    {
        return $this->accounting_account->find($id);
    }

    public function storeAccountingAccount($input)
    {
        $accounting_account = $this->accounting_account->fill($input);
        $accounting_account->save();
    }

    public function findChildrenByParentId($id)
	{
		return $this->accounting_account
			->whereParentId($id)
			->get();
	}	
}