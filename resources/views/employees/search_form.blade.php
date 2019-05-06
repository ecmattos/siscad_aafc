   	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body">
		            	<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
							<label for="code" class="col-sm-2 control-label">Matrícula:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::text('srch_employee_code', old('srch_employee_code'), ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
							<label for="cpf" class="col-sm-2 control-label">CPF:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::text('srch_employee_cpf', old('srch_employee_cpf'), ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name" class="col-sm-2 control-label">Nome:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::text('srch_employee_name', old('srch_employee_name'), ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="gender_id" class="col-sm-2 control-label">Sexo:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::select('srch_employee_gender_id', $genders, old('srch_employee_gender_id'), ['id'=>'genders_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="region_id" class="col-sm-2 control-label">Região:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::select('srch_employee_region_id', $regions, old('srch_employee_region_id'), ['id'=>'regions_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::select('srch_employee_city_id', $cities, old('srch_employee_city_id'), ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="employee_status_id" class="col-sm-2 control-label">Situação:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::select('srch_employee_status_id', $employee_statuses, old('srch_employee_status_id'), ['id'=>'employee_statuses_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="employee_status_reason_id" class="col-sm-2 control-label">Motivo:</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::select('srch_employee_status_reason_id', $employee_status_reasons, old('srch_employee_status_reason_id'), ['id'=>'employee_status_reasons_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>
					</div>

					<div class="box-footer">
			            <label for="submit_buttons" class="col-sm-2 control-label"></label>
			        	    <button type="submit" class="btn btn-flat btn-success">Confirmar <i class="fa fa-check"></i></button>
			            	<a href="{{ URL::previous() }}" class="btn btn-flat btn-danger">Cancelar <i class="fa fa-times"></i></a>
		            </div>
          		</div>          
          	</div>
    </div>
