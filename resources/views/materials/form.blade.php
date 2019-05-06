<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-sm-2 control-label">Código:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'100']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-sm-2 control-label">Descrição:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'100']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('material_unit_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-sm-2 control-label">Unidade:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('material_unit_id', $material_units, $value = null, ['id'=>'material_units_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>