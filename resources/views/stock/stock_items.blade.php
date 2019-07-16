@extends('layouts.main')


	@section('title','Stock Items')
	@section('content')
	<div class="row">
		<div class="col">
			<h4>Purchases List</h4>	
		</div>
	</div>
	<div class="row d-print-none">
		<div class="col">
			<input type="text" class="form-control form-control-sm">	
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-sm table-hover">
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Product</th>
						<th>QTY</th>
						<th>Company</th>
						<th>Purchase Price</th>
						<th>Sale Price</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data as $it)
					<tr>
						<td>{{ $it->product_id }}</td>
						<td>{{ $it->product }}</td>
						<td>{{ $it->qty }}</td>
						<td>{{ $it->company }}</td>
						<td>{{ $it->unit_purchase }}</td>
						<td>{{ $it->unit_sale }}</td>
						<td>{{ $it->created_at }}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">{{ $data->links() }}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>



	@endsection