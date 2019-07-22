				@php ($cols = 10)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Product</th>
						<th>QTY</th>
						<th>Company</th>
						<th>Purchase</th>
						<th>Sale</th>
						<th>Total</th>
						<th>Date</th>
						<th>Edit</th>
						<th>Del</th>
					</tr>
				</thead>
				<tbody>
					
					@forelse($data as $it)
					<tr>
						<td>{{ $it->inventory_id }}</td>
						<td>{{ $it->product }}</td>
						<td>{{ $it->qty }}</td>
						<td>{{ $it->company }}</td>
						<td>{{ $it->unit_purchase }}</td>
						<td>{{ $it->unit_sale }}</td>
						<td>{{ $it->total_purchase }}</td>
						<td>{{ date('d-M-Y',strtotime($it->created_at)) }}</td>
						<td><a href="/inventory/{{ $it->inventory_id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a></td>
						<td><button class="btn btn-danger btn-sm" onclick="deleteInventory(this,{{ $it->inventory_id }})"><i class="fa fa-trash"></i></button></td>
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
				