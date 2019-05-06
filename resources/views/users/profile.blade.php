@extends('adminlte::page')

@section('content_header')
    <h1>MEU PERFIL</h1>
@stop


@section('content')
  <div class="row">
    <div class="col-sm-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ Auth::user()->name }}</h3>
        </div>
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/uploads/avatars/users/{{ Auth::user()->avatar }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{ Auth::user()->fullname }}</h3>

          <p class="text-muted text-center">Desde {{ Auth::user()->created_at->format('d/m/Y') }} </p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Nome completo</b> <a class="pull-right">{{ Auth::user()->fullname }}</a>
            </li>
            <li class="list-group-item">
              <b>e-mail</b> <a class="pull-right">{{ Auth::user()->email }}</a>
            </li>
            <li class="list-group-item">
              <b>Atividades</b> <a class="pull-right">13,287</a>
            </li>
          </ul>

          {!! Form::model($user, ['route' => ['users.avatar', $user->id], 'method' => 'put', 'files' => true, 'class' => 'form-horizontal', 'role'=>'form']) !!}
            <div class="control-group">
              <label class="custom-file">
                {!! Form::file('avatar', ['class' => 'custom-file-input']) !!}
                <span class="custom-file-control"></span>
              </label>
              <button type="submit" class="pull-right btn btn-sm btn-success">Alterar <i class="fa fa-check"></i></button>
            </div>
          {!! Form::close() !!}

        </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-sm-9">
      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">GRUPOS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table_roles"> 
              <thead>
              </thead>
              <tbody>
                @foreach ($user->roles as $role)
                  <tr>
                    <td>{{ $role->display_name }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
@endsection
