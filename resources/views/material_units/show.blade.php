@extends('adminlte::page')

@section('content_header')
  <h1>CONFIGURAÇÃO: MATERIAIS - UNIDADES</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('material_units.edit', ['id' => $material_unit->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('material_units.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('material_units') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="javascript:;" onclick="onDestroy('{!! route('material_units.destroy', ['id' => $material_unit->id]) !!}')" id="link_delete" type="button" title="Excluir" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  @if($material_unit->deleted_at)
    @include('common.trashed')
  @endif

  <div class="row">
      <div class="col-sm-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $material_unit->code }} - {{ $material_unit->description }}</h3>
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
           					<td class="text-left">{{ $material_unit->code }}</td>
            			</tr>

        				  <tr>
             				<td class="text-right">Descrição</td>
             				<td class="text-left">{{ $material_unit->description }}</td>
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
  