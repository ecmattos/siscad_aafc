@extends('adminlte::page')

@section('content_header')
  <h1>PATRIMÔNIOS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
        <a href="{!! route('patrimonials.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
    </div>
  </ol>
@stop

@section('content')

  {!! Form::open(['route' => 'patrimonials.search_results', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonials.search_form')

	{!! Form::close() !!}

@endsection