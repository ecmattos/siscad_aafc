@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Serviços
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('services.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_services" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
		    <thead>
		        <th data-align="center" data-width="1%">
		        	<a href="{!! route('services.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
		        </th>
		        <th data-align="right" data-width="2%" data-field="code" data-sortable="true">Código</th>
		        <th data-align="left" data-field="description" data-sortable="true">Descrição</th>
		        <th data-align="center" data-width="2%" data-field="unit" data-sortable="true">Unidade</th>
		        <th data-align="center" data-width="1%">#</th>
		    </thead>
		    <tbody>
			    @foreach($services as $service)
			        <tr>
			            <td>
			                <a href="{!! route('services.edit', [$service->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td><a href="{!! route('services.show', [$service->id]) !!}">{!! $service->code !!}</a></td>
			            <td>{!! $service->description !!}</td>
			            <td>{!! $service->unit !!}</td>
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('services.destroy', [$service->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection