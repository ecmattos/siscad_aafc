@extends('layouts.app')

@section('content')

  <div class="page-header text-primary">
    <h4>
      <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-sitemap"></i></a>
      Parceiros: CONSULTA
      <div class="btn-group btn-group-sm pull-right">
        <a href="{!! route('partners.search_results_back') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Voltar Resultados"><i class="fa fa-bars"></i></a>
        <a href="{!! route('partners.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        <a href="{!! route('partners') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      </div>
    </h4>
    <hr class="hr-warning" />
  </div>

  <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><b><strike>{{ $partner->name }}</strike></b></h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Tipo</td>
                <td class="text-left"><strike>{{ $partner->partner_type->description }}</strike></td>
              </tr>

              <tr>
                <td class="text-right">Endereço</td>
                <td class="text-left"><strike>{{ $partner->address }}</strike></td>
              </tr>

              <tr>
                <td class="text-right">Bairro</td>
                <td class="text-left"><strike>{{ $partner->neighborhood }}</strike></td>
              </tr>

              <tr>
                <td class="text-right">Cidade</td>
                <td class="text-left"><strike>{{ $partner->city->description }} / {{ $partner->city->state->code }}</strike></td>
              </tr>

              <tr>
                <td class="text-right">CEP</td>
                <td class="text-left"><strike>{{ $partner->zip_code_mask }}</strike></td>
              </tr>

              <tr>
                <td class="text-right">Região</td>
                <td class="text-left"><strike>{{ $partner->city->region->description }} ({{ $partner->city->region->code }})</strike></td>
              </tr>

              <tr>
                <td class="text-right">Telefone</td>
                <td class="text-left"><strike>{{ $partner->phone_mask }}</strike></td>
              </tr>

              <tr>
                <td class="text-right">Celular</td>
                <td class="text-left"><strike>{{ $partner->mobile_mask }}</strike></td>
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
  
@endsection