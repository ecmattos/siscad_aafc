<?php

namespace SisCad\Repositories;

use SisCad\Entities\User;
use SisCad\Entities\RoleUser;
use SisCad\Entities\Role;

use Prettus\Repository\Eloquent\BaseRepository;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function model()
    {
        return User::class;
    }
	
	private $user;
    private $roleUser;
    private $role;

	public function __construct(User $user, RoleUser $roleUser, Role $role)
	{
		$this->user = $user;
        $this->roleUser = $roleUser;
        $this->role = $role;
	}

	public function allUsers()
	{
		return $this->user
			->orderBy('name', 'asc')
            ->get();
	}

    public function allNewRolesByUserId($id)
    {
        $user_roles = collect($this->roleUser
            ->select('role_user.role_id')
            ->whereUserId($id)
            ->get());

        return $this->role
            ->whereNotIn('id', $user_roles)
            ->orderBy('display_name', 'asc')
            ->get();
    }

    public function allUsersByRole($id)
    {
        return $this->roleUser
            ->whereRoleId($id)
            ->get();
    }

	public function findUserById($id)
    {
        return $this->user
            ->find($id);
    }

    public function lastUser()
    {
        return $this->user->orderBy('id', 'desc')->first();
    }

    public function storeUser($input)
    {
        $user = $this->user->fill($input);
        $user->save();
    }

    public function findUserByConfirmationCode($confirmation_code)
    {
        return $this->user
            ->where('confirmation_code', '=', $confirmation_code)
            ->get();
    }

    public function enableUserById($id)
    {
        return $this->user
            ->where('id', '=', $id)
            ->update(['user_status_id' => 2]);
    }

    public function disableUserById($id)
    {
        return $this->user
            ->where('id', '=', $id)
            ->update(['user_status_id' => 1]);
    }
}