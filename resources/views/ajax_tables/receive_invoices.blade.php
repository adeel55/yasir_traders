				@php ($cols = 8)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Customer</th>
						<th>OrderBooker</th>
						<th>Sale Man</th>
						<th>Total</th>
						<th>Received</th>
						<th>Edit</th>
						<th>Rec</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $it)
					<tr>
						<td>{{ $it->invoice_id }}</td>
						<td>{{ $it->customer_name }}</td>
						<td>{{ $it->orderbooker_name }}</td>
						<td>{{ $it->saleman_name }}</td>
						<td>{{ $it->discount_total }}</td>
						<td><input type="number" step="any" style="width: 90px" placeholder="amount" class="form-control form-control-sm received_amount"></td>
						<td><a href="/invoice/{{ $it->invoice_id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
						<td><button class="btn btn-sm btn-success" onclick="receiveInvoice(this,{{ $it->invoice_id }})"><i class="fa fa-arrow-down"></i></button></td>
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="{{$cols}}">{{ $data->links() }}</td>
					</tr>
				</tfoot>