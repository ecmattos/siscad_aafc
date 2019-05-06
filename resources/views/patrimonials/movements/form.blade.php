
<div class="form-group {{ $errors->has('management_unit_id') ? 'has-error' : '' }}">
	<label for="management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_sector_id') ? 'has-error' : '' }}">
	<label for="patrimonial_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_sector_id', $patrimonial_sectors, $value = null, ['id'=>'patrimonial_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_sub_sector_id') ? 'has-error' : '' }}">
	<label for="patrimonial_sub_sector_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Sub-setor:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_sub_sector_id', $patrimonial_sub_sectors, $value = null, ['id'=>'patrimonial_sub_sectors_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_status_id') ? 'has-error' : '' }}">
	<label for="patrimonial_status_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('patrimonial_status_id', $patrimonial_statuses, $value = null, ['id'=>'patrimonial_statuses_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('patrimonial_status_date') ? 'has-error' : '' }}">
	<label for="invoice_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data situação:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('patrimonial_status_date', isset($patrimonial->patrimonial_status_date) ? $patrimonial->patrimonial_status_date->format('d/m/Y') : null, ['id'=>'patrimonial_status_datepicker', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
	<label for="comments" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Observações:</label>
	<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6">
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
			<a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
		</div>
</div>



@section('js_scripts')
	<script type="text/javascript">
	  	$("#management_units_list, #patrimonial_sectors_list, #patrimonial_sub_sectors_list, #patrimonial_statuses_list").select2();

	  	var minDate = '<?php echo $patrimonial->patrimonial_status_date->format('d/m/Y'); ?>';

	  	$("#patrimonial_status_datepicker").datepicker(
	  		{
		        yearRange: '1970:'+(new Date).getFullYear(),
		        minDate: minDate,
		        maxDate: "today()"
		    }
    	);

	</script>
@endsection