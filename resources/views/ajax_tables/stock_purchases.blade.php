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
						<th class="d-print-none">Edit</th>
						<th class="d-print-none">Del</th>
					</tr>
				</thead>
				<tbody>
					
					@forelse($inventories as $it)
					<tr>
						<td>{{ $it->id }}</td>
						<td>{{ $it->product->name }}</td>
						<td>{{ $it->qty }}</td>
						<td>{{ $it->company->name }}</td>
						<td>{{ $it->unit_purchase }}</td>
						<td>{{ $it->unit_sale }}</td>
						<td>{{ $it->total_purchase }}</td>
						<td>{{ $it->showdate() }}</td>
						<td class="d-print-none">
							<a href="/inventory/{{ $it->id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a>
						</td>
						<td class="d-print-none">
							<button class="btn btn-danger btn-sm" onclick="deleteInventory(this,{{ $it->id }})"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="{{$cols}}">{{ $inventories->links() }}</td>
					</tr>
				</tfoot>
				