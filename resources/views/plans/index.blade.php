@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item">Planos</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_plans" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
		        <th data-width="1%" class="text-center">
		        	#
		        </th>
		        <th data-width="2%">Código</th>
		        <th>Descrição</th>
		        <th data-width="1%" class="text-center">#</th>
		    </thead>
		    <tbody>
			    @foreach($plans as $plan)
			        <tr>
			            <td>
			                <a href="{!! route('plans.edit', [$plan->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td>{!! $plan->code !!}</td>
			            <td>{!! $plan->description !!}</td>
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('plans.destroy', [$plan->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_plans').bootstrapTable();
	</script>
@endsection