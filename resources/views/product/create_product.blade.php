@extends('layouts.main')

	@section('title','Create Product')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="/product" method="post">
				<div class="card">
				  <div class="card-header">
					   Create New Product
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Name</div>
				  			    </div>
					  			<input type="text" name="name" class="form-control" placeholder="Item" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Company</div>
				  			    </div>
					  			<select name="company_id" class="form-control form-control-sm company_id" required="required">
								</select>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Purchase Price</div>
				  			    </div>
					  			<input type="number" name="unit_purchase" min="0" step="any" class="form-control" value="0.00" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Sale Price</div>
				  			    </div>
					  			<input type="number" name="unit_sale" min="0" step="any" class="form-control" value="0.00" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">QTY</div>
				  			    </div>
					  			<input type="number" name="qty" min="0" step="any" class="form-control" value="0.00" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm date" id="created_at" readonly>
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Create</button>
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
		today_form_date();
		console.log($('form').serialize());
		$('#form').submit(function(e){
			e.preventDefault()
			axios.post("/product", $(this).serialize())
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
				$(this).trigger('reset');
			})
			.catch((err) => console.log(err) );
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
	    })
	</script>

	@endsection
