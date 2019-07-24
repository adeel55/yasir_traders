				@php ($cols = 5)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>Balance</th>
						<th>Created On</th>
						<th class="d-print-none">Edit</th>
						<th class="d-print-none">Del</th>
					</tr>
				</thead>
				<tbody>
					@forelse($data as $it)
					<tr>
						<td>{{ $it->id }}</td>
						<td><a href="/customer/{{ $it->id }}">{{ $it->name }}</a></td>
						<td>{{ $it->balance }}</td>
						<td>{{ date('d-M-Y',strtotime($it->created_at)) }}</td>
						<td class="d-print-none"><a href="/customer/{{ $it->id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a></td>
						<td class="d-print-none"><button class="btn btn-danger btn-sm" onclick="deleteCustomer(this,{{ $it->id }})"><i class="fa fa-trash"></i></button></td>
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