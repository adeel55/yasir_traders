				@php ($cols = 7)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Customer</th>
						<th>OrderBooker</th>
						<th>Sale Man</th>
						<th>Total</th>
						<th>Received</th>
						<th>Date</th>
						{{-- <th class="d-print-none">Del</th> --}}
					</tr>
				</thead>
				<tbody>
					@forelse($data as $invoice)
					<tr>
						<td>{{ $invoice->id }}</td>
						<td><a href="/invoice/{{ $invoice->id }}">{{ $invoice->customer->name }}</a></td>
						<td>{{ $invoice->order_booker->name }}</td>
						<td>{{ $invoice->sale_man->name }}</td>
						<td>{{ $invoice->discount_total }}</td>
						<td>{{ $invoice->received_amount }}</td>
						<td>{{ $invoice->showdate() }}</td>
						{{-- <td class="d-print-none"><button class="btn btn-danger btn-sm" onclick="deleteInvoice(this,{{ $invoice->id }})"><i class="fa fa-trash"></i></button></td> --}}
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