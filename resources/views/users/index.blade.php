@extends('adminlte::page')

@section('content_header')
    <h1>ADMINISTRAÇÃO - ACESSIBILIDADE: USUÁRIOS</h1>
    
    <ol class="breadcrumb">
      	<div class="btn-group-horizontal">
    		<a href="{!! route('users.create') !!}" type="button" class="btn btn-sm btn-success" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
	    </div>
	</ol>
@stop

@section('content')
    <div class="row">
        	<div class="col-md-12">
          		<div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title">PESQUISA</h3>
		            </div>

		            <div class="box-body"><!-- Main content -->
          				<table class="display dataTable" cellspacing="0" width="100%" id="table_users"> 
							<thead>
								<tr>
									<th width="1%">Avatares</th>
									<th width="5%">Usuários</th>
									<th>Nomes</th>
									<th width="10%">e-mails</th>
									<th width="5%">Situação</th>
									<th>Grupos</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th width="1%">Avatares</th>
									<th width="5%">Usuários</th>
									<th>Nomes</th>
									<th width="10%">e-mails</th>
									<th width="5%">Situação</th>
									<th>Grupos</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($users as $user)
							        <tr>
							        	<td>
							        		<img src="/uploads/avatars/users/{{ $user->avatar }}" class="img-circle img-responsive center-block" width="25">
							        	</td>
							        	<td class="text-left"><a href="{!! route('users.show', ['id' => $user->id]) !!}">{{ $user->name }}</a></td>
							        	<td class="text-left">{{ $user->fullname }}</td>
							        	<td>{{ $user->email }}</td>
							        	<td class="text-center">
							        		@if($user->user_status_id == '1')
							        			<a href="{!! route('users.enable', ['id' => $user->id]) !!}" type="button" class="round round-sm hollow red" rel="tooltip" title="Ativar"><i class='fa fa-thumbs-o-down'></i></a>
							        		@endif

							        		@if($user->user_status_id == '2')
							        			<a href="{!! route('users.disable', ['id' => $user->id]) !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Desativar"><i class='fa fa-thumbs-o-up'></i></a>
							        		@endif
							        	</td>
							        	<td>
							        		@foreach($user->roles as $user->role)
							        			<a href="{!! route('roles.show', ['id' => $user->role->id]) !!}">{{ $user->role->display_name }}</a>
							        		@endforeach	
							        	</td>
							        </tr>
							    @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
@endsection
