<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title"><b>ATIVOS</b></h3>
		<span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-show-footer="false">
			   	<thead>
			   		<tr>
						<th data-field="patrimonial_sector_id" data-sortable="true">Setor</th>
						<th data-field="patrimonial_sub_sector_id" data-sortable="true">Sub-setor</th>
						<th data-field="patrimonial_id" data-sortable="true" data-align="right">Código</th>
						<th data-field="patrimonial_type_id" data-sortable="true">Tipo</th>
						<th data-field="description" data-sortable="true" data-align="left">Descrição</th>
						<th data-field="patrimonial_status_date" data-sortable="true">Data</th>
						<th data-field="patrimonial_status_is" data-sortable="true">Situação</th>
					</tr>
				</thead>
				<tbody>
					@foreach($patrimonials as $patrimonial)
						<tr>
							<td>{{ $patrimonial->patrimonial_sector->description }}</td>
							<td>{{ $patrimonial->patrimonial_sub_sector->description }}</td>
							<td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{!! $patrimonial->code !!}</a></td>
							<td>{{ $patrimonial->patrimonial_type->description }}</td>
							<td>{{ $patrimonial->description }}</td>
							<td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
							<td>{{ $patrimonial->patrimonial_status->description }} ({{ $patrimonial->patrimonial_status_date->diffForHumans() }})</td>
						</tr>
					@endforeach
				</tbody>
		</table>
		</div>
	</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
		$(document).on('click', '.panel-heading span.panel-clickable', function(e)
			{
    			var $this = $(this);
				if(!$this.hasClass('panel-collapsed')) 
					{
						$this.parents('.panel').find('.panel-body').slideUp();
						$this.addClass('panel-collapsed');
						$this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
					} 
				else 
					{
						$this.parents('.panel').find('.panel-body').slideDown();
						$this.removeClass('panel-collapsed');
						$this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
					}
			})
	</script>
@endsection