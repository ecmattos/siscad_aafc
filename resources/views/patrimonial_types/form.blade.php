<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-sm-2 control-label">Código:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', null, array('class'=>'form-control', 'autofocus'=>'autofocus')) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-sm-2 control-label">Descrição:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('asset_accounting_account_id') ? 'has-error' : '' }}">
	<label for="asset_accounting_account_id" class="col-sm-2 control-label">Conta contábil Ativo:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('asset_accounting_account_id', $asset_accounting_accounts, $value = null, ['id'=>'asset_accounting_accounts_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('depreciation_accounting_account_id') ? 'has-error' : '' }}">
	<label for="depreciation_accounting_account_id" class="col-sm-2 control-label">Conta contábil Depreciação:</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('depreciation_accounting_account_id', $depreciation_accounting_accounts, $value = null, ['id'=>'depreciation_accounting_accounts_list', 'class'=>'form-control select2']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('useful_life_years') ? 'has-error' : '' }}">
	<label for="useful_life_years" class="col-sm-2 control-label">Vida útil (anos):</label>
	<div class="col-sm-8">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('useful_life_years', $value = null, ['id'=>'useful_life_years', 'class'=>'form-control numeric_0_mask']) !!}
		</div>
	</div>
</div>
