@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Acessibilidade</li>
  		<li class="breadcrumb-item"><a href="{!! route('roles') !!}">Grupos de Usuários</a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::open(['route' => 'roles.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('roles.form')

	{!! Form::close() !!}

@endsection
