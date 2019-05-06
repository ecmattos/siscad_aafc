<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
	<label for="employee_id" class="col-sm-3 control-label">Participante:</label>
	<div class="col-sm-7">
        <div class="input-group">
       		<div class="input-group-addon">
       			<i class="fa fa-user"></i>
       		</div>
       		@if ($form_method == "put")
			   	{!! Form::select('employee_id', $employees, $value = null, ['id'=>'employees_list', 'class'=>'form-control select2', 'disabled'=>true]) !!}
			@else
				{!! Form::select('employee_id', $employees, $value = null, ['id'=>'employees_list', 'class'=>'form-control select2']) !!}
			@endif
       	</div>
    </div>
</div>

<hr>

<div class="form-group {{ $errors->has('expected_qty') ? 'has-error' : '' }}">
	<label for="expected_qty" class="col-sm-3 control-label">Previsão:</label>
	<div class="col-sm-7">
		<div class="btn-group" id="status" data-toggle="buttons">
			@if ($form_method == "put")
				@if ($meeting_employee->expected_qty == '1')
					<label class="btn btn-default btn-on btn-sm active">
						{{ Form::radio('expected_qty', '1', true, ['id'=>'expected_qty', 'checked'=>true, 'class'=>'form-control']) }} 
						<i class="fa fa-thumbs-up" style="color:green"></i>
					</label>
					<label class="btn btn-default btn-off btn-sm">
						{{ Form::radio('expected_qty', '0', false, ['id'=>'expected_qty', 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-down" style="color:orange"></i>
					</label>
				@else
					<label class="btn btn-default btn-off btn-sm">
						{{ Form::radio('expected_qty', '1', false, ['id'=>'expected_qty', 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-up" style="color:green"></i>
					</label>
					<label class="btn btn-default btn-on btn-sm active">
						{{ Form::radio('expected_qty', '0', true, ['id'=>'expected_qty', 'checked'=>true, 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-down" style="color:orange"></i>
					</label>
				@endif
			@else
				<label class="btn btn-default btn-on btn-sm">
					{{ Form::radio('expected_qty', '0', true, ['id'=>'expected_qty', 'class'=>'form-control']) }} 
					<i class="fa fa-thumbs-up" style="color:green"></i>
				</label>
				<label class="btn btn-default btn-off btn-sm">
					{{ Form::radio('expected_qty', '0', false, ['id'=>'expected_qty', 'class'=>'form-control']) }}
					<i class="fa fa-thumbs-down" style="color:red"></i>
				</label>
			@endif
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expected_qty_companion') ? 'has-error' : '' }}">
	<label for="expected_qty_companion" class="col-sm-3 control-label">Acompanhante:</label>
	<div class="col-sm-7">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::number('expected_qty_companion', $value = null, ['id'=>'expected_qty_companion', 'min' => 0, 'max' => 1, 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('expected_qty_companion_extra') ? 'has-error' : '' }}">
	<label for="expected_qty_companion_extra" class="col-sm-3 control-label">Acomp.Extra:</label>
	<div class="col-sm-7">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::number('expected_qty_companion_extra', $value = null, ['id'=>'expected_qty_companion_extra', 'min' => 0, 'max' => 1, 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<hr>

<div class="form-group {{ $errors->has('confirmed_qty') ? 'has-error' : '' }}">
	<label for="confirmed_qty" class="col-sm-3 control-label">Confirmação:</label>
	<div class="col-sm-7">
		<div class="btn-group" id="status" data-toggle="buttons">
			@if ($form_method == "put")
				@if ($meeting_employee->confirmed_qty == '1')
					<label class="btn btn-default btn-on btn-sm active">
						{{ Form::radio('confirmed_qty', '1', true, ['id'=>'confirmed_qty', 'checked'=>true, 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-up" style="color:green"></i>
					</label>
					<label class="btn btn-default btn-off btn-sm">
						{{ Form::radio('confirmed_qty', '0', false, ['id'=>'confirmed_qty', 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-down" style="color:red"></i>
					</label>
				@else
					<label class="btn btn-default btn-off btn-sm">
						{{ Form::radio('confirmed_qty', '1', false, ['id'=>'confirmed_qty', 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-up" style="color:green"></i>
					</label>
					<label class="btn btn-default btn-on btn-sm active">
						{{ Form::radio('confirmed_qty', '0', true, ['id'=>'confirmed_qty', 'checked'=>true, 'class'=>'form-control']) }}
						<i class="fa fa-thumbs-down" style="color:red"></i>
					</label>
				@endif
			@else
				<label class="btn btn-default btn-on btn-sm">
					{{ Form::radio('confirmed_qty', '0', true, ['id'=>'confirmed_qty', 'class'=>'form-control']) }} 
					<i class="fa fa-thumbs-up" style="color:green"></i>
				</label>
				<label class="btn btn-default btn-off btn-sm">
					{{ Form::radio('confirmed_qty', '0', false, ['id'=>'confirmed_qty', 'class'=>'form-control']) }}
					<i class="fa fa-thumbs-down" style="color:red"></i>
				</label>
			@endif
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('confirmed_qty_companion') ? 'has-error' : '' }}">
	<label for="confirmed_qty_companion" class="col-sm-3 control-label">Acompanhante:</label>
	<div class="col-sm-7">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::number('confirmed_qty_companion', $value = null, ['id'=>'confirmed_qty_companion', 'min' => 0, 'max' => 1, 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('confirmed_qty_companion_extra') ? 'has-error' : '' }}">
	<label for="confirmed_qty_companion_extra" class="col-sm-3 control-label">Acomp.Extra:</label>
	<div class="col-sm-7">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::number('confirmed_qty_companion_extra', $value = null, ['id'=>'confirmed_qty_companion_extra', 'min' => 0, 'max' => 1, 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
	<label for="comments" class="col-sm-3 control-label">Observações:</label>
	<div class="col-sm-7">
	    <div class="input-group">
	   		<div class="input-group-addon">
	   			<i class="fa fa-question-circle"></i>
	   		</div>
	   		{!! Form::text('comments', $value = null, ['class'=>'form-control', 'maxlength'=>'200']) !!}
	   	</div>
	</div>
</div>

@section('js')
	<script type="text/javascript">
		$('#meeting_employees_box').boxWidget('expand');
		$('#meeting_employees_table').reload(null, false);
	</script>
@endsection