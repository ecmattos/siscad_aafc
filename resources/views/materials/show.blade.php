@extends('adminlte::page')

@section('content_header')
  <h1>MATERIAIS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('materials.edit', ['id' => $material->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('materials.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('materials') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="{!! route('materials.destroy', ['id' => $material->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  @if($material->deleted_at)
    @include('common.trashed')
  @endif

  <div class="row">
      <div class="col-sm-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $material->description }}</h3>
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
                    <td class="text-right" width="25%">Código</td>
                    <td class="text-left">{{ $material->code }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Descrição</td>
                    <td class="text-left">{{ $material->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Unidade</td>
                    <td class="text-left">{{ $material->material_unit->code }} ({{ $material->material_unit->description }})</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
