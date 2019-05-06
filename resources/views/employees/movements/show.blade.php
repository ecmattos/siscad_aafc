@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
   	<h4>
     	Patrimônios: CONSULTA
     	<div class="btn-group btn-group-sm pull-right">
     		<a href="{!! route('patrimonials.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Resultados"><i class="fa fa-bars"></i></a>
        <a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
     		<a href="{!! route('patrimonials.edit', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
     		<a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        <a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    	</div>
   	</h4>
   	<hr class="hr-primary" />
  </div>

  <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b>{{ $patrimonial->code }} - {{ $patrimonial->description }}</b></h3>
        <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Tipo / Sub-tipo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_type->description }} / {{ $patrimonial->patrimonial_sub_type->description }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Marca / Modelo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_brand->description }} / {{ $patrimonial->patrimonial_model->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Nr série</td>
                <td class="text-left">{{ $patrimonial->serial }}</td>
              </tr>

              <tr>
                <td class="text-right">Processo compra</td>
                <td class="text-left">{{ $patrimonial->purchase_process }}</td>
              </tr>

              <tr>
                <td class="text-right">Fornecedor</td>
                <td class="text-left"><a href="{!! route('providers.show', [$patrimonial->provider_id]) !!}">{{ $patrimonial->provider->cnpj_mask }}</a> - {{ $patrimonial->provider->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Data Nota Fiscal</td>
                <td class="text-left">{{ $patrimonial->invoice_date->format('d/m/Y') }} ({{ $patrimonial->invoice_date->diffForHumans() }})</td>
              </tr>

              <tr>
                <td class="text-right">Nota fiscal</td>
                <td class="text-left">{{ $patrimonial->invoice }}</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $patrimonial->comments }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
   @include('patrimonials.accounting')
   @include('revisionable.logs_register')
  </div>

  <div class="col-sm-8">
    @include('patrimonials.movements')
  </div>
    
@endsection
  