@extends('adminlte::page')

@section('content_header')
  <h1>PATRIMÔNIOS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('patrimonials.edit', ['id' => $patrimonial->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('patrimonials.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('patrimonials.copy', ['id' => $patrimonial->id]) !!}" type="button" class="btn btn-sm btn-default" rel="tooltip" title="Copiar"><i class="fa fa-copy"></i></a>
      <a href="{!! route('patrimonials.search_results_back') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="javascript:;" onclick="onDestroy('{!! route('patrimonials.destroy', ['id' => $patrimonial->id]) !!}')" id="link_delete" type="button" title="Excluir" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  @if($patrimonial->deleted_at)
    @include('common.trashed')
  @endif
  
  <div class="row">
      <div class="col-sm-6">
        @include('patrimonials.patrimonial')    
      </div>

      <div class="col-sm-6">
        @include('patrimonials.accounting')
      </div>
  </div>

  <div class="row">
      <div class="col-sm-12">
        @include('patrimonials.files')
        @include('patrimonials.movements')
        @include('patrimonials.materials')
        @include('patrimonials.services')
      </div>
  </div>
@endsection