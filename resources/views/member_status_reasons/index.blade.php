@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item"><b>Desligamento - Motivos</b></li>
	</ol>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_member_status_reasons" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
		    <thead>
		        <th data-width="1%">
		        	<a href="{!! route('member_status_reasons.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
		        <th data-width="2%">Código</th>
		        <th>Descrição</th>
		        <th data-width="1%" class="text-center">#</th>
		    </thead>
		    <tbody>
			    @foreach($member_status_reasons as $member_status_reason)
			        <tr>
			            <td>
			                <a href="{!! route('member_status_reasons.edit', [$member_status_reason->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td>{!! $member_status_reason->code !!}</td>
			            <td>{!! $member_status_reason->description !!}</td>
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('member_status_reasons.destroy', [$member_status_reason->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_member_status_reasons').bootstrapTable();
	</script>
@endsection