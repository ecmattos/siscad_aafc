<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
	<label for="parent_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Conta contábil Pai:</label>
	<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('parent_id', $accounting_accounts, $value = null, ['id'=>'accounting_accounts_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	{!! Form::label('code', 'Código:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', null, ['class'=>'form-control', 'maxlength' => '20']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('code_short') ? 'has-error' : '' }}">
	{!! Form::label('code_short', 'Código reduzido:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code_short', null, ['class'=>'form-control', 'maxlength' => '10']) !!}
		</div>
	</div>
</div>


<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	{!! Form::label('description', 'Descrição:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', null, ['class'=>'form-control', 'maxlength' => '50']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('account_type_id') ? 'has-error' : '' }}">
	<label for="account_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tipo:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('account_type_id', $account_types, $value = null, ['id'=>'account_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('account_balance_type_id') ? 'has-error' : '' }}">
	<label for="account_balance_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tipo de saldo:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('account_balance_type_id', $account_balance_types, $value = null, ['id'=>'account_balance_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('account_coverage_type_id') ? 'has-error' : '' }}">
	<label for="account_coverage_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Abrangência:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('account_coverage_type_id', $account_coverage_types, $value = null, ['id'=>'account_coverage_types_list', 'class'=>'form-control']) !!}
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
	  	$("#accounting_accounts_list, #account_types_list, #account_balance_types_list, #account_coverage_types_list").select2();

	  	$("#balance_start").priceFormat(
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


