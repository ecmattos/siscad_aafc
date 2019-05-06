@extends('layouts.app')

@section('content')
	<ol class="breadcrumb breadcrumb-danger">
	  	<li>Patrimônios</li>
	  	<li><b>PESQUISA</b></li>

	  	<div class="btn-group btn-group-sm pull-right">
	   		<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
	   	</div>
	</ol>


	<div class="page-header text-primary">
	   	<h4>
	   		<a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-users"></i></a>
	   		Parceiros
      	</h4>
      	<hr class="hr-warning" />
    </div>

    <div class="table-responsive">
		<div id="filter-bar"> </div>
		<table class="table table-bordered table-striped" id="table_partners" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="true" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%"><a href="{!! route('partners.create') !!}"><i class="fa fa-file-o"></i></a></th>
					<th data-field="name" data-sortable="true">Nome</th>
					<th data-field="partner_type_id" data-sortable="true">Tipo</th>
					<th data-field="address">Endereço</th>
					<th data-field="neighborhood">Bairro</th>	
					<th data-field="zip_code">CEP</th>
					<th data-field="city_id" data-sortable="true">Cidade/UF</th>	
					<th data-field="region_id" data-sortable="true">Região</th>
					<th data-field="email" data-sortable="true">e-mail</th>
					<th data-field="phone">Fone</th>	
					<th data-field="mobile">Celular</th>		
					<th data-width="1%">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($partners as $partner)
			        <tr>
			        	<td><a href="{!! route('partners.edit', ['id' => $partner->id]) !!}"><i class='fa fa-edit'></i></a></td>
			        	<td><a href="{!! route('partners.show', ['id' => $partner->id]) !!}">{{ $partner->name }}</a></td></td>
			        	<td>{{ $partner->partner_type->description }}</td>
			        	<td>{{ $partner->address }}</td>
			        	<td>{{ $partner->neighborhood }}</td>
			        	<td>{{ $partner->zip_code }}</td>
			        	<td>{{ $partner->city->description }}/{{ $partner->city->state->code }}</td>
			        	<td>{{ $partner->city->region->description }}</td>
			        	<td>{{ $partner->email }}</td>
			        	<td>{{ $partner->phone_mask }}</td>
			        	<td>{{ $partner->mobile_mask }}</td>
			        	<td>
			        		<a href="javascript:;" onclick="onDestroy('{!! route('partners.destroy', [$partner->id]) !!}')" id="link_delete"><i class="fa fa-trash-o text-danger"></i></a>
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_partners').bootstrapTable();

	  	$('#filter-bar').bootstrapTableFilter({
                filters:[
                    {
                        field: 'id',
                        label: 'Item ID',
                        type: 'select',
                        values: [
                            {id: '0', label: '0'},
                            {id: '1', label: '1'},
                            {id: '2', label: '2'}
                        ]
                    }
                ],
                onSubmit: function() {
                    var data = $('#filter-bar').bootstrapTableFilter('getData');
                    console.log(data);
                }
            });
	</script>
@endsection