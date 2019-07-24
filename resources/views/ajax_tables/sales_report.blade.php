				@php ($cols = 5)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Product</th>
						<th>Qty</th>
						<th>Bonus</th>
						<th>Sale</th>
						<th>Purchase</th>
						<th>Disc</th>
						<th>Total</th>
						<th>Profit</th>
					</tr>
				</thead>
				<tbody>
					@forelse($companies as $company)
					<tr>
						<td colspan="{{$cols}}">{{ $company->name }}</td>
					</tr>
					@forelse($company->products($filter) as $product)
					<tr>
						<td>{{ $product->id }}</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->phone }}</td>
						<td>{{ $product->balance }}</td>
						<td>{{ $product->showdate() }}</td>
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