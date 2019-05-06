@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item"><a href="{!! route('member_statuses') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Situações</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'member_statuses.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('member_statuses.form')

	{!! Form::close() !!}

@endsection
