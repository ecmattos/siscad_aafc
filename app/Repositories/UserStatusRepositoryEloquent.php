<?php

namespace SisCad\Repositories;

use SisCad\Entities\UserStatus;
use Prettus\Repository\Eloquent\BaseRepository;

class UserStatusRepositoryEloquent extends BaseRepository implements UserStatusRepository
{
    public function model()
    {
        return UserStatus::class;
    }
	
	private $userStatus;

	public function __construct(UserStatus $userStatus)
	{
		$this->userStatus = $userStatus;
	}
}