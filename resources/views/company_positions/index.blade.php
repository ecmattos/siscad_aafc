@extends('adminlte::page')

@section('content_header')
    <h1>CONFIGURAÇÃO: EMPRESA - CARGOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('company_positions.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_company_positions"> 
							<thead>
								<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        				</tr>
		        			</thead>
		        			<tfoot>
		        				<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        				</tr>
		        			</tfoot>
							<tbody>
							    @foreach($company_positions as $company_position)
								    <tr>
										<td><a href="{!! route('company_positions.show', [$company_position->id]) !!}">{{ $company_position->code }}</a></td>
								        <td>{{ $company_position->description }}</td>
							        </tr>
							    @endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
