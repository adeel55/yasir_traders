				@php ($cols = 5)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Balance</th>
						<th>Created On</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $it)
					<tr>
						<td>{{ $it->sale_id }}</td>
						<td>{{ $it->customer_name }}</td>
						<td>{{ $it->phone }}</td>
						<td>{{ $it->balance }}</td>
						<td>{{ date('d-M-Y',strtotime($it->created_at)) }}</td>
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