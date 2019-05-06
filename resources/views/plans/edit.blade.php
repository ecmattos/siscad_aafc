@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item"><a href="{!! route('plans') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Planos</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($plan, ['route' => ['plans.update', $plan->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('plans.form')

	{!! Form::close() !!}
	    
@endsection