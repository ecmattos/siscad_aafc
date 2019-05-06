<div class="box box-info">
	<div class="box-header with-border">
    	<h3 class="box-title">PATRIMÔNIOS</h3>
        <div class="box-tools pull-right">
			<a href="{!! route('employees.rpt_patrimonials', [$employee->id]) !!}" type="button" class="round round-sm hollow primary" rel="tooltip" title="Imprimir"><i class="fa fa-print"></i></a>
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
			            <th>Código</th>
			            <th>Descrição</th>
			            <th>Unid.Gestora</th>
			            <th>Setor</th>
			            <th>Sub-setor</th>
			            <th>Situação</th>
			            <th>Data</th>
		          	</tr>
		        </thead>
		        <tbody>
		          	@foreach($employee_patrimonials as $patrimonial)
		            	<tr>
			              	<td class="text-right"><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{{ $patrimonial->code }}</a></td>
			              	<td>{{ $patrimonial->description }}</td>
			              	<td>{{ $patrimonial->management_unit->code }}</td>
			              	<td>{{ $patrimonial->company_sector->description }}</td>
			              	<td>{{ $patrimonial->company_sub_sector->description }}</td>
			              	<td>{{ $patrimonial->patrimonial_status->description }}</td>
			              	<td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
		            	</tr>
		          	@endforeach
		        </tbody>
			</table>
		</div>
	</div>
</div>