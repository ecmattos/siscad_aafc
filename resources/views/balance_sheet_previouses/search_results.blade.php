@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Saldos Iniciais: Pesquisa 
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('balance_sheet_previouses') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Incluir"><i class="fa fa-search"></i></a>
          		<a href="{!! route('balance_sheet_previouses.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Pesquisar"><i class="fa fa-file-o"></i></a>
        	</div>
			<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar">
			<thead>
			    <tr>
				    <th data-width="1%" class="text-center">
						<a href="{!! route('balance_sheet_previouses.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-field="management_unit_id">Unidade Gestora</th>
				    <th data-field="accounting_account_id" data-align="left">Conta Contábil</th>
				    <th data-field="code_short" data-width="2%" data-align="center">Cód Reduzido</th>
				    <th data-width="10%" data-field="balance_current" data-align="right">Saldo em 31/12/2015 R$</th>
				    <th data-width="2%" data-field="account_balance_type_id" data-align="center">(C/D)</th>
				    <th data-width="1%" class="text-center">#</th>
				</tr>
		    </thead>
		    <tbody>
			    @foreach($balance_sheet_previouses as $balance_sheet_previous)
			        <tr>
			            <td>
				            <a href="{!! route('balance_sheet_previouses.edit', [$balance_sheet_previous->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				        </td>
				        <td>{{ $balance_sheet_previous->management_unit->code }} - {{ $balance_sheet_previous->management_unit->description }}</td>
			            <td>{{ $balance_sheet_previous->accounting_account->code }} - {{ $balance_sheet_previous->accounting_account->description }}</b></td>
						<td>{{ $balance_sheet_previous->accounting_account->code_short }}</b></td>
			            <td>{{ number_format($balance_sheet_previous->balance_previous, 2,",",".") }}</td>
			            <td>({{ $balance_sheet_previous->accounting_account->account_balance_type->code }})</b></td>
			            <td>
				            <a href="javascript:;" onclick="onDestroy('{!! route('balance_sheet_previouses.destroy', [$balance_sheet_previous->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				        </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection