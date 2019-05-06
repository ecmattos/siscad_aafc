<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialMovement;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialMovementRepositoryEloquent extends BaseRepository implements PatrimonialMovementRepository
{
	public function model()
	{
		return PatrimonialMovement::class;
	}
	
	private $patrimonial_movement;

	public function __construct(PatrimonialMovement $patrimonial_movement)
	{
		$this->patrimonial_movement = $patrimonial_movement;
	}

	public function allPatrimonialMovements()
	{
		return $this->patrimonial_movement
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialMovementById($id)
    {
        return $this->patrimonial_movement->find($id);
    }

    public function allPatrimonialMovementsByPatrimonialId($id)
    {
        return $this->patrimonial_movement
			->wherePatrimonialId($id)
			->orderBy('date_start', 'DESC')
			->get();
    }

    public function allPatrimonialMovementsByManagementUnitId($id)
    {
        return $this->patrimonial_movement
			->whereManagementUnitId($id)
			->orderBy('date_start', 'DESC')
			->get();
    }

    public function allPatrimonialMovementsByCompanyPositionId($id)
    {
    	return $this->patrimonial_movement
			->whereCompanyPositiontId($id)
			->get();
    }

    public function allPatrimonialMovementsByCompanySectorId($id)
    {
    	return $this->patrimonial_movement
			->whereCompanySectorId($id)
			->get();
    }

    public function allPatrimonialMovementsByCompanySubSectorId($id)
    {
    	return $this->patrimonial_movement
			->whereCompanySubSectorId($id)
			->get();
    }

	public function lastPatrimonialMovementDateByPatrimonialId($id)
    {
        return $this->patrimonial_movement
			->wherePatrimonialId($id)
			->orderBy('date_start', 'DESC')
			->first();
    }

    public function storePatrimonialMovement($data)
    {
        $patrimonial_movement = $this->patrimonial_movement->create($data);
        #$patrimonial_movement->save();
    }

}