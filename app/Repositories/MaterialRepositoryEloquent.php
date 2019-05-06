<?php

namespace SisCad\Repositories;

use SisCad\Entities\Material;

use Prettus\Repository\Eloquent\BaseRepository;

class MaterialRepositoryEloquent extends BaseRepository implements MaterialRepository
{
    public function model()
    {
        return Material::class;
    }
	
	private $material;

	public function __construct(Material $material)
	{
		$this->material = $material;
	}

	public function allMaterials()
	{
		return $this->material
			->orderBy('description', 'asc')
			->get();
	}

	public function allMaterialsByMaterialUnitId($id)
	{
		return $this->material
			->whereMaterialUnitId($id)
			->get();
	}

	public function findMaterialById($id)
    {
        return $this->material
        	->withTrashed()
        	->find($id);
    }

    public function storeMaterial($input)
    {
        $material = $this->material->fill($input);
        $material->save();
    }
}