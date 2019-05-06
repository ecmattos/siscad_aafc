<div class="form-group {{ $errors->has('srch_patrimonial_employee_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_employee_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Responsável:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_employee_id', $employees, $value = null, ['id'=>'employees_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_patrimonial_status_id') ? 'has-error' : '' }}">
	<label for="srch_patrimonial_status_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_patrimonial_status_id', $patrimonial_statuses, $value = null, ['id'=>'patrimonial_statuses_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
		<div class="form-group col-sm-4">
			<button type="submit" class="btn btn-success">Pesquisar <i class="fa fa-check"></i></button>
			<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>



@section('js_scripts')
	<script type="text/javascript">
	  	$("#employees_list, #patrimonial_statuses_list").select2();
	</script>
@endsection