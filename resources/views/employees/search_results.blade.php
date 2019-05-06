@extends('adminlte::page')

@section('content_header')
    <h1>FUNCIONÁRIOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('employees.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    	<a href="{!! route('employees.search') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
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
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_employees"> 
							<thead>
								<tr>
									<th>Região</th>
									<th>Cidade/UF</th>
									<th>Situação</th>
									<th>Matrícula</th>
									<th>CPF</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Bairro</th>	
									<th>CEP</th>
									<th>e-mail</th>
									<th>Fone</th>	
									<th>Celular</th>
									<th>Obs</th>		
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Região</th>
									<th>Cidade/UF</th>
									<th>Situação</th>
									<th>Matrícula</th>
									<th>CPF</th>
									<th>Nome</th>
									<th>Endereço</th>
									<th>Bairro</th>	
									<th>CEP</th>
									<th>e-mail</th>
									<th>Fone</th>	
									<th>Celular</th>
									<th>Obs</th>		
								</tr>
							</tfoot>
							<tbody>
								@foreach($employees as $employee)
							        <tr>
							        	<td>{{ $employee->region_description }}</td>
							        	<td>{{ $employee->city_description }}/{{ $employee->state_code }}</td>
							        	<td>{{ $employee->employee_status_description }}</td>
							        	<td class="text-right">
							        		<a href="{!! route('employees.show', ['id' => $employee->id]) !!}">{{ $employee->code }}</a>
							        	</td>
										<td>{{ $employee->cpf_mask }}</td>
							        	<td>{{ $employee->name }}</td>
							        	<td>{{ $employee->address }}</td>
							        	<td>{{ $employee->neighborhood }}</td>
							        	<td>{{ $employee->zip_code_mask }}</td>
							        	<td>{{ $employee->email }}</td>
							        	<td>{{ $employee->phone_mask }}</td>
							        	<td>{{ $employee->mobile_mask }}</td>
							        	<td>{{ $employee->comments }}</td>
							        </tr>
							    @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
