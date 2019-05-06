<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-sm-2 control-label">Código:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_type_id') ? 'has-error' : '' }}">
	<label for="patrimonial_type_id" class="col-sm-2 control-label">Tipo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_type_id', $patrimonial_types, $value = null, ['id'=>'patrimonial_types_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_sub_type_id') ? 'has-error' : '' }}">
	<label for="patrimonial_sub_type_id" class="col-sm-2 control-label">Sub-tipo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_sub_type_id', $patrimonial_sub_types, $value = null, ['id'=>'patrimonial_sub_types_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_brand_id') ? 'has-error' : '' }}">
	<label for="patrimonial_brand_id" class="col-sm-2 control-label">Marca:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_brand_id', $patrimonial_brands, $value = null, ['id'=>'patrimonial_brands_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_model_id') ? 'has-error' : '' }}">
	<label for="patrimonial_model_id" class="col-sm-2 control-label">Modelo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_model_id', $patrimonial_models, $value = null, ['id'=>'patrimonial_models_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }}">
	<label for="serial" class="col-sm-2 control-label">Nr série:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('serial', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_process') ? 'has-error' : '' }}">
	<label for="purchase_process" class="col-sm-2 control-label">Processo compra:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('purchase_process', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
	<label for="provider_id" class="col-sm-2 control-label">Fornecedor:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::select('provider_id', $providers, $value = null, ['id'=>'providers_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_status_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-sm-2 control-label">Data Nota Fiscal:</label>
	<div class="col-sm-8">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('invoice_date', isset($patrimonial->invoice_date) ? $patrimonial->invoice_date->format('d/m/Y') : null, ['id'=>'invoice_datepicker', 'class'=>'form-control datepicker date_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('invoice') ? 'has-error' : '' }}">
	<label for="invoice" class="col-sm-2 control-label">Nota fiscal:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('invoice', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_value') ? 'has-error' : '' }}">
	<label for="purchase_value" class="col-sm-2 control-label">Valor compra:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('purchase_value', $purchase_value, ['id'=>'purchase_value', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('depreciation_date_start') ? 'has-error' : '' }}">
	<label for="depreciation_date_start" class="col-sm-2 control-label">Data início depreciação:</label>
	<div class="col-sm-8">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('depreciation_date_start', isset($patrimonial->depreciation_date_start) ? $patrimonial->depreciation_date_start->format('d/m/Y') : null, ['id'=>'depreciation_datepicker_start', 'class'=>'form-control datepicker date_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('residual_value') ? 'has-error' : '' }}">
	<label for="residual_value" class="col-sm-2 control-label">Valor residual:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('residual_value', $residual_value, ['id'=>'residual_value', 'class'=>'form-control numeric_2_mask']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-sm-2 control-label">Data situação:</label>
	<div class="col-sm-8">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('patrimonial_status_date', isset($patrimonial->patrimonial_status_date) ? $patrimonial->patrimonial_status_date->format('d/m/Y') : null, ['id'=>'patrimonial_status_datepicker', 'class'=>'form-control datepicker date_mask', 'disabled'=>'true']) !!}
			{!! Form::hidden('patrimonial_status_date', $patrimonial->patrimonial_status_date->format('d/m/Y')) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
	<label for="comments" class="col-sm-2 control-label">Observações:</label>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('comments', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>
