@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Bancos
	   		<hr class="hr-warning" />
	   	</h4>
	</div>
				
	<table class="table table-bordered table-striped">
	    <thead>
	        <th width="1%"><a href="{!! route('banks.create') !!}"><i class="fa fa-file-o"></i></a></th>
	        <th width="2%">Código</th>
	        <th>Descrição</th>
	        <th width="1%" class="text-center">#</th>
	    </thead>
	    <tbody>
		    @foreach($banks as $bank)
		        <tr>
		            <td>
		                <a href="{!! route('banks.edit', [$bank->id]) !!}"><i class="fa fa-edit"></i></a>
		            </td>
		            <td><a href="{!! route('banks.show', [$bank->id]) !!}">{!! $bank->code !!}</a></td>
		            <td>{!! $bank->description !!}</td>
		            <td>
		            	<a href="javascript:;" onclick="onDestroy('{!! route('banks.destroy', [$bank->id]) !!}')" id="link_delete"><i class="fa fa-trash-o text-danger"></i></a>
		            </td>
		        </tr>
		    @endforeach
	    </tbody>
	</table>
@endsection