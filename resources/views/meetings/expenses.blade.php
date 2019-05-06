<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">DESPESAS (com acompanhantes)</h3>
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
                    <th class="text-center" width="25%">DESCRIÇÃO</th>

                    <th class="text-center">SÓCIOS</th>
                    <th class="text-center">PARCEIROS</th>
                    <th class="text-center">FUNCIONÁRIOS</th>

                    <th class="text-center">TOTAIS</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" width="25%">Alimentação</td>
                        <td class="text-right">{{ number_format($meeting->expenses_members_food, 2,",",".") }}</td>
                        <td class="text-right">{{ number_format($meeting->expenses_partners_food, 2,",",".") }}</td>
                        <td class="text-right">{{ number_format($meeting->expenses_employees_food, 2,",",".") }}</td>

                        <td class="text-right"><b>{{ number_format(($meeting->expenses_members_food + $meeting->expenses_partners_food + $meeting->expenses_employees_food), 2,",",".") }}</b></td>
                    </tr>

                    <tr>
                        <td class="text-center">Hospedagem</td>
                        <td class="text-right">{{ number_format($meeting->expenses_members_accommodation, 2,",",".") }}</td>
                        <td class="text-right">{{ number_format($meeting->expenses_partners_accommodation, 2,",",".") }}</td>
                        <td class="text-right">{{ number_format($meeting->expenses_employees_accommodation, 2,",",".") }}</td>

                        <td class="text-right"><b>{{ number_format(($meeting->expenses_members_accommodation + $meeting->expenses_partners_accommodation + $meeting->expenses_employees_accommodation), 2,",",".") }}</b></td>
                    </tr>
                        
                    <tr>
                        <td class="text-center">Transporte</td>
                        <td class="text-right">{{ number_format($meeting->expenses_members_transport, 2,",",".") }}</td>
                        <td class="text-right">{{ number_format($meeting->expenses_partners_transport, 2,",",".") }}</td>
                        <td class="text-right">{{ number_format($meeting->expenses_employees_transport, 2,",",".") }}</td>

                        <td class="text-right"><b>{{ number_format(($meeting->expenses_members_transport + $meeting->expenses_partners_transport + $meeting->expenses_employees_transport), 2,",",".") }}</b></td>
                    </tr>

                    <tr>
                        <td class="text-center"><b>TOTAIS</b></td>
                        <td class="text-right"><b>{{ number_format(($meeting->expenses_members_food + $meeting->expenses_members_accommodation + $meeting->expenses_members_transport), 2,",",".") }}</b></td>
                        <td class="text-right"><b>{{ number_format(($meeting->expenses_partners_food + $meeting->expenses_partners_accommodation + $meeting->expenses_partners_transport), 2,",",".") }}</b></td>
                        <td class="text-right"><b>{{ number_format(($meeting->expenses_employees_food + $meeting->expenses_employees_accommodation + $meeting->expenses_employees_transport), 2,",",".") }}</b></td>

                        <td class="text-right"><b>{{ number_format(($meeting->expenses_members_food + $meeting->expenses_members_accommodation + $meeting->expenses_members_transport + $meeting->expenses_partners_food + $meeting->expenses_partners_accommodation + $meeting->expenses_partners_transport + $meeting->expenses_employees_food + $meeting->expenses_employees_accommodation + $meeting->expenses_employees_transport), 2,",",".") }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
       