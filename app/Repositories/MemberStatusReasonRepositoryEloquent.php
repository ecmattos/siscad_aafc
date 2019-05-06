<?php

namespace SisCad\Repositories;

use SisCad\Entities\MemberStatusReason;
use Prettus\Repository\Eloquent\BaseRepository;

class MemberStatusReasonRepositoryEloquent extends BaseRepository implements MemberStatusReasonRepository
{
	public function model()
	{
		return MemberStatusReason::class;
	}
	
	private $member_status_reason;

	public function __construct(MemberStatusReason $member_status_reason)
	{
		$this->member_status_reason = $member_status_reason;
	}

	public function allMemberStatusReasons()
	{
		return $this->member_status_reason
			->orderBy('description', 'asc')
			->get();
	}

	public function findMemberStatusReasonById($id)
    {
        return $this->member_status_reason->find($id);
    }

    public function storeMemberStatusReason($input)
    {
        $member_status_reason = $this->member_status_reason->fill($input);
        $member_status_reason->save();
    }
}