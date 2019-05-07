<?php

namespace SisCad\Repositories;

use SisCad\Entities\Member;
use Prettus\Repository\Eloquent\BaseRepository;

class MemberRepositoryEloquent extends BaseRepository implements MemberRepository
{
	public function model()
	{
		return Member::class;
	}
	
	private $member;

	public function __construct(Member $member)
	{
		$this->member = $member;
	}

	public function allMembers()
	{
		return $this->member
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersByStatus($member_status_id)
	{
		return $this->member
			->whereMemberStatusId($member_status_id)
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersByPlan($plan_id)
	{
		return $this->member
			->wherePlanId($plan_id)
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersByPlanStatus($plan_id, $member_status_id)
	{
		return $this->member
			->wherePlanId($plan_id)
			->whereMemberStatusId($member_status_id)
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersGenderByPlan($plan_id, $gender_id)
	{
		return $this->member
			->wherePlanId($plan_id)
			->whereGenderId($gender_id)
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersGenderByPlanStatus($plan_id, $member_status_id, $gender_id)
	{
		return $this->member
			->wherePlanId($plan_id)
			->whereMemberStatusId($member_status_id)
			->whereGenderId($gender_id)
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersEmailByPlan($plan_id)
	{
		return $this->member
			->wherePlanId($plan_id)
			->where('email', '<>', ' ')
			->orderBy('name', 'asc')
			->get();
	}

	public function allMembersEmailByPlanStatus($plan_id, $member_status_id)
	{
		return $this->member
			->wherePlanId($plan_id)
			->whereMemberStatusId($member_status_id)
			->where('email', '<>', ' ')
			->orderBy('name', 'asc')
			->get();
	}

	public function lastMembersByPlanStatusLimit($plan_id, $member_status_id, $limit)
	{
		return $this->member
			->wherePlanId($plan_id)
			->whereMemberStatusId($member_status_id)
			->orderBy('date_aafc_ini', 'desc')
			->limit($limit)
			->get();
	}

	public function allMembersById()
	{
		return $this->member
			->orderBy('id', 'asc')
			->get();
	}

	public function findMemberById($id)
    {
		return $this->member
		->whereId($id)
		->first();
    }

    public function findMemberIdByCode($member_code)
    {
        return $this->member
        	->whereCode($member_code)
        	->get();
    }

    public function allMembersByStatusId($id)
    {
        return $this->member
        	->whereMemberStatusId($id);
    }

    public function allMembersByPlanId($id)
    {
        return $this->member
        	->wherePlanId($id);
    }

    public function allMembersByCityId($id)
    {
        return $this->member
        	->whereCityId($id);
    }

    public function storeMember($input)
    {
        $member = $this->member->fill($input);
        #dd($member);
        $member->save();
    }

    public function lastMembersBirthdaysByStatusMonthLimit($status, $month, $limit)
    {
    	return $this->member
        	->whereMemberStatusId($status)
        	->whereMonth('birthday', '=', $month)
        	->limit($limit)
        	->get();
	}
	
	public function allMembersByCityStatus($city_id, $member_status_id)
	{
		return $this->member
			->whereCityId($city_id)
			->whereMemberStatusId($member_status_id)
			->get();
	
	}

    public function searchMembers()
	{
		$srch_member_code 				= session()->has('srch_member_code') ? session()->get('srch_member_code') : null;
		$srch_member_cpf 				= session()->has('srch_member_cpf') ? session()->get('srch_member_cpf') : null;
		$srch_member_name 				= session()->has('srch_member_name') ? session()->get('srch_member_name') : null;
		$srch_member_plan_id 			= session()->has('srch_member_plan_id') ? session()->get('srch_member_plan_id') : null;

		$srch_member_gender_id			= session()->has('srch_member_gender_id') ? session()->get('srch_member_gender_id') : null;
		$srch_member_region_id			= session()->has('srch_member_region_id') ? session()->get('srch_member_region_id') : null;
		$srch_member_city_id			= session()->has('srch_member_city_id') ? session()->get('srch_member_city_id') : null;
		$srch_member_status_id 			= session()->has('srch_member_status_id') ? session()->get('srch_member_status_id') : null;
		$srch_member_status_reason_id 	= session()->has('srch_member_status_reason_id') ? session()->get('srch_member_status_reason_id') : null;
		$srch_member_birthday_month		= session()->has('srch_member_birthday_month') ? session()->get('srch_member_birthday_month') : null;

		return $this->member
			->select(
				'members.*',
				'member_statuses.code AS member_status_code',
				'member_statuses.description AS member_status_description',
				
				'cities.description AS city_description',
				
				'states.code AS state_code',
				
				'regions.code AS region_code',
				'regions.description AS region_description',
				
				'plans.code AS plan_code',
				'plans.description AS plan_description')
			->join('cities','members.city_id','=','cities.id')
			->join('states','cities.state_id','=','states.id')
			->join('regions','cities.region_id','=','regions.id')
			->join('plans','members.plan_id','=','plans.id')
			->join('member_statuses','members.member_status_id','=','member_statuses.id')
			
			->where(function($query) use ($srch_member_code, $srch_member_cpf, $srch_member_name, $srch_member_plan_id, $srch_member_gender_id, $srch_member_region_id, $srch_member_city_id, $srch_member_status_id, $srch_member_status_reason_id, $srch_member_birthday_month) 
			{
				if($srch_member_name)
				{
					$srch_member_name_terms = explode(" ",$srch_member_name);

					$srch_member_name_terms_total = count($srch_member_name_terms);

                    for($i=0 ; $i < $srch_member_name_terms_total ; $i++ )
                    {
    					$query->where('name','LIKE','%'.$srch_member_name_terms[$i].'%');
					}
				}

				if($srch_member_code)
				{
					$query->where('members.code', '=', $srch_member_code);
				} 
				
				if($srch_member_cpf)
				{
					$query->where('members.cpf', '=', $srch_member_cpf);
				}
				
				if($srch_member_plan_id)
				{
					$query->wherePlanId($srch_member_plan_id);
				}
				
				if($srch_member_gender_id)
				{
					$query->whereGenderId($srch_member_gender_id);
				}
				
				if($srch_member_region_id)
				{					
					$query->where('cities.region_id','=',$srch_member_region_id);
				}
				
				if($srch_member_city_id)
				{
					$query->whereCityId($srch_member_city_id);
				}
				
				if($srch_member_status_id)
				{
					$query->whereMemberStatusId($srch_member_status_id);
				}
				
				if($srch_member_status_reason_id)
				{
					$query->whereIn('member_status_reason_id', $srch_member_status_reason_id);
				}

				if($srch_member_birthday_month)
				{
					$query->whereMonth('birthday', $srch_member_birthday_month);
				}
			})
			->orderBy('name', 'asc')
			->get();
	}
}