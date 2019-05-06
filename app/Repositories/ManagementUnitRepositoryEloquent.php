<?php

namespace SisCad\Repositories;

use SisCad\Entities\ManagementUnit;
use SisCad\Entities\Patrimonial;

use Prettus\Repository\Eloquent\BaseRepository;

class ManagementUnitRepositoryEloquent extends BaseRepository implements ManagementUnitRepository
{
	public function model()
	{
		return ManagementUnit::class;
	}

	private $management_unit;
	private $patrimonial;

	public function __construct(ManagementUnit $management_unit, Patrimonial $patrimonial)
	{
		$this->management_unit = $management_unit;
		$this->patrimonial = $patrimonial;
	}

	public function allManagementUnits()
	{
		return $this->management_unit
			->orderBy('description', 'asc')
			->get();
	}

	public function allPatrimonialsByManagementUnitId($id)
    {
        return $this->patrimonial
        	->whereManagementUnitId($id)
        	->get();
    }

    public function findManagementUnitById($id)
    {
        return $this->management_unit->find($id);
    }

	public function allManagementUnitsByCityId($id)
    {
        return $this->management_unit
        	->whereCityId($id)
            ->get();
    }

        public function storeManagementUnit($input)
    {
        $management_unit = $this->management_unit->fill($input);
        $management_unit->save();
    }

    public function findManagementUnitTrashedById($id)
    {
        return $this->management_unit->withTrashed()->find($id);
    }
}