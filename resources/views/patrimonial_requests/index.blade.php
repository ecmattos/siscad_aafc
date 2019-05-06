@extends('adminlte::page')

@section('content_header')
    <h1>PATRIMÔNIOS / REQUISIÇÕES</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('patrimonial_requests.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_meetings"> 
							<thead>
								<tr>
									<th width="1%">ID</th>
									<th>Origem</th>
									<th>Destino</th>
									<th>Movimentação</th>
									<th>Unid.Gestora</th>
									<th>Setor</th>
									<th>Sub-Setor</th>
									<th>Justificativa</th>
									<th>Situação</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th width="1%">ID</th>
									<th>Origem</th>
									<th>Destino</th>
									<th>Movimentação</th>
									<th>Unid.Gestora</th>
									<th>Setor</th>
									<th>Sub-Setor</th>
									<th>Justificativa</th>
									<th>Situação</th>
								</tr>
							</tfoot>
							<tbody>
							    @foreach($patrimonial_requests as $patrimonial_request)
							        <tr>
							            <td><a href="{!! route('patrimonial_requests.show', [$patrimonial_request->id]) !!}">{{ $patrimonial_request->id }}</a></td>
							            <td>{{ $patrimonial_request->from_employee->name }}</td>
							            <td>{{ $patrimonial_request->to_employee->name }}</td>
							            <td>
							            	@if($patrimonial_request->to_patrimonial_status_date!=null)
							                    {{ $patrimonial_request->to_patrimonial_status_date->format('d/m/Y') }}
							                @endif
							            </td>
							            <td>{{ $patrimonial_request->to_management_unit->code }}</td>
							            <td>{{ $patrimonial_request->to_company_sector->description }}</td>
							            <td>{{ $patrimonial_request->to_company_sub_sector->description }}</td>
							            <td>{{ $patrimonial_request->comments }}</td>
							            <td>{{ $patrimonial_request->patrimonial_request_status->description }}</td>
							        </tr>
							    @endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
