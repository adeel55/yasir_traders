				@php ($cols = 6)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Product</th>
						<th>QTY</th>
						<th>Company</th>
						<th>Purchase Price</th>
						<th>Sale Price</th>
						{{-- <th>Date</th> --}}
					</tr>
				</thead>
				<tbody>
					
					@forelse($data as $it)
					<tr>
						<td>{{ $it->product_id }}</td>
						<td>{{ $it->product }}</td>
						<td>{{ $it->qty }}</td>
						<td>{{ $it->company }}</td>
						<td>{{ $it->unit_purchase }}</td>
						<td>{{ $it->unit_sale }}</td>
						{{-- <td>{{ date('d-M-Y',strtotime($it->created_at)) }}</td> --}}
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
				