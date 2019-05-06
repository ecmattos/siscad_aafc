<?php

namespace SisCad\Repositories;

use SisCad\Entities\Meeting;

use Prettus\Repository\Eloquent\BaseRepository;

class MeetingRepositoryEloquent extends BaseRepository implements MeetingRepository
{
	public function model()
	{
		return Meeting::class;
	}
	
	private $meeting;

	public function __construct(Meeting $meeting)
	{
		$this->meeting = $meeting;
	}

	public function allMeetings()
	{
		return $this->meeting
			->get();
	}

	public function allMeetingsOrderByDateDesc()
	{
		return $this->meeting
			->orderBy('date', 'desc')
			->get();
	}

	public function allMeetingsByCityId($id)
    {
        return $this->meeting
        	->whereCityId($id);
    }

	public function findMeetingById($id)
    {
        return $this->meeting
        	->withTrashed()
        	->find($id);
    }

    public function findMeetingTrashedById($id)
    {
        return $this->meeting
        	->withTrashed()
        	->find($id);
    }

    public function storeMeeting($input)
    {
        $meeting = $this->meeting->fill($input);
        $meeting->save();
    }
}