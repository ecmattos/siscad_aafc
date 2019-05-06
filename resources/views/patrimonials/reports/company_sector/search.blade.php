@extends('layouts.app')

@section('content')

  <ol class="breadcrumb breadcrumb-danger">
  	<li>Patrimônios</li>
    <li>Relatórios</li>
    <li>Posição</li>
    <li>Setor/Sub-setor</li>
  	<li><b>PESQUISA</b></li>

  	<div class="btn-group btn-group-sm pull-right">

   	</div>
	</ol>

	{!! Form::open(['route' => 'patrimonial_reports.company_sector_search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.reports.company_sector.search_form')

	{!! Form::close() !!}

@endsection