<?php

namespace SisCad\Repositories;

use SisCad\Entities\MeetingPartner;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class MeetingPartnerRepositoryEloquent.
 *
 * @package namespace SisCad\Repositories;
 */
class MeetingPartnerRepositoryEloquent extends BaseRepository implements MeetingPartnerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MeetingPartner::class;
    }

    private $meeting_partner;

	public function __construct(MeetingPartner $meeting_partner)
	{
		$this->meeting_partner = $meeting_partner;
    }
    
    public function allMeetingPartners()
	{
		return $this->meeting_partner
			->all();
    }
    
    public function findMeetingPartnerById($id)
    {
        return $this->meeting_partner
        	->find($id);
    }
    
    public function allPartnersByMeetingId($id)
    {
        return $this->meeting_partner
            ->whereMeetingId($id)
            ->get();
    }

    public function countPartnersExpectedQtyByMeetingId($id)
    {
        return $this->meeting_partner
            ->where('expected_qty', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countPartnersExpectedQtyCompanionByMeetingId($id)
    {
        return $this->meeting_partner
            ->where('expected_qty_companion', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countPartnersExpectedQtyCompanionExtraByMeetingId($id)
    {
        return $this->meeting_partner
            ->where('expected_qty_companion_extra', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countPartnersConfirmedQtyByMeetingId($id)
    {
        return $this->meeting_partner
            ->where('confirmed_qty', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countPartnersConfirmedQtyCompanionByMeetingId($id)
    {
        return $this->meeting_partner
            ->where('confirmed_qty_companion', 1)
            ->whereMeetingId($id)
            ->count();
    }

    public function countPartnersConfirmedQtyCompanionExtraByMeetingId($id)
    {
        return $this->meeting_partner
            ->where('confirmed_qty_companion_extra', 1)
            ->whereMeetingId($id)
            ->count();
    }    

    public function storeMeetingPartner($data)
    {
        $meeting_partner = $this->meeting_partner->fill($data);
        $meeting_partner->save();
    }

    public function lastMeetingPartner()
    {
        return $this->meeting_partner
            ->orderBy('id', 'desc')
        	->first();
    }
}
