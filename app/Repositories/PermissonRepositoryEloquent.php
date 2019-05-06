<?php

namespace SisCad\Repositories;

use SisCad\Entities\Permission;

use Prettus\Repository\Eloquent\BaseRepository;

class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
	public function model()
	{
		return Permission::class;
	}

	private $permission;

	public function __construct(Permission $permission)
	{
		$this->permission = $permission;
	}

	public function allPermissions()
	{
		return $this->permission
			->orderBy('display_name', 'asc')
			->get();
	}

	public function findPermissionById($id)
    {
        return $this->permission->find($id);
    }

    public function storePermission($input)
    {
        $permission = $this->permission->fill($input);
        $permission->save();
    }
}