				@php ($cols = 7)
				<thead>
					<tr>
						<th>Customer</th>
						<th>Total</th>
						<th>Discount</th>
						<th>Discount Total</th>
					</tr>
				</thead>
				<tbody>
					@forelse($customers as $customer)
					@if($customer->sales()->exists())
					<tr>
						<td class="font-weight-bold">{{ $customer->name }}</td>
						<td>{{ $customer->sales->sum('total_amount') }}</td>
						<td>{{ $customer->sales->sum('total_discount') }}</td>
						<td>{{ $customer->sales->sum('discount_total') }}</td>
					</tr>
					@endif
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					{{-- <tr>
						<td colspan="{{$cols}}">{{ $data->links() }}</td>
					</tr> --}}
				</tfoot>