@extends('layouts.main')

	@section('title','Create Statement')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="/statement" method="post">
				<div class="card">
				  <div class="card-header">
					   Create Account Statement Of Customers
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text">Customer</div>
				  			    </div>
				  			    <select id="customer" name="customer_id" required></select>
				  			</div>
						</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm date" id="created_at" required="required" readonly>
					  			@csrf
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text text-success">Credit</div>
				  			    </div>
				  			    <input type="number" step="any" name="credit" class="form-control" placeholder="amount">
				  			</div>
						</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text text-danger">Debit</div>
				  			    </div>
				  			    <input type="number" step="any" name="debit" class="form-control" placeholder="amount">
				  			</div>
						</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text">Description</div>
				  			    </div>
				  			    <input type="text" name="description" class="form-control" placeholder="Description">
				  			</div>
						</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Create</button>
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-left"></i> Back</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
		today_form_date()
		$('#form').submit(function(e){
			e.preventDefault()
			if(!confirm('Are you sure to create this statement?')) return;
			axios.post("/statement", $(this).serialize())
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
				$('#customer').empty();
			})
			.catch((err) => console.log(err) );
		});

		jQuery(document).ready(function($) {
			$('#customer').select2({
			  ajax: {
			    url: '/search2_customer',
			    data: function (params) {
			      var query = { searchString: params.term }
			      return query;
			    }
			  }
			});
		});
	</script>

	@endsection
