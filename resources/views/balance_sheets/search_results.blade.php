@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Financeiro</li>
  		<li class="breadcrumb-item">Contabilidade</li>
  		<li class="breadcrumb-item"><b>Balancetes</b></li>

  		<div class="btn-group btn-group-sm pull-right">
	   		<a href="{!! route('balance_sheets.search') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Incluir"><i class="fa fa-search"></i></a>
	   	</div>
	</ol>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_accounting_accounts" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="false" data-show-export="true" data-pagination="false" data-click-to-select="true" data-toolbar="#filter-bar">
		    <thead>
		        <tr>
			        <th colspan="8" data-align="center">
			        	{{ $management_unit_code }} - {{ $management_unit_description }} 
			        	<br>
			        	Período: {{ $srch_balance_sheet_date_start }} a {{ $srch_balance_sheet_date_end }}</th>
			    </tr>
			    <tr>
			        <th data-width="2%" data-field="code" data-align="left">Código</th>
			        <th data-field="description">Descrição</th>
			        <th data-width="2%" data-field="code_short" data-align="center">Cód Reduzido</th>
			        <th data-width="10%" data-field="balace_previous" data-align="right">Saldo anterior R$</th>
			        <th data-width="10%" data-field="debit" data-align="right">Débito R$</th>
			        <th data-width="10%" data-field="credit" data-align="right">Crédito R$</th>
			        <th data-width="10%" data-field="balance_current" data-align="right">Saldo atual R$</th>
			        <th data-width="2%" data-field="account_balance_type_id" data-align="center">(C/D)</th>
			    </tr>
		    </thead>
		    <tbody>
			    @foreach($accounting_accounts as $accounting_account)
			        <tr>
			            @if($accounting_account->account_coverage_type_id=='1')
							<td><b>{{ $accounting_account->code }}</b></td>
			            	<td><b>{{ $accounting_account->description }}</b></td>
							<td><b>{{ $accounting_account->code_short }}</b></td>
			            	<td><b>{{ number_format($accounting_account->balance_previous, 2,",",".") }}</b></td>
			            	<td><b>{{ number_format($accounting_account->debit, 2,",",".") }}</b></td>
			            	<td><b>{{ number_format($accounting_account->credit, 2,",",".") }}</b></td>
			            	<td><b>{{ number_format($accounting_account->balance_current, 2,",",".") }}</b></td>
			            	<td><b>({{ $accounting_account->account_balance_type->code }})</b></td>
			            @else
			            	<td>{{ $accounting_account->code }}</td>
			            	<td>{{ $accounting_account->description }}</b></td>
							<td>{{ $accounting_account->code_short }}</b></td>
			            	<td>{{ number_format($accounting_account->balance_previous, 2,",",".") }}</td>
			            	<td>{{ number_format($accounting_account->debit, 2,",",".") }}</td>
			            	<td>{{ number_format($accounting_account->credit, 2,",",".") }}</td>
			            	<td>{{ number_format($accounting_account->balance_current, 2,",",".") }}</td>
			            	<td>({{ $accounting_account->account_balance_type->code }})</td>
			            @endif
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection