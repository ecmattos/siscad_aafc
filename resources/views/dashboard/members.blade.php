@extends('adminlte::page')

@section('content_header')
    <h1>SÓCIOS {{ $member_status->description }}S</h1>
        <b>Painel Controle</b>
    
    <ol class="breadcrumb">
        <div class="btn-group-horizontal">
            <a href="{!! route('dashboard.pc_members', ['pc_member_status_id' => 2]) !!}" class="btn btn-sm btn-primary btn-success">ATIVOS</span></a>
    
            <a href="{!! route('dashboard.pc_members', ['pc_member_status_id' => 1]) !!}" class="btn btn-sm btn-primary btn-warning">INATIVOS</a>
    
            <a href="{!! route('dashboard.pc_members', ['pc_member_status_id' => 3]) !!}" class="btn btn-sm btn-primary btn-info">NÃO SÓCIOS</a>
            |
            <a href="{!! route('dashboard.pc_partners') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Ir para Painel Controle Parceiros"><i class="fa fa-sitemap"></i></a>
            |

            <a href="{!! route('members.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
            <a href="{!! route('members.search') !!}" type="button" class="btn btn-sm btn-info" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        </div>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $plan1_allmembersbystatus->count() }}</h3>
                    <p><b>{{ $plan1->description }}</b></p>
                    <p>
                        <i class="fa fa-2x fa-male"> {{ $plan1_allmembersmalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-female"> {{ $plan1_allmembersfemalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-envelope"> {{ $plan1_allmembersemailbystatus->count() }} </i>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <div class="small-box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members', ['plan_id' => 1, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye' style="color:white"></i></a>
                        </div>
                        
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanStatus', 'plan_id' => 1, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag' style="color:white"></i></a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanStatus', 'plan_id' => 1, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'  style="color:white"></i></a>
                        </div>
                    </div>
 
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $plan2_allmembersbystatus->count() }}</h3>
                    <p><b>{{ $plan2->description }}</b></p>
                    <p>
                        <i class="fa fa-2x fa-male"> {{ $plan2_allmembersmalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-female"> {{ $plan2_allmembersfemalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-envelope"> {{ $plan2_allmembersemailbystatus->count() }} </i>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <div class="small-box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members', ['plan_id' => 2, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye' style="color:white"></i></a>
                        </div>
                        
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanStatus', 'plan_id' => 2, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag' style="color:white"></i></a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanStatus', 'plan_id' => 2, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'  style="color:white"></i></a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $plan3_allmembersbystatus->count() }}</h3>
                    <p><b>{{ $plan3->description }}</b></p>
                    <p>
                        <i class="fa fa-2x fa-male"> {{ $plan3_allmembersmalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-female"> {{ $plan3_allmembersfemalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-envelope"> {{ $plan3_allmembersemailbystatus->count() }} </i>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <div class="small-box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members', ['plan_id' => 3, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye' style="color:white"></i></a>
                        </div>
                        
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanStatus', 'plan_id' => 3, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag' style="color:white"></i></a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanStatus', 'plan_id' => 3, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'  style="color:white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $plan1_allmembersbystatus->count() + $plan2_allmembersbystatus->count()+ $plan3_allmembersbystatus->count() }}</h3>
                    <p><b>TODOS</b></p>
                    <p>
                        <i class="fa fa-2x fa-male"> {{ $plan1_allmembersmalebystatus->count() + $plan2_allmembersmalebystatus->count() + $plan3_allmembersmalebystatus->count()}} </i>
                        <i class="fa fa-2x fa-female"> {{ $plan1_allmembersfemalebystatus->count() + $plan2_allmembersfemalebystatus->count() + $plan3_allmembersfemalebystatus->count() }} </i>
                        <i class="fa fa-2x fa-envelope"> {{ $plan1_allmembersemailbystatus->count() + $plan2_allmembersemailbystatus->count() + $plan3_allmembersemailbystatus->count() }} </i>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <div class="small-box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members', ['status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye' style="color:white"></i></a>
                        </div>
                        
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByStatus', 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag' style="color:white"></i></a>
                        </div>
                        <div class="col-sm-4">
                            <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByStatus', 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'  style="color:white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            @foreach($plan1_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="box box-solid collapsed-box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $region->description }}</h3>
                            <div class="box-tools pull-right">
                                @if ($plan1_allmembersbystatus->count() == '0')
                                    <span class="badge bg-aqua">
                                    0
                                    </span>
                                @else
                                    <span class="badge bg-aqua">
                                    {{ $region->members->count() }}
                                    </span>
                                    ({{ number_format(100*($region->members->count()/$plan1_allmembersbystatus->count()), 0) }}%)
                                @endif

                                <a href="{!! route('dashboard.members', ['plan_id' => 1, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 1, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 1, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>

                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body" style="display: none;">
                            @foreach($plan1_cities as $city)
                                @if($city->region_id == $region->id)
                                    @if($city->members->count()>0)
                                        <div class="progress-group">
                                            <span class="progress-text">{{ $city->description }} / {{ $city->state->code }} </span>
                                            <span class="progress-number">
                                                @if ($city->members->count() == '0')
                                                    <span class="badge bg-aqua">
                                                        0
                                                    </span>
                                                @else
                                                    <span class="badge bg-aqua">
                                                        {{ $city->members->count() }}
                                                    </span>
                                                    ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%)
                                                @endif
                                                <a href="{!! route('dashboard.members', ['plan_id' => 1, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> | 
                                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 1, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> | 
                                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 1, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>
                                            </span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            @foreach($plan2_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="box box-solid collapsed-box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $region->description }}</h3>
                            <div class="box-tools pull-right">
                                @if ($plan2_allmembersbystatus->count() == '0')
                                    <span class="badge bg-aqua">
                                    0
                                    </span>
                                @else
                                    <span class="badge bg-aqua">
                                    {{ $region->members->count() }}
                                    </span>
                                    ({{ number_format(100*($region->members->count()/$plan2_allmembersbystatus->count()), 0) }}%)
                                @endif

                                <a href="{!! route('dashboard.members', ['plan_id' => 2, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 2, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 2, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>

                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div style="display: none;" class="box-body">
                            @foreach($plan2_cities as $city)
                                @if($city->region_id == $region->id)
                                    @if($city->members->count()>0)
                                        <div class="progress-group">
                                            <span class="progress-text">{{ $city->description }} / {{ $city->state->code }} </span>
                                            <span class="progress-number">
                                                @if ($city->members->count() == '0')
                                                    <span class="badge bg-aqua">
                                                        0
                                                    </span>
                                                @else
                                                    <span class="badge bg-aqua">
                                                        {{ $city->members->count() }}
                                                    </span>
                                                    ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%)
                                                @endif
                                                <a href="{!! route('dashboard.members', ['plan_id' => 2, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> | 
                                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 2, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> | 
                                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 2, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>
                                            </span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            @foreach($plan3_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="box box-solid collapsed-box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $region->description }}</h3>
                            <div class="box-tools pull-right">
                                @if ($plan3_allmembersbystatus->count() == '0')
                                    <span class="badge bg-aqua">
                                    0
                                    </span>
                                @else
                                    <span class="badge bg-aqua">
                                    {{ $region->members->count() }}
                                    </span>
                                    ({{ number_format(100*($region->members->count()/$plan3_allmembersbystatus->count()), 0) }}%)
                                @endif

                                <a href="{!! route('dashboard.members', ['plan_id' => 3, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 3, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanRegionStatus', 'plan_id' => 3, 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>

                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div style="display: none;" class="box-body">
                            @foreach($plan3_cities as $city)
                                @if($city->region_id == $region->id)
                                    @if($city->members->count()>0)
                                        <div class="progress-group">
                                            <span class="progress-text">{{ $city->description }} / {{ $city->state->code }} </span>
                                            <span class="progress-number">
                                                @if ($city->members->count() == '0')
                                                    <span class="badge bg-aqua">
                                                        0
                                                    </span>
                                                @else
                                                    <span class="badge bg-aqua">
                                                        {{ $city->members->count() }}
                                                    </span>
                                                    ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%)
                                                @endif
                                                <a href="{!! route('dashboard.members', ['plan_id' => 3, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> | 
                                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 3, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> | 
                                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByPlanCityStatus', 'plan_id' => 2, 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>
                                            </span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
           @foreach($plan_regions as $region)
                @if ($region->members->count() >= 0)
                    <div class="box box-solid collapsed-box">
                        <div class="box-header">
                            <h3 class="box-title">{{ $region->description }}</h3>
                            <div class="box-tools pull-right">
                                @if (($plan1_allmembersbystatus->count() + $plan2_allmembersbystatus->count() + $plan3_allmembersbystatus->count()) == '0')
                                    <span class="badge bg-aqua">
                                    0
                                    </span>
                                @else
                                    <span class="badge bg-aqua">
                                    {{ $region->members->count() }}
                                    </span>
                                    ({{ number_format(100*($region->members->count()/($plan1_allmembersbystatus->count() + $plan2_allmembersbystatus->count() + $plan3_allmembersbystatus->count())), 0) }}%)
                                @endif

                                <a href="{!! route('dashboard.members', ['region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByRegionStatus', 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> 
                                | 
                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByRegionStatus', 'region_id' => $region->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>

                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div style="display: none;" class="box-body">
                            @foreach($plan_cities as $city)
                                @if($city->region_id == $region->id)
                                    @if($city->members->count()>0)
                                        <div class="progress-group">
                                            <span class="progress-text">{{ $city->description }} / {{ $city->state->code }} </span>
                                            <span class="progress-number">
                                                @if ($city->members->count() == '0')
                                                    <span class="badge bg-aqua">
                                                        0
                                                    </span>
                                                @else
                                                    <span class="badge bg-aqua">
                                                        {{ $city->members->count() }}
                                                    </span>
                                                    ({{ number_format(100*($city->members->count()/$region->members->count()), 0) }}%)
                                                @endif
                                                <a href="{!! route('dashboard.members', ['city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-eye'></i></a> 
                                                | 
                                                <a href="{!! route('dashboard.members_labels', ['model' => 'allMembersByCityStatus', 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-tag'></i></a> 
                                                | 
                                                <a href="{!! route('dashboard.members_reports', ['model' => 'allMembersByCityStatus', 'city_id' => $city->id, 'status_id' => $pc_member_status_id]) !!}"><i class='fa fa-print'></i></a>
                                            </span>

                                            <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: {{ 100*($city->members->count()/$region->members->count()) }}%">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
