@extends('layouts.main')

	@section('title','View Sale')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="#" method="post">
				<div class="card">
				  <div class="card-header">
					   View Sale
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
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
					  			<input type="number" step="any" name="qty" id="qty" class="form-control" value="{{ $sale->qty }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Bonus</div>
				  			    </div>
					  			<input type="number" step="any" name="bonus" id="bonus" class="form-control" value="{{ $sale->bonus }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Unit Price</div>
				  			    </div>
					  			<input type="number" step="any" name="unit_price" id="unit_price" class="form-control" value="{{ $sale->unit_price }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Discount(%)</div>
				  			    </div>
					  			<input type="number" step="any" name="discount" id="discount" class="form-control" value="{{ $sale->discount }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Discount Amount</div>
				  			    </div>
					  			<input type="number" step="any" name="discount_amount" id="discount_amount" class="form-control" value="{{ $sale->discount_amount }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Total Price</div>
				  			    </div>
					  			<input type="number" step="any" name="total_price" id="total_price" class="form-control" value="{{ $sale->total_price }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Disc Total</div>
				  			    </div>
					  			<input type="number" step="any" name="discount_total" id="discount_total" class="form-control" value="{{ $sale->discount_total }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm" id="created_at" value="{{ $sale->putdate() }}" readonly>
					  			<input type="hidden" name="_method" value="PUT">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				    <button class="btn btn-warning" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
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
