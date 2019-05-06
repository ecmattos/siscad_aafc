@extends('adminlte::page')

@section('content_header')
  <h1>UNIDADES GESTORAS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('management_units.edit', ['id' => $management_unit->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('management_units.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('management_units') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      
      <a href="javascript:;" onclick="onDestroy('{!! route('management_units.destroy', ['id' => $management_unit->id]) !!}')" id="link_delete" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  <!-- Main content -->
  @if($management_unit->deleted_at)
    @include('common.trashed')
  @endif

  <div class="row">
      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $management_unit->code }} - {{ $management_unit->description }}</h3>
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
                <td class="text-right" width="25%">Endereço</td>
                <td class="text-left">{{ $management_unit->address }}</td>
              </tr>

              <tr>
                <td class="text-right">Bairro</td>
                <td class="text-left">{{ $management_unit->neighborhood }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Cidade</td>
                <td class="text-left">{{ $management_unit->city->description }} / {{ $management_unit->city->state->code }}</td>
              </tr>

              <tr>
                <td class="text-right">CEP</td>
                <td class="text-left">{{ $management_unit->zip_code_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Telefone</td>
                <td class="text-left">{{ $management_unit->phone_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Celular</td>
                <td class="text-left">{{ $management_unit->mobile_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">E-mail</td>
                <td class="text-left">{{ $management_unit->email }}</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $management_unit->comments }}</td>
              </tr>
            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        @include('revisionable.logs_register')
      </div>
  </div>
@endsection
  