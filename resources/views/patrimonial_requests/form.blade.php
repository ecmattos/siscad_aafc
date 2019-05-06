<div class="panel panel-warning">
    <div class="panel-heading">
        <b>ORIGEM</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
              	<div class="form-group {{ $errors->has('from_employee_id') ? 'has-error' : '' }}">
					<label for="from_employee_id" class="col-sm-2 control-label">Responsável:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('from_employee_id', $employees, $value = null, ['id'=>'employees_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading">
        <b>DESTINO</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
				<div class="form-group {{ $errors->has('to_management_unit_id') ? 'has-error' : '' }}">
					<label for="to_management_unit_id" class="col-sm-2 control-label">Unid.Gestora:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('to_management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('to_company_sector_id') ? 'has-error' : '' }}">
					<label for="to_company_sector_id" class="col-sm-2 control-label">Setor:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('to_company_sector_id', $company_sectors, $value = null, ['id'=>'company_sectors_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('to_company_sub_sector_id') ? 'has-error' : '' }}">
					<label for="to_company_sub_sector_id" class="col-sm-2 control-label">Sub-setor:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('to_company_sub_sector_id', $company_sub_sectors, $value = null, ['id'=>'company_sub_sectors_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('to_employee_id') ? 'has-error' : '' }}">
					<label for="to_employee_id" class="col-sm-2 control-label">Responsável:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('to_employee_id', $employees, $value = null, ['id'=>'employees_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('to_patrimonial_status_id') ? 'has-error' : '' }}">
					<label for="to_patrimonial_status_id" class="col-sm-2 control-label">Situação:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('to_patrimonial_status_id', $patrimonial_statuses, $value = null, ['id'=>'patrimonial_statuses_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>

				<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
					<label for="comments" class="col-sm-2 control-label">Justificativa:</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::text('comments', $value = null, ['class'=>'form-control', 'maxlength'=>'150']) !!}
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
