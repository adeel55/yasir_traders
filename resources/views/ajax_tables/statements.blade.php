				@php ($cols = 7)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Customer</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Balance</th>
						<th>Description</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@forelse($statements as $it)
					<tr>
						<td>{{ $it->id }}</td>
						@if($it->invoice_id)
						<td><a href="/invoice/{{ $it->invoice_id }}">{{ $it->customer->name }}</a></td>
						@else
						<td>{{ $it->customer->name }}</td>
						@endif
						<td>{{ $it->dabit }}</td>
						<td>{{ $it->credit }}</td>
						<td>{{ $it->balance }}</td>
						<td>{{ $it->description }}</td>
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