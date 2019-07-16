				@php ($cols = 6)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Customer</th>
						<th>OrderBooker</th>
						<th>Sale Man</th>
						<th>Total</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $it)
					<tr>
						<td>{{ $it->invoice_id }}</td>
						<td><a href="/invoice/{{ $it->invoice_id }}/edit">{{ $it->customer_name }}</a></td>
						<td>{{ $it->orderbooker_name }}</td>
						<td>{{ $it->saleman_name }}</td>
						<td>{{ $it->discount_total }}</td>
						<td>{{ date('d-M-Y',strtotime($it->created_at)) }}</td>
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