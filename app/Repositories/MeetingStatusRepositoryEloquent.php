<?php

namespace SisCad\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use SisCad\Repositories\MeetingStatusRepository;
use SisCad\Entities\MeetingStatus;
use SisCad\Validators\MeetingStatusValidator;

/**
 * Class MeetingStatusRepositoryEloquent.
 *
 * @package namespace SisCad\Repositories;
 */
class MeetingStatusRepositoryEloquent extends BaseRepository implements MeetingStatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MeetingStatus::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
