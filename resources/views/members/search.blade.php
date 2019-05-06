@extends('adminlte::page')

@section('content_header')
    <h1>SÓCIOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('members.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
		<a href="{!! route('dashboard.pc_members') !!}" type="button" class="btn btn-sm btn-warning" rel="tooltip" title="PC Sócios"><i class="fa fa-dashboard"></i></a>
		</div>
	</ol>
@stop


@section('content')

  {!! Form::open(['route' => 'members.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('members.search_form')

	{!! Form::close() !!}

@stop