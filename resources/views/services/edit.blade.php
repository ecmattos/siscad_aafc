@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Serviços: ALTERAÇÃO
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('services.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('services') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('services.form')

	{!! Form::close() !!}
	    
@endsection