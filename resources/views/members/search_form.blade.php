<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <form class="form-horizontal">
		              	<div class="box-body">
		              		<div class="form-group">
			                  	<label for="code" class="col-sm-2 control-label">Matrícula:</label>
				                <div class="col-sm-8">
					                <div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::text('srch_member_code', old('srch_member_code'), ['class'=>'form-control']) !!}
				                	</div>
				                </div>
			               	</div>

			               	<div class="form-group">
			                  	<label for="name" class="col-sm-2 control-label">CPF:</label>
				                <div class="col-sm-8">
					                <div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::text('srch_member_cpf', old('srch_member_cpf'), ['class'=>'form-control']) !!}
				                	</div>
				                </div>
			               	</div>

			               	<div class="form-group">
			                  	<label for="name" class="col-sm-2 control-label">Nome:</label>
				                <div class="col-sm-8">
					                <div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::text('srch_member_name', old('srch_member_name'), ['class'=>'form-control']) !!}
				                	</div>
				                </div>
			               	</div>
			                
			                <div class="form-group">
			                  	<label for="plan_id" class="col-sm-2 control-label">Plano:</label>
								<div class="col-sm-8">
			                    	<div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::select('srch_member_plan_id', $plans, old('srch_member_plan_id'), ['id'=>'plans_list', 'class'=>'form-control select2']) !!}
				                	</div>
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<label for="gender_id" class="col-sm-2 control-label">Sexo:</label>
								<div class="col-sm-8">
			                    	<div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::select('srch_member_gender_id', $genders, old('srch_member_gender_id'), ['id'=>'genders_list', 'class'=>'form-control select2']) !!}
				                	</div>
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<label for="region_id" class="col-sm-2 control-label">Região:</label>
								<div class="col-sm-8">
			                    	<div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::select('srch_member_region_id', $regions, old('srch_member_region_id'), ['id'=>'regions_list', 'class'=>'form-control select2']) !!}
				                	</div>
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
								<div class="col-sm-8">
			                    	<div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::select('srch_member_city_id', $cities, old('srch_member_city_id'), ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
				                	</div>
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<label for="member_status_id" class="col-sm-2 control-label">Situação:</label>
								<div class="col-sm-8">
			                    	<div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::select('srch_member_status_id', $member_statuses, old('srch_member_status_id'), ['id'=>'member_statuses_list', 'class'=>'form-control select2']) !!}
				                	</div>
			                  	</div>
			                </div>

			                <div class="form-group">
			                  	<label for="member_status_reason_id" class="col-sm-2 control-label">Motivo:</label>
								<div class="col-sm-8">
			                    	<div class="input-group">
				                  		<div class="input-group-addon">
				                  			<i class="fa fa-question-circle"></i>
				                  		</div>
				                  		{!! Form::select('srch_member_status_reason_id[]', $member_status_reasons, old('srch_member_status_reason_id'), ['id'=>'member_status_reasons_list', 'multiple'=>true, 'class'=>'form-control select2_multiple']) !!}
				                	</div>
			                  	</div>
			                </div>               
				    	</div>
		              	<div class="box-footer">
			                <label for="submit_buttons" class="col-sm-2 control-label"></label>
			                <button type="submit" class="btn btn-flat btn-success">Confirmar <i class="fa fa-check"></i></button>
			                <a href="{{ URL::previous() }}" class="btn btn-flat btn-danger">Cancelar <i class="fa fa-times"></i></a>
		              	</div>
		            </form>
          		</div>          
          	</div>
</div>
