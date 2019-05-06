@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
      	<h4>
        	Administração - Plano: CONSULTA
        	<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_statuses.create') !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('payment_statuses.edit', ['id' => $payment_status->id]) !!}" type="button" class="btn btn-xs btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          		<a href="{!! route('payment_statuses') !!}" type="button" class="btn btn-xs btn-danger" rel="tooltip" title="Pesquisar"><i class="fa fa-trash-o"></i></a>
        	</div>
      	</h4>
      	<hr class="hr-warning" />
  	</div>

  	<div class="row">
    	<div class="col-sm-8">
      		<div class="table-responsive">
      			<table class="table table-bordered table-striped">
          			<thead>
           				<th class="text-center" colspan="2"><h3><b>{{ $payment_status->code }} - {{ $payment_status->description }}</b></h3></th>
          			</thead>
          			<tbody>
          				<tr>
           					<td class="text-right" width="25%">Código</td>
           					<td class="text-left">{{ $payment_status->code }}</td>
            			</tr>

        				<tr>
             				<td class="text-right">Descrição</td>
             				<td class="text-left">{{ $payment_status->description }}</td>
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
  