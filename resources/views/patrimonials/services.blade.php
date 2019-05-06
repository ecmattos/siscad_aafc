	<div class="row">
	    <div class="col-md-12">
	      	<div class="box box-info collapsed-box">
		        <div class="box-header with-border">
		          	<h3 class="box-title">SERVIÇOS</h3>
		          	<div class="box-tools pull-right">
		            	<button type="button" class="btn btn-box-tool" data-widget="collapse">
		              		<i class="fa fa-plus"></i>
		            	</button>
		          	</div>
		        </div>
		        <div style="display: none;" class="box-body">
		        	<div class="table-responsive">
		              	<table class="table table-bordered table-striped">
			                <thead>
						   		<tr>
						   			<th width="1%" class="text-center">
						@if($patrimonial->patrimonial_status_id!=5)
				          	<a href="{!! route('patrimonial_services.create', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>  
			        	@endif
        				</th>
						<th width="1%" class="text-right">Lanc</th>
						<th width="1%" class="text-center">Tipo</th>
						<th width="1%" class="text-left">Data Interv</th>
						<th width="1%" class="text-right"="code">Código</th>
						<th class="text-left" data-field="service_id">Descrição</th>
						<th width="10%" class="text-right">Qte</th>
						<th width="12%" class="text-left">Fornecedor</th>
						<th width="1%" class="text-right"invoice_date">Data Nota Fiscal</th>
						<th width="10%" class="text-right"></th>
						<th width="1%" class="text-right"></th>
						<th width="1%" class="text-center">#</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonial_services as $patrimonial_service)
						<tr>
							<td>
								@if($patrimonial->patrimonial_status_id!=5)
           							<a href="{!! route('patrimonial_services.edit', [$patrimonial_service->id]) !!}"type="button" class="round round-sm hollow blue" rel="tooltip" title="Alterar"><i class="fa fa-edit"></i></a>
          						@endif 
       						</td>
							<td>{{ $patrimonial_service->id }}</td>
							<td>{{ $patrimonial_service->patrimonial_intervention_type->code }}</td>
							<td>{{ $patrimonial_service->intervention_date->format('d/m/Y') }}</td>
							<td><a href="{!! route('services.show', [$patrimonial_service->service_id]) !!}">{{ $patrimonial_service->service->code }}</a></td>
							<td>{{ $patrimonial_service->service->description }}</td>
							<td>{{ number_format($patrimonial_service->purchase_qty, 2,",",".") }} {{ $patrimonial_service->service->unit }}</td>
							<td><a href="{!! route('providers.show', [$patrimonial_service->provider_id]) !!}">{{ $patrimonial_service->provider->cnpj_mask }}</a></td>
							<td>{{ $patrimonial_service->invoice_date->format('d/m/Y') }}</td>
							<td>{{ $patrimonial_service->invoice }}</td>
							<td>R$ {{ number_format($patrimonial_service->purchase_value, 2,",",".") }}</td>
							<td>
								@if($patrimonial->patrimonial_status_id!=5)
           							<a href="{!! route('patrimonial_services.edit', [$patrimonial_service->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
          						@endif 
							</td>
							
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th class="text-right" colspan="10">Total</th>
						<th class="text-right">R$ {{ number_format($total_services, 2,",",".") }}</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
