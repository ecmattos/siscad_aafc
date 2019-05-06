@extends('layouts.app')

@section('content')
  <div class="page-header text-primary">
    <h4>
      Administração - Saldos Iniciais Contas Contábeis: CONSULTA
      <div class="btn-group btn-group-sm pull-right">
        <a href="{!! route('balance_sheet_previouses.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>      
        
      </div>
    </h4>
    <hr class="hr-primary" />
  </div>

  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title">
          @if($patrimonial->patrimonial_status_id!=5)
            <a href="{!! route('patrimonials.edit', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          @endif 
          <b>{{ $patrimonial->code }} - {{ $patrimonial->description }}</b>
        </h3>
        <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Conta contábil</td>
                <td class="text-left">{{ $balance_sheet_previous->accounting_account->code }}</td>
              </tr>

              <tr>
                <td class="text-right">Saldo incial 2015 R$</td>
                <td class="text-left">{{ }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>    
  </div>

@endsection
  


  