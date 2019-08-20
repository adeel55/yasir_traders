@extends('layouts.main')

	@section('title','Add Stock')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" method="post" action="/inventory/{{ $inventory->id }}">
				<div class="card">
				  <div class="card-header">
					   Add Stock
				  </div>
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Company</div>
				  			    </div>
					  			<select name="company_id" class="form-control form-control-sm company_id">
									<option value="{{ $inventory->company->id }}" selected="selected">{{ $inventory->company->name }}</option>
								</select>
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm" id="date" value="{{ $inventory->putdate() }}"  required="required">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
					<div id="rows" class="rows row">
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Product</div>
				  			    </div>
								<select name="product_id" class="form-control form-control-sm product_id" disabled>
									<option value="{{ $inventory->product->id }}" selected="selected">{{ $inventory->product->name }}</option>
								</select>
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Qty</div>
				  			    </div>
								<input type="number" step="any" name="qty" oninput="count_total_purchase(this)" class="form-control form-control-sm qty" id="qty" min="0" placeholder="qty" value="{{ $inventory->qty }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Total Purchase</div>
				  			    </div>
								<input type="number" step="any" name="total_purchase" oninput="count_per_unit_purchase(this)" class="form-control form-control-sm total_purchase" id="total_purchase" placeholder="total_purchase" value="{{ $inventory->total_purchase }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Unit Sale</div>
				  			    </div>
								<input type="number" step="any" name="unit_sale" class="form-control form-control-sm unit_sale" id="unit_sale" value="{{ $inventory->unit_sale }}" placeholder="unit_sale" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Unit Purchase</div>
				  			    </div>
								<input type="number" step="any" name="unit_purchase" class="form-control form-control-sm unit_purchase" id="unit_purchase" value="{{ $inventory->unit_purchase }}" oninput="count_total_purchase(this)" placeholder="unit_purchase" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Expire</div>
				  			    </div>
								<input type="date" name="expire" class="form-control form-control-sm expire" id="expire" value="{{ $inventory->expire }}">
								<input type="hidden" name="_method" value="PUT">
				  			</div>
				  		</div>
					</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				    <button class="btn btn-success" id="addstock" type="submit"><i class="fa fa-boxes"></i> Update Stock</button>
				    <button class="btn btn-warning" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		$('#form').submit(function(e){
			e.preventDefault()
			axios.post("/inventory/{{ $inventory->id }}", $(this).serialize() )
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
			}).catch((err) => console.log(err));
		})
		jQuery(document).ready(function($) {
	        $('select.company_id').select2({
	          ajax: {
	            url: '/search2_companies',
	            data: function (params) {
	              var query = { searchString: params.term }
	              return query;
	            }
	          }
	        });
	        $('select.product_id').select2({
	          ajax: {
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

