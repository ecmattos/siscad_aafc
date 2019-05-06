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

  {!! Form::open(['route' => 'employees.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('employees.search_form')

	{!! Form::close() !!}

@endsection