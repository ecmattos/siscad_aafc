@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Saldos Iniciais Contas Contábeis: ALTERAÇÃO
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('balance_sheet_previouses') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($balance_sheet_previous, ['route' => ['balance_sheet_previouses.update', $balance_sheet_previous->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('balance_sheet_previouses.form')

	{!! Form::close() !!}
	    
@endsection