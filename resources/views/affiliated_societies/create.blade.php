@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><a href="{!! route('affiliated_societies') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Filiais</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::open(['route' => 'affiliated_societies.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('affiliated_societies.form')

	{!! Form::close() !!}

@endsection
