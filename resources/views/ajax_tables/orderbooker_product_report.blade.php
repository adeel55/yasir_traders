				@php ($cols = 6)
				{{-- <table> --}}
				<thead>
					<tr>
						<th>Name</th>
						<th>Qty</th>
						<th>Unit Price</th>
						<th>Total Amount</th>
						<th>Discount</th>
						<th>Discount Total</th>
					</tr>
				</thead>
				<tbody>
					@forelse($companies as $company)
					@if($company->sales()->exists())
					{{-- @php (die(json_encode($company->group_sales))) --}}
					<tr>
						<td colspan="{{$cols}}" class="font-weight-bold text-capitalize">{{ $company->name }}</td>
					</tr>
					@foreach($company->group_sales as $sale)
					<tr>
						<td>{{ $sale->name }}</td>
						<td>{{ $sale->qty }}</td>
						<td>{{ $sale->unit_price }}</td>
						<td>{{ $sale->total_price }}</td>
						<td>{{ $sale->discount_amount }}</td>
						<td>{{ $sale->discount_total }}</td>
					</tr>
					@endforeach
					<tr class="font-weight-bold bb-2">
						<td colspan="{{$cols-3}}">Total:</td>
						<td>{{ $company->sales->sum('total_price') }}</td>
						<td>{{ $company->sales->sum('discount_amount') }}</td>
						<td>{{ $company->sales->sum('discount_total') }}</td>
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
				{{-- </table> --}}