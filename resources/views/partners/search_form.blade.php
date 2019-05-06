<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>
	              	
	              	<div class="box-body">
		              	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name" class="col-sm-2 control-label">Nome:</label>
							<div class="col-sm-8">
						        <div class="input-group">
					           		<div class="input-group-addon">
					           			<i class="fa fa-question-circle"></i>
					           		</div>
					           		{!! Form::text('srch_partner_name', old('srch_partner_name'), ['class'=>'form-control']) !!}

								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="region_id" class="col-sm-2 control-label">Região:</label>
							<div class="col-sm-8">
						        <div class="input-group">
					           		<div class="input-group-addon">
					           			<i class="fa fa-map-marker"></i>
					           		</div>
					           		{!! Form::select('srch_partner_region_id', $regions, old('srch_partner_region_id'), ['id'=>'regions_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
							<div class="col-sm-8">
						        <div class="input-group">
					           		<div class="input-group-addon">
					           			<i class="fa fa-map-marker"></i>
					           		</div>
					           		{!! Form::select('srch_partner_city_id', $cities, old('srch_partner_city_id'), ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="partner_type_id" class="col-sm-2 control-label">Tipo:</label>
							<div class="col-sm-8">
						        <div class="input-group">
					           		<div class="input-group-addon">
					           			<i class="fa fa-question-circle"></i>
					           		</div>
					           		{!! Form::select('srch_partner_type_id', $partner_types, old('srch_partner_type_id'), ['id'=>'partner_types_list', 'class'=>'form-control select2']) !!}
								</div>
							</div>
						</div>
					</div>

					<div class="box-footer">
			            <label for="submit_buttons" class="col-sm-2 control-label"></label>
			            <button type="submit" class="btn btn-flat btn-success">Confirmar <i class="fa fa-check"></i></button>
			            <a href="{{ URL::previous() }}" class="btn btn-flat btn-danger">Cancelar <i class="fa fa-times"></i></a>
		            </div>
				</div>
			</div>
</div>
