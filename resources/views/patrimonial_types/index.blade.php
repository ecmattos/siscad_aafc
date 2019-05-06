@extends('adminlte::page')

@section('content_header')
    <h1>CONFIGURAÇÃO: PATRIMÔNIOS - TIPOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('patrimonial_types.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    </div>
	</ol>
@stop

@section('content')
	<div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body"><!-- Main content -->
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_patrimonial_types"> 
							<thead>
								<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        					<th>Conta Ativo</th>
		        					<th>Conta Depreciação</th>
		        					<th>Vida útil (anos)</th>
		        				</tr>
						    </thead>
						    <tfoot>
								<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        					<th>Conta Ativo</th>
		        					<th>Conta Depreciação</th>
		        					<th>Vida útil (anos)</th>
		        				</tr>						    </tfoot>
						    <tbody>
							    @foreach($patrimonial_types as $patrimonial_type)
							        <tr>
							            <td><a href="{!! route('patrimonial_types.show', [$patrimonial_type->id]) !!}">{!! $patrimonial_type->code !!}</a></td>
							            <td>{!! $patrimonial_type->description !!}</td>
							            <td>{{ $patrimonial_type->asset_accounting_account->code }} - {{ $patrimonial_type->asset_accounting_account->description }} ({{ $patrimonial_type->asset_accounting_account->account_balance_type->code }})</td>
							            <td>{{ $patrimonial_type->depreciation_accounting_account->code }} - {{ $patrimonial_type->depreciation_accounting_account->description }} ({{ $patrimonial_type->depreciation_accounting_account->account_balance_type->code }})</td>
							            <td class="text-center">{{ $patrimonial_type->useful_life_years }}</td>
							        </tr>
			    				@endforeach
		    				</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
