<?php

namespace SisCad\Repositories;

use SisCad\Entities\MeetingType;

use Prettus\Repository\Eloquent\BaseRepository;

class MeetingTypeRepositoryEloquent extends BaseRepository implements MeetingTypeRepository
{
	public function model()
	{
		return MeetingType::class;
	}
	
	private $meeting_type;

	public function __construct(MeetingType $meeting_type)
	{
		$this->meeting_type = $meeting_type;
	}

	public function allMeetingTypes()
	{
		return $this->meeting_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findMeetingTypeById($id)
    {
        return $this->meeting_type->find($id);
    }

    public function storeMeetingType($input)
    {
        $meeting_type = $this->meeting_type->fill($input);
        $meeting_type->save();
    }
}