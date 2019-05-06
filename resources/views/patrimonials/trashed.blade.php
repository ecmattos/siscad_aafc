@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{!! route('patrimonials.search_results_back') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Patrimônios</b></a></li>
    <li class="breadcrumb-item"><b>CONSULTA</b></li>

    <div class="btn-group btn-group-sm pull-right">
        <a href="{!! route('patrimonials.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Resultados"><i class="fa fa-bars"></i></a>
        |
        <a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a> 
        |
        <a href="{!! route('patrimonials.copy', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Copiar"><i class="fa fa-copy"></i></a>      
        |
        <a href="{!! route('patrimonials.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        
        @if($patrimonial->patrimonial_status_id!=5)
          |
          <a href="javascript:;" onclick="onDestroy('{!! route('patrimonials.destroy', [$patrimonial->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
        @endif
      </div>
  </ol>

  <div class="col-sm-6">
    @include('patrimonials.patrimonial')    
  </div>

  <div class="col-sm-6">
   @include('patrimonials.accounting')
  </div>

  <div class="col-sm-12">
    @include('patrimonials.files')
    @include('patrimonials.movements')
    @include('patrimonials.materials')
    @include('patrimonials.services')
  </div>
    
@endsection