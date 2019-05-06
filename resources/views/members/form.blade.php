	<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
		<label for="code" class="col-sm-2 control-label">Matricula:</label>
		<div class="col-sm-8">
            <div class="input-group">
           		<div class="input-group-addon">
           			<i class="fa fa-question-circle"></i>
           		</div>
           		{!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'10']) !!}
           	</div>
        </div>
	</div>

	<div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
		<label for="cpf" class="col-sm-2 control-label">CPF:</label>
		<div class="col-sm-8">
	        <div class="input-group">
	       		<div class="input-group-addon">
	       			<i class="fa fa-question-circle"></i>
	       		</div>
	       		{!! Form::text('cpf', $value = null, ['class'=>'form-control', 'maxlength'=>'11']) !!}
	       	</div>
	    </div>
	</div>

	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		<label for="name" class="col-sm-2 control-label">Nome completo:</label>
		<div class="col-sm-8">
		    <div class="input-group">
		   		<div class="input-group-addon">
		   			<i class="fa fa-question-circle"></i>
		   		</div>
		   		{!! Form::text('name', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
		   	</div>
	    </div>
	</div>

	<div class="form-group {{ $errors->has('plan_id') ? 'has-error' : '' }}">
		<label for="plan_id" class="col-sm-2 control-label">Plano:</label>
		<div class="col-sm-8">
	        <div class="input-group">
	       		<div class="input-group-addon">
	       			<i class="fa fa-question-circle"></i>
	       		</div>
	       		{!! Form::select('plan_id', $plans, $value = null, ['id'=>'plans_list', 'class'=>'form-control select2']) !!}
	       	</div>
	    </div>
	</div>

	<div class="form-group {{ $errors->has('gender_id') ? 'has-error' : '' }}">
		<label for="gender_id" class="col-sm-2 control-label">Sexo:</label>
		<div class="col-sm-8">
	        <div class="input-group">
	      		<div class="input-group-addon">
	      			<i class="fa fa-question-circle"></i>
	       		</div>
	       		{!! Form::select('gender_id', $genders, $value = null, ['id'=>'genders_list', 'class'=>'form-control select2']) !!}
	       	</div>
	    </div>
	</div>
	
	<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		<label for="email" class="col-sm-2 control-label">e-mail:</label>
		<div class="col-sm-8">
	        <div class="input-group">
	       		<div class="input-group-addon">
	       			<i class="fa fa-question-circle"></i>
	       		</div>
	       		{!! Form::input('email', 'email', $value = null, ['class'=>'form-control', 'maxlength'=>'40']) !!}
	       	</div>
	    </div>
	</div>

	<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
							<label for="address" class="col-sm-2 control-label">Endereço:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('address', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
							<label for="neighborhood" class="col-sm-2 control-label">Bairro:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('neighborhood', $value = null, ['class'=>'form-control', 'maxlength'=>'30']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
							<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::select('city_id', $cities, $value = null, ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
							<label for="zip_code" class="col-sm-2 control-label">CEP:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('zip_code', $value = null, ['class'=>'form-control', 'maxlength'=>'9']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
							<label for="phone" class="col-sm-2 control-label">Telefone:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('phone', $value = null, ['id'=>'phone', 'class'=>'form-control', 'maxlength'=>'11']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }} ">
							<label for="mobile" class="col-sm-2 control-label">Celular:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('mobile', $value = null, ['id'=>'mobile', 'class'=>'form-control', 'maxlength'=>'11']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('birthday') ? 'has-error' : '' }}">
							<label for="birthday" class="col-sm-2 control-label">Nascimento:</label>
							<div class="col-sm-8">
					            <div class="input-group date">
				              		<div class="input-group-addon">
				               			<i class="fa fa-calendar"></i>
				               		</div>
				               		{!! Form::text('birthday', isset($member->birthday) ? $member->birthday->format('d/m/Y') : null, ['id'=>'birthday_datepicker', 'class'=>'form-control  datepicker date_mask']) !!}
								</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('member_status_id') ? 'has-error' : '' }}">
							<label for="member_status_id" class="col-sm-2 control-label">Situação:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::select('member_status_id', $member_statuses, $value = null, ['id'=>'member_statuses_list', 'class'=>'form-control select2']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('date_aafc_ini') ? 'has-error' : '' }}">
							<label for="date_aafc_ini" class="col-sm-2 control-label">Ativo:</label>
							<div class="col-sm-8">
					            <div class="input-group date">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('date_aafc_ini', isset($member->date_aafc_ini) ? $member->date_aafc_ini->format('d/m/Y') : null, ['id'=>'date_aafc_ini_datepicker', 'class'=>'form-control datepicker date_mask']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('date_aafc_fim') ? 'has-error' : '' }}">
							<label for="date_aafc_fim" class="col-sm-2 control-label">Inativo:</label>
							<div class="col-sm-8">
					            <div class="input-group date">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('date_aafc_fim', isset($member->date_aafc_fim) ? $member->date_aafc_fim->format('d/m/Y') : null, ['id'=>'date_aafc_fim_datepicker', 'class'=>'form-control datepicker date_mask']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('member_status_reason_id') ? 'has-error' : '' }}">
							<label for="member_status_reason_id" class="col-sm-2 control-label">Motivo:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::select('member_status_reason_id', $member_status_reasons, $value = null, ['id'=>'member_status_reasons_list', 'class'=>'form-control select2']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('comments') ? 'has-error' : '' }}">
							<label for="comments" class="col-sm-2 control-label">Observações:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		<div class="input-group-addon">
				               			<i class="fa fa-question-circle"></i>
				               		</div>
				               		{!! Form::text('comments', $value = null, ['class'=>'form-control', 'maxlength'=>'200']) !!}
				               	</div>
				            </div>
						</div>

						<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
							<label for="avatar" class="col-sm-2 control-label">Avatar:</label>
							<div class="col-sm-8">
					            <div class="input-group">
				              		{!! Form::file('avatar', ['class' => 'custom-file-input']) !!}
				               	</div>
				            </div>
						</div>
						

