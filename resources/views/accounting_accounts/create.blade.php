@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Financeiro</li>
  		<li class="breadcrumb-item">Contabilidade</li>
  		<li class="breadcrumb-item"><a href="{!! route('accounting_accounts') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Plano de Contas</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	{!! Form::open(['route' => 'accounting_accounts.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('accounting_accounts.form')

	{!! Form::close() !!}

@endsection
