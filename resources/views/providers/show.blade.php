@extends('adminlte::page')

@section('content_header')
  <h1>FORNECEDORES</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('providers.edit', ['id' => $provider->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('providers.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('providers') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="javascript:;" onclick="onDestroy('{!! route('providers.destroy', ['id' => $provider->id]) !!}')" id="link_delete" type="button" title="Excluir" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>
@stop

@section('content')
  <!-- Main content -->
  @if($provider->deleted_at)
    @include('common.trashed')
  @endif

  <div class="row">
    <div class="col-sm-8">
      <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $provider->description }}</h3>
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
                    <td class="text-right" width="25%">CNPJ</td>
                    <td class="text-left">{{ $provider->cnpj_mask }}</td>
                  </tr>
                  
                  <tr>
                    <td class="text-right">Endereço</td>
                    <td class="text-left">{{ $provider->address }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Bairro</td>
                    <td class="text-left">{{ $provider->neighborhood }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Cidade</td>
                    <td class="text-left">{{ $provider->city->description }} / {{ $provider->city->state->code }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">CEP</td>
                    <td class="text-left">{{ $provider->zip_code_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Região</td>
                    <td class="text-left">{{ $provider->city->region->description }} ({{ $provider->city->region->code }})</td>
                  </tr>

                  <tr>
                    <td class="text-right">Telefone</td>
                    <td class="text-left">{{ $provider->phone_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Celular</td>
                    <td class="text-left">{{ $provider->mobile_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">e-mail</td>
                    <td class="text-left">{{ $provider->email }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Observações</td>
                    <td class="text-left">{{ $provider->comments }}</td>
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
  