<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title"><b>LOCALIZAÇÃO ATUAL</b></h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        </thead>
        <tbody>
          <tr>
            <td class="text-right" width="25%">Unid.Gestora</td>
            <td class="text-left"><a href="{!! route('management_units.show', [$patrimonial->management_unit_id]) !!}">{{ $patrimonial->management_unit->code }}</a> - {{ $patrimonial->management_unit->description }}</td>
          </tr>
              
          <tr>
            <td class="text-right">Setor</td>
            <td class="text-left">{{ $patrimonial->patrimonial_sector->description }}</td>
          </tr>

          <tr>
            <td class="text-right">Sub-Setor</td>
            <td class="text-left">{{ $patrimonial->patrimonial_sub_sector->description }}</td>
          </tr>

          <tr>
            <td class="text-right">Situação</td>
            <td class="text-left">{{ $patrimonial->patrimonial_status->description }} ({{ $patrimonial->patrimonial_status_date->diffForHumans() }})</td>
          </tr>

          <tr>
            <td class="text-right">Data situação</td>
            <td class="text-left">{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>