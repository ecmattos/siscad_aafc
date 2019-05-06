<?php

namespace SisCad\Repositories;

use SisCad\Entities\CompanySector;

use Prettus\Repository\Eloquent\BaseRepository;

class CompanySectorRepositoryEloquent extends BaseRepository implements CompanySectorRepository
{
	public function model()
	{
		return CompanySector::class;
	}
		
	private $company_sector;

	public function __construct(CompanySector $company_sector)
	{
		$this->company_sector = $company_sector;
	}

	public function allCompanySectors()
	{
		return $this->company_sector
			->orderBy('description', 'asc')
			->get();
	}

	public function findCompanySectorById($id)
    {
        return $this->company_sector
        	->withTrashed()
        	->find($id);
    }

    public function storeCompanySector($input)
    {
        $company_sector = $this->company_sector->fill($input);
        $company_sector->save();
    }
}