				@php ($cols = 9 );
				$profit_sum=0;
				$grand_profit_sum=0;
				@endphp 
				<thead>
					<tr>
						<th>Name</th>
						<th>Qty</th>
						<th>Bonus</th>
						<th>Avg Purchase</th>
						<th>Avg Sale</th>
						<th>Total Amount</th>
						<th>Discount</th>
						<th>Disc.Total</th>
						<th>Profit</th>
					</tr>
				</thead>
				<tbody>
					@forelse($companies as $company)
					@if($company->group_sales($req)->count())
					<tr>
						<td colspan="{{$cols}}" class="font-weight-bold text-capitalize">{{ $company->name }}</td>
					</tr>
					@foreach($company->group_sales($req) as $sale)
					<tr>
						<td>{{ $sale->name }}</td>
						<td>{{ $sale->qty }}</td>
						<td>{{ $sale->bonus }}</td>
						<td>{{ round($sale->product->allInventories->avg('unit_purchase'),2) }}</td>
						<td>{{ round($sale->unit_price,2) }}</td>
						<td>{{ $sale->total_price }}</td>
						<td>{{ $sale->discount_amount }}</td>
						<td>{{ $sale->discount_total }}</td>
						@php ($profit = $sale->product->profit($req))
						@php ($profit_sum += $profit)
						<td class="{{ $sale->proColor($profit) }}">{!! $sale->udArrow($profit) !!} {{ round($profit,2) }}</td>
					</tr>
						{{-- @php (die(json_encode($sale))) --}}
					@endforeach
					<tr class="font-weight-bold bb-2">
						<td>Total:</td>
						<td>{{ $company->group_sales($req)->sum('qty') }}</td>
						<td>{{ $company->group_sales($req)->sum('bonus') }}</td>
						<td>{{ round($company->group_sales($req)->avg('unit_price'),2) }}</td>
						<td>{{ round($company->group_sales($req)->avg('unit_price'),2) }}</td>
						<td>{{ $company->group_sales($req)->sum('total_price') }}</td>
						<td>{{ $company->group_sales($req)->sum('discount_amount') }}</td>
						<td>{{ $company->group_sales($req)->sum('discount_total') }}</td>
						<td class="{{ $sale->proColor($profit_sum) }}">{!! $sale->udArrow($profit_sum) !!} {{ round($profit_sum,2) }}</td>
						@php ($grand_profit_sum += $profit_sum)
						@php ($profit_sum = 0)
					</tr>
					@endif
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<th>Grand Total:</th>
						<th>{{ $sales->sum('qty') }}</th>
						<th>{{ $sales->sum('bonus') }}</th>
						<th>{{ round($sales->avg('unit_price'),2) }}</th>
						<th>{{ round($sales->avg('unit_price'),2) }}</th>
						<th>{{ $sales->sum('total_price') }}</th>
						<th>{{ $sales->sum('discount_amount') }}</th>
						<th>{{ $sales->sum('discount_total') }}</th>
						<th class="{{ $sale->proColor($grand_profit_sum) }}">{!! $sale->udArrow($grand_profit_sum) !!} {{ round($grand_profit_sum,2) }}</th>
					</tr>
					<tr class="bt-2">
						<th colspan="2">Balance: {{ $balance }}</th>
						<th colspan="2">Expenses: {{ $expenses }}</th>
						<th colspan="2">Profit: {{ $grand_profit_sum }}</th>
						<th colspan="3" class="{{ $sale->proColor($grand_profit_sum) }}">Net Profit: {!! $sale->udArrow($grand_profit_sum) !!} {{ $grand_profit_sum-$expenses }}</th>
					</tr>
				</tfoot>
