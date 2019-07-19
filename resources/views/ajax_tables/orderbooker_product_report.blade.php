				@php ($cols = 5)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Qty</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($products as $pro)
					<tr>
						<td colspan="{{$cols}}">{{ $order_booker->name }}</td>
					</tr>
						@forelse($pro->sales() as $sale)
						<tr>
							<td>{{ $sale->id }}</td>
							<td>{{ $sale->qty }}</td>
							<td>{{ $sale->phone }}</td>
							<td>{{ $sale->balance }}</td>
							<td>{{ date('d-M-Y',strtotime($sale->created_at)) }}</td>
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