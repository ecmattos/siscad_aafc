@extends('layouts.app')

@section('content')
	
	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Patrimônios</li>
  		<li class="breadcrumb-item">Materiais</li>
  		<li class="breadcrumb-item"><a href="{!! route('patrimonials.search') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Pesquisa</b></a></li>
  		<li class="breadcrumb-item"><b>INCLUSÃO</b></li>
	</ol>

	<div class="col-sm-12">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title"><b>{{ $patrimonial->code }} - {{ $patrimonial->description }}</b></h3>
			</div>

	    	<div class="panel-body">
		  		{!! Form::open(['route' => ['patrimonial_materials.store', $patrimonial->id], 'method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
		    		@include('patrimonials.materials.form')
				{!! Form::close() !!}
			</div> 
  		</div>
  	</div>

@endsection
