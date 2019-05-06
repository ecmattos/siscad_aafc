@extends('adminlte::page')

@section('content_header')
  <h1>CONFIGURAÇÃO: LOCALIDADES - CIDADES</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('cities.edit', ['id' => $city->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('cities.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('cities') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="javascript:;" onclick="onDestroy('{!! route('cities.destroy', ['id' => $city->id]) !!}')" id="link_delete" type="button" title="Excluir" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  @if($city->deleted_at)
    @include('common.trashed')
  @endif

  <div class="row">
      <div class="col-sm-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $city->description }} / {{ $city->state->code }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-right" width="25%">Descrição</td>
                    <td class="text-left">{{ $city->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">UF</td>
                    <td class="text-left">{{ $city->state->description }} ({{ $city->state->code }})</td>
                  </tr>

                  <tr>
                    <td class="text-right">Região</td>
                    <td class="text-left">{{ $city->region->description }} ({{ $city->region->code }})</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        @include('revisionable.logs_register')
      </div>
  </div>
      
@endsection
