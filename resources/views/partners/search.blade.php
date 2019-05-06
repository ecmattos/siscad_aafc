@extends('adminlte::page')

@section('content_header')
    <h1>PARCEIROS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('partners.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    	<a href="{!! route('dashboard.pc_partners') !!}" type="button" class="btn btn-sm btn-warning" rel="tooltip" title="PC Parceiros"><i class="fa fa-dashboard"></i></a>
		</div>
	</ol>
@stop

@section('content')
	
	{!! Form::open(['route' => 'partners.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('partners.search_form')

	{!! Form::close() !!}

@endsection