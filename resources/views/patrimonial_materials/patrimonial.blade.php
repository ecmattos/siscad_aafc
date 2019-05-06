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
                <td class="text-right">Marca / Modelo / Série</td>
                <td class="text-left">{{ $patrimonial->patrimonial_brand->description }} / {{ $patrimonial->patrimonial_model->description }} / {{ $patrimonial->serial }}</td>
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