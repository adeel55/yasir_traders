				@php ($cols = 10)
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Product</th>
						<th>QTY</th>
						<th>Bonus</th>
						<th>Unit Price</th>
						<th>TotalPrice</th>
						<th>Discount</th>
						<th>DiscTotal</th>
						<th>Date</th>
						<th>Invoice</th>
						<th class="d-print-none">Edit</th>
						{{-- <th class="d-print-none">Del</th> --}}
					</tr>
				</thead>
				<tbody>
					@forelse($sales as $it)
					<tr>
						<td>{{ $it->id }}</td>
						{{-- <td>{{ $it->product->name }}</td> --}}
						<td><a href="/sale/{{ $it->id }}">{{ $it->product->name }}</a></td>
						<td>{{ $it->qty }}</td>
						<td>{{ $it->bonus }}</td>
						<td>{{ $it->unit_price }}</td>
						<td>{{ $it->total_price }}</td>
						<td>{{ $it->discount_amount }}</td>
						<td>{{ $it->discount_total }}</td>
						<td>{{ $it->showdate() }}</td>
						<td><a href="/invoice/{{ $it->invoice->id }} "class="btn btn-success btn-sm"><i class="fa fa-file-invoice"></i></a></td>
						<td class="d-print-none"><a href="/sale/{{ $it->id }}/edit" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></a></td>
						{{-- <td class="d-print-none"><button class="btn btn-danger btn-sm" onclick="deleteOrderbooker(this,{{ $it->id }})"><i class="fa fa-trash"></i></button></td> --}}
					</tr>
					@empty
					<tr>
						<td colspan="{{$cols}}" class="text-danger text-center">No Record Found</td>
					</tr>
					@endforelse
				</tbody>
				<tfoot>
					<tr>
						<th colspan="2">Total:</th>
						<th>{{ $sales->sum('qty') }}</th>
						<th>{{ $sales->sum('bonus') }}</th>
						<th>{{ $sales->sum('unit_price') }}</th>
						<th>{{ $sales->sum('total_price') }}</th>
						<th>{{ $sales->sum('discount_amount') }}</th>
						<th>{{ $sales->sum('discount_total') }}</th>
						<th colspan="4"></th>
					</tr>
					<tr>
						<td colspan="{{$cols}}">{{ $sales->links() }}</td>
					</tr>
				</tfoot>