@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Patrimônios: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">#</th>
						<th data-field="code" data-sortable="true" data-align="right">Código</th>
						<th data-field="patrimonial_type_id" data-sortable="true">Tipo</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-field="purchase_process" data-sortable="true">Proc.Compra</th>
						<th data-field="provider_id" data-sortable="true">Fornecedor</th>
						<th data-field="invoice_date" data-sortable="true" data-align="right">Dt.Compra</th>
						<th data-field="purchase_value" data-sortable="true" data-align="right">Vlr Compra</th>
						<th data-field="invoice" data-sortable="true" data-align="right">NF</th>
						<th data-field="management_unit_id" data-sortable="true">Unid.Gestora</th>
						<th data-field="patrimonial_sector_id" data-sortable="true">Setor</th>
						<th data-field="patrimonial_sub_sector_id" data-sortable="true">Sub-setor</th>
						<th data-field="patrimonial_status_id" data-align="left">Situação</th>
						<th data-field="patrimonial_status_date">Dt Situação</th>
						<th data-field="useful_life_years">Vida útil</th>
						<th data-field="comments">Obs</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($patrimonials as $patrimonial)
				        <tr>
				            <td>
				                <a href="{!! route('patrimonials.edit', [$patrimonial->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				            </td>
				            <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{!! $patrimonial->code !!}</a></td>
				            <td>{{ $patrimonial->patrimonial_type->code }}</td>
				            <td>{{ $patrimonial->description }}</td>
				            <td>{{ $patrimonial->purchase_process }}</td>
				            <td><a href="{!! route('providers.show', [$patrimonial->provider_id]) !!}">{{ $patrimonial->provider->cnpj_mask }}</a></td>
				            <td>{{ $patrimonial->invoice_date->format('d/m/Y') }}</td>
				            <td>R$ {{ number_format($patrimonial->purchase_value, 2,",",".") }}</td>
				            <td>{{ $patrimonial->invoice }}</td>
				            <td><a href="{!! route('management_units.show', [$patrimonial->management_unit_id]) !!}">{{ $patrimonial->affiliated_society->code }}</a></td>
				            <td>{{ $patrimonial->patrimonial_sector->description }}</td>
				            <td>{{ $patrimonial->patrimonial_sub_sector->description }}</td>
				            <td>{{ $patrimonial->patrimonial_status->description }}</td>
				            <td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
				            <td>{{ number_format($patrimonial->useful_life_years, 1,",",".") }} anos</td>
						    <td>{{ $patrimonial->comments }}</td>
				            <td>
				            	<a href="javascript:;" onclick="onDestroy('{!! route('patrimonials.destroy', [$patrimonial->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection