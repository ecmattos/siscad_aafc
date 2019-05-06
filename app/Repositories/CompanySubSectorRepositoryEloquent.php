<?php

namespace SisCad\Repositories;

use SisCad\Entities\CompanySubSector;

use Prettus\Repository\Eloquent\BaseRepository;

class CompanySubSectorRepositoryEloquent extends BaseRepository implements CompanySubSectorRepository
{
	public function model()
	{
		return CompanySubSector::class;
	}

	private $company_sub_sector;

	public function __construct(CompanySubSector $company_sub_sector)
	{
		$this->company_sub_sector = $company_sub_sector;
	}

	public function allCompanySubSectors()
	{
		return $this->company_sub_sector
			->orderBy('description', 'asc')
			->get();
	}

	public function findCompanySubSectorById($id)
    {
        return $this->company_sub_sector->find($id);
    }

    public function storeCompanySubSector($input)
    {
        $company_sub_sector = $this->company_sub_sector->fill($input);
        $company_sub_sector->save();
    }
}