	<div class="row">
	    <div class="col-md-12">
	      	<div class="box box-info collapsed-box">
		        <div class="box-header with-border">
		          	<h3 class="box-title">MOVIMENTAÇÕES</h3>
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
									<th>Unid.Gestora</th>
									<th>Setor</th>
									<th>Sub-setor</th>
									<th>Responsável</th>
									<th>Situação</th>
									<th>Data Início</th>
									<th>Data Fim</th>						
								</tr>
							</thead>
							<tbody>
								@foreach($patrimonial_movements as $patrimonial_movement)
									<tr>
										<td>{{ $patrimonial->management_unit->code }} - {{ $patrimonial_movement->management_unit->description }}</td>
										<td>{{ $patrimonial_movement->company_sector->description }}</td>
										<td>{{ $patrimonial_movement->company_sub_sector->description }}</td>
										<td>{{ $patrimonial_movement->employee->name }}</td>
										<td>{{ $patrimonial_movement->patrimonial_status->description }}</td>
										<td>{{ $patrimonial_movement->date_start->format('d/m/Y') }}</td>
										<td>
											@if($patrimonial_movement->date_end)
			                    				{{ $patrimonial_movement->date_end->format('d/m/Y') }}
			                  				@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
