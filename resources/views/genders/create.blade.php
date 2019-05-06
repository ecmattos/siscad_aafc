@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item"><a href="{!! route('genders') !!}">Sexo</a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'genders.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('genders.form')

	{!! Form::close() !!}

@endsection
