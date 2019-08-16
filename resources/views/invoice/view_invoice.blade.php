@extends('layouts.main')


	@section('title','Invoice View')
	@section('content')

	</div>
	<div class="row">
		<div class="col">
			<form id="form" action="#">
				<div class="card invoice">
				  <div class="card-header text-center">
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
					<table class="table table-sm small table-responsive invoice-table">
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
									<select class="product" onchange="productSelected(this)" disabled="true">
										<option value="{{ $sale->product->id }}" selected="selected">{{ $sale->product->name }}</option>
									</select>
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
								<th colspan="3">Developed by: Encoder Solutions</th>
								<th colspan="2"></th>
								<th>Discount:</th>
								<th>
									<input type="number" step="any" value="{{ $invoice->total_discount }}" id="total_discount" readonly>
								</th>
							</tr>
							<tr>
								<th colspan="3">Phone: +92 335-0659527</th>
								<th colspan="2"></th>
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
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
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

