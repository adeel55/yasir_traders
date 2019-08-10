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
	  			<input type="number" name="invoiceno" class="form-control" value="{{ $invoice->id }}" id="invoiceno">
  			</div>
  		</div>
  		<div class="col-6 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			      <div class="input-group-text">Date</div>
  			    </div>
	  			<input type="date" name="date" class="form-control" class="form-control form-control-sm" value="{{ $invoice->putdate() }}" id="date" required="required">
	  			@csrf
  			</div>
  		</div>
  		<div class="col-6 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			      <div class="input-group-text ">Customer</div>
  			    </div>
	  			<input type="text" name="customer" class="form-control" id="customer" value="{{ $invoice->customer->name }}" required="required">
  			</div>
  		</div>
  		<div class="col-6 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			      <div class="input-group-text ">Area</div>
  			    </div>
				<input type="text" name="area" class="form-control" id="area" value="{{ $invoice->customer->area }}" required="required">
  			</div>
  		</div>
  		<div class="col-6 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			      <div class="input-group-text ">OrderBooker</div>
  			    </div>
	  			<input type="text" name="orderbooker" class="form-control" value="{{ $invoice->order_booker->name }}" id="orderbooker" required="required">
  			</div>
  		</div>
  		<div class="col-6 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			      <div class="input-group-text ">SaleMan</div>
  			    </div>
	  			<input type="text" name="saleman" class="form-control" value="{{ $invoice->sale_man->name }}" id="saleman" required="required">
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
			<th class="d-print-none">Del</th>
		</thead>
		<tbody id="tbody">
			@foreach($invoice->sales as $sale)

			<tr>
				<td>
					<input type="text" name="product" class="form-control form-control-sm product" value="{{ $sale->product->name }}" placeholder="product" required="required">
					<input type="hidden" class="sale_id" value="{{ $sale->id }}">
					<script>
					jQuery(document).ready(function($) {
						$('input.product').typeahead({
					        source: function (query, result) {
					            $.ajax({
					                url: "http://localhost:8000/search_products",
									data: 'searchString=' + query,            
					                dataType: "json",
					                type: "GET",
					                success: function (data) { result($.map(data, function (item) { return item; }));
					                }
					            });
					        },
					        updater:function (item) {
					        	axios.get('/get_sale_price?product=' + item['name'])
					        	.then(d => {
					        		$(document.activeElement).closest('tr').find('.unit_price').val(d.data);
					        	});
						        return item;
						    }
					    });
					});
					</script>
				</td>
				<td>
					<input type="number" step="any" name="qty" class="form-control form-control-sm qty" value="{{ $sale->qty }}" placeholder="qty" oninput="countTotalPrice(this)" required="required">
				</td>
				<td>
					<input type="number" step="any" name="bonus" class="form-control form-control-sm bonus" value="{{ $sale->bonus }}">
				</td>
				<td>
					<input type="number" step="any" oninput="countTotalPrice(this)" name="unit_price" class="form-control form-control-sm unit_price" value="{{ $sale->unit_price }}" placeholder="unit_price" required="required">
				</td>
				<td>
					<input type="number" step="any" name="total_price" class="form-control form-control-sm total_price" value="{{ $sale->total_price }}" required="required">
				</td>
				<td class="d-print-none">
					<input type="number" step="any" name="discount" class="form-control form-control-sm discount" value="{{ $sale->discount }}" oninput="countDiscountAmount(this)">
				</td>
				<td class="d-print-block d-none">
					<input type="number" step="any" name="discount_amount" class="form-control form-control-sm discount_amount" value="{{ $sale->discount_amount }}">
				</td>
				<td>
					<input type="number" step="any" name="discount_total" class="form-control form-control-sm discount_total" placeholder="Disc.Total" value="{{ $sale->discount_total }}" required="required">
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
</div>