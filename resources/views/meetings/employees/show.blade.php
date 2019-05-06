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
      <div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">CONSULTA</h3>
				</div>
						
		  	<div class="box-body">
      		<div class="table-responsive">
         		<table class="table table-bordered table-striped">
							<thead>
							</thead>
							<tbody>
                <tr>
                  <td class="text-right" width="25%">Participante:</td>
                  <td class="text-left">{{ $meeting_employee->employee->name }}</td>
                </tr>

                <tr>
                  <td class="text-right">Previsão:</td>
                  <td class="text-left">
                    @if ($meeting_employee->expected_qty == '1')
                      <a href="{!! route('meeting_employees.edit', ['id' => $meeting_employee->id]) !!}" type="button" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"></i></a>
                    @else
                      <a href="{!! route('meeting_employees.edit', ['id' => $meeting_employee->id]) !!}" type="button" class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"></i></a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td class="text-right">Acompanhante:</td>
                  <td class="text-left">{{ $meeting_employee->expected_qty_companion }}</td>
                </tr>

                <tr>
                  <td class="text-right">Acompanhante Extra:</td>
                  <td class="text-left">{{ $meeting_employee->expected_qty_companion_extra }}</td>
                </tr>

                <tr>
                  <td class="text-right">Confirmado:</td>
                  <td class="text-left">
                    @if ($meeting_employee->confirmed_qty == '1')
                      <a href="{!! route('meeting_employees.edit', ['id' => $meeting_employee->id]) !!}" type="button" class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"></i></a>
                    @else
                      <a href="{!! route('meeting_employees.edit', ['id' => $meeting_employee->id]) !!}" type="button" class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"></i></a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td class="text-right">Acompanhante:</td>
                  <td class="text-left">{{ $meeting_employee->confirmed_qty_companion }}</td>
                </tr>

                <tr>
                  <td class="text-right">Acompanhante Extra:</td>
                  <td class="text-left">{{ $meeting_employee->confirmed_qty_companion_extra }}</td>
                </tr>

                <tr>
                  <td class="text-right">Observações:</td>
                  <td class="text-left">{{ $meeting_employee->comments }}</td>
                </tr>

              </tbody>
            </table>
        	</div>
        </div>
      </div>
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

@section('js')
	<script type="text/javascript">
		$('#meeting_employees_box').boxWidget('expand');
		$('#meeting_employees_table').reload(null, false);
	</script>
@endsection
