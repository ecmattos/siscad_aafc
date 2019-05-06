@extends('adminlte::page')

@section('content_header')
  <h1>PATRIMÔNIOS / REQUISIÇÕES</h1>
  
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('patrimonial_requests.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>

      @if($patrimonial_request->patrimonial_request_status_id == '1')
        @if($patrimonial_request_items->count()>=1)
          <a href="{!! route('patrimonial_requests.close', [$patrimonial_request->id]) !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Encerrar"><i class="fa fa-thumbs-o-up"></i></a>
        @endif
        <a href="{!! route('patrimonial_requests.destroy', [$patrimonial_request->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Cancelar"><i class="fa fa-thumbs-o-down"></i></a>
      @endif

      @if($patrimonial_request->patrimonial_request_status_id == '2')
        <a href="{!! route('patrimonial_requests.report', [$patrimonial_request->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Imprimir"><i class="fa fa-print"></i></a>
        
        <a href="{!! route('patrimonial_requests.destroy', [$patrimonial_request->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Cancelar"><i class="fa fa-thumbs-o-down"></i></a>
      @endif
    </div>
  </ol>
@stop

@section('content')
  @if($patrimonial_request->deleted_at)
    @include('common.trashed')
  @endif
  
  <div class="row">
      <div class="col-sm-8">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $patrimonial_request->id }}</h3>
            <div class="box-tools pull-right">
              {{ $patrimonial_request->patrimonial_request_status->description }}
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
              
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <div class="text-center">
                    <h4>ORIGEM</h4>
                  </div>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-right" width="25%">Responsável</td>
                    <td class="text-left">{{ $patrimonial_request->from_employee->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <div class="text-center">
                    <h4>DESTINO</h4>
                  </div>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-right" width="25%">Unid.Gestora</td>
                    <td class="text-left">{{ $patrimonial_request->to_management_unit->code }} - {{ $patrimonial_request->to_management_unit->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Setor</td>
                    <td class="text-left">{{ $patrimonial_request->to_company_sector->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Sub-setor</td>
                    <td class="text-left">{{ $patrimonial_request->to_company_sub_sector->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Responsável</td>
                    <td class="text-left">{{ $patrimonial_request->to_employee->name }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Situação</td>
                    <td class="text-left">{{ $patrimonial_request->to_patrimonial_status->description }}</td>
                  </tr>

                  <tr>
                    <td class="text-right">Justificativa</td>
                    <td class="text-left">{{ $patrimonial_request->comments }}</td>
                  </tr>

                  @if($patrimonial_request->patrimonial_request_status_id == '3')
                    <tr>
                      <td class="text-right">Data Movimentação</td>
                      <td class="text-left">
                        @if($patrimonial_request->to_patrimonial_status_date!=null)
                          {{ $patrimonial_request->to_patrimonial_status_date->format('d/m/Y') }}
                        @endif
                      </td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>

            @if($patrimonial_request->patrimonial_request_status_id == '2')
              {!! Form::model($patrimonial_request, ['route' => ['patrimonial_requests.confirm', $patrimonial_request->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                <div class="form-group {{ $errors->has('to_patrimonial_status_date') ? 'has-error' : '' }}">
                  <label for="to_patrimonial_status_date" class="col-sm-3 control-label">Data Movimentação:</label>
                  <div class="col-sm-8">
                    <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        {!! Form::text('to_patrimonial_status_date', isset($patrimonial_request->to_patrimonial_status_date) ? $patrimonial_request->to_patrimonial_status_date->format('d/m/Y') : null, ['id'=>'to_patrimonial_status_datepicker', 'class'=>'form-control datepicker date_mask']) !!}
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-flat btn-success">Confirmar <i class="fa fa-check"></i></button>
                    </div>
                  </div>
                </div>
              {!! Form::close() !!}
            @endif
          </div>
        </div>
      </div> 

      <div class="col-sm-4">
        @include('revisionable.logs_register')
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">PATRIMÔNIOS</b></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            @if($patrimonial_request->patrimonial_request_status_id == 1)
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table_members"> 
                  <thead>
                    <tr>
                      <th width="1%" class="text-center">#</th>
                      <th class="text-left">Código</th>
                      <th>Descrição</th>
                      <th>Unid.Gestora</th>
                      <th>Setor</th>
                      <th>Sub-setor</th>
                      <th>Situação</th>
                      <th class="text-left">Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($employee_patrimonials as $patrimonial)
                      <tr>
                        <td>
                          @if($patrimonial_request_items_lookup->contains('patrimonial_id', $patrimonial->id))
                            <a href="{!! route('patrimonial_requests.removeItem', [$patrimonial_request->id, $patrimonial->id]) !!}" type="button" class="btn btn-xs btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
                          @else
                            <a href="{!! route('patrimonial_requests.addItem', [$patrimonial_request->id, $patrimonial->id]) !!}"  type="button" class="btn btn-xs btn-success" rel="tooltip" title="Incluir"><i class="fa fa-plus"></i></a>
                          @endif
                        </td>
                        <td class="text-right"><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{{ $patrimonial->code }}</a></td>
                        <td>{{ $patrimonial->description }}</td>
                        <td>{{ $patrimonial->management_unit->code }}</td>
                        <td>{{ $patrimonial->company_sector->description }}</td>
                        <td>{{ $patrimonial->company_sub_sector->description }}</td>
                        <td>{{ $patrimonial->patrimonial_status->description }}</td>
                        <td>{{ $patrimonial->patrimonial_status_date->format('d/m/Y') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif

            @if(($patrimonial_request->patrimonial_request_status_id == 3) || ($patrimonial_request->patrimonial_request_status_id == 2) || ($patrimonial_request->patrimonial_request_status_id == 4))
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table_members"> 
                  <thead>
                    <tr>
                      <th width="1%" class="text-center">#</th>
                      <th class="text-right">Código</th>
                      <th>Descrição</th>                
                      <th>Unid.Gestora</th>
                      <th>Setor</th>
                      <th>Sub-setor</th>
                      <th class="text-left">Situação</th>
                      <th class="text-left">Data</th>
                    </tr>
                  </thead>    
                  <tbody>
                    @foreach($patrimonial_request_items as $patrimonial_request_item)
                      <tr>
                        <td>
                          @if($patrimonial_request_items_lookup->contains('patrimonial_id', $patrimonial_request_item->patrimonial_id))
                            @if(!$patrimonial_request_item->to_patrimonial_status_date)
                              <a href="{!! route('patrimonial_requests.removeItem', [$patrimonial_request->id, $patrimonial_request_item->patrimonial_id]) !!}" type="button" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            @else
                              <i class="fa fa-check-square-o"></i>
                            @endif
                          @endif
                        </td>
                        <td class="text-right"><a href="{!! route('patrimonials.show', [$patrimonial_request_item->patrimonial_id]) !!}">{{ $patrimonial_request_item->patrimonial->code }}</a></td>
                        <td>{{ $patrimonial_request_item->patrimonial->description }}</td> 
                        <td>{{ $patrimonial_request_item->from_management_unit->code }}</td>
                        <td>{{ $patrimonial_request_item->from_company_sector->description }}</td>
                        <td>{{ $patrimonial_request_item->from_company_sub_sector->description }}</td>
                          <td>{{ $patrimonial_request_item->from_patrimonial_status->description }}</td> 
                          <td>
                            @if($patrimonial_request_item->from_patrimonial_status_date!=null)
                              {{ $patrimonial_request_item->from_patrimonial_status_date->format('d/m/Y') }}
                            @endif
                          </td>                 
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
  </div>
@endsection
  