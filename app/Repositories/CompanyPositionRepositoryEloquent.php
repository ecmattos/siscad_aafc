<?php

namespace SisCad\Repositories;

use SisCad\Entities\CompanyPosition;
use Prettus\Repository\Eloquent\BaseRepository;

class CompanyPositionRepositoryEloquent extends BaseRepository implements CompanyPositionRepository
{
	public function model()
	{
		return CompanyPosition::class;
	}

	private $company_position;

	public function __construct(CompanyPosition $company_position)
	{
		$this->company_position = $company_position;
	}

	public function allCompanyPositions()
	{
		return $this->company_position
			->orderBy('description', 'asc')
			->get();
	}

	public function findCompanyPositionById($id)
    {
        return $this->company_position
        	->withTrashed()
        	->find($id);
    }

    public function storeCompanyPosition($input)
    {
        $company_position = $this->company_position->fill($input);
        $company_position->save();
    }
}