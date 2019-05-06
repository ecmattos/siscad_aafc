<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<label for="name" class="col-sm-2 control-label">Nome completo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('name', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('partner_sector_id') ? 'has-error' : '' }}">
	<label for="partner_sector_id" class="col-sm-2 control-label">Setor:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('partner_sector_id', $partner_sectors, $value = null, ['id'=>'partner_types_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('partner_type_id') ? 'has-error' : '' }}">
	<label for="partner_type_id" class="col-sm-2 control-label">Tipo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('partner_type_id', $partner_types, $value = null, ['id'=>'partner_types_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	<label for="address" class="col-sm-2 control-label">Endereço:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('address', $value = null, ['class'=>'form-control', 'maxlength'=>'50']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
	<label for="neighborhood" class="col-sm-2 control-label">Bairro:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('neighborhood', $value = null, ['class'=>'form-control', 'maxlength'=>'30']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-sm-2 control-label">Cidade:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('city_id', $cities, $value = null, ['id'=>'cities_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
	<label for="zip_code" class="col-sm-2 control-label">CEP:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('zip_code', $value = null, ['class'=>'form-control', 'maxlength'=>'9']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
	<label for="phone" class="col-sm-2 control-label">Telefone:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
			{!! Form::text('phone', $value = null, ['id'=>'phone', 'class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }} ">
	<label for="mobile" class="col-sm-2 control-label">Celular:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
			{!! Form::text('mobile', $value = null, ['id'=>'mobile', 'class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	<label for="email" class="col-sm-2 control-label">e-mail:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			{!! Form::input('email', 'email', $value = null, ['class'=>'form-control', 'maxlength'=>'40']) !!}
		</div>
	</div>
</div>

