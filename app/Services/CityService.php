<?php

namespace SisCad\Services;

use SisCad\Repositories\MemberRepository;
use SisCad\Repositories\PartnerRepository;
use SisCad\Repositories\ProviderRepository;
use SisCad\Repositories\ManagementUnitRepository;
use SisCad\Repositories\EmployeeRepository;
use SisCad\Repositories\MeetingRepository;

class CityService
{
	protected $memberRepository;
	protected $partnerRepository;
	protected $providerRepository;
	protected $management_unitRepository;
	protected $employeeRepository;
	protected $meetindgRepository;

	public function __construct(
		MemberRepository $memberRepository,
		PartnerRepository $partnerRepository,
		ProviderRepository $providerRepository,
		ManagementUnitRepository $management_unitRepository,
		EmployeeRepository $employeeRepository,
		MeetingRepository $meetingRepository		)
	{
		$this->memberRepository = $memberRepository;
		$this->partnerRepository = $partnerRepository;
		$this->providerRepository = $providerRepository;
		$this->management_unitRepository = $management_unitRepository;
		$this->employeeRepository = $employeeRepository;
		$this->meetingRepository = $meetingRepository;
	}

	public function destroyCityMemberCheck($id)
	{
		if($this->memberRepository->allMembersByCityId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

	public function destroyCityPartnerCheck($id)
	{
		if($this->partnerRepository->allPartnersByCityId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

	public function destroyCityProviderCheck($id)
	{
		if($this->providerRepository->allProvidersByCityId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

	public function destroyCityManagementUnitCheck($id)
	{
		if($this->management_unitRepository->allManagementUnitsByCityId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

	public function destroyCityEmployeesCheck($id)
	{
		if($this->employeeRepository->allEmployeesByCityId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

	public function destroyCityMeetingCheck($id)
	{
		if($this->meetingRepository->allMeetingsByCityId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

}