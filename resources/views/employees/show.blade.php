@extends('adminlte::page')

@section('content_header')
  <h1>FUNCIONÁRIOS</h1>
  
    <ol class="breadcrumb">
	    <div class="btn-group-horizontal">
	      <a href="{!! route('employees.edit', ['id' => $employee->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
	      <a href="{!! route('employees.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	      <a href="{!! route('employees.search_results_back') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
	      <a href="{!! route('employees.destroy', ['id' => $employee->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
	    </div>
	  </ol>
@stop

@section('content')
	@if($employee->deleted_at)
		@include('common.trashed')
	@endif

	<div class="row">
      		<div class="col-sm-4">
  		   		@include('employees.view')
	  		</div>

	  		<div class="col-sm-8">
	  			@include('employees.movements')
	  			@include('employees.patrimonials')
	  		</div>
	</div>
@stop
