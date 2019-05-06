<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $meeting->id }} - {{ $meeting->description }}</h3>
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
                </thead>
                <tbody>
                    <tr>
                        <td class="text-right" width="25%">Data</td>
                        <td class="text-left">{{ $meeting->date->format('d/m/Y') }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">Tipo</td>
                        <td class="text-left">{{ $meeting->meeting_type->description }}</td>
                    </tr>
                        
                    <tr>
                        <td class="text-right">Cidade/UF</td>
                        <td class="text-left">{{ $meeting->city->description }}/{{ $meeting->city->state->code }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">Região</td>
                        <td class="text-left">{{ $meeting->city->region->description }}</td>
                    </tr>

                    <tr>
                        <td class="text-right">Situação</td>
                        <td class="text-left">{{ $meeting->meeting_status->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
       