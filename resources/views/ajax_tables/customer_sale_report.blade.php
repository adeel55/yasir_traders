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
						<td>{{ $customer->sales->sum('total_price') }}</td>
						<td>{{ $customer->sales->sum('discount_amount') }}</td>
						<td>{{ $customer->sales->sum('discount_total') }}</td>
					</tr>
					@endif
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
					<tr class="font-weight-bold">
						<td>Total:</td>
						<td>{{ $sales->sum('total_price') }}</td>
						<td>{{ $sales->sum('discount_amount') }}</td>
						<td>{{ $sales->sum('discount_total') }}</td>
					</tr>
				</tbody>
				<tfoot>
					{{-- <tr>
						<td colspan="{{$cols}}">{{ $data->links() }}</td>
					</tr> --}}
				</tfoot>