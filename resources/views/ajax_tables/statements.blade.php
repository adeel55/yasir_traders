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
					@forelse($statements as $it)
					<tr>
						<td>{{ $it->id }}</td>
						<td><a href="/invoice/{{ $it->invoice_id }}">{{ $it->name }}</a></td>
						<td>{{ $it->dabit }}</td>
						<td>{{ $it->credit }}</td>
						<td>{{ $it->balance }}</td>
						<td>{{ $it->showdate() }}</td>
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<td colspan="{{$cols}}">{{ $statements->links() }}</td>
					</tr>
				</tfoot>