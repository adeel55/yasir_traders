				@php ($cols = 8)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Customer</th>
						<th>OrderBooker</th>
						<th>Sale Man</th>
						<th>Total</th>
						<th>Received</th>
						<th class="d-print-none">Edit</th>
						<th class="d-print-none">Del
							<script>
								invoices = [];
								countInvoicesDiscountTotal()
								countInvoicesReceiveAmount()
								getInvoices =function(){
									invoices = [];
									$("#invoices_rows tr").each(function(ind,el){
										invoices.push({'id' : $(el).find('.invoice_id').val(),
										'received_amount': $(el).find('.received_amount').val()});
									});
								}
								// console.log(invoices)
							</script>
						</th>
					</tr>
				</thead>
				<tbody id="invoices_rows">
					@forelse($data as $it)
					<tr>
						<td>{{ $it->id }}
							<input type="hidden" value="{{ $it->id }}" class="invoice_id">
						</td>
						<td><a href="/invoice/{{ $it->id }}">{{ $it->customer->name }}</a></td>
						<td>{{ $it->order_booker->name }}</td>
						<td>{{ $it->sale_man->name }}</td>
						<td>{{ $it->discount_total }}
							<input type="hidden" step="any" value="{{ $it->discount_total }}" class="discount_total">
						</td>
						<td>
							<input type="number" step="any" oninput="countInvoicesReceiveAmount()" value="{{ $it->discount_total }}" style="width: 90px; margin-top: -2px" placeholder="amount" class="received_amount" required>
						</td>
						<td class="d-print-none"><a href="/invoice/{{ $it->invoice_id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
						</td>
						<td class="d-print-none"><button class="btn btn-danger btn-sm" onclick="deleteInvoice(this,{{ $it->invoice_id }})"><i class="fa fa-trash"></i></button></td>
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>