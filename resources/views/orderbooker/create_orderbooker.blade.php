@extends('layouts.main')

	@section('title','Create OrderBooker')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="/orderbooker" method="post">
				<div class="card">
				  <div class="card-header">
					   Create OrderBooker
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Name</div>
				  			    </div>
					  			<input type="text" name="name" class="form-control" placeholder="Name" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Phone</div>
				  			    </div>
					  			<input type="text" name="phone" class="form-control" placeholder="phone no.">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Target</div>
				  			    </div>
					  			<input type="number" name="target" class="form-control" placeholder="Target">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 my-2">
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
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
		today_form_date()
		$('#form').submit(function(e){
			e.preventDefault()
			axios.post("/orderbooker", $(this).serialize())
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
				$(this).trigger('reset');
			})
			.catch((err) => console.log(err) );
		})
	</script>

	@endsection
