
@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
   	<h4>
     	<a href="{!! route('dashboard.pc_members') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Ir para Painel Controle Sócios"><i class="fa fa-users"></i></a>
      Administração - Tipos de Eventos: CONSULTA
     	<div class="btn-group btn-group-sm pull-right">
        <a href="{!! route('meeting_types') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
     		<a href="{!! route('meeting_types.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
     		<a href="{!! route('meeting_types.edit', ['id' => $meeting_type->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
     		<a href="{!! route('meeting_types.destroy') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
     	</div>
   	</h4>
   	<hr class="hr-warning" />
  </div>

  <div class="well well-sm text-center">
    <h3><b>{{ $meeting_type->description }} / {{ $meeting_type->state->code }}</b></h3> 
  </div>
  
 	<div class="row">
    <div class="col-sm-8">
   		<div class="table-responsive">
   			<table class="table table-bordered table-striped">
     			<thead>
     			</thead>
     			<tbody>
     				<tr>
     					<td class="text-right" width="25%">UF</td>
     					<td class="text-left">{{ $meeting_type->state->description }} ({{ $meeting_type->state->code }})</td>
       			</tr>

   				  <tr>
       				<td class="text-right">Descrição</td>
       				<td class="text-left">{{ $meeting_type->description }}</td>
     				</tr>

            <tr>
              <td class="text-right">Região</td>
              <td class="text-left">{{ $meeting_type->region->description }} ({{ $meeting_type->region->code }})</td>
            </tr>
    			</tbody>
     		</table>
   		</div>
   	</div>

   	<div class="col-sm-4">
   		@include('revisionable.logs_register')
    </div>
  </div>

	    
@endsection
  