
	@forelse($invoices as $invoice)
	<div class="invoice-page">
		@include('invoice.invoice_print',compact('$invoice'))
	</div>
	@empty
	<tr>
		<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
	</tr>
	@endforelse