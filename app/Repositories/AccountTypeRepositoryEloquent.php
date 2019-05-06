<?php

namespace SisCad\Repositories;

use SisCad\Entities\AccountType;

use Prettus\Repository\Eloquent\BaseRepository;

class AccountTypeRepositoryEloquent extends BaseRepository implements AccountTypeRepository
{
	public function model()
	{
		return AccountType::class;
	}

	private $account_type;

	public function __construct(AccountType $account_type)
	{
		$this->account_type = $account_type;
	}

	public function allAccountTypes()
	{
		return $this->account_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findAccountTypeById($id)
    {
        return $this->account_type->find($id);
    }

    public function storeAccountType($input)
    {
        $account_type = $this->account_type->fill($input);
        $account_type->save();
    }
}