@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
  		<li class="breadcrumb-item">Administração</li>
  		<li class="breadcrumb-item">Sócios</li>
  		<li class="breadcrumb-item"><a href="{!! route('member_statuses') !!}" class="btn btn-xs btn-warning"><i class="fa fa-arrow-left"></i> <b>Situações</b></a></li>
  		<li class="breadcrumb-item"><b>ALTERAÇÃO</b></li>
	</ol>

	{!! Form::model($member_status, ['route' => ['member_statuses.update', $member_status->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('member_statuses.form')

	{!! Form::close() !!}
	    
@endsection