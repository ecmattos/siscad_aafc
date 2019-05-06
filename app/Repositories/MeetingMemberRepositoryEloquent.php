<?php

namespace SisCad\Repositories;

use SisCad\Entities\MeetingMember;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class MeetingMemberRepositoryEloquent.
 *
 * @package namespace SisCad\Repositories;
 */
class MeetingMemberRepositoryEloquent extends BaseRepository implements MeetingMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MeetingMember::class;
    }

    private $meeting_member;

	public function __construct(MeetingMember $meeting_member)
	{
		$this->meeting_member = $meeting_member;
    }
    
    public function allMeetingMembers()
	{
		return $this->meeting_member
			->all();
    }
    
    public function findMeetingMemberById($id)
    {
        return $this->meeting_member
        	->find($id);
    }
    
    public function allMembersByMeetingId($id)
    {
        return $this->meeting_member
            ->whereMeetingId($id)
            ->get();
    }

    public function countMembersExpectedQtyByMeetingId($id)
    {
        return $this->meeting_member
            ->where('expected_qty', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countMembersExpectedQtyCompanionByMeetingId($id)
    {
        return $this->meeting_member
            ->where('expected_qty_companion', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countMembersExpectedQtyCompanionExtraByMeetingId($id)
    {
        return $this->meeting_member
            ->where('expected_qty_companion_extra', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countMembersConfirmedQtyByMeetingId($id)
    {
        return $this->meeting_member
            ->where('confirmed_qty', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countMembersConfirmedQtyCompanionByMeetingId($id)
    {
        return $this->meeting_member
            ->where('confirmed_qty_companion', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countMembersConfirmedQtyCompanionExtraByMeetingId($id)
    {
        return $this->meeting_member
            ->where('confirmed_qty_companion_extra', 1)
            ->whereMeetingId($id)
            ->count();
    }    

    public function storeMeetingMember($data)
    {
        $meeting_member = $this->meeting_member->fill($data);
        $meeting_member->save();
    }

    public function lastMeetingMember()
    {
        return $this->meeting_member
            ->orderBy('id', 'desc')
        	->first();
    }
}
