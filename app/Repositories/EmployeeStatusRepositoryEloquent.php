<?php

namespace SisCad\Repositories;

use SisCad\Entities\EmployeeStatus;
use Prettus\Repository\Eloquent\BaseRepository;

class EmployeeStatusRepositoryEloquent extends BaseRepository implements EmployeeStatusRepository
{
	public function model()
	{
		return EmployeeStatus::class;
	}

	private $employee_status;

	public function __construct(EmployeeStatus $employee_status)
	{
		$this->employee_status = $employee_status;
	}

	public function allEmployeeStatuses()
	{
		return $this->employee_status
			->orderBy('description', 'asc')
			->get();
	}

	public function findEmployeeStatusById($id)
    {
        return $this->employee_status->find($id);
    }

    public function storeEmployeeStatus($input)
    {
        $employee_status = $this->employee_status->fill($input);
        $employee_status->save();
    }
}