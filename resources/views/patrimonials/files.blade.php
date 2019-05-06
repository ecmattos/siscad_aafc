  	<div class="row">
	    <div class="col-md-12">
	      	<div class="box box-info collapsed-box">
		        <div class="box-header with-border">
		          	<h3 class="box-title">ARQUIVOS</h3>
		          	<div class="box-tools pull-right">
		            	<button type="button" class="btn btn-box-tool" data-widget="collapse">
		              		<i class="fa fa-plus"></i>
		            	</button>
		          	</div>
		        </div>
		        <div style="display: none;" class="box-body">
					{!! Form::open(['route' => ['patrimonial_files.upload', $patrimonial->id], 'files' => true, 'class' => 'form-horizontal', 'role'=>'form']) !!}
						<div class="form-group {{ $errors->has('filename') ? 'has-error' : '' }}">
							{!! Form::label('filename', 'Arquivo', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
							<div class="col-xs-12 col-sm-8 col-md-5 col-lg-2">
								<div class="input-group input-group-sm">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::file('filename', ['class' => 'custom-file-input']) !!}
								</div>
							</div>
						</div>

						<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">			
							{!! Form::label('description', 'Descrição', ['class' => 'control-label col-xs-2 col-sm-2 col-md-2 col-lg-2']) !!}
							<div class="col-xs-12 col-sm-8 col-md-5 col-lg-3">
								<div class="input-group input-group-sm">
									<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
									{!! Form::text('description', $value = null, ['class'=>'form-control']) !!}
								</div>
							</div>	
							<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-upload"></i></button>			
						</div>
			       	{!! Form::close() !!}

		        	<div class="table-responsive">
		              	<table class="table table-bordered table-striped">
			                <thead>
						   		<tr>
									<th width="1%" class="text-center">
										#				        	
									</th>
									<th width="1%" class="text-center">Tipo</th>
									<th class="text-left">Descrição</th>
									<th width="1%" class="text-center">#</th>						
								</tr>
							</thead>
							<tbody>
								@foreach($patrimonial_files as $patrimonial_file)
									<tr>
										<td>
											<a href="{!! route('patrimonial_files.download', [$patrimonial_file->patrimonial_id, $patrimonial_file->id]) !!}" type="button" class="btn btn-sm btn-primary" rel="tooltip" title="Baixar"><i class="fa fa-cloud-download"></i></a>
										</td>
										<td>
											@if (($patrimonial_file->extension == 'jpg') || ($patrimonial_file->extension == 'jpg') || ($patrimonial_file->extension == 'png'))
												<i class="fa fa-file-image-o"></i>
											@endif

											@if ($patrimonial_file->extension == 'pdf')
												<i class="fa fa-file-pdf-o"></i>
											@endif
										</td>
										<td>{{ $patrimonial_file->description }}</td>
										<td>
											<a href="{!! route('patrimonial_files.destroy', [$patrimonial_file->patrimonial_id, $patrimonial_file->id]) !!}" type="button" class="btn btn-sm btn-danger" rel="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></a>
										</td>							
									</tr>
								@endforeach
							</tbody>
							<tfoot>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>