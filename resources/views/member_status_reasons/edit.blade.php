@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item"><a href="{!! route('member_status_reasons') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Desligamento - Motivos</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($member_status_reason, ['route' => ['member_status_reasons.update', $member_status_reason->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('member_status_reasons.form')

	{!! Form::close() !!}
	    
@endsection