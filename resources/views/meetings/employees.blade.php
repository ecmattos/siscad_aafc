
   	<div class="box box-info collapsed-box" id="meeting_employees_box">
      <div class="box-header with-border">
       	<h3 class="box-title">FUNCIONÁRIOS</h3>
				<div class="box-tools pull-right">
					Totais: Previstos <span data-toggle="tooltip" title="3 New Messages" class="badge bg-orange">{{ $meeting_employees_expected_qty_total }}</span>
					|
					Confirmados <span data-toggle="tooltip" title="3 New Messages" class="badge bg-green">{{ $meeting_employees_confirmed_qty_total }}</span>
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div>
      </div>

			<div class="box-body"><!-- Main content -->
				<table class="display dataTable" cellspacing="0" width="100%" id="meetting_employees_table"> 
					<thead>
						<tr>
							@if ($meeting->meeting_status_id != 3)
								<th class="no-sort">
									<a href="{!! route('meeting_employees.create', ['id' => $meeting->id]) !!}" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
								</th>
							@endif
							<th>Matrícula</th>
							<th>Nome</th>
							<th>Fone</th>
							<th>Celular</th>
							<th>Previsto</th>
							<th>Acomp</th>
							<th>Acomp Extra</th>
							<th>Confirmado</th>
							<th>Acomp</th>
							<th>Acomp Extra</th>
							<th>Obs</th>
							@if ($meeting->meeting_status_id != 3)
								<th>#</th>
							@endif		
						</tr>
					</thead>

					<tfoot>
						<tr>
							@if ($meeting->meeting_status_id != 3)
								<th></th>
							@endif
							<th></th>
							<th></th>
							<th></th>
							<th class="text-right">Totais</th>
							<th class="text-center">{{ $meeting_employees_expected_qty }}</th>
							<th class="text-center">{{ $meeting_employees_expected_qty_companion }}</th>
							<th class="text-center">{{ $meeting_employees_expected_qty_companion_extra }}</th>
							<th class="text-center">{{ $meeting_employees_confirmed_qty }}</th>
							<th class="text-center">{{ $meeting_employees_confirmed_qty_companion }}</th>
							<th class="text-center">{{ $meeting_employees_confirmed_qty_companion_extra }}</th>
							<th></th>
							@if ($meeting->meeting_status_id != 3)
								<th></th>
							@endif		
						</tr>
					</tfoot>
							
					<tbody>
						@foreach($meeting_employees as $meeting_employee)
							<tr>
								@if ($meeting->meeting_status_id != 3)
									<td width="1%" class="text-center">
										<a href="{!! route('meeting_employees.edit', ['id' => $meeting_employee->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
									</td>
								@endif
								<td class="text-right"><a href="{!! route('employees.show', ['id' => $meeting_employee->employee->id]) !!}">{{ $meeting_employee->employee->code }}</a></td>
								<td>{{ $meeting_employee->employee->name }}</td>
								<td class="text-center">{{ $meeting_employee->employee->phone_mask }}</td>
								<td class="text-center">{{ $meeting_employee->employee->mobile_mask }}</td>
								<td class="text-center">
									@if ($meeting_employee->expected_qty == 0)
										<a href="#" type="button" class="btn btn-xs btn-warning" rel="tooltip" title="Não"><i class="fa fa-thumbs-down"></i></a>
									@else
										<a href="#" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Sim"><i class="fa fa-thumbs-up"></i></a>
									@endif
								</td>
								<td class="text-center">{{ $meeting_employee->expected_qty_companion }}</td>
								<td class="text-center">{{ $meeting_employee->expected_qty_companion_extra }}</td>
								<td class="text-center">
									@if ($meeting_employee->confirmed_qty == 0)
										<a href="#" type="button" class="btn btn-xs btn-danger" rel="tooltip" title="Não"><i class="fa fa-thumbs-down"></i></a>
									@else
										<a href="#" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Sim"><i class="fa fa-thumbs-up"></i></a>
									@endif
								</td>
								<td class="text-center">{{ $meeting_employee->confirmed_qty_companion }}</td>
								<td class="text-center">{{ $meeting_employee->confirmed_qty_companion_extra }}</td>
								<td class="text-center">{{ $meeting_employee->comments }}</td>
								@if ($meeting->meeting_status_id != 3)
									<td width="1%">
										<a href="javascript:;" onclick="onDestroy('{!! route('meeting_employees.destroy', ['id' => $meeting_employee->id]) !!}')" id="link_delete" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
									</td>
								@endif
					    </tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		@section('js')
			<script type="text/javascript">
			//	$('#table').DataTable( {
			//		"columnDefs": [
			//				{ "orderable": false, "targets": 2 }
			//			]
			//			});
			</script>
		@endsection
