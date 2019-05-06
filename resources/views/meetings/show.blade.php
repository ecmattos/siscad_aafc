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
      @include('revisionable.logs_register')
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      @include('meetings.members')
      @include('meetings.employees')
      @include('meetings.partners')
    </div>
  </div>
@endsection
  