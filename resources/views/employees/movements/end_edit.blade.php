@extends('adminlte::page')

@section('content')

	@include('employees.view_header')

  <div class="col-sm-4">
    @include('employees.view')
  </div>

  <div class="col-sm-8">
  	@include('employees.movements')
    	
    	<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title"><b>MOVIMENTAÇÃO: ALTERAÇÂO</b></h3>
			</div>

	    	<div class="panel-body">
		  		{!! Form::model($employee_movement, ['route' => ['employees.end_movement_update', $employee_movement->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

				    @include('employees.movements.end_edit_form')

				{!! Form::close() !!}
			</div> 
  		</div>
  </div>
    
@endsection

