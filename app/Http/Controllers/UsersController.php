<?php

namespace SisCad\Http\Controllers;

use Session;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\UserRepository;
use SisCad\Repositories\RoleRepository;

use Illuminate\Notifications\Notifiable;

use Auth;
use Image;


class UsersController extends Controller
{
    use Notifiable;

    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Show the profile for the given user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function profile()
    {
        $user = $this->userRepository->findUserById(Auth::user()->id);

        $user_roles = array(''=>'') + $this->userRepository
            ->allNewRolesByUserId(Auth::user()->id)
            ->pluck('display_name', 'id')
            ->all();

        return view('users.profile', compact('user','user_roles'));       
    }

    public function avatar(Requests\UserAvatarRequest $request)
    {
        $data = $request->all();

        $id = Auth::user()->id;

        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = $id.'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/users/' . $filename));

            $data['avatar'] = $filename;
        }

        $user = $this->userRepository->findUserById($id);
        $user->update($data);

        return redirect()->route('users.profile', ['id' => $id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('users-index');

        $users = $this->userRepository
            ->AllUsers()
            ->all();
        
        return view('users.index', compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('users-create');

        $roles = array(''=>'') + $this->roleRepository
            ->allRoles()
            ->pluck('display_name', 'id')
            ->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt('123456');
        $data['confirmation_code'] = str_random(100);

        $data['name'] = strtoupper($data['name']);
        $data['fullname'] = strtoupper($data['fullname']);
        $data['email'] = strtolower($data['email']);
        
        $this->userRepository->storeUser($data);

        $user =$this->userRepository->lastUser();

        $role = $this->roleRepository->findRoleById($data['role_id']);

        $user->roles()->attach($role);

        #$user = $this->userRepository->lastUser();

        #event(new UserNewEvent($user));

        #Mail::send('emails.users.welcome', ['user' => $user], function ($m) use ($user)
        #{
        #    $m->from('aafcorsan@aafcorsan.com.br', 'AAFCorsan');
        #    $m->to($user->email, $user->name)->subject('SisCad: Ativação da sua conta');
        #});

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('users-show');

        $user = $this->userRepository->findUserById($id);

        $user_roles = array(''=>'') + $this->userRepository
            ->allNewRolesByUserId($id)
            ->pluck('display_name', 'id')
            ->all();

        return view('users.show', compact('user','user_roles'));
    }

    public function role_store($id, Requests\UserRoleRequest $request)
    {
        $user = $this->userRepository->findUserById($id);

        $data = $request->all();

        $role = $this->roleRepository->findRoleById($data['role_id']);

        $user->roles()->attach($role);

        return redirect()->route('users.show', ['id' => $id]);
    }

    public function role_destroy($id, $role)
    {
        #dd($role);

        $user = $this->userRepository->findUserById($id);

        $role = $this->roleRepository->findRoleById($role);

        $user->roles()->detach($role);

        return redirect()->route('users.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('users-edit');

        $user = $this->userRepository->findUserById($id);
        
        return view('users.edit', compact('user'));
    }

    public function update(Requests\UserEditRequest $request, $id)
    {
        $data = $request->all();

        $data['name'] = strtoupper($data['name']);
        $data['fullname'] = strtoupper($data['fullname']);
        $data['email'] = strtolower($data['email']);

        $user = $this->userRepository->findUserById($id);
        $user->update($data);

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }

    public function enable($id)
    {
        $user = $this->userRepository->enableUserById($id);

        $user = $this->userRepository->findUserById($id);

        #event(new UserEnabledEvent($id));

        Session::flash('flash_message_success', 'Usuário ativado com sucesso ! Encaminhado e-mail para o usuário.');

        return redirect('/users');
    }

    public function disable($id)
    {
        $user = $this->userRepository->disableUserById($id);

        $user = $this->userRepository->findUserById($id);

        #event(new UserDisabledEvent($id));

        Session::flash('flash_message_success', 'Usuário desativado com sucesso ! Encaminhado e-mail para o usuário.');

        return redirect('/users');
    }

    public function access_denied()
    {
        return view('users.access_denied');
    }
}