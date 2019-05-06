<?php

namespace SisCad\Services;

use SisCad\Repositories\EmployeeMovementRepository;
use SisCad\Repositories\PatrimonialMovementRepository;

class CompanySectorService
{
	protected $employee_movementRepository;
	protected $patrimonial_movementRepository;

	public function __construct(
		EmployeeMovementRepository $employee_movementRepository,
		PatrimonialMovementRepository $patrimonial_movementRepository)
	{
		$this->employee_movementRepository = $employee_movementRepository;
		$this->patrimonial_movementRepository = $patrimonial_movementRepository;
	}

	public function destroyEmployeeMovement($id)
	{
		if($this->employee_movementRepository->allEmployeeMovementsByCompanySectorId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

	public function destroyPatrimonialMovement($id)
	{
		if($this->patrimonial_movementRepository->allPatrimonialMovementsByCompanySectorId($id)->count()>0)
	    {
	      	return true;
	    }
	          
    	return false;
	}
}