				@php ($cols = 6)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Customer</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Balance</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $it)
					<tr>
						<td>{{ $it->id }}</td>
						<td>{{ $it->name }}</td>
						<td>{{ $it->dabit }}</td>
						<td>{{ $it->credit }}</td>
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