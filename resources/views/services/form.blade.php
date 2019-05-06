<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	{!! Form::label('code', 'Código:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', null, ['class'=>'form-control', 'autofocus'=>'autofocus', 'maxlength'=>'10']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	{!! Form::label('description', 'Descrição:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-8 col-md-6 col-lg-6">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', null, ['class'=>'form-control', 'maxlength'=>'200']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('unit') ? 'has-error' : '' }}">
	{!! Form::label('unit', 'Unidade:', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
	<div class="col-xs-3 col-sm-3 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('unit', null, ['class'=>'form-control', 'maxlength'=>'3']) !!}
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


