<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">{{ $employee->name }}</h3>
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
            <tr>
              <td class="text-right" width="25%">Matrícula</td>
              <td class="text-left">{{ $employee->code }}</td>
            </tr>

            <tr>
              <td class="text-right">CPF</td>
              <td class="text-left">{{ $employee->cpf_mask }}</td>
            </tr>
                
            <tr>
              <td class="text-right">Nascimento</td>
              <td class="text-left">
                @if($employee->birthday!=null)
                  {{ $employee->birthday->format('d/m/Y') }} ({{ $employee->birthday->age }} anos)
                @endif
              </td>
            </tr>

            <tr>
              <td class="text-right">Endereço</td>
              <td class="text-left">{{ $employee->address }}</td>
            </tr>

            <tr>
              <td class="text-right">Bairro</td>
              <td class="text-left">{{ $employee->neighborhood }}</td>
            </tr>

            <tr>
              <td class="text-right">Cidade</td>
              <td class="text-left">{{ $employee->city->description }} / {{ $employee->city->state->code }}</td>
            </tr>

            <tr>
              <td class="text-right">CEP</td>
              <td class="text-left">{{ $employee->zip_code_mask }}</td>
            </tr>

            <tr>
              <td class="text-right">Telefone</td>
              <td class="text-left">{{ $employee->phone_mask }}</td>
            </tr>

            <tr>
              <td class="text-right">Celular</td>
              <td class="text-left">{{ $employee->mobile_mask }}</td>
            </tr>

            <tr>
              <td class="text-right">Cargo</td>
              <td class="text-left">{{ $employee->company_position->description }}</td>
            </tr>

            <tr>
              <td class="text-right">Função</td>
              <td class="text-left">{{ $employee->company_responsibility->description }}</td>
            </tr>

            <tr>
              <td class="text-right">Unid.Gestora</td>
              <td class="text-left">{{ $employee->management_unit->code }}</td>
            </tr>

            <tr>
              <td class="text-right">Setor</td>
              <td class="text-left">{{ $employee->company_sector->description }}</td>
            </tr>

            <tr>
              <td class="text-right">Sub-setor</td>
              <td class="text-left">{{ $employee->company_sub_sector->description }}</td>
            </tr>

            <tr>
              <td class="text-right">Situação</td>
              <td class="text-left">{{ $employee->employee_status->description }} desde {{ $employee->date_status->format('d/m/Y') }}</td>
            </tr>

            <tr>
              <td class="text-right">Observações</td>
              <td class="text-left">{{ $employee->comments }}</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
  