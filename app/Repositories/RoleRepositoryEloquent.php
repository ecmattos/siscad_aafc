<?php

namespace SisCad\Repositories;

use SisCad\Entities\Role;
use SisCad\Entities\Permission;
use SisCad\Entities\PermissionRole;
use SisCad\Entities\RoleUser;
use SisCad\Entities\User;

use Prettus\Repository\Eloquent\BaseRepository;

class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
	public function model()
	{
		return Role::class;
	}

	private $role;
	private $permission;
	private $permission_role;
	private $role_user;
	private $user;

	public function __construct(Role $role, Permission $permission, PermissionRole $permission_role, RoleUser $user_role, User $user)
	{
		$this->role = $role;
		$this->permission = $permission;
		$this->permission_role = $permission_role;
		$this->user_role = $user_role;
		$this->user = $user;
	}

	public function allRoles()
	{
		return $this->role
			->orderBy('display_name', 'asc')
			->get();
	}

	public function allNewPermissionsByRoleId($id)
	{
		$permissions_role = collect($this->permission_role
			->select('permission_role.permission_id')
			->whereRoleId($id)
			->get());

		return $this->permission
			->whereNotIn('id', $permissions_role)
			->orderBy('display_name', 'asc')
			->get();
	}

	public function allNewUsersByRoleId($id)
	{
		$users_role = collect($this->user_role
			->select('role_user.user_id')
			->whereRoleId($id)
			->get());

		return $this->user
			->whereNotIn('id', $users_role)
			->orderBy('name', 'asc')
			->get();
	}

	public function storeRoleUser($input)
    {
        $user_role = $this->user_role->fill($input);
        $user_role->save();
    }

	public function findRoleById($id)
    {
        return $this->role->find($id);
    }

    public function storeRole($input)
    {
        $role = $this->role->fill($input);
        $role->save();
    }

    public function findRoleUserById($id)
    {
        return $this->user_role->find($id);
    }

    public function findPermissionRoleById($id)
    {
        return $this->permission_role->find($id);
    }
}