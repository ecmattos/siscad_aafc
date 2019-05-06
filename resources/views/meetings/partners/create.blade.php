@extends('adminlte::page')

@section('content_header')
  	@include('meetings.header')
@stop

@section('content')
  	<!-- Main content -->
  	@if($meeting->deleted_at)
    	@include('common.trashed')
 	@endif
  
	 <div class="row">
		<div class="col-md-3">
			@include('meetings.data')
		</div>

		<div class="col-md-5">
			@include('meetings.expenses')
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">INCLUSÃO</h3>
						</div>
							
						{!! Form::open(['route' => 'meeting_partners.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}
						{{ Form::hidden('meeting_id', $meeting->id, array('id' => 'meeting_id')) }}
							<div class="box-body">
								<?php $form_method = "post"; ?>
								@include('meetings.partners.form')
							</div>

							<div class="box-footer">
								<label for="submit_buttons" class="col-sm-2 control-label"></label>
								<button type="submit" class="btn btn-flat btn-success">Confirmar <i class="fa fa-check"></i></button>
								<a href="{{ URL::previous() }}" class="btn btn-flat btn-danger">Cancelar <i class="fa fa-times"></i></a>
							</div>							
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			@include('meetings.partners')
		</div>
	</div>
@endsection

