				@php ($cols = 5)
				{{-- <table> --}}
				<thead>
					<tr>
						<th>Name</th>
						<th>Qty</th>
						<th>Unit Price</th>
						<th>Unit Price</th>
						<th>Total Amount</th>
					</tr>
				</thead>
				<tbody>
					@forelse($companies as $company)
					@if($company->group_inventories($req)->count())
					{{-- @php (die(json_encode($company->group_inventories))) --}}
					<tr>
						<td colspan="{{$cols}}" class="font-weight-bold text-capitalize">{{ $company->name }}</td>
					</tr>
					@foreach($company->group_inventories($req) as $inventory)
					<tr>
						<td>{{ $inventory->name }}</td>
						<td>{{ $inventory->qty }}</td>
						<td>{{ round($inventory->unit_purchase,2) }}</td>
						<td>{{ round($inventory->unit_sale,2) }}</td>
						<td>{{ $inventory->total_purchase }}</td>
					</tr>
					@endforeach
					<tr class="font-weight-bold bb-2">
						<td>Total:</td>
						<td>{{ $company->group_inventories($req)->sum('qty') }}</td>
						<td>{{ round($company->group_inventories($req)->avg('unit_purchase'),2) }}</td>
						<td>{{ round($company->group_inventories($req)->avg('unit_sale'),2) }}</td>
						<td>{{ $company->group_inventories($req)->sum('total_purchase') }}</td>
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
						<th>{{ $inventories->sum('qty') }}</th>
						<th colspan="2"></th>
						<th>{{ $inventories->sum('total_purchase') }}</th>
					</tr>
				</tfoot>
				{{-- </table> --}}