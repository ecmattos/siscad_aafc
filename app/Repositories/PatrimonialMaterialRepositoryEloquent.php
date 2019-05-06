<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialMaterial;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialMaterialRepositoryEloquent extends BaseRepository implements PatrimonialMaterialRepository
{
    public function model()
    {
        return PatrimonialMaterial::class;
    }
	
	private $patrimonial_material;

	public function __construct(PatrimonialMaterial $patrimonial_material)
	{
		$this->patrimonial_material = $patrimonial_material;
	}

	public function allPatrimonialMaterials()
	{
		return $this->patrimonial_material
			->orderBy('description', 'asc')
			->get();
	}

	public function allPatrimonialMaterialsByProviderId($id)
	{
		return $this->patrimonial_material
			->whereProviderId($id)
			->get();
	}

	public function findPatrimonialMaterialById($id)
    {
        return $this->patrimonial_material->find($id);
    }

    public function allPatrimonialMaterialsByPatrimonialId($id)
    {
        return $this->patrimonial_material
			->wherePatrimonialId($id)
			->orderBy('intervention_date', 'ASC')
			->get();
    }

    public function allPatrimonialMaterialsByMaterialId($id)
    {
        return $this->patrimonial_material
			->whereMaterialId($id)
			->get();
    }

    public function totalMaterialsByPatrimonialId($id)
    {
        return $this->patrimonial_material
			->wherePatrimonialId($id)
			->sum('purchase_value');
    }

    public function totalMaterialsByPatrimonialIdInterventionTypeIdBefore($id, $patrimonial_intervention_type_id, $depreciation_date_start)
    {
        return $this->patrimonial_material
			->wherePatrimonialId($id)
			->wherePatrimonialInterventionTypeId($patrimonial_intervention_type_id)
			->where('intervention_date','<=', $depreciation_date_start)
			->sum('purchase_value');
    }

    public function totalMaterialsByPatrimonialIdInterventionTypeIdAfter($id, $patrimonial_intervention_type_id, $depreciation_date_start)
    {
        return $this->patrimonial_material
			->wherePatrimonialId($id)
			->wherePatrimonialInterventionTypeId($patrimonial_intervention_type_id)
			->where('intervention_date','>', $depreciation_date_start)
			->sum('purchase_value');
    }

    public function storePatrimonialMaterial($input)
    {
        $patrimonial_material = $this->patrimonial_material->fill($input);
        $patrimonial_material->save();
    }
}