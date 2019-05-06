@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
      	<h4>
        	Administração - Movimentação Patrimônios > Tipo: CONSULTA
        	<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('patrimonial_movement_types.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('patrimonial_movement_types.edit', ['id' => $patrimonial_movement_type->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          		<a href="{!! route('patrimonial_movement_types') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
              <a href="{!! route('patrimonial_movement_types') !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
        	</div>
      	</h4>
      	<hr class="hr-warning" />
  	</div>

  	<div class="row">
    	<div class="col-sm-8">
      		<div class="table-responsive">
      			<table class="table table-bordered table-striped">
          			<thead>
           				<th class="text-center" colspan="2"><h3><b>{{ $patrimonial_movement_type->code }} - {{ $patrimonial_movement_type->description }}</b></h3></th>
          			</thead>
          			<tbody>
          				<tr>
           					<td class="text-right" width="25%">Código</td>
           					<td class="text-left">{{ $patrimonial_movement_type->code }}</td>
            			</tr>

        				<tr>
             				<td class="text-right">Descrição</td>
             				<td class="text-left">{{ $patrimonial_movement_type->description }}</td>
           				</tr>
          			</tbody>
        		</table>
      		</div>
    	</div>
    	<div class="col-sm-4">
    		@if(count($logs)>0)
         @include('revisionable.logs_register')
        @endif
    	</div>
    </div>
	    
@endsection
  