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
							<h3 class="box-title">ALTERAÇÃO</h3>
						</div>
							
						{!! Form::model($meeting_member, ['route' => ['meeting_members.update', $meeting_member->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

						<div class="box-body">
								
						<?php $form_method = "put"; ?>

							@include('meetings.members.form')
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
      @include('meetings.members')
    </div>
  </div>
@endsection


