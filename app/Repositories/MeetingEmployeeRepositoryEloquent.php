<?php

namespace SisCad\Repositories;

use SisCad\Entities\MeetingEmployee;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class MeetingEmployeeRepositoryEloquent.
 *
 * @package namespace SisCad\Repositories;
 */
class MeetingEmployeeRepositoryEloquent extends BaseRepository implements MeetingEmployeeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MeetingEmployee::class;
    }

    private $meeting_employee;

	public function __construct(MeetingEmployee $meeting_employee)
	{
		$this->meeting_employee = $meeting_employee;
    }
    
    public function allMeetingEmployees()
	{
		return $this->meeting_employee
			->all();
    }
    
    public function findMeetingEmployeeById($id)
    {
        return $this->meeting_employee
        	->find($id);
    }
    
    public function allEmployeesByMeetingId($id)
    {
        return $this->meeting_employee
            ->whereMeetingId($id)
            ->get();
    }

    public function countEmployeesExpectedQtyByMeetingId($id)
    {
        return $this->meeting_employee
            ->where('expected_qty', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countEmployeesExpectedQtyCompanionByMeetingId($id)
    {
        return $this->meeting_employee
            ->where('expected_qty_companion', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countEmployeesExpectedQtyCompanionExtraByMeetingId($id)
    {
        return $this->meeting_employee
            ->where('expected_qty_companion_extra', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countEmployeesConfirmedQtyByMeetingId($id)
    {
        return $this->meeting_employee
            ->where('confirmed_qty', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countEmployeesConfirmedQtyCompanionByMeetingId($id)
    {
        return $this->meeting_employee
            ->where('confirmed_qty_companion', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countEmployeesConfirmedQtyCompanionExtraByMeetingId($id)
    {
        return $this->meeting_employee
            ->where('confirmed_qty_companion_extra', 1)
            ->whereMeetingId($id)
            ->count();
    }    

    public function storeMeetingEmployee($data)
    {
        $meeting_employee = $this->meeting_employee->fill($data);
        $meeting_employee->save();
    }

    public function lastMeetingEmployee()
    {
        return $this->meeting_employee
            ->orderBy('id', 'desc')
        	->first();
    }
}
