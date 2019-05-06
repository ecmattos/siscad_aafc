@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{!! route('affiliated_societies') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Filiais</b></a></li>
    <li class="breadcrumb-item"><b>CONSULTA</b></li>

    <div class="btn-group btn-group-sm pull-right">
      <a href="{!! route('affiliated_societies.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('affiliated_societies.edit', ['id' => $affiliated_society->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('affiliated_societies') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
    </div>
  </ol>

  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><b>{{ $affiliated_society->description }} - {{ $affiliated_society->address }}, {{ $affiliated_society->city->description }} / {{ $affiliated_society->city->state->code }}</b></h3>
          <span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                
              </thead>
              <tbody>
                <tr>
                  <td class="text-right" width="25%">Código</td>
                  <td class="text-left">{{ $affiliated_society->code }}</td>
                </tr>

                <tr>
                  <td class="text-right">CPF</td>
                  <td class="text-left">{{ $affiliated_society->cnpj_mask }}</td>
                </tr>
                
                <tr>
                  <td class="text-right">Endereço</td>
                  <td class="text-left">{{ $affiliated_society->address }}</td>
                </tr>

                <tr>
                  <td class="text-right">Bairro</td>
                  <td class="text-left">{{ $affiliated_society->neighborhood }}</td>
                </tr>

                <tr>
                  <td class="text-right">Cidade</td>
                  <td class="text-left">{{ $affiliated_society->city->description }} / {{ $affiliated_society->city->state->code }}</td>
                </tr>

                <tr>
                  <td class="text-right">CEP</td>
                  <td class="text-left">{{ $affiliated_society->zip_code_mask }}</td>
                </tr>

                <tr>
                  <td class="text-right">Região</td>
                  <td class="text-left">{{ $affiliated_society->city->region->description }} ({{ $affiliated_society->city->region->code }})</td>
                </tr>

                <tr>
                  <td class="text-right">Telefone</td>
                  <td class="text-left">{{ $affiliated_society->phone_mask }}</td>
                </tr>

                <tr>
                  <td class="text-right">Celular</td>
                  <td class="text-left">{{ $affiliated_society->mobile_mask }}</td>
                </tr>

                <tr>
                  <td class="text-right">e-mail</td>
                  <td class="text-left">{{ $affiliated_society->email }}</td>
                </tr>

                <tr>
                  <td class="text-right">Observações</td>
                  <td class="text-left">{{ $affiliated_society->comments }}</td>
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

  <div class="row">
    <div class="col-sm-12">
      @include('affiliated_societies.patrimonials')
    </div> 
  </div>
@endsection

@section('js_scripts')
  <script type="text/javascript">
    $(document).on('click', '.panel-heading span.panel-clickable', function(e)
      {
          var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) 
          {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
          } 
        else 
          {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
          }
      })
  </script>
@endsection
  