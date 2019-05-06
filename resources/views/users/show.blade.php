@extends('adminlte::page')

@section('content_header')
  <h1>ADMINISTRAÇÃO: ACESSIBILIDADE - USUÁRIOS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('users.edit', ['id' => $user->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>

      <a href="{!! route('users') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
    </div>
  </ol>

@stop


@section('content')
  <div class="row">
    <div class="col-sm-4">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $user->name }}</h3>
        </div>
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/uploads/avatars/users/{{ $user->avatar }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{ $user->fullname }}</h3>

          <p class="text-muted text-center">Desde {{ $user->created_at->format('d/m/Y') }} </p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Nome completo</b> <a class="pull-right">{{ $user->fullname }}</a>
            </li>
            <li class="list-group-item">
              <b>e-mail</b> <a class="pull-right">{{ $user->email }}</a>
            </li>
            <li class="list-group-item">
              <b>Atividades</b> <a class="pull-right">13,287</a>
            </li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-sm-8">
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
