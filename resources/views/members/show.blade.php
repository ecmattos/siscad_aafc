@extends('adminlte::page')

@section('content_header')
  <h1>SÓCIOS</h1>
    
  <ol class="breadcrumb">
    <div class="btn-group-horizontal">
      <a href="{!! route('members.edit', ['id' => $member->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
      <a href="{!! route('members.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
      <a href="{!! route('members.search_results_back') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
      <a href="{!! route('members.destroy', ['id' => $member->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
      <a href="{!! route('dashboard.pc_members') !!}" type="button" class="btn btn-sm btn-warning" rel="tooltip" title="PC Sócios"><i class="fa fa-dashboard"></i></a>
    </div>
  </ol>
@stop

@section('content')
  @if($member->deleted_at)
    @include('common.trashed')
  @endif

  <div class="row">
    <div class="col-sm-4">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $member->name }}</h3>
        </div>
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/uploads/avatars/members/{{ $member->avatar }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{ $member->fullname }}</h3>

          <p class="text-muted text-center">
            {{ $member->member_status->description }}
            @if($member->member_status_id=='1')
              por {{ $member->member_status_reason->description }} {{ $member->date_aafc_fim->diffForHumans() }} (desde {{ $member->date_aafc_fim->format('d/m/Y') }})
            @endif
            @if($member->member_status_id=='2')
              {{ $member->date_aafc_ini->diffForHumans() }} (desde {{ $member->date_aafc_ini->format('d/m/Y') }}) 
            @endif
          </p>

          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              Matrícula <a class="pull-right">{{ $member->code }}</a>
            </li>
            <li class="list-group-item">
              CPF <a class="pull-right">{{ $member->cpf_mask }}</a>
            </li>
            <li class="list-group-item">
              Plano <a class="pull-right">{{ $member->plan->description }}</a>
            </li>
            <li class="list-group-item">
              Situação <a class="pull-right">
                        {{ $member->member_status->description }}
                          @if($member->member_status_id=='1')
                            por {{ $member->member_status_reason->description }} {{ $member->date_aafc_fim->diffForHumans() }} (desde {{ $member->date_aafc_fim->format('d/m/Y') }})
                          @endif

                          @if($member->member_status_id=='2')
                            {{ $member->date_aafc_ini->diffForHumans() }} (desde {{ $member->date_aafc_ini->format('d/m/Y') }}) 
                          @endif
                        </a>
            </li>
            <li class="list-group-item">
              Nascimento <a class="pull-right">
                            @if($member->birthday!=null)
                              {{ $member->birthday->format('d/m/Y') }} ({{ $member->birthday->age }} anos)
                            @endif
                         </a>
            </li>
            <li class="list-group-item">
              E-Mail <a class="pull-right">{{ $member->email }}</a>
            </li>
            <li class="list-group-item">
              Endereço <a class="pull-right">{{ $member->address }}</a>
            </li>
            <li class="list-group-item">
              Bairro <a class="pull-right">{{ $member->neighborhood }}</a>
            </li>
            <li class="list-group-item">
              Cidade <a class="pull-right">{{ $member->city->description }} / {{ $member->city->state->code }}</a>
            </li>
            <li class="list-group-item">
              CEP <a class="pull-right">{{ $member->zip_code_mask }}</a>
            </li>
            <li class="list-group-item">
              Região <a class="pull-right">{{ $member->city->region->description }} ({{ $member->city->region->code }})</a>
            </li>
            <li class="list-group-item">
              Telefone <a class="pull-right">{{ $member->phone_mask }}</a>
            </li>
            <li class="list-group-item">
              Celular <a class="pull-right">{{ $member->mobile_mask }}</a>
            </li>
            <li class="list-group-item">
              Observações <a class="pull-right">{{ $member->comments }}</a>
            </li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
    </div>

    <div class="col-sm-8">
      @include('members.payments')
      @include('revisionable.logs_register')
    </div>
  </div>
@endsection
  