@extends('adminlte::page')

@section('content_header')
    <h1>CONFIGURAÇÃO: LOCALIDADES - CIDADES</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('cities.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_cities"> 
							<thead>
								<tr>
									<th width="2%">UF</th>
		        					<th>Descrição</th>
		        					<th width="10%">Região</th>
		        				</tr>
		        			</thead>
		        			<tfoot>
		        				<tr>
									<th width="2%">UF</th>
		        					<th>Descrição</th>
		        					<th width="10%">Região</th>
		        				</tr>
		        			</tfoot>
							<tbody>
							    @foreach($cities as $city)
								    <tr>
										<td>{{ $city->state->code }}</td>
								        <td><a href="{!! route('cities.show', [$city->id]) !!}">{{ $city->description }}</a></td>
								        <td>{{ $city->region->description }}</td>
							        </tr>
							    @endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
