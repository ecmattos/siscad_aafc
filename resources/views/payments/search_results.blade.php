@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Pagamentos
	   		<div class="btn-group btn-group-sm pull-right">
        		
	        </div>
      	</h4>
      	<hr class="hr-warning" />
    </div>

    <div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_payments" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-fixed-columns="true" data-show-columns="true" data-show-export="true" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-field="region_id" data-sortable="true" rowspan="2">Região</th>
						<th data-field="city_id" data-sortable="true" rowspan="2">Cidade/UF</th>
						<th data-field="plan_id" data-sortable="true" rowspan="2">Plano</th>
						<th data-field="code" data-sortable="true" data-align="right" width="2%" rowspan="2">Matrícula</th>
						<th data-field="name" data-sortable="true" rowspan="2">Nome</th>
						<th data-align="center" colspan="13">{{ session()->get('srch_payment_year') }}</th>
					</tr>
					<tr>
						<th data-field="payment_value_01" data-align="right">JAN</th>
						<th data-field="payment_value_02" data-align="right">FEV</th>
						<th data-field="payment_value_03" data-align="right">MAR</th>
						<th data-field="payment_value_04" data-align="right">ABR</th>
						<th data-field="payment_value_05" data-align="right">MAI</th>
						<th data-field="payment_value_06" data-align="right">JUN</th>
						<th data-field="payment_value_07" data-align="right">JUL</th>
						<th data-field="payment_value_08" data-align="right">AGO</th>
						<th data-field="payment_value_09" data-align="right">SET</th>
						<th data-field="payment_value_10" data-align="right">OUT</th>
						<th data-field="payment_value_11" data-align="right">NOV</th>
						<th data-field="payment_value_12" data-align="right">DEZ</th>
						<th data-field="" data-align="right">TOTAIS</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$total_payment_value_01 = 0;
						$total_payment_value_02 = 0;
						$total_payment_value_03 = 0;
						$total_payment_value_04 = 0;
						$total_payment_value_05 = 0;
						$total_payment_value_06 = 0;
						$total_payment_value_07 = 0;
						$total_payment_value_08 = 0;
						$total_payment_value_09 = 0;
						$total_payment_value_10 = 0;
						$total_payment_value_11 = 0;
						$total_payment_value_12 = 0;
					?>
					@foreach($payments as $payment)
				        <tr>
				        	<td>{{ $payment->region_code }}</td>
				        	<td>{{ $payment->city_description }}/{{ $payment->state_code }}</td>
				        	<td>{{ $payment->plan_description }}</td>
				        	<td class="text-right"><a href="{!! route('members.show', ['id' => $payment->member_id]) !!}">{{ $payment->member_code }}</a></td>
				        	<td>{{ $payment->member_name }}</td>
				        	<td>{{ number_format($payment->payment_value_01, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_02, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_03, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_04, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_05, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_06, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_07, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_08, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_09, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_10, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_11, 2,",",".") }}</td>
				        	<td>{{ number_format($payment->payment_value_12, 2,",",".") }}</td>
				        	<td><b>{{ number_format(($payment->payment_value_01 + $payment->payment_value_02 + $payment->payment_value_03 + $payment->payment_value_04 + $payment->payment_value_05 + $payment->payment_value_06 + $payment->payment_value_07 + $payment->payment_value_08 + $payment->payment_value_09 + $payment->payment_value_10 + $payment->payment_value_11  + $payment->payment_value_12), 2,",",".") }}</b></td>
				        </tr>
				        <?php
				        	$total_payment_value_01 = $total_payment_value_01 + $payment->payment_value_01;
				        	$total_payment_value_02 = $total_payment_value_02 + $payment->payment_value_02;
				        	$total_payment_value_03 = $total_payment_value_03 + $payment->payment_value_03;
				        	$total_payment_value_04 = $total_payment_value_04 + $payment->payment_value_04;
				        	$total_payment_value_05 = $total_payment_value_05 + $payment->payment_value_05;
				        	$total_payment_value_06 = $total_payment_value_06 + $payment->payment_value_06;
				        	$total_payment_value_07 = $total_payment_value_07 + $payment->payment_value_07;
				        	$total_payment_value_08 = $total_payment_value_08 + $payment->payment_value_08;
				        	$total_payment_value_09 = $total_payment_value_09 + $payment->payment_value_09;
				        	$total_payment_value_10 = $total_payment_value_10 + $payment->payment_value_10;
				        	$total_payment_value_11 = $total_payment_value_11 + $payment->payment_value_11;
				        	$total_payment_value_12 = $total_payment_value_12 + $payment->payment_value_12;
				        ?>
				    @endforeach
				</tbody>

				<tfoot>
					<tr>
				        <td class="text-right" colspan="5"><b>TOTAIS</b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_01, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_02, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_03, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_04, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_05, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_06, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_07, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_08, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_09, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_10, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_11, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT($total_payment_value_12, "2",",","."); ?></b></td>
				        <td class="text-right"><b><?php echo NUMBER_FORMAT(($total_payment_value_01 + $total_payment_value_02 + $total_payment_value_03 + $total_payment_value_04 + $total_payment_value_05 + $total_payment_value_06 + $total_payment_value_07 + $total_payment_value_08 + $total_payment_value_09 + $total_payment_value_10 + $total_payment_value_11 + $total_payment_value_12), "2",",","."); ?></b></td>
				    </tr>
				</tfoot>
			</table>
		</div>
	</div>
@endsection

@section('js_scripts')
	<script type="text/javascript">
	  	$('#table_payments').bootstrapTable();
	</script>


@endsection