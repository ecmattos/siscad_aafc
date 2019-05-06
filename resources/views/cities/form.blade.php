<div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}">
	<label for="state_id" class="col-sm-2 control-label">UF:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('state_id', $states, $value = null, ['id'=>'states_list', 'class'=>'form-control autofocus select2']) !!}

		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-sm-2 control-label">Descrição:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
	<label for="region_id" class="col-sm-2 control-label">Região:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('region_id', $regions, $value = null, ['id'=>'regions_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>