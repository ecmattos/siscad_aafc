<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title"><b>PATRIMÔNIOS</b></h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
        <thead>
          <tr>
            <th data-field="invoice" data-sortable="true" data-align="right">NF</th>
            <th data-field="code" data-sortable="true" data-align="right">Código</th>
            <th data-field="description" data-sortable="true">Descrição</th>
            <th data-field="management_unit_id" data-sortable="true">Unid.Gestora</th>
            <th data-field="company_sector_id" data-sortable="true">Setor</th>
            <th data-field="company_sub_sector_id" data-sortable="true">Sub-setor</th>
            <th data-field="patrimonial_status_id" data-align="left">Situação</th>
            <th data-field="patrimonial_status_date" data-align="left">Data</th>
          </tr>
        </thead>
        <tbody>
          @foreach($provider_patrimonials as $patrimonial)
            <tr>
              <td>{{ $patrimonial->invoice }}</td>
              <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{{ $patrimonial->code }}</a></td>
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
