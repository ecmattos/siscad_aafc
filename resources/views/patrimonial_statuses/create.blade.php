@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item"><a href="{!! route('patrimonial_statuses') !!}">Situação</a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::open(['route' => 'patrimonial_statuses.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_statuses.form')

	{!! Form::close() !!}

@endsection
