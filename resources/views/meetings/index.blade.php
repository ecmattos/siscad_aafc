@extends('adminlte::page')

@section('content_header')
    <h1>EVENTOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('meetings.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
									<th>ID</th>
									<th>Data</th>
									<th>Tipo</th>
									<th>Cidade/UF</th>	
									<th>Região</th>
									<th>Descrição</th>
									<th>Situação</th>
									<th>Totais Partic Prev</th>
									<th>Totais Partic Confirm</th>
									<th>Despesas Totais</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th width="1%">ID</th>
									<th>Data</th>
									<th>Tipo</th>
									<th>Cidade/UF</th>	
									<th>Região</th>
									<th>Descrição</th>
									<th>Situação</th>
									<th>Totais Partic Prev</th>
									<th>Totais Partic Confirm</th>
									<th>Despesas Totais</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($meetings as $meeting)
							    <tr>
							     	<td><a href="{!! route('meetings.show', ['id' => $meeting->id]) !!}">{{ $meeting->id }}</a></td>
							     	<td>
							     		@if($meeting->date!=null)
				           			{{ $meeting->date->format('d/m/Y') }}
				        			@endif
				         		</td>
								   	
								  </tr>
							  @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@stop
