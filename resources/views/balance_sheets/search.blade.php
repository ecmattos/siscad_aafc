@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Financeiro</li>
  		<li class="breadcrumb-item">Contabilidade</li>
  		<li class="breadcrumb-item">Balancetes</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>
	
	{!! Form::open(['route' => 'balance_sheets.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('balance_sheets.search_form')

	{!! Form::close() !!}

@endsection
