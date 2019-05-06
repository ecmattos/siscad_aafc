@extends('adminlte::page')

@section('content_header')
    <h1>EVENTOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('meeting_types.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
   		</div>
	</ol>
@stop


@extends('layouts.app')

@section('content')
	<div class="row">
      	<div class="col-md-12">
       		<div class="box box-info">
	            <div class="box-header with-border">
					<h3 class="box-title">PESQUISA</h3>
		        </div>

		        <div class="box-body"><!-- Main content -->
          			<table class="display" cellspacing="0" width="100%" id="table_meeting_types"> 
						<thead>
							<tr>
								<th>ID<</th>
								<th data-width="2%">Código</th>
								<th>Descrição</th>				
								<th data-width="1%" class="text-center">#</th>
							</tr>
						</thead>
						<tbody>
							@foreach($meeting_types as $meeting_type)
						        <tr>
						        	<td><a href="{!! route('meeting_types.edit', ['id' => $meeting_type->id]) !!}" type="button" class="round round-sm hollow blue"><i class='fa fa-edit'></i></a></td>
						        	<td>{{ $meeting_type->code }}</td>
						        	<td>{{ $meeting_type->description }}</td>
						        	<td>
						        		<a href="javascript:;" onclick="onDestroy('{!! route('meeting_types.destroy', [$meeting_type->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
						       		</td>
						        </tr>
						    @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_meeting_types').bootstrapTable();
	</script>
@endsection