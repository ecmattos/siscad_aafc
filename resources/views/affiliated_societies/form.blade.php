<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('cnpj') ? 'has-error' : '' }}">
	<label for="cnpj" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CNPJ:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('cnpj', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	<label for="address" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Endereço:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('address', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
	<label for="neighborhood" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Bairro:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('neighborhood', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('city_id', $cities, $value = null, ['id'=>'cities_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('zip_code') ? 'has-error' : '' }}">
	<label for="zip_code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">CEP:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('zip_code', $value = null, ['class'=>'form-control', 'maxlength'=>'9']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
	<label for="phone" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Telefone:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-phone"></i></span>
			{!! Form::text('phone', $value = null, ['id'=>'phone', 'class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }} ">
	<label for="mobile" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Celular:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
			{!! Form::text('mobile', $value = null, ['id'=>'mobile', 'class'=>'form-control', 'maxlength'=>'11']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	<label for="email" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">e-mail:</label>
	<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			{!! Form::input('email', 'email', $value = null, ['class'=>'form-control']) !!}
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
	  	$("#cities_list").select2();
	</script>
@endsection