@extends('adminlte::page')

@section('content_header')
  <h1>ADMINISTRAÇÃO - ACESSIBILIDADE: GRUPOS</h1>
@stop

@section('content')
	
	<div class="well well-sm text-center">
		<h4>{{ $role->display_name }}</h4>
	</div>
		
	<div class="row">
		<div class="col-sm-4">
			@include ('roles.users')
		</div>

		<div class="col-sm-8">
			@include ('roles.permissions')
		</div>
	</div>
@endsection
