@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Administração - Pagamentos - Finalidade: ALTERAÇÃO
	   		<div class="btn-group btn-group-sm pull-right">
          		<a href="{!! route('payment_reasons.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
          		<a href="{!! route('payment_reasons') !!}" type="button" class="round round-sm hollow" rel="tooltip" title="Pesquisar"><i class="fa fa-search"></i></a>
        	</div>
	   		<hr class="hr-warning" />
	   	</h4>
	</div>

	{!! Form::model($payment_reason, ['route' => ['payment_reasons.update', $payment_reason->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('payment_reasons.form')

	{!! Form::close() !!}
	    
@endsection