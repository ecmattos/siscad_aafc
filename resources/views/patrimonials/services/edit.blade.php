@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Patrimônios: Serviços - ALTERAÇÃO
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="col-sm-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title"><b>{{ $patrimonial->code }} - {{ $patrimonial->description }}</b></h3>
			</div>

	    	<div class="panel-body">
		  		{!! Form::model($patrimonial_service, ['route' => ['patrimonial_services.update', $patrimonial_service->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

				    @include('patrimonials.services.form')

				{!! Form::close() !!}
			</div> 
  		</div>
  	</div>

@endsection