@extends('adminlte::page')

@section('content_header')
    <h1>MATERIAIS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('materials.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
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
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_materials"> 
							<thead>
								<tr>
									<th width="5%">Código</th>
									<th>Descrição</th>
									<th width="5%">Unidade</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th width="5%">Código</th>
									<th>Descrição</th>
									<th width="5%">Unidade</th>
								</tr>
							</tfoot>
							<tbody>
								 @foreach($materials as $material)
								    <tr>
								        <td class="text-right"><a href="{!! route('materials.show', [$material->id]) !!}">{{ $material->code }}</a></td>
								        <td>{{ $material->description }}</td>
							            <td>{{ $material->material_unit->code }}</td>
								    </tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
