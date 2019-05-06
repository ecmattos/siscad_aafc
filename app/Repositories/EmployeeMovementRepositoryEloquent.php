<?php

namespace SisCad\Repositories;

use SisCad\Entities\EmployeeMovement;

use Prettus\Repository\Eloquent\BaseRepository;

class EmployeeMovementRepositoryEloquent extends BaseRepository implements EmployeeMovementRepository
{
	public function model()
	{
		return EmployeeMovement::class;
	}
	
	private $employee_movement;

	public function __construct(EmployeeMovement $employee_movement)
	{
		$this->employee_movement = $employee_movement;
	}

	public function allEmployeeMovements()
	{
		return $this->employee_movement
			->orderBy('date_start', 'asc')
			->get();
	}

	public function findEmployeeMovementById($id)
    {
        return $this->employee_movement->find($id);
    }

    public function allEmployeeMovementsByEmployeeId($id)
    {
        return $this->employee_movement
			->whereEmployeeId($id)
			->orderBy('date_start', 'ASC')
			->get();
    }

    public function allEmployeeMovementsByEmployeeIdExceptedId($id, $employee_id)
    {
        return $this->employee_movement
			->where('id', '<>', $id)
			->whereEmployeeId($employee_id)
			->orderBy('date_start', 'ASC')
			->get();
    }

    public function allEmployeeMovementsByCompanyPositionId($id)
    {
    	return $this->employee_movement
			->whereCompanyPositionId($id)
			->get();		
    }

    public function allEmployeeMovementsByCompanyResponsibilityId($id)
    {
    	return $this->employee_movement
			->whereCompanyResponsibilityId($id)
			->get();	
    }

    public function allEmployeeMovementsByCompanySectorId($id)
    {
    	return $this->employee_movement
			->whereCompanySectorId($id)
			->get();		
    }

    public function allEmployeeMovementsByCompanySubSectorId($id)
    {
    	return $this->employee_movement
			->whereCompanySubSectorId($id)
			->get();		
    }

    public function lastEmployeeMovementDateByEmployeeId($id)
    {
        return $this->employee_movement
			->whereEmployeeId($id)
			->orderBy('date_start', 'DESC')
			->take(1)
			->get();
    }

    public function storeEmployeeMovement($data)
    {
        $employee_movement = $this->employee_movement->fill($data);
        $employee_movement->save();
    }
}