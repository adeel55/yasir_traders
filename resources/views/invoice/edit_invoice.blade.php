@extends('layouts.main')


	@section('title','Edit Invoice')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="#">
				<div class="card invoice">
				  <div class="card-header text-center">
					   @include('invoice._header')
				  </div>
				  <div class="card-body p-2">
				  	<div class="row m-0">
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Invoice No.</div>
				  			    </div>
					  			<input type="number" name="invoiceno" class="form-control" value="{{ $invoice->id }}" id="invoiceno" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="date" class="form-control" class="form-control form-control-sm" value="{{ $invoice->putdate() }}" id="date" required="required">
					  			@csrf
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Customer</div>
				  			    </div>
					  			<input type="text" name="customer" class="form-control" id="customer" value="{{ $invoice->customer->name }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Area</div>
				  			    </div>
								<input type="text" name="area" class="form-control" id="area" value="{{ $invoice->customer->area }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">OrderBooker</div>
				  			    </div>
					  			<input type="text" name="orderbooker" class="form-control" value="{{ $invoice->order_booker->name }}" id="orderbooker" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">SaleMan</div>
				  			    </div>
					  			<input type="text" name="saleman" class="form-control" value="{{ $invoice->sale_man->name }}" id="saleman" required="required">
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
					<table class="table table-sm small table-responsive w-100 d-block d-md-table invoice-table">
						<thead>
							<th>Product</th>
							<th>QTY.</th>
							<th>Bonus</th>
							<th>Unit Price</th>
							<th>Total</th>
							<th>Disc(%)</th>
							<th>Disc. Total</th>
							<th colspan="2" class="d-print-none">Del</th>
						</thead>
						<tbody id="tbody">
							@foreach($invoice->sales as $sale)

							<tr>
								<td>
									<select class="product" onchange="productSelected(this)">
										<option value="{{ $sale->product->id }}" selected="selected">{{ $sale->product->name }}</option>
									</select>
									<input type="hidden" class="sale_id" value="{{ $sale->id }}">
								</td>
								<td>
									<input type="number" step="any" name="qty" min="0" class="form-control form-control-sm qty" value="{{ $sale->qty }}" placeholder="qty" oninput="checkMaxQty(this);countTotalPrice(this)" required="required">
									<input type="hidden" value="{{ $sale->product->getMaxQty()+$sale->qty }}" class="max_qty">
								</td>
								<td>
									<input type="number" step="any" name="bonus" min="0" class="form-control form-control-sm bonus" oninput="checkMaxBonus(this)" value="{{ $sale->bonus }}">
								</td>
								<td>
									<input type="number" step="any" oninput="countTotalPrice(this)" name="unit_price" min="0" class="form-control form-control-sm unit_price" value="{{ $sale->unit_price }}" placeholder="unit_price" required="required">
								</td>
								<td>
									<input type="number" step="any" name="total_price" min="0" class="form-control form-control-sm total_price" value="{{ $sale->total_price }}" required="required">
								</td>
								<td class="d-print-none">
									<input type="number" step="any" name="discount" min="0" class="form-control form-control-sm discount" value="{{ $sale->discount }}" oninput="countDiscountAmount(this)">
								</td>
								<td class="d-print-block d-none">
									<input type="number" step="any" name="discount_amount" min="0" class="form-control form-control-sm discount_amount" value="{{ $sale->discount_amount }}">
								</td>
								<td>
									<input type="number" step="any" name="discount_total" min="0" class="form-control form-control-sm discount_total" placeholder="Disc.Total" value="{{ $sale->discount_total }}" required="required">
								</td>
								<td class="d-print-none">
									<button type="button" onclick="delEditInvoiceRow(this,{{ $sale->id }})" class="btn btn-sm btn-danger"><i class="fa fa-trash delrowbtn"></i></button>
								</td>
							</tr>

							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5"></th>
								<th>Net. Total:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->total_amount }}" id="total_amount">
								</th>
							</tr>
							<tr>
								<th colspan="3">Developed by: Encoder Solutions</th>
								<th colspan="2"></th>
								<th>Discount:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->total_discount }}" id="total_discount">
								</th>
							</tr>
							<tr>
								<th colspan="3">Phone: +92 335-0659527</th>
								<th colspan="2"></th>
								<th>Total:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->discount_total }}" id="discount_total">
								</th>
							</tr>
						</tfoot>
					</table>
				  </div>
				  <div class="card-footer d-print-none">
				    <button type="button" class="btn btn-info" id="stock_btn" onclick="window.history.go(-1);"><i class="fa fa-arrow-left"></i> Back</button>
				    <button class="btn btn-success" id="addstock" type="submit"><i class="fa fa-save"></i> Update</button>
				    <button type="button" onclick="print()" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
				    {{-- <button type="button" class="btn btn-info" id="stock_btn" onclick="add_invoice_row()">Insert</button> --}}
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		today_form_date();
		

		$('#form').submit(function(e){
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
			data['area'] = $('#area').val();
			data['orderbooker'] = $('#orderbooker').val();
			data['saleman'] = $('#saleman').val();
			data['date'] = $('#date').val();
			data['total_amount'] = $('#total_amount').val();
			data['total_discount'] = $('#total_discount').val();
			data['discount_total'] = $('#discount_total').val();
			console.log(data);


			axios.post("/invoice/{{ $invoice->id }}", {
				'_method' : "PUT",
				'_token' : $("input[name='_token']").val(),
				'customer': $('#customer').val(),
				'area': $('#area').val(),
				'orderbooker': $('#orderbooker').val(),
				'saleman': $('#saleman').val(),
				'total_amount': $('#total_amount').val(),
				'total_discount': $('#total_discount').val(),
				'discount_total': $('#discount_total').val(),
				'date': $('#date').val(),'rows': rows} )
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
			})
			.catch((err) => console.log(err) );
		});

		jQuery(document).ready(function($) {
	        $('select.product').select2({
	          ajax: {
	            placeholder: 'Item',
	            url: '/search2_products',
	            data: function (params) {
	              var query = { searchString: params.term }
	              return query;
	            }
	          }
	        });
	    })


		
	</script>

	@endsection

