@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><a href="{!! route('roles') !!}">Grupos de Usuários</a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO<b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('roles.form')

	{!! Form::close() !!}
	    
@endsection