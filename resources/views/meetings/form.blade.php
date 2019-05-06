<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
	<label for="date" class="col-sm-2 control-label">Data:</label>
	<div class="col-sm-8">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('date', isset($meeting->date) ? $meeting->date->format('d/m/Y') : null, ['id'=>'date_datepicker', 'class'=>'form-control datepicker_no_restrict date_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-sm-2 control-label">Descrição:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('meeting_type_id') ? 'has-error' : '' }}">
	<label for="meeting_type_id" class="col-sm-2 control-label">Tipo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('meeting_type_id', $meeting_types, $value = null, ['id'=>'meeting_types_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
			{!! Form::select('city_id', $cities, $value = null, ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<?php
	if ($form_method == "put")
	{
	?>
		<div class="form-group {{ $errors->has('meeting_status_id') ? 'has-error' : '' }}">
			<label for="meeting_status_id" class="col-sm-2 control-label">Situação:</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
					{!! Form::select('meeting_status_id', $meeting_statuses, $value = null, ['id'=>'meeting_statuses_list', 'class'=>'form-control select2']) !!}
				</div>
			</div>
		</div>
	<?php
	}
?>

<div class="row">
	<label for="expenses_members" class="col-sm-2 control-label">
		<p class="text-right">Despesas SÓCIOS + Acompanhantes</p>
	</label>
</div>

<div class="form-group {{ $errors->has('expenses_members_food') ? 'has-error' : '' }}">
	<label for="expenses_members_food" class="col-sm-2 control-label">Alimentação:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_members_food', $value = null, ['id'=>'expenses_members_food', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expenses_members_accommodation') ? 'has-error' : '' }}">
	<label for="expenses_members_accommodation" class="col-sm-2 control-label">Hospedagem:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_members_accommodation', $value = null, ['id'=>'expenses_members_accommodation', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expenses_members_transport') ? 'has-error' : '' }}">
	<label for="expenses_members_transport" class="col-sm-2 control-label">Transporte:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_members_transport', $value = null, ['id'=>'expenses_members_transport', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="row">
	<label for="expenses_partners" class="col-sm-2 control-label">
		<p class="text-right">Despesas PARCEIROS + Acompanhantes</p>
	</label>
</div>

<div class="form-group {{ $errors->has('expenses_partners_food') ? 'has-error' : '' }}">
	<label for="expenses_partners_food" class="col-sm-2 control-label">Alimentação:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_partners_food', $value = null, ['id'=>'expenses_partners_food', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expenses_partners_accommodation') ? 'has-error' : '' }}">
	<label for="expenses_partners_accommodation" class="col-sm-2 control-label">Hospedagem:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_partners_accommodation', $value = null, ['id'=>'expenses_partners_accommodation', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expenses_partners_transport') ? 'has-error' : '' }}">
	<label for="expenses_partners_transport" class="col-sm-2 control-label">Transporte:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_partners_transport', $value = null, ['id'=>'expenses_partners_transport', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="row">
	<label for="expenses_employees" class="col-sm-2 control-label">
		<p class="text-right">Despesas FUNCIONÁRIOS + Acompanhantes</p>
	</label>
</div>

<div class="form-group {{ $errors->has('expenses_employees_food') ? 'has-error' : '' }}">
	<label for="expenses_employees_food" class="col-sm-2 control-label">Alimentação:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_employees_food', $value = null, ['id'=>'expenses_employees_food', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expenses_employees_accommodation') ? 'has-error' : '' }}">
	<label for="expenses_employees_accommodation" class="col-sm-2 control-label">Hospedagem:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_employees_accommodation', $value = null, ['id'=>'expenses_employees_accommodation', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expenses_employees_transport') ? 'has-error' : '' }}">
	<label for="expenses_employees_transport" class="col-sm-2 control-label">Transporte:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('expenses_employees_transport', $value = null, ['id'=>'expenses_employees_transport', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<?php
	if ($form_method == "post")
	{
	?>
		<div class="form-group {{ $errors->has('meeting_members_create') ? 'has-error' : '' }}">
			<label for="meeting_members_create" class="col-sm-2 control-label">Vincular Sócios automaticamente:</label>
			<div class="col-sm-8">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
					{!! Form::select('meeting_members_create', ['0' => 'NÃO', '1' => 'SIM, por CIDADE', '2' => 'SIM, por REGIÃO'], $value = null, ['id'=>'meeting_members_create', 'class'=>'form-control select2']) !!}
				</div>
			</div>
		</div>
	<?php
	}
?>
