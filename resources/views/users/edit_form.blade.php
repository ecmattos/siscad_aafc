<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
	<label for="name" class="col-sm-2 control-label">Usuário:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			{!! Form::text('name', $value = null, ['id'=>'name', 'class'=>'form-control', 'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }} ">
	<label for="name" class="col-sm-2 control-label">Nome completo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			{!! Form::text('fullname', $value = null, ['id'=>'fullname', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
	<label for="email" class="col-sm-2 control-label">e-mail:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
			{!! Form::text('email', $value = null, ['id'=>'email', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>
