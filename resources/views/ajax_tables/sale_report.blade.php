				@php ($cols = 8)
				{{-- <table> --}}
				<thead>
					<tr>
						<th>Name</th>
						<th>Qty</th>
						<th>Bonus</th>
						<th>Unit Price</th>
						<th>Total Amount</th>
						<th>Discount</th>
						<th>Disc.Total</th>
						<th>Profit</th>
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
						<td>{{ $sale->bonus }}</td>
						<td>{{ round($sale->unit_price,2) }}</td>
						<td>{{ $sale->total_price }}</td>
						<td>{{ $sale->discount_amount }}</td>
						<td>{{ $sale->discount_total }}</td>
						<td>{{ $sale->discount_total }}</td>
					</tr>
					@endforeach
					<tr class="font-weight-bold bb-2">
						<td>Total:</td>
						<td>{{ $company->sales->sum('qty') }}</td>
						<td>{{ $company->sales->sum('bonus') }}</td>
						<td>{{ round($company->sales->avg('unit_price'),2) }}</td>
						<td>{{ $company->sales->sum('total_price') }}</td>
						<td>{{ $company->sales->sum('discount_amount') }}</td>
						<td>{{ $company->sales->sum('discount_total') }}</td>
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
					<tr>
						{{-- <th colspan="{{$cols-3}}"></th> --}}
						<th>Grand Total:</th>
						<th>{{ $sales->sum('qty') }}</th>
						<th>{{ $sales->sum('bonus') }}</th>
						<th>{{ round($sales->avg('unit_price'),2) }}</th>
						<th>{{ $sales->sum('total_price') }}</th>
						<th>{{ $sales->sum('discount_amount') }}</th>
						<th>{{ $sales->sum('discount_total') }}</th>
						<th>{{ $sales->sum('discount_total') }}</th>
					</tr>
				</tfoot>
				{{-- </table> --}}