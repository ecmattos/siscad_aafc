<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-sm-2 control-label">Matricula:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'10']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
	<label for="cpf" class="col-sm-2 control-label">CPF:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('cpf', $value = null, ['class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label for="name" class="col-sm-2 control-label">Nome completo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('name', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('gender_id') ? 'has-error' : '' }}">
	<label for="gender_id" class="col-sm-2 control-label">Sexo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('gender_id', $genders, $value = null, ['id'=>'genders_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	<label for="email" class="col-sm-2 control-label">e-mail:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			{!! Form::input('email', 'email', $value = null, ['class'=>'form-control', 'maxlength'=>'40']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	<label for="address" class="col-sm-2 control-label">Endereço:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('address', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
	<label for="neighborhood" class="col-sm-2 control-label">Bairro:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('neighborhood', $value = null, ['class'=>'form-control', 'maxlength'=>'30']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('city_id', $cities, $value = null, ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
	<label for="zip_code" class="col-sm-2 control-label">CEP:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('zip_code', $value = null, ['class'=>'form-control', 'maxlength'=>'9']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
	<label for="phone" class="col-sm-2 control-label">Telefone:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
			{!! Form::text('phone', $value = null, ['id'=>'phone', 'class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }} ">
	<label for="mobile" class="col-sm-2 control-label">Celular:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
			{!! Form::text('mobile', $value = null, ['id'=>'mobile', 'class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('birthday') ? 'has-error' : '' }}">
	<label for="birthday" class="col-sm-2 control-label">Nascimento:</label>
	<div class="col-sm-8">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('birthday', isset($employee->birthday) ? $employee->birthday->format('d/m/Y') : null, ['id'=>'birthday_datepicker', 'class'=>'form-control datepicker date_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('management_unit_id') ? 'has-error' : '' }}">
	<label for="management_unit_id" class="col-sm-2 control-label">Unid.Gestora:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>


<div class="form-group {{ $errors->has('company_sector_id') ? 'has-error' : '' }}">
	<label for="company_sector_id" class="col-sm-2 control-label">Setor:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_sector_id', $company_sectors, $value = null, ['id'=>'company_sectors_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('company_sub_sector_id') ? 'has-error' : '' }}">
	<label for="company_sub_sector_id" class="col-sm-2 control-label">Sub-setor:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_sub_sector_id', $company_sub_sectors, $value = null, ['id'=>'company_sub_sectors_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('company_position_id') ? 'has-error' : '' }}">
	<label for="company_position_id" class="col-sm-2 control-label">Cargo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_position_id', $company_positions, $value = null, ['id'=>'company_positions_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('company_responsibility_id') ? 'has-error' : '' }}">
	<label for="company_responsibility_id" class="col-sm-2 control-label">Função:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_responsibility_id', $company_responsibilities, $value = null, ['id'=>'company_responsibilities_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('date_start') ? 'has-error' : '' }}">
	<label for="date_start" class="col-sm-2 control-label">Entrada:</label>
	<div class="col-sm-8">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('date_start', isset($employee->date_start) ? $employee->date_start->format('d/m/Y') : null, ['id'=>'date_start_datepicker', 'class'=>'form-control datepicker date_mask']) !!}
		</div>
	</div>
</div>


<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
	<label for="comments" class="col-sm-2 control-label">Observações:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('comments', $value = null, ['class'=>'form-control', 'maxlength'=>'200']) !!}
		</div>
	</div>
</div>
