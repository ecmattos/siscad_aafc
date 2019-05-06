<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialModel;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialModelRepositoryEloquent extends BaseRepository implements PatrimonialModelRepository
{
	public function model()
	{
		return PatrimonialModel::class;
	}
		
	private $patrimonial_model;

	public function __construct(PatrimonialModel $patrimonial_model)
	{
		$this->patrimonial_model = $patrimonial_model;
	}

	public function allPatrimonialModels()
	{
		return $this->patrimonial_model
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialModelById($id)
    {
        return $this->patrimonial_model
        	->withTrashed()
        	->find($id);
    }

    public function storePatrimonialModel($input)
    {
        $patrimonial_model = $this->patrimonial_model->fill($input);
        $patrimonial_model->save();
    }
}