<?php

namespace SisCad\Repositories;

use SisCad\Entities\EmployeeStatusReason;
use Prettus\Repository\Eloquent\BaseRepository;

class EmployeeStatusReasonRepositoryEloquent extends BaseRepository implements EmployeeStatusReasonRepository
{
	public function model()
	{
		return EmployeeStatusReason::class;
	}
	
	private $employee_status_reason;

	public function __construct(EmployeeStatusReason $employee_status_reason)
	{
		$this->employee_status_reason = $employee_status_reason;
	}

	public function allEmployeeStatusReasons()
	{
		return $this->employee_status_reason
			->orderBy('description', 'asc')
			->get();
	}

	public function findEmployeeStatusReasonById($id)
    {
        return $this->employee_status_reason->find($id);
    }

    public function storeEmployeeStatusReason($input)
    {
        $employee_status_reason = $this->employee_status_reason->fill($input);
        $employee_status_reason->save();
    }
}