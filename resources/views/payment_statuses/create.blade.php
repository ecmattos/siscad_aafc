@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Financeiro</li>
  		<li class="breadcrumb-item">Pagamentos</li>
  		<li class="breadcrumb-item"><a href="{!! route('payment_statuses') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Situação</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'payment_statuses.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_statuses.form')

	{!! Form::close() !!}

@endsection
