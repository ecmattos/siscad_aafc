@extends('adminlte::page')

@section('content_header')
    <h1>UNIDADES GESTORAS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('management_units.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display" cellspacing="0" width="100%" id="table_management_units"> 
							<thead>
								<tr>
									<th>Código</th>
									<th>Descrição</th>
									<th>Endereço</th>
									<th>Bairro</th>
									<th>Cidade/UF</th>
									<th>CEP</th>
									<th>Fone</th>
									<th>Celular</th>
									<th>E-mail</th>
									<th>Obs</th>		
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>Código</th>
									<th>Descrição</th>
									<th>Endereço</th>
									<th>Bairro</th>
									<th>Cidade/UF</th>
									<th>CEP</th>
									<th>Fone</th>
									<th>Celular</th>
									<th>E-mail</th>
									<th>Obs</th>		
								</tr>
							</tfoot>
							<tbody>
							    @foreach($management_units as $management_unit)
							        <tr>
								        <td>
							            	<a href="{!! route('management_units.show', [$management_unit->id]) !!}">{{ $management_unit->code }}</a></td>
							            <td>{{ $management_unit->description }}</td>
							            <td>{{ $management_unit->address }}</td>
								        <td>{{ $management_unit->neighborhood }}</td>
								        <td>{{ $management_unit->city->description }}/{{ $management_unit->city->state->code }}</td>
								        <td>{{ $management_unit->zip_code_mask }}</td>
							            <td>{{ $management_unit->phone_mask }}</td>
									    <td>{{ $management_unit->mobile_mask }}</td>
									    <td>{{ $management_unit->email }}</td>
									    <td>{{ $management_unit->comments }}</td>
								    </tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
	  	$(document).ready(function() 
		{
    		$('#table_management_units').DataTable( 
    		{
                responsive: true,
                dom: 'Bfrtip',
		        buttons: [
		            'copy', 'csv', 'excel', 'pdf', 'print'
		        ],
		        language: {
            		"lengthMenu": "Display _MENU_ records per page",
            		"zeroRecords": "Ops ... Nenhum REGISTRO localizado !",
            		"info": "Showing page _PAGE_ of _PAGES_",
            		"infoEmpty": "No records available",
            		"infoFiltered": "(filtered from _MAX_ total records)"
        		}
    		});
		});	
	</script>
@endsection