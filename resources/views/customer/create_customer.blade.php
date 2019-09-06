@extends('layouts.main')

	@section('title','Create Customer')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" method="post" action="/customer">
				<div class="card">
				  <div class="card-header">
					   Create Customer
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Name</div>
				  			    </div>
					  			<input type="text" name="name" id="name" class="form-control" placeholder="Customer" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Phone</div>
				  			    </div>
					  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone no.">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Balance</div>
				  			    </div>
					  			<input type="number" name="balance" id="balance" class="form-control" value="0.00" readonly>
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Address</div>
				  			    </div>
					  			<input type="text" name="address" id="address" class="form-control" placeholder="Address...">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Area</div>
				  			    </div>
					  			<input type="text" name="area" id="area" class="form-control" placeholder="Area" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control date" required="required" readonly>
					  			@csrf
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
			axios.post("/customer", $(this).serialize())
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
			})
			.catch((err) => console.log(err) );
		})
	</script>

	@endsection

