@extends('home')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Patrimônios: ALTERAÇÃO
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('patrimonials.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('patrimonials') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($patrimonial, ['route' => ['patrimonials.update', $patrimonial->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.edit_form')

	{!! Form::close() !!}
	    
@endsection