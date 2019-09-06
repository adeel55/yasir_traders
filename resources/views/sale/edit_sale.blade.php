@extends('layouts.main')

	@section('title','Edit Sale')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="/sale/{{ $sale->id }}" method="post">
				<div class="card">
				  <div class="card-header">
					   Edit Sale
				  </div>
				  <div class="card-body">
				  	<div class="row m-0 tr">
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Product</div>
				  			    </div>
					  			<select id="product" class="filter" disabled>
					  				<option value="{{ $sale->product->id }}">{{ $sale->product->name }}</option>
					  			</select>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">QTY</div>
				  			    </div>
								<input type="number" step="any" name="qty" min="0" class="form-control qty" placeholder="qty" oninput="checkMaxQty(this);countTotalPrice(this)" value="{{ $sale->qty }}" required="required">
								<input type="hidden" value="0" class="max_qty">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Bonus</div>
				  			    </div>
								<input type="number" step="any" min="0" name="bonus" oninput="checkMaxBonus(this)" class="form-control bonus" value="{{ $sale->bonus }}">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Unit Price</div>
				  			    </div>
								<input type="number" step="any" min="0" oninput="countTotalPrice(this)" name="unit_price" class="form-control unit_price" placeholder="unit_price" value="{{ $sale->unit_price }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Discount(%)</div>
				  			    </div>
								<input type="number" step="any" min="0" name="discount" class="form-control discount" oninput="countDiscountAmount(this)" value="{{ $sale->discount }}">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Discount Amount</div>
				  			    </div>
								<input type="number" step="any" min="0" name="discount_amount" class="form-control discount_amount" value="{{ $sale->discount_amount }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Total Price</div>
				  			    </div>
								<input type="number" step="any" min="0" name="total_price" class="form-control total_price" oninput="countDiscountAmount(this)" value="{{ $sale->total_price }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Disc Total</div>
				  			    </div>
								<input type="number" step="any" min="0" name="discount_total" class="form-control discount_total" placeholder="Disc.Total" value="{{ $sale->discount_total }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control" id="created_at" value="{{ $sale->putdate() }}" required="required">
					  			<input type="hidden" name="_method" value="PUT">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" type="submit"><i class="fa fa-arrow-up"></i> Update</button>
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-left"></i> Back</button>
				    <button class="btn btn-warning" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
		$('#form').submit(function(e){
			e.preventDefault()
			axios.post("/sale/{{ $sale->id }}", $(this).serialize())
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
			})
			.catch((err) => console.log(err) );
		})

		 productSelected($('#product'));

		jQuery(document).ready(function($) {
			$('#product').select2({
			  ajax: {
			    url: '/search2_products',
			    data: function (params) {
			      var query = { searchString: params.term }
			      return query;
			    }
			  }
			})
		})
	</script>

	@endsection
