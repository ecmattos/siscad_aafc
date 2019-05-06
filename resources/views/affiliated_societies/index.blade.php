@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
  		<li class="breadcrumb-item"><b>Filiais</b></li>
	</ol>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_affiliated_societies" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar">
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						<a href="{!! route('affiliated_societies.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
					</th>
					<th data-field="code" data-sortable="true">Código</th>
					<th data-field="cnpj" data-sortable="true">CNPJ</th>
					<th data-field="description" data-sortable="true">Descrição</th>
					<th data-field="address">Endereço</th>
					<th data-field="neighborhood">Bairro</th>
					<th data-field="city_id" data-sortable="true">Cidade/UF</th>
					<th data-field="zip_code">CEP</th>
					<th data-field="phone">Fone</th>
					<th data-field="mobile">Celular</th>
					<th data-field="email" data-sortable="true">e-mail</th>
					<th data-field="comments">Obs</th>		
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($affiliated_societies as $affiliated_society)
			        <tr>
			            <td>
			                <a href="{!! route('affiliated_societies.edit', [$affiliated_society->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
			            </td>
			            <td>{{ $affiliated_society->code }}</td>
			            <td><a href="{!! route('affiliated_societies.show', [$affiliated_society->id]) !!}">{!! $affiliated_society->cnpj_mask !!}</a></td>
			            <td>{{ $affiliated_society->description }}</td>
			            <td>{{ $affiliated_society->address }}</td>
			            <td>{{ $affiliated_society->neighborhood }}</td>
			            <td>{{ $affiliated_society->city->description }}/{{ $affiliated_society->city->state->code }}</td>
			            <td>{{ $affiliated_society->zip_code_mask }}</td>
						<td>{{ $affiliated_society->phone_mask }}</td>
					    <td>{{ $affiliated_society->mobile_mask }}</td>
					    <td>{{ $affiliated_society->email }}</td>
					    <td>{{ $affiliated_society->comments }}</td>
			            <td>
			            	<a href="javascript:;" onclick="onDestroy('{!! route('affiliated_societies.destroy', [$affiliated_society->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
			            </td>
			        </tr>
			    @endforeach
		    </tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_affiliated_societies').bootstrapTable();
	</script>
@endsection