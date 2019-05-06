<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'20']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'200']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_type_id') ? 'has-error' : '' }}">
	<label for="patrimonial_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tipo:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_type_id', $patrimonial_types, $value = null, ['id'=>'patrimonial_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_sub_type_id') ? 'has-error' : '' }}">
	<label for="patrimonial_sub_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sub-tipo:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_sub_type_id', $patrimonial_sub_types, $value = null, ['id'=>'patrimonial_sub_types_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_brand_id') ? 'has-error' : '' }}">
	<label for="patrimonial_brand_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Marca:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_brand_id', $patrimonial_brands, $value = null, ['id'=>'patrimonial_brands_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_model_id') ? 'has-error' : '' }}">
	<label for="patrimonial_model_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Modelo:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_model_id', $patrimonial_models, $value = null, ['id'=>'patrimonial_models_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }}">
	<label for="serial" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nr série:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('serial', $value = null, ['class'=>'form-control', 'maxlength'=>'25']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_process') ? 'has-error' : '' }}">
	<label for="purchase_process" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Processo compra:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('purchase_process', $value = null, ['class'=>'form-control', 'maxlength'=>'25']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
	<label for="provider_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Fornecedor:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::select('provider_id', $providers, $value = null, ['id'=>'providers_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Nota Fiscal:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('invoice_date', isset($patrimonial->invoice_date) ? $patrimonial->invoice_date->format('d/m/Y') : null, ['id'=>'invoice_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('invoice') ? 'has-error' : '' }}">
	<label for="invoice" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nota fiscal:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('invoice', $value = null, ['class'=>'form-control', 'maxlength'=>'15']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_value') ? 'has-error' : '' }}">
	<label for="purchase_value" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Valor compra:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('purchase_value', $value = null, ['id'=>'purchase_value', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('accounting_account_id') ? 'has-error' : '' }}">
	<label for="accounting_account_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Conta contábil:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('accounting_account_id', $accounting_accounts, $value = null, ['id'=>'accounting_accounts_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('depreciation_date_start') ? 'has-error' : '' }}">
	<label for="depreciation_date_start" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data início depreciação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('depreciation_date_start', isset($patrimonial->depreciation_date_start) ? $patrimonial->depreciation_date_start->format('d/m/Y') : null, ['id'=>'depreciation_datepicker_start', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('useful_life_years') ? 'has-error' : '' }}">
	<label for="useful_life_years" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Vida útil (anos):</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('useful_life_years', $value = null, ['id'=>'useful_life_years', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('residual_value') ? 'has-error' : '' }}">
	<label for="residual_value" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Valor residual:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('residual_value', $value = null, ['id'=>'residual_value', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('management_unit_id') ? 'has-error' : '' }}">
	<label for="management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_sector_id') ? 'has-error' : '' }}">
	<label for="patrimonial_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_sector_id', $patrimonial_sectors, $value = null, ['id'=>'patrimonial_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_sub_sector_id') ? 'has-error' : '' }}">
	<label for="patrimonial_sub_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sub-setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_sub_sector_id', $patrimonial_sub_sectors, $value = null, ['id'=>'patrimonial_sub_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_status_id') ? 'has-error' : '' }}">
	<label for="patrimonial_status_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_status_id', $patrimonial_statuses, $value = null, ['id'=>'patrimonial_statuses_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_status_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('patrimonial_status_date', isset($patrimonial->patrimonial_status_date) ? $patrimonial->patrimonial_status_date->format('d/m/Y') : null, ['id'=>'patrimonial_status_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
	<label for="comments" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Observações:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('comments', $value = null, ['class'=>'form-control']) !!}
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
	  	$("#accounting_accounts_list, #patrimonial_types_list, #patrimonial_sub_types_list, #patrimonial_brands_list, #patrimonial_models_list, #providers_list, #management_units_list, #patrimonial_sectors_list, #patrimonial_sub_sectors_list, #patrimonial_statuses_list").select2();

	  	$("#invoice_datepicker, #patrimonial_status_datepicker, #depreciation_datepicker_start").datepicker(
	  		{
		        yearRange: '1960:'+(new Date).getFullYear(),	
		        maxDate: "today()"
		    }
    	);

	  	$("#purchase_value, #residual_value").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 2,
		    clearPrefix: false,
		    allowNegative: false
  		});

  		$("#useful_life_years").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 1,
		    clearPrefix: false,
		    allowNegative: false
  		});
	</script>
@endsection