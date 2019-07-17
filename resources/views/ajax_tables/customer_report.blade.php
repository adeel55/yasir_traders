				@php ($cols = 5)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Balance</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $it)
					<tr>
						<td colspan="{{$cols}}">{{ $order_booker->name }}</td>
					</tr>
					@forelse($order_booker->customers() as $customer)
					<tr>
						<td>{{ $customer->id }}</td>
						<td>{{ $customer->name }}</td>
						<td>{{ $customer->phone }}</td>
						<td>{{ $customer->balance }}</td>
						<td>{{ date('d-M-Y',strtotime($customer->created_at)) }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
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