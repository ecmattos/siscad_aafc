
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">SITUAÇÃO CONTÁBIL EM {{ $srch_depreciation_date_BR }}</h3>
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
                  <td class="text-right" width="25%">Fornecedor</td>
                  <td class="text-left"><a href="{!! route('providers.show', [$patrimonial->provider_id]) !!}">{{ $patrimonial->provider->cnpj_mask }}</a> - {{ $patrimonial->provider->description }}</td>
                </tr>

                <tr>
                  <td class="text-right">Proc.compra / Nota fiscal / Data</td>
                  <td class="text-left">{{ $patrimonial->purchase_process }} / {{ $patrimonial->invoice }} / {{ $patrimonial->invoice_date->format('d/m/Y') }}</td>
                </tr>

                <tr>
                  <td class="text-right">Conta contábil Ativo</td>
                  <td class="text-left">{{ $patrimonial->patrimonial_type->asset_accounting_account->code }} - {{ $patrimonial->patrimonial_type->asset_accounting_account->description }} ({{ $patrimonial->patrimonial_type->asset_accounting_account->account_balance_type->code }})</td>
                </tr>

                <tr>
                  <td class="text-right">Conta contábil Deprec</td>
                  <td class="text-left">{{ $patrimonial->patrimonial_type->depreciation_accounting_account->code }} - {{ $patrimonial->patrimonial_type->depreciation_accounting_account->description }} ({{ $patrimonial->patrimonial_type->depreciation_accounting_account->account_balance_type->code }})</td>
                </tr>

                <tr>
                  <td class="text-right">Vida útil</td>
                  <td class="text-left">{{ $patrimonial->patrimonial_type->useful_life_years }} anos</td>
                </tr>

                <tr>
                  <td class="text-right">Vlr compra</td>
                  <td class="text-left">R$ {{ number_format($patrimonial->purchase_value, 2,",",".") }}</td>
                </tr>

                <tr>
                  <td class="text-right">Custo aquisição</td>
                  <td class="text-left">R$ {{ number_format(($patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices()), 2,",",".") }}</td>
                </tr>

                <tr>
                  <td class="text-right">Vlr residual</td>
                  <td class="text-left">R$ {{ number_format($patrimonial->residual_value, 2,",",".") }}</td>
                </tr>

                <tr>
                  <td class="text-right">Deprec início</td>
                  <td class="text-left">{{ $patrimonial->depreciation_date_start->format('d/m/Y') }}</td>
                </tr>

                <tr>
                  <td class="text-right">Deprec mensal</td>
                  <td class="text-left">R$ {{ number_format($patrimonial->getDepreciationMonthlyValue(), 2,",",".") }} ({{ number_format($patrimonial->getDepreciationMonthlyPercentage(), 2,",",".") }} %)</td>
                </tr>

                <tr>
                  <td class="text-right">Deprec acumulada</td>
                  <td class="text-left">
                    R$
                    @if($patrimonial->getUsefulLifeYears()===0) 
                      @if($patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN) == $patrimonial->getUsefulLifeMonthsQty())
                        {{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices() - $patrimonial->residual_value), 2,",",".") }}
                      @else
                        {{ number_format($patrimonial->getDepreciationMonthlyValue() * $patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN), '2', ',', '.') }}
                      @endif
                    @else
                      0,00
                    @endif

                    ({{ $patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN) }} de {{ $patrimonial->getUsefulLifeMonthsQty() }} meses)
                  </td>
                </tr>

                <tr>
                  <td class="text-right">Vlr contábil</td>
                  <td class="text-left">R$ {{ number_format($patrimonial->getAccountingBalanceValue($srch_depreciation_date_EN), 2,",",".") }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

