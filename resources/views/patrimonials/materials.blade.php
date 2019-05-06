	<div class="row">
	    <div class="col-md-12">
	      	<div class="box box-info collapsed-box">
		        <div class="box-header with-border">
		          	<h3 class="box-title">MATERIAIS</h3>
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
								          	<a href="{!! route('patrimonial_materials.create', ['id' => $patrimonial->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>  
							        	@endif
									</th>
									<th width="1%" class="text-right">Lanc</th>
									<th width="1%" class="text-center">Tipo</th>
									<th width="1%" class="text-left">Data Interv</th>
									<th width="1%" class="text-right">Código</th>
									<th align="left">Descrição</th>
									<th width="10%" class="text-right">Qte</th>
									<th width="12%" class="text-left">Fornecedor</th>
									<th width="1%" class="text-right">Data Nota Fiscal</th>
									<th width="10%" class="text-right">Nota Fiscal</th>
									<th width="1%" class="text-right">Valor Compra</th>
									<th width="1%" class="text-center">#</th>						
								</tr>
							</thead>
							<tbody>
								@foreach($patrimonial_materials as $patrimonial_material)
									<tr>
										<td>
											@if($patrimonial->patrimonial_status_id!=5)
			           							<a href="{!! route('patrimonial_materials.edit', [$patrimonial_material->id]) !!}"type="button" class="round round-sm hollow blue" rel="tooltip" title="Alterar"><i class="fa fa-edit"></i></a>
			          						@endif
			       						</td>
										<td>{{ $patrimonial_material->id }}</td>
										<td>{{ $patrimonial_material->patrimonial_intervention_type->code }}</td>
										<td>{{ $patrimonial_material->intervention_date->format('d/m/Y') }}</td>
										<td><a href="{!! route('materials.show', [$patrimonial_material->material_id]) !!}">{{ $patrimonial_material->material->code }}</a></td>
										<td>{{ $patrimonial_material->material->description }}</td>
										<td>{{ number_format($patrimonial_material->purchase_qty, 2,",",".") }} {{ $patrimonial_material->material->material_unit->code }}</td>
										<td><a href="{!! route('providers.show', [$patrimonial_material->provider_id]) !!}">{{ $patrimonial_material->provider->cnpj_mask }}</a></td>
										<td>{{ $patrimonial_material->invoice_date->format('d/m/Y') }}</td>
										<td>{{ $patrimonial_material->invoice }}</td>
										<td>R$ {{ number_format($patrimonial_material->purchase_value, 2,",",".") }}</td>
										<td>
											@if($patrimonial->patrimonial_status_id!=5)
			           							<a href="{!! route('patrimonial_materials.edit', [$patrimonial_material->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
			          						@endif 
										</td>							
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th class="text-right" colspan="10">Total</th>
									<th class="text-right">R$ {{ number_format($total_materials, 2,",",".") }}</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>