<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\RoleRepository;
use SisCad\Repositories\UserRepository;
use SisCad\Repositories\PermissionRepository;

class RolesController extends Controller
{
    private $roleRepository;
    private $userRepository;
    private $permissionRepository;

    public function __construct(RoleRepository $roleRepository, UserRepository $userRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $this->authorize('roles-index');

       $roles = $this->roleRepository->allRoles();
       
       return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        $this->authorize('roles-create');

        return view('roles.create', compact('states', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\RoleRequest $request)
    {
        $input = $request->all();

        $input['display_name'] = strtoupper($input['display_name']);

        $role = $this->roleRepository->storeRole($input);
      
        return redirect('roles');
    }
    
    public function show($id, RoleRepository $roleRepository)
    {
        $this->authorize('roles-show');

        $role = $this->roleRepository->findRoleById($id);

        $role_permissions = array(''=>'') + $roleRepository
            ->allNewPermissionsByRoleId($id)
            ->pluck('display_name', 'id')
            ->all();

        $role_users = array(''=>'') + $roleRepository
            ->allNewUsersByRoleId($id)
            ->pluck('name', 'id')
            ->all();

        return view('roles.show', compact('role', 'role_permissions', 'role_users'));
    }

    public function edit($id)
    {
        $this->authorize('roles-edit');

        $role = $this->roleRepository->findRoleById($id);
        
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\RoleRequest $request, $id)
    {
        $input = $request->all();

        $input['display_name'] = strtoupper($input['display_name']);
                
        $role = $this->roleRepository->findRoleById($id);
        $role->update($input);

        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('roles-destroy');

        $this->roleRepository->findRoleById($id)->delete();

        return redirect('roles');
    }

    public function permission_store($id, Requests\PermissionRoleRequest $request)
    {
        $role = $this->roleRepository->findRoleById($id);

        $input = $request->all();

        $permission = $this->permissionRepository->findPermissionById($input['permission_id']);

        $role->permissions()->attach($permission);

        return redirect()->route('roles.show', ['id' => $id]);
    }

    public function permission_destroy($id, $permission)
    {
        $role = $this->roleRepository->findRoleById($id);

        $permission = $this->permissionRepository->findPermissionById($permission);

        $role->permissions()->detach($permission);

        return redirect()->route('roles.show', ['id' => $id]);
    }

    public function user_store($id, Requests\RoleUserRequest $request)
    {
        $role = $this->roleRepository->findRoleById($id);

        $input = $request->all();

        $user = $this->userRepository->findUserById($input['user_id']);

        $role->users()->attach($user);

        return redirect()->route('roles.show', ['id' => $id]);
    }

    public function user_destroy($id, $user)
    {
        $role = $this->roleRepository->findRoleById($id);

        $user = $this->userRepository->findUserById($user);

        $role->users()->detach($user);

        return redirect()->route('roles.show', ['id' => $id]);
    }
}