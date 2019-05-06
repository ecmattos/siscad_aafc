<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">PAGAMENTOS</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
            </div>
        </div>
         <div class="box-body">
           <div class="table-responsive">
			<table class="table table-bordered table-striped" id="table_members">
			   	<thead>
			   		<tr>
						<th>Data</th>
						<th>Finalidade</th>
						<th>Método</th>
						<th>R$</th>
					</tr>
				</thead>
				<tbody>
					@foreach($member->payments as $member->payment)
				        <tr>
				        	<td>{{ $member->payment->payment_date->format('d/m/Y') }}</td>
				        	<td>{{ $member->payment->payment_reason->description }}</td>
				        	<td>{{ $member->payment->payment_method->description }}</td>
				        	<td>{{ number_format(($member->payment->payment_value_01 + $member->payment->payment_value_02 + $member->payment->payment_value_03 + $member->payment->payment_value_04 + $member->payment->payment_value_05 + $member->payment->payment_value_06 + $member->payment->payment_value_07 + $member->payment->payment_value_08 + $member->payment->payment_value_09 + $member->payment->payment_value_10 + $member->payment->payment_value_11 + $member->payment->payment_value_12), 2,",",".") }}</td>
				        </tr>
				    @endforeach
				</tbody>

				<tfoot>
					<tr>
				        <td class="text-right" colspan="3"><b>Total</b></td>
				        <td class="text-right"><b>{{ number_format($member->getPaymentTotal(), 2,",",".") }}</b></td>
				    </tr>
				</tfoot>
			</table>
        </div>
    </div>
</div>
