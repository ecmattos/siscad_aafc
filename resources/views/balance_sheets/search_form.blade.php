<div class="form-group {{ $errors->has('srch_management_unit_id') ? 'has-error' : '' }}">
	<label for="srch_management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_balance_sheet_date_start') ? 'has-error' : '' }}">
	<label for="srch_balance_sheet_date_start" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Competência ínicio:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_balance_sheet_date_start', $value = null, ['id'=>'balance_sheet_daterangerpicker_start', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('srch_balance_sheet_date_end') ? 'has-error' : '' }}">
	<label for="srch_balance_sheet_date_end" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Competência fim:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_balance_sheet_date_end', $value = null, ['id'=>'balance_sheet_daterangerpicker_end', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>


<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
		<div class="form-group col-sm-4">
			<button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
    		<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>

@section('js_scripts')
	<script type="text/javascript">
	  	$("#management_units_list").select2();

	  	$("#balance_sheet_daterangerpicker_start").datepicker(
		  	{
		  		yearRange: '2016:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#balance_sheet_daterangerpicker_end").datepicker("option", "minDate", selectedDate);
		  		}
		  	});

		  $("#balance_sheet_daterangerpicker_end").datepicker(
		  	{
		  		yearRange: '1960:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#balance_sheet_daterangerpicker_start").datepicker("option", "maxDate", selectedDate);
		  		}
		  	});
	</script>
@endsection


