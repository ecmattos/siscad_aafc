<?php

namespace SisCad\Services;

use SisCad\Repositories\EmployeeMovementRepository;

class CompanyResponsibilityService
{
	protected $employee_movementRepository;

	public function __construct(
		EmployeeMovementRepository $employee_movementRepository)
	{
		$this->employee_movementRepository = $employee_movementRepository;
	}

	public function destroy($id)
	{
		if($this->employee_movementRepository->allEmployeeMovementsByCompanyPositionId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

}