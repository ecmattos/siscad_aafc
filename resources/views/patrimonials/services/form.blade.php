<div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Ini Depreciação:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('depreciation_date_start', isset($patrimonial->depreciation_date_start) ? $patrimonial->depreciation_date_start->format('d/m/Y') : null, ['id'=>'patrimonial_status_datepicker', 'class'=>'form-control', 'disabled'=>'true']) !!}
			{!! Form::hidden('depreciation_date_start', $patrimonial->depreciation_date_start->format('d/m/Y')) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_intervention_type_id') ? 'has-error' : '' }}">
	<label for="patrimonial_intervention_type_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Tipo Intervenção:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::select('patrimonial_intervention_type_id', $patrimonial_intervention_types, $value = null, ['id'=>'patrimonial_intervention_types_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('intervention_date') ? 'has-error' : '' }}">
	<label for="intervention_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Intervenção:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('intervention_date', isset($patrimonial_service->intervention_date) ? $patrimonial_service->intervention_date->format('d/m/Y') : null, ['id'=>'intervention_date_datepicker', 'class'=>'form-control']) !!}

		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
	<label for="service_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Serviço:</label>
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('service_id', $services, $value = null, ['id'=>'services_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
	<label for="provider_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Fornecedor:</label>
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-users"></i></span>
			{!! Form::select('provider_id', $providers, $value = null, ['id'=>'providers_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_process') ? 'has-error' : '' }}">
	<label for="purchase_process" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Processo compra:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('purchase_process', null, ['class'=>'form-control', 'maxlength'=>'25']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data Nota Fiscal:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('invoice_date', isset($patrimonial_service->invoice_date) ? $patrimonial_service->invoice_date->format('d/m/Y') : null, ['id'=>'invoice_date_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('invoice') ? 'has-error' : '' }}">
	<label for="invoice" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nota fiscal:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('invoice', $value = null, ['class'=>'form-control', 'maxlength'=>'15']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_value') ? 'has-error' : '' }}">
	<label for="purchase_value" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Valor compra:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('purchase_value', $value = null, ['id'=>'purchase_value', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('purchase_qty') ? 'has-error' : '' }}">
	<label for="purchase_qty" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Quantidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('purchase_qty', $value = null, ['id'=>'purchase_qty', 'class'=>'form-control', 'maxlength'=>'25']) !!}
		</div>
	</div>
</div>

<div class="form-group">
	<label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
		<div class="form-group col-sm-4">
			<button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
			<a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>



@section('js_scripts')
	<script type="text/javascript">
	  	$("#services_list, #providers_list, #patrimonial_intervention_types_list").select2();

	  	$("#invoice_date_datepicker, #intervention_date_datepicker").datepicker(
	  		{
		        yearRange: '1960:'+(new Date).getFullYear(),	
		        maxDate: "today()"
		    }
    	);

    	$("#purchase_value").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 2,
		    clearPrefix: false,
		    allowNegative: false
  		});

  		$("#purchase_qty").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 2,
		    clearPrefix: false,
		    allowNegative: false
  		});

	</script>
@endsection