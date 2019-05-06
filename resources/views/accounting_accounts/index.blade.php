@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Financeiro</li>
  		<li class="breadcrumb-item">Contabilidade</li>
  		<li class="breadcrumb-item">Plano de Contas</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>

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
								<b>{!! $accounting_account->code !!}</b>
							</td>
			            	<td><b>{!! $accounting_account->description !!}</b></td>
							<td><b>{!! $accounting_account->code_short !!}</b></td>
			            	<td><b>{!! $accounting_account->account_coverage_type->description !!}</b></td>
			            	<td><b>{!! $accounting_account->account_type->description !!}</b></td>
			            	<td><b>{!! $accounting_account->account_balance_type->description !!}</b></td>
			            @else
			            	<td>{!! $accounting_account->code !!}</td>
			            	<td>{!! $accounting_account->description !!}</td>
			            	<td>{!! $accounting_account->code_short !!}</td>
			            	<td>{!! $accounting_account->account_coverage_type->description !!}</td>
			            	<td>{!! $accounting_account->account_type->description !!}</td>
			            	<td>{!! $accounting_account->account_balance_type->description !!}</td>
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

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_accounting_accounts').bootstrapTable();
	</script>
@endsection