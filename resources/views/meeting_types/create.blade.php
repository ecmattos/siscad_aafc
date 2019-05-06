@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Eventos</li>
  		<li class="breadcrumb-item"><a href="{!! route('meeting_types') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Tipos</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'meeting_types.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('meeting_types.form')

	{!! Form::close() !!}

@endsection
