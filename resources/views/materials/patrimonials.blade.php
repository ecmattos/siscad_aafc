<div class="panel panel-warning">
	<div class="panel-heading">
		<h3 class="panel-title">
			<b>PATRIMÔNIOS</b>
		</h3>
		<span class="pull-right panel-clickable"><i class="fa fa-chevron-up"></i></span>
	</div>
	<div class="panel-body" style="display:none;">
		<div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-field="code" data-sortable="true" data-align="right">Código</th>
						<th data-field="code_old" data-sortable="true" data-align="right">Cód.Antigo</th>
						<th data-field="patrimonial_type_id" data-sortable="true">Tipo</th>
						<th data-field="patrimonial_sub_type_id" data-sortable="true">Sub-tipo</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-field="region_id" data-sortable="true">Filial</th>
						<th data-field="management_unit_id" data-sortable="true">Unid.Gestora</th>
						<th data-field="patrimonial_sector_id" data-sortable="true">Setor</th>
						<th data-field="patrimonial_sub_sector_id" data-sortable="true">Sub-setor</th>
						<th data-field="patrimonial_status_id" data-align="left">Situação</th>
						<th data-field="patrimonial_status_date">Dt Situação</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($material_patrimonials as $material_patrimonial)
				        <tr>
				            <td><a href="{!! route('patrimonials.show', [$material_patrimonial->patrimonial_id]) !!}">{{ $material_patrimonial->patrimonial->code }}</a></td>
				            <td>{{ $material_patrimonial->patrimonial->code_old }}</td>
				            <td>{{ $material_patrimonial->patrimonial->patrimonial_type->code }}</td>
				            <td>{{ $material_patrimonial->patrimonial->patrimonial_sub_type->code }}</td>
				            <td>{{ $material_patrimonial->patrimonial->description }}</td>
				            <td>{{ $material_patrimonial->patrimonial->management_unit->region->description }}</td>
				             <td><a href="{!! route('management_units.show', [$material_patrimonial->patrimonial->management_unit_id]) !!}" title="{{ $material_patrimonial->patrimonial->management_unit->description }}">{{ $material_patrimonial->patrimonial->management_unit->code }}</a></td>
				            <td>{{ $material_patrimonial->patrimonial->patrimonial_sector->description }}</td>
				            <td>{{ $material_patrimonial->patrimonial->patrimonial_sub_sector->description }}</td>
				            <td>{{ $material_patrimonial->patrimonial->patrimonial_status->description }}</td>
				            <td>{{ $material_patrimonial->patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
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