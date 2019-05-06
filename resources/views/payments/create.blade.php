@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Pagamentos: Importação
	   		<hr class="hr-warning" />
	   	</h4>
	</div>

	{!! Form::open(['route' => ['payments.import'], 'class'=>'form-horizontal', 'role'=>'form', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => true]) !!}

	    @include('payments.form')

	{!! Form::close() !!}

@endsection
