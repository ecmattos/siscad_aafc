@extends('adminlte::page')

@section('content_header')
    <h1>CONFIGURAÇÃO: PATRIMÔNIOS - SUB-TIPOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('patrimonial_sub_types.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
		        				</tr>
		        			</thead>
		        			<tfoot>
		        				<tr>
									<th width="2%">Código</th>
		        					<th>Descrição</th>
		        				</tr>
		        			</tfoot>
							<tbody>
							    @foreach($patrimonial_sub_types as $patrimonial_sub_type)
								    <tr>
										<td><a href="{!! route('patrimonial_sub_types.show', [$patrimonial_sub_type->id]) !!}">{{ $patrimonial_sub_type->code }}</a></td>
								        <td>{{ $patrimonial_sub_type->description }}</td>
							        </tr>
							    @endforeach
						    </tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
