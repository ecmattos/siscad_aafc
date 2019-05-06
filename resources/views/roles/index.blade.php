@extends('adminlte::page')

@section('content_header')
    <h1>ADMINISTRAÇÃO - ACESSIBILIDADE: GRUPOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('roles.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_roles"> 
							<thead>
								<tr>
									<th>Grupos</th>
									<th width="5%">Usuários</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>Grupos</th>
									<th width="5%">Usuários</th>
								</tr>
							</tfoot>

							<tbody>
								@foreach($roles as $role)
							        <tr>
							        	<td><a href="{!! route('roles.show', ['id' => $role->id]) !!}">{{ $role->display_name }}</a></td>
							        	<td class="text-center"><span class="badge"></span></td>
							    	</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
