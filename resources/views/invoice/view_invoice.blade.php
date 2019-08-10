@extends('layouts.main')


	@section('title','Invoice View')
	@section('content')

	</div>
	<div class="row">
		<div class="col">
			<form action="#">
				<div class="card invoice">
				  <div class="card-header">
					   @include('invoice._header')
				  </div>
				  <div class="card-body p-2">
				  	<div class="row m-0">
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Invoice No.</div>
				  			    </div>
					  			<input type="number" name="invoiceno" class="form-control" value="{{ $invoice->id }}" id="invoiceno" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="date" class="form-control" class="form-control form-control-sm" value="{{ $invoice->putdate() }}" id="date" readonly>
					  			@csrf
				  			</div>
				  		</div>
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Customer</div>
				  			    </div>
					  			<input type="text" name="customer" class="form-control" id="customer" value="{{ $invoice->customer->name }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Area</div>
				  			    </div>
					  			<input type="text" name="area" class="form-control" id="area" value="{{ $invoice->customer->area }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">OrderBooker</div>
				  			    </div>
					  			<input type="text" name="orderbooker" class="form-control" value="{{ $invoice->order_booker->name }}" id="orderbooker" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">SaleMan</div>
				  			    </div>
					  			<input type="text" name="saleman" class="form-control" value="{{ $invoice->sale_man->name }}" id="saleman" readonly>
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
					<table class="table table-sm small invoice-table">
						<thead>
							<th>Product</th>
							<th>QTY.</th>
							<th>Bonus</th>
							<th>Unit Price</th>
							<th>Total</th>
							<th>Disc(%)</th>
							<th>Disc. Total</th>
						</thead>
						<tbody id="tbody">
							@foreach($invoice->sales as $sale)

							<tr>
								<td>
									<input type="text" name="product" class="form-control form-control-sm product" value="{{ $sale->product->name }}" placeholder="product" readonly>
								</td>
								<td>
									<input type="number" step="any" name="qty" class="form-control form-control-sm qty" value="{{ $sale->qty }}" placeholder="qty" oninput="countTotalPrice(this)" readonly>
								</td>
								<td>
									<input type="number" step="any" name="bonus" class="form-control form-control-sm bonus" value="{{ $sale->bonus }}" readonly>
								</td>
								<td>
									<input type="number" step="any" name="unit_price" class="form-control form-control-sm unit_price" value="{{ $sale->unit_price }}" placeholder="unit_price" readonly>
								</td>
								<td>
									<input type="number" step="any" name="total_price" class="form-control form-control-sm total_price" value="{{ $sale->total_price }}" readonly>
								</td>
								<td class="d-print-none">
									<input type="number" step="any" name="discount" class="form-control form-control-sm discount" value="{{ $sale->discount }}" oninput="countDiscountAmount(this)" readonly>
								</td>
								<td class="d-print-block d-none">
									<input type="number" step="any" name="discount_amount" class="form-control form-control-sm discount_amount" value="{{ $sale->discount_amount }}" readonly>
								</td>
								<td>
									<input type="number" step="any" name="discount_total" class="form-control form-control-sm discount_total" placeholder="Disc.Total" value="{{ $sale->discount_total }}" readonly>
								</td>
								{{-- <td class="d-print-none">
									<button onclick="delsale(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash delrowbtn"></i></button>
								</td> --}}
							</tr>

							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5"></th>
								<th>Net. Total:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->total_amount }}" id="total_amount" readonly>
								</th>
							</tr>
							<tr>
								<th colspan="5"></th>
								<th>Discount:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->total_discount }}" id="total_discount" readonly>
								</th>
							</tr>
							<tr>
								<th colspan="5"></th>
								<th>Total:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->discount_total }}" id="discount_total" readonly>
								</th>
							</tr>
						</tfoot>
					</table>
					</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button type="button" class="btn btn-info" id="stock_btn" onclick="window.history.go(-1);">Back</button>
				    <button type="button" onclick="print()" class="btn btn-warning">Print</button>
				    {{-- <button type="button" class="btn btn-info" id="stock_btn" onclick="add_invoice_row()">Insert</button> --}}
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		today_form_date();
		$('.alert').hide();
		

		$('form').submit(function(e){
			e.preventDefault()
			var data = {};
			var rowsdata = $('#tbody').children();
			var rows = [];
			for(var i=0; i<rowsdata.length;i++){

			rows.push({'sale_id':$(rowsdata[i]).find('.sale_id').val(),'product':$(rowsdata[i]).find('.product').val(),'qty':$(rowsdata[i]).find('.qty').val(),'bonus':$(rowsdata[i]).find('.bonus').val(),'unit_price':$(rowsdata[i]).find('.unit_price').val(),'total_price':$(rowsdata[i]).find('.total_price').val(),'discount':$(rowsdata[i]).find('.discount').val(), 'discount_amount':$(rowsdata[i]).find('.discount_amount').val(),'discount_total':$(rowsdata[i]).find('.discount_total').val()});
			}
			// data['_token'] = $('meta[name="csrf-token"]').attr('content');
			// data['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
			data['_token'] = $("input[name='_token']").val();
			data['rows'] = rows;
			data['invoiceno'] = $('#invoiceno').val();
			data['customer'] = $('#customer').val();
			data['orderbooker'] = $('#orderbooker').val();
			data['saleman'] = $('#saleman').val();
			data['date'] = $('#date').val();
			data['total_amount'] = $('#total_amount').val();
			data['total_discount'] = $('#total_discount').val();
			data['discount_total'] = $('#discount_total').val();
			console.log(data);


			axios.post("/invoice/{{ $invoice->id }}", {
				'_method' : "PUT",
				'id' : $('#invoiceno').val(),
				'_token' : $("input[name='_token']").val(),
				'customer': $('#customer').val(),
				'orderbooker': $('#orderbooker').val(),
				'saleman': $('#saleman').val(),
				'total_amount': $('#total_amount').val(),
				'total_discount': $('#total_discount').val(),
				'discount_total': $('#discount_total').val(),
				'date': $('#date').val(),'rows': rows} )
			.then(d => { console.log(d.data)
				if(d.data == "success")
				$(".alert").show().delay(3000).slideUp(500, function() {
				    $(this).alert('close');
				});
			})
			.catch((err) => console.log(err) );
		});


		
	</script>

	@endsection

