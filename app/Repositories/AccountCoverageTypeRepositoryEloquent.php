<?php

namespace SisCad\Repositories;

use SisCad\Entities\AccountCoverageType;

use Prettus\Repository\Eloquent\BaseRepository;

class AccountCoverageTypeRepositoryEloquent extends BaseRepository implements AccountCoverageTypeRepository
{
	public function model()
	{
		return AccountCoverageType::class;
	}

	private $account_coverage_type;

	public function __construct(AccountCoverageType $account_coverage_type)
	{
		$this->account_coverage_type = $account_coverage_type;
	}

	public function allAccountCoverageTypes()
	{
		return $this->account_coverage_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findAccountCoverageTypeById($id)
    {
        return $this->account_coverage_type->find($id);
    }

    public function storeAccountCoverageType($input)
    {
        $account_coverage_type = $this->account_coverage_type->fill($input);
        $account_coverage_type->save();
    }
}