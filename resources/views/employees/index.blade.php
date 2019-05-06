@extends('adminlte::page')

@section('content_header')
    <h1>FUNCIONÁRIOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('employees.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    </div>
	</ol>
@stop

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		<a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-users"></i></a>
	   		Sócios
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('members') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
        	</div>
      	</h4>
      	<hr class="hr-warning" />
    </div>

    <div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_members" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%"><a href="{!! route('members.create') !!}"><i class="fa fa-file-o"></i></a></th>
					<th data-field="code" data-sortable="true" data-align="" width="2%">Matrícula</th>
					<th data-field="cpf" data-sortable="true">CPF</th>
					<th data-field="name" data-sortable="true">Nome</th>
					<th data-field="plan_id" data-sortable="true">Plano</th>
					<th data-field="member_status_id" data-sortable="true">Situação</th>
					<th data-field="address">Endereço</th>
					<th data-field="neighborhood">Bairro</th>	
					<th data-field="zip_code">CEP</th>
					<th data-field="city_id" data-sortable="true">Cidade/UF</th>	
					<th data-field="region_id" data-sortable="true">Região</th>
					<th data-field="email" data-sortable="true">e-mail</th>
					<th data-field="date_fundacao">Fundação</th>
					<th data-field="date_inss">INSS</th>
					<th data-field="phone">Fone</th>	
					<th data-field="mobile">Celular</th>		
					<th data-width="1%">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($members as $member)
			        <tr>
			        	<td><a href="{!! route('members.edit', ['id' => $member->id]) !!}"><i class='fa fa-edit'></i></a></td>
			        	<td><a href="{!! route('members.show', ['id' => $member->id]) !!}">{{ $member->code }}</a></td></td>
			        	<td>{{ $member->cpf }}</td>
			        	<td>{{ $member->name }}</td>
			        	<td>{{ $member->plan->description }}</td>
			        	<td>{{ $member->member_status->description }}</td>
			        	<td>{{ $member->address }}</td>
			        	<td>{{ $member->neighborhood }}</td>
			        	<td>{{ $member->zip_code }}</td>
			        	<td>{{ $member->city->description }}/{{ $member->city->state->code }}</td>
			        	<td>{{ $member->city->region->description }}</td>
			        	<td>{{ $member->email }}</td>
			        	<td>{{ $member->date_fundacao }}</td>
			        	<td>{{ $member->date_inss }}</td>
			        	<td>{{ $member->phone }}</td>
			        	<td>{{ $member->mobile }}</td>
			        	<td>
			        		<a href="javascript:;" onclick="onDestroy('{!! route('members.destroy', [$member->id]) !!}')" id="link_delete"><i class="fa fa-trash-o text-danger"></i></a>
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_members').bootstrapTable();
	</script>
@endsection