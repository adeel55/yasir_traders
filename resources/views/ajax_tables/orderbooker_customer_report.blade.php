				@php ($cols = 7)
				<thead>
					<tr>
						<th>Name</th>
						<th>Qty</th>
						<th>sale price</th>
						<th>Discount</th>
						<th>Discount Total</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($customers as $customer)
					@if($customer->sales()->exists())
					@php (die("<tr><td align='center' colspan='7'>Construction in Progress...</td></tr>"))
					<tr>
						<td colspan="{{$cols}}" class="font-weight-bold text-capitalize">{{ $customer->name }}</td>
					</tr>
					@foreach($customer->group_sales as $sale)
					<tr>
						<td>{{ $sale->name }}</td>
						<td>{{ $sale->qty }}</td>
						<td>{{ $sale->unit_price }}</td>
						<td>{{ $sale->total_price }}</td>
						<td>{{ $sale->discount_amount }}</td>
						<td>{{ $sale->discount_total }}</td>
						<td>{{ $sale->showdate() }}</td>
					</tr>
					@endforeach
					<tr class="font-weight-bold bb-2">
						<td colspan="{{$cols-3}}">Total:</td>
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
				</tbody>
				<tfoot>
					{{-- <tr>
						<td colspan="{{$cols}}">{{ $data->links() }}</td>
					</tr> --}}
				</tfoot>