@extends('adminlte::page')

@section('content_header')
  <h1>PARCEIROS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('partners.edit', ['id' => $partner->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('partners.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('partners.search_results_back') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="{!! route('partners.destroy', ['id' => $partner->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
      <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="btn btn-sm btn-warning" rel="tooltip" title="PC Sócios"><i class="fa fa-dashboard"></i></a>
    </div>
  </ol>
@stop

@section('content')
  <div class="row">
      <div class="col-md-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $partner->name }}</h3>
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
                    <td class="text-right" width="25%">Tipo</td>
                    <td class="text-left">{{ $partner->partner_type->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Setor</td>
                    <td class="text-left">{{ $partner->partner_sector->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Endereço</td>
                    <td class="text-left">{{ $partner->address }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Bairro</td>
                    <td class="text-left">{{ $partner->neighborhood }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Cidade</td>
                    <td class="text-left">{{ $partner->city->description }} / {{ $partner->city->state->code }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">CEP</td>
                    <td class="text-left">{{ $partner->zip_code_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Região</td>
                    <td class="text-left">{{ $partner->city->region->description }} ({{ $partner->city->region->code }})</td>
                  </tr>

                  <tr>
                    <td class="text-right">Telefone</td>
                    <td class="text-left">{{ $partner->phone_mask }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Celular</td>
                    <td class="text-left">{{ $partner->mobile_mask }}</td>
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