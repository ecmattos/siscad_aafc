@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Banco: INCLUSÃO
	   		<hr class="hr-warning" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'banks.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('banks.form')

	{!! Form::close() !!}

@endsection
