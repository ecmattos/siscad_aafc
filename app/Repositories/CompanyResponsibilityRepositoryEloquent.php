<?php

namespace SisCad\Repositories;

use SisCad\Entities\CompanyResponsibility;
use Prettus\Repository\Eloquent\BaseRepository;

class CompanyResponsibilityRepositoryEloquent extends BaseRepository implements CompanyResponsibilityRepository
{
	public function model()
	{
		return CompanyResponsibility::class;
	}

	private $company_responsibility;

	public function __construct(CompanyResponsibility $company_responsibility)
	{
		$this->company_responsibility = $company_responsibility;
	}

	public function allCompanyResponsibilities()
	{
		return $this->company_responsibility
			->orderBy('description', 'asc')
			->get();
	}

	public function findCompanyResponsibilityById($id)
    {
        return $this->company_responsibility
        	->withTrashed()
        	->find($id);
    }

    public function storeCompanyResponsibility($input)
    {
        $company_responsibility = $this->company_responsibility->fill($input);
        $company_responsibility->save();
    }
}