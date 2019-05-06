<div class="form-group {{ $errors->has('srch_management_unit_id') ? 'has-error' : '' }}">
	<label for="management_unit_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unid.Gestora:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('srch_management_unit_id', $management_units, $value = null, ['id'=>'management_units_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
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
	</script>
@endsection


