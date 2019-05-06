@extends('home')

@section('content')

	<div class="page-header text-primary">
   	<h4>
     	Patrimônios: CONSULTA
     	<div class="btn-group btn-group-sm pull-right">
     		<a href="{!! route('patrimonials.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Resultados"><i class="fa fa-bars"></i></a>
        <a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
     		@if($patrimonial->patrimonial_status_id!=5)
          <a href="{!! route('patrimonials.edit', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          <a href="{!! route('patrimonial_movements.create', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Movimentação"><i class="fa fa-exchange"></i></a> 
        @endif       
     		<a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Atividades"><i class="fa fa-eye"></i></a>
        <a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    	</div>
   	</h4>
   	<hr class="hr-primary" />
  </div>

  <div class="col-sm-8">
    @include('patrimonials.patrimonial')    
  </div>

  <div class="col-sm-4">
   @include('patrimonials.accounting')
  </div>

  <div class="col-sm-8">
    @include('patrimonials.movements')
  </div>

  <div class="col-sm-4">
   @include('patrimonials.images')
  </div>
    
@endsection
  