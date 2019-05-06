<div class="form-group {{ $errors->has('company_position_id') ? 'has-error' : '' }}">
	<label for="company_position_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cargo:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_position_id', $company_positions, $value = null, ['id'=>'company_positions_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('company_responsibility_id') ? 'has-error' : '' }}">
	<label for="company_responsibility_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Função:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_responsibility_id', $company_responsibilities, $value = null, ['id'=>'company_responsibilities_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('management_unit_id') ? 'has-error' : '' }}">
	<label for="management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>


<div class="form-group {{ $errors->has('company_sector_id') ? 'has-error' : '' }}">
	<label for="company_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_sector_id', $company_sectors, $value = null, ['id'=>'company_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('company_sub_sector_id') ? 'has-error' : '' }}">
	<label for="company_sub_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sub-setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('company_sub_sector_id', $company_sub_sectors, $value = null, ['id'=>'company_sub_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('date_start') ? 'has-error' : '' }}">
	<label for="date_aafc_ini" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Entrada:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('date_start', isset($employee_movement->date_start) ? $employee_movement->date_start->format('d/m/Y') : null, ['id'=>'date_start_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('date_end') ? 'has-error' : '' }}">
	<label for="date_aafc_ini" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Saída:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('date_end', isset($employee_movement->date_end) ? $employee_movement->date_end->format('d/m/Y') : null, ['id'=>'date_end_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>


<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
		<div class="form-group col-sm-4">
			<button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
			<a href="{!! route('employees.show', [$employee_movement->employee_id]) !!}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
	  	$("#management_units_list, #company_sectors_list, #company_sub_sectors_list, #company_positions_list, #company_responsibilities_list").select2();
	  	$("#date_start_datepicker, #date_end_datepicker").datepicker(
	  		{
		        yearRange: '1920:'+(new Date).getFullYear(),
		        maxDate: "today()"
		    }
    	);
	</script>
@endsection