@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item">Situações</li>
  		<li class="breadcrumb-item"><b>PESQUISA</b></li>
	</ol>
				
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_patrimonial_statuses" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
		    <thead>
		        <th data-width="2%">Código</th>
		        <th>Descrição</th>
		    </thead>
		    <tbody>
			    @foreach($patrimonial_statuses as $patrimonial_status)
			        <tr>
			            <td>{!! $patrimonial_status->code !!}</td>
			            <td>{!! $patrimonial_status->description !!}</td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_patrimonial_statuses').bootstrapTable();
	</script>
@endsection