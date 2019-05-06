<?php

namespace SisCad\Repositories;

use SisCad\Entities\AccountBalanceType;

use Prettus\Repository\Eloquent\BaseRepository;

class AccountBalanceTypeRepositoryEloquent extends BaseRepository implements AccountBalanceTypeRepository
{
	public function model()
	{
		return AccountBalanceType::class;
	}

	private $account_balance_type;

	public function __construct(AccountBalanceType $account_balance_type)
	{
		$this->account_balance_type = $account_balance_type;
	}

	public function allAccountBalanceTypes()
	{
		return $this->account_balance_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findAccountBalanceTypeById($id)
    {
        return $this->account_balance_type->find($id);
    }

    public function storeAccountBalanceType($input)
    {
        $account_balance_type = $this->account_balance_type->fill($input);
        $account_balance_type->save();
    }
}