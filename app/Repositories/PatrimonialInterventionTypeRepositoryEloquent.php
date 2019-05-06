<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialInterventionType;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialInterventionTypeRepositoryEloquent extends BaseRepository implements PatrimonialInterventionTypeRepository
{
    public function model()
    {
        return PatrimonialInterventionType::class;
    }

    private $patrimonial_intervention_type_model;

	public function __construct(PatrimonialInterventionType $patrimonial_intervention_type_model)
	{
		$this->patrimonial_intervention_type_model = $patrimonial_intervention_type_model;
	}

	public function allPatrimonialInterventionTypes()
	{
		return $this->patrimonial_intervention_type_model
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialInterventionTypeById($id)
    {
        return $this->patrimonial_intervention_type_model->find($id);
    }

    public function storePatrimonialInterventionType($input)
    {
        $patrimonial_intervention_type_model = $this->patrimonial_intervention_type_model->fill($input);
        $patrimonial_intervention_type_model->save();
    }
}