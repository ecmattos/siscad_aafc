
   	<div class="box box-info collapsed-box" id="meeting_partners_box">
      <div class="box-header with-border">
       	<h3 class="box-title">PARCEIROS</h3>
				<div class="box-tools pull-right">
					Totais: Previstos <span data-toggle="tooltip" title="3 New Messages" class="badge bg-orange">{{ $meeting_partners_expected_qty_total }}</span>
					|
					Confirmados <span data-toggle="tooltip" title="3 New Messages" class="badge bg-green">{{ $meeting_partners_confirmed_qty_total }}</span>
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div>
      </div>

			<div class="box-body"><!-- Main content -->
				<table class="display dataTable" cellspacing="0" width="100%" id="meetting_partners_table"> 
					<thead>
						<tr>
							@if ($meeting->meeting_status_id != 3)
								<th class="no-sort">
									<a href="{!! route('meeting_partners.create', ['id' => $meeting->id]) !!}" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
								</th>
							@endif
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
							<th class="text-right">Totais</th>
							<th class="text-center">{{ $meeting_partners_expected_qty }}</th>
							<th class="text-center">{{ $meeting_partners_expected_qty_companion }}</th>
							<th class="text-center">{{ $meeting_partners_expected_qty_companion_extra }}</th>
							<th class="text-center">{{ $meeting_partners_confirmed_qty }}</th>
							<th class="text-center">{{ $meeting_partners_confirmed_qty_companion }}</th>
							<th class="text-center">{{ $meeting_partners_confirmed_qty_companion_extra }}</th>
							<th></th>
							@if ($meeting->meeting_status_id != 3)
								<th></th>
							@endif		
						</tr>
					</tfoot>
							
					<tbody>
						@foreach($meeting_partners as $meeting_partner)
							<tr>
								@if ($meeting->meeting_status_id != 3)
									<td width="1%" class="text-center">
										<a href="{!! route('meeting_partners.edit', ['id' => $meeting_partner->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
									</td>
								@endif
								<td><a href="{!! route('partners.show', ['id' => $meeting_partner->partner->id]) !!}">{{ $meeting_partner->partner->name }}</a></td></td>
								<td class="text-center">{{ $meeting_partner->partner->phone_mask }}</td>
								<td class="text-center">{{ $meeting_partner->partner->mobile_mask }}</td>
								<td class="text-center">
									@if ($meeting_partner->expected_qty == 0)
										<a href="#" type="button" class="btn btn-xs btn-warning" rel="tooltip" title="Não"><i class="fa fa-thumbs-down"></i></a>
									@else
										<a href="#" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Sim"><i class="fa fa-thumbs-up"></i></a>
									@endif
								</td>
								<td class="text-center">{{ $meeting_partner->expected_qty_companion }}</td>
								<td class="text-center">{{ $meeting_partner->expected_qty_companion_extra }}</td>
								<td class="text-center">
									@if ($meeting_partner->confirmed_qty == 0)
										<a href="#" type="button" class="btn btn-xs btn-danger" rel="tooltip" title="Não"><i class="fa fa-thumbs-down"></i></a>
									@else
										<a href="#" type="button" class="btn btn-xs btn-success" rel="tooltip" title="Sim"><i class="fa fa-thumbs-up"></i></a>
									@endif
								</td>
								<td class="text-center">{{ $meeting_partner->confirmed_qty_companion }}</td>
								<td class="text-center">{{ $meeting_partner->confirmed_qty_companion_extra }}</td>
								<td class="text-center">{{ $meeting_partner->comments }}</td>
								@if ($meeting->meeting_status_id != 3)
									<td width="1%">
										<a href="javascript:;" onclick="onDestroy('{!! route('meeting_partners.destroy', ['id' => $meeting_partner->id]) !!}')" id="link_delete" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
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
