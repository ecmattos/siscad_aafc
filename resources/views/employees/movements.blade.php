        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">MOVIMENTAÇÕES</h3>
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
			   		<tr>
						<th width="1%" class="text-center">
							@if($employee->employee_status_id=='2')
					          	<a href="{!! route('employees.start_movement', ['id' => $employee->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Entrada"><i class="fa fa-file-o"></i></a> 
				        	@else
				        		#
				        	@endif
				        </th>
        				<th>Cargo</th>
						<th>Função</th>
						<th>Unid.Gestora</th>
						<th>Setor</th>
						<th>Sub-setor</th>
						<th>Entrada</th>
						<th>Saída</th>
						<th>Duração</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($employee_movements as $employee_movement)
						<tr>
							<td>
								<a href="{!! route('employees.edit_movement', ['id' => $employee_movement->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
							</td>
							<td>{{ $employee_movement->company_position->description }}</td>
							<td>{{ $employee_movement->company_responsibility->description }}</td>
							<td><a href="{!! route('management_units.show', [$employee_movement->management_unit_id]) !!}">{{ $employee_movement->management_unit->code }}</a></td>
							<td>{{ $employee_movement->company_sector->description }}</td>
							<td>{{ $employee_movement->company_sub_sector->description }}</td>
							<td>{{ $employee_movement->date_start->format('d/m/Y') }}</td>
							<td>
								@if($employee_movement->date_end==Null)
					          		<a href="{!! route('employees.end_movement_edit', ['id' => $employee_movement->id]) !!}" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Saída"><i class="fa fa-file-o"></i></a> 
					        	@else
					        		{{ $employee_movement->date_end->format('d/m/Y') }}
					        	@endif
							</td>
							<td>
								@if($employee_movement->date_end!=Null)
					          		{{ $employee_movement->date_start->diff($employee_movement->date_end)->format('%y anos, %m meses e %d dias') }} 
					        	@else
					        		{{ $employee_movement->date_start->diff(\Carbon\Carbon::now())->format('%y anos, %m meses e %d dias') }} 
					        	@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
