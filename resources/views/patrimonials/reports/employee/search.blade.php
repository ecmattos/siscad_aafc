@extends('layouts.app')

@section('content')

  <ol class="breadcrumb breadcrumb-danger">
  	<li>Patrimônios</li>
    <li>Relatórios</li>
    <li>Posição</li>
    <li>Responsável</li>
    <li><b>PESQUISA</b></li>

  	<div class="btn-group btn-group-sm pull-right">
   		
   	</div>
	</ol>

	{!! Form::open(['route' => 'patrimonials.reports.employees.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.reports.employee.search_form')

	{!! Form::close() !!}

@endsection