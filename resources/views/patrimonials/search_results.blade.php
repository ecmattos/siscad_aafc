@extends('adminlte::page')

@section('content_header')
    <h1>PATRIMÔNIOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('patrimonials.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    	<a href="{!! route('patrimonials.search') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
		</div>
	</ol>
@stop

@section('content')
	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body"><!-- Main content -->
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_patrimonials"> 
							<thead>
								<tr>
									<th>Código</th>
									<th>Tipo</th>
									<th>Sub-tipo</th>
									<th>Descrição</th>
									<th>Unid.Gestora</th>
									<th>Setor</th>
									<th>Sub-setor</th>
									<th>Situação</th>
									<th>Dt Situação</th>
									<th>Responsável</th>
									<th>Proc.Compra</th>
									<th>Conta contábil</th>
									<th>Fornecedor</th>
									<th>Dt.Compra</th>
									<th>NF</th>
									<th>R$ Total</th>
									<th>R$ Residual</th>
									<th>R$ Depreciar</th>
									<th>Deprec Ini</th>
									<th>Deprec R$/Mês</th>						
									<th>Deprec Acumul Meses</th>
									<th>
										Deprec Acumul R$
										<br>
										até {{ $srch_depreciation_date_BR }}
									</th>
									<th>Obs</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>Código</th>
									<th>Tipo</th>
									<th>Sub-tipo</th>
									<th>Descrição</th>
									<th>Unid.Gestora</th>
									<th>Setor</th>
									<th>Sub-setor</th>
									<th>Situação</th>
									<th>Dt Situação</th>
									<th>Responsável</th>
									<th>Proc.Compra</th>
									<th>Conta contábil</th>
									<th>Fornecedor</th>
									<th>Dt.Compra</th>
									<th>NF</th>
									<th>R$ Total</th>
									<th>R$ Residual</th>
									<th>R$ Depreciar</th>
									<th>Deprec Ini</th>
									<th>Deprec R$/Mês</th>						
									<th>Deprec Acumul Meses</th>
									<th>
										Deprec Acumul R$
										<br>
										até {{ $srch_depreciation_date_BR }}
									</th>
									<th>Obs</th>
								</tr>
							</tfoot>
							<tbody>
							    @foreach($patrimonials as $patrimonial)
							        <tr>
							            <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{{ $patrimonial->code }}</a></td>
							            <td>{{ $patrimonial->patrimonial_type->code }}</td>
							            <td>{{ $patrimonial->patrimonial_sub_type->code }}</td>
							            <td>{{ $patrimonial->description }}</td>
							           	<td><a href="{!! route('management_units.show', [$patrimonial->management_unit_id]) !!}" title="{{ $patrimonial->management_unit->description }}">{{ $patrimonial->management_unit->code }}</a></td>
							            <td>{{ $patrimonial->company_sector->description }}</td>
							            <td>{{ $patrimonial->company_sub_sector->description }}</td>
							            <td>{{ $patrimonial->patrimonial_status->description }}</td>
							            <td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
							            <td>{{ $patrimonial->employee->name }}</td>
							            <td>{{ $patrimonial->purchase_process }}</td>
							            <td>{{ $patrimonial->patrimonial_type->asset_accounting_account->code }}</td>
							            <td><a href="{!! route('providers.show', [$patrimonial->provider_id]) !!}" title="{{ $patrimonial->provider->description_short }}">{{ $patrimonial->provider->cnpj_mask }}</a></td>
							            <td>{{ $patrimonial->invoice_date->format('d/m/Y') }}</td>
							            <td>{{ $patrimonial->invoice }}</td>
							            <td class="text-right">{{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices()), 2,",",".") }}</td>

							            <td class="text-right">{{ number_format(($patrimonial->residual_value), 2,",",".") }}</td>

							            <td class="text-right">{{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices() - $patrimonial->residual_value), 2,",",".") }}</td>

							            <td>{{ $patrimonial->depreciation_date_start->format('d/m/Y') }}</td>
							            <td>{{ number_format($patrimonial->getDepreciationMonthlyValue(), 2,",",".") }}</td>
							            <td>{{ $patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN) }}</td>
							            <td>
							            	@if($patrimonial->patrimonial_type->useful_life_years > '0')
								            	@if($patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN) == $patrimonial->getUsefulLifeMonthsQty())
								            		{{ number_format(($patrimonial->purchase_value + $patrimonial->getTotalDepreciationMaterials() + $patrimonial->getTotalDepreciationServices() - $patrimonial->residual_value), 2,",",".") }}
								            	@else
								            		{{ number_format($patrimonial->getDepreciationMonthlyValue() * $patrimonial->getDepreciationAccumulatedMonthsQty($srch_depreciation_date_EN), '2', ',', '.') }}
								            	@endif
								            @endif
							            </td>
								         	
							            <td>{{ $patrimonial->comments }}</td>
							        </tr>
							        <?php 
							        	#$patrimonial_total_value += $patrimonial->purchase_value + $patrimonial->getTotalMaterials() + $patrimonial->getTotalServices();
							        ?>
							    @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
