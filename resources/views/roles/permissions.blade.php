<div class="box box-info">
   	<div class="box-header with-border">
      	<h3 class="box-title">PERMISSÕES</h3>
       	<div class="box-tools pull-right">
       		<button type="button" class="btn btn-box-tool" data-widget="collapse">
           		<i class="fa fa-minus"></i>
      		</button>
      	</div>
   	</div>
   	<div class="box-body">
   		<div class="col-sm-12">
			{!! Form::open(['route' => ['roles_permissions.store', $role->id], 'class'=>'form-vertical', 'role'=>'form']) !!}
			 	<div class="form-group">
					<div class="col-sm-11">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
							{!! Form::select('permission_id', $role_permissions, null, ['id'=>'permissions_list', 'class'=>'form-control select2']) !!}
						</div>
					</div>
				</div>

				<div class="form-group col-sm-1">
					<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></button>
				</div>
			{!! Form::close() !!}
		</div>
		<div class="col-sm-12">
       		<div class="table-responsive">
            	<table class="table table-bordered table-striped">
            		<thead>
						<tr>
							<th>Permissões</th>
							<th width="1%" class="text-center">#</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($role->permissions as $permission)
							<tr>
								<td>{{ $permission->display_name }}</td>
								<td>
									<a href="javascript:;" onclick="onDestroy('{!! route('roles_permissions.destroy', [$role->id, $permission->id]) !!}')" id="link_delete" type="button" title="Excluir" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
