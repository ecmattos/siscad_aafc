@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Financeiro</li>
  		<li class="breadcrumb-item">Pagamentos</li>
  		<li class="breadcrumb-item"><a href="{!! route('payment_methods') !!}">Métodos</a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	<hr class="hr-warning" />

	{!! Form::open(['route' => 'payment_methods.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_methods.form')

	{!! Form::close() !!}

@endsection
