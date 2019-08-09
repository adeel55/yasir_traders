				@php ($cols = 9)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Product</th>
						<th>QTY</th>
						<th>Company</th>
						<th>Sale Price</th>
						<th>Purchase Price</th>
						<th>Total Purchase</th>
						<th>Date</th>
						<th class="d-print-none">Del</th>


					</tr>
				</thead>
				<tbody>
					
					@forelse($data as $it)
					<tr>
						<td>{{ $it->product_id }}</td>
						<td>{{ $it->product }}</td>
						<td>{{ $it->qty }}</td>
						<td>{{ $it->company }}</td>
						<td>{{ $it->unit_sale }}</td>
						<td>{{ $it->unit_purchase }}</td>
						<td>{{ $it->total_purchase }}</td>
						<td>{{ $it->showdate() }}</td>
						<td class="d-print-none"><button class="btn btn-danger btn-sm" onclick="deleteProduct(this,{{ $it->product_id }})"><i class="fa fa-trash"></i></button></td>
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<th>Total:</th>
						<th>{{ $all->count() }}</th>
						<th>{{ $all->sum('qty') }}</th>
						<th colspan="3"></th>
						<th colspan="3">Total Stock:{{ $all->sum('total_purchase') }}</th>
					</tr>
					<tr class="d-print-none">
						<td colspan="{{$cols}}">{{ $data->links() }}</td>
					</tr>
				</tfoot>
				