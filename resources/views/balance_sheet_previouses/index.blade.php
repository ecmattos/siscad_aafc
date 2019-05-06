@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Saldos Iniciais de Contas Contábeis: Pesquisa
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('accounting_accounts.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
			<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_accounting_accounts" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar">
		    <thead>
		        <th data-width="1%" class="text-center">
		        	<a href="{!! route('accounting_accounts.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
		        </th>
		        <th data-width="2%" data-field="code">Código</th>
		        <th data-field="description">Descrição</th>
		        <th data-width="2%" data-field="code_short" data-align="center">Cód Reduzido</th>
		        <th data-width="2%" data-field="account_coverage_type_id">Abrangência</th>
		        <th data-width="2%" data-field="account_type_id">Tipo</th>
		        <th data-width="2%" data-field="account_balance_type_id">Tipo Saldo</th>
		        <th data-width="2%" data-field="balance_start" data-align="right">Saldo Inicial</th>
		        <th data-width="1%" class="text-center">#</th>
		    </thead>
		    <tbody>
			    @foreach($accounting_accounts as $accounting_account)
			        <tr>
			            <td>
			                <a href="{!! route('accounting_accounts.edit', [$accounting_account->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            @if($accounting_account->account_coverage_type_id=='1')
							<td>
								<b><a href="{!! route('accounting_accounts.show', [$accounting_account->id]) !!}">{!! $accounting_account->code !!}</a></b>
							</td>
			            	<td><b>{!! $accounting_account->description !!}</b></td>
							<td><b>{!! $accounting_account->code_short !!}</b></td>
			            	<td><b>{!! $accounting_account->account_coverage_type->description !!}</b></td>
			            	<td><b>{!! $accounting_account->account_type->description !!}</b></td>
			            	<td><b>{!! $accounting_account->account_balance_type->description !!}</b></td>
			            	<td><b>R$ {{ number_format($accounting_account->balance_start, 2,",",".") }}</b></td>
			            @else
			            	<td><a href="{!! route('accounting_accounts.show', [$accounting_account->id]) !!}">{!! $accounting_account->code !!}</a></td>
			            	<td>{!! $accounting_account->description !!}</td>
			            	<td>{!! $accounting_account->code_short !!}</td>
			            	<td>{!! $accounting_account->account_coverage_type->description !!}</td>
			            	<td>{!! $accounting_account->account_type->description !!}</td>
			            	<td>{!! $accounting_account->account_balance_type->description !!}</td>
			            	<td>R$ {{ number_format($accounting_account->balance_start, 2,",",".") }}</td>
			            @endif
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('accounting_accounts.destroy', [$accounting_account->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection