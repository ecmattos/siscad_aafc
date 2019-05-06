<?php

namespace SisCad\Repositories;

use SisCad\Entities\MaterialUnit;

use Prettus\Repository\Eloquent\BaseRepository;

class MaterialUnitRepositoryEloquent extends BaseRepository implements MaterialUnitRepository
{
	public function model()
	{
		return MaterialUnit::class;
	}
	
	private $material_unit;

	public function __construct(MaterialUnit $material_unit)
	{
		$this->material_unit = $material_unit;
	}

	public function allMaterialUnits()
	{
		return $this->material_unit
			->orderBy('description', 'asc')
			->get();
	}

	public function findMaterialUnitById($id)
    {
        return $this->material_unit
        	->withTrashed()
        	->find($id);
    }

    public function storeMaterialUnit($input)
    {
        $material_unit = $this->material_unit->fill($input);
        $material_unit->save();
    }
}