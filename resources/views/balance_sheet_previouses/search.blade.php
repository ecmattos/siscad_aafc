@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Saldos Iniciais Contas Contábeis: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('balance_sheet_previouses.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Pesquisar"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'balance_sheet_previouses.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('balance_sheet_previouses.search_form')

	{!! Form::close() !!}

@endsection
