<div class="form-group {{ $errors->has('payment_reason_id') ? 'has-error' : '' }}">
	<label for="srch_payment_reason_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Finalidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_payment_reason_id', $payment_reasons, $value = null, ['id'=>'payment_reasons_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('payment_method_id') ? 'has-error' : '' }}">
	<label for="srch_payment_method_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Método:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_payment_method_id', $payment_methods, $value = null, ['id'=>'payment_methods_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('payment_year') ? 'has-error' : '' }}">
	<label for="payment_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Competência:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('srch_payment_year', $value = null, ['id'=>'payment_datepicker', 'class'=>'form-control']) !!}
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

<hr class="hr-warning" />

@section('js_scripts')
	<script type="text/javascript">
	  	$("#payment_reasons_list, #payment_methods_list").select2();
	  	$("#payment_datepicker").datepicker(
	  		{
		        dateFormat: 'yy',
		        changeDay: false,
		        changeMonth: false,
		        yearRange: '2016:'+(new Date).getFullYear(),
		        maxDate: "today()"
		    }
    	);
	</script>
@endsection