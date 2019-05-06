<?php

namespace SisCad\Repositories;

use SisCad\Entities\Employee;
use Prettus\Repository\Eloquent\BaseRepository;

class EmployeeRepositoryEloquent extends BaseRepository implements EmployeeRepository
{
	public function model()
	{
		return Employee::class;
	}
	
	private $employee;

	public function __construct(Employee $employee)
	{
		$this->employee = $employee;
	}

	public function allEmployees()
	{
		return $this->employee
			->orderBy('name', 'asc')
			->get();
	}

	public function allEmployeesByStatus($employee_status_id)
	{
		return $this->employee
			->whereEmployeeStatusId($employee_status_id)
			->orderBy('name', 'asc')
			->get();
	}

	public function allEmployeesById()
	{
		return $this->employee
			->orderBy('id', 'asc')
			->get();
	}

	public function findEmployeeById($id)
    {
        return $this->employee->find($id);
    }

    public function findEmployeeIdByCode($employee_code)
    {
        return $this->employee
        	->whereCode($employee_code)
        	->get();
    }

    public function allEmployeesByStatusId($id)
    {
        return $this->employee
        	->whereEmployeeStatusId($id)
        	->get();
    }

    public function allEmployeesByCityId($id)
    {
        return $this->employee
        	->whereCityId($id)
        	->get();
    }

    public function storeEmployee($input)
    {
        $employee = $this->employee->fill($input);
        #dd($employee);
        $employee->save();
    }

    public function searchEmployees()
	{
		$srch_employee_code 				= session()->has('srch_employee_code') ? session()->get('srch_employee_code') : null;
		$srch_employee_cpf 				= session()->has('srch_employee_cpf') ? session()->get('srch_employee_cpf') : null;
		$srch_employee_name 				= session()->has('srch_employee_name') ? session()->get('srch_employee_name') : null;
		$srch_employee_plan_id 			= session()->has('srch_employee_plan_id') ? session()->get('srch_employee_plan_id') : null;

		$srch_employee_gender_id			= session()->has('srch_employee_gender_id') ? session()->get('srch_employee_gender_id') : null;
		$srch_employee_region_id			= session()->has('srch_employee_region_id') ? session()->get('srch_employee_region_id') : null;
		$srch_employee_city_id			= session()->has('srch_employee_city_id') ? session()->get('srch_employee_city_id') : null;
		$srch_employee_status_id 			= session()->has('srch_employee_status_id') ? session()->get('srch_employee_status_id') : null;
		$srch_employee_status_reason_id 	= session()->has('srch_employee_status_reason_id') ? session()->get('srch_employee_status_reason_id') : null;

		return $this->employee
			->select(
				'employees.*',
				'employee_statuses.code AS employee_status_code',
				'employee_statuses.description AS employee_status_description',
				
				'cities.description AS city_description',
				
				'states.code AS state_code',
				
				'regions.code AS region_code',
				'regions.description AS region_description')
			->join('cities','employees.city_id','=','cities.id')
			->join('states','cities.state_id','=','states.id')
			->join('regions','cities.region_id','=','regions.id')
			->join('employee_statuses','employees.employee_status_id','=','employee_statuses.id')
			
			->where(function($query) use ($srch_employee_code, $srch_employee_cpf, $srch_employee_name, $srch_employee_plan_id, $srch_employee_gender_id, $srch_employee_region_id, $srch_employee_city_id, $srch_employee_status_id, $srch_employee_status_reason_id) 
			{
				if($srch_employee_name)
				{
					$srch_employee_name_terms = explode(" ",$srch_employee_name);

					$srch_employee_name_terms_total = count($srch_employee_name_terms);

                    for($i=0 ; $i < $srch_employee_name_terms_total ; $i++ )
                    {
    					$query->where('name','LIKE','%'.$srch_employee_name_terms[$i].'%');
					}
				}

				if($srch_employee_code)
				{
					$query->where('employees.code', '=', $srch_employee_code);
				} 
				
				if($srch_employee_cpf)
				{
					$query->where('employees.cpf', '=', $srch_employee_cpf);
				}
				
				if($srch_employee_plan_id)
				{
					$query->wherePlanId($srch_employee_plan_id);
				}
				
				if($srch_employee_gender_id)
				{
					$query->whereGenderId($srch_employee_gender_id);
				}
				
				if($srch_employee_region_id)
				{					
					$query->where('cities.region_id','=',$srch_employee_region_id);
				}
				
				if($srch_employee_city_id)
				{
					$query->whereCityId($srch_employee_city_id);
				}
				
				if($srch_employee_status_id)
				{
					$query->whereEmployeeStatusId($srch_employee_status_id);
				}
				
				if($srch_employee_status_reason_id)
				{
					$query->whereEmployeeStatusReasonId($srch_employee_status_reason_id);
				}
			})
			->orderBy('name', 'asc')
			->get();
	}
}