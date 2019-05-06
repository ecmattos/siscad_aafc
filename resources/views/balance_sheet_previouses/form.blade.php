<div class="form-group {{ $errors->has('management_unit_id') ? 'has-error' : '' }}">
	<label for="management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('accounting_account_id') ? 'has-error' : '' }}">
	<label for="accounting_account_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Conta contábil:</label>
	<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('accounting_account_id', $accounting_accounts, $value = null, ['id'=>'accounting_accounts_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('balance_previous') ? 'has-error' : '' }}">
	<label for="balance_previous" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Saldo DEZ/2015 R$:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('balance_previous', $value = null, ['id'=>'balance_previous', 'class'=>'form-control']) !!}
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
	  	$("#management_units_list, #accounting_accounts_list").select2();

	  	$("#balance_previous").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '',
		    limit: false,
		    centsLimit: 2,
		    clearPrefix: false,
		    allowNegative: false
  		});
	</script>
@endsection


