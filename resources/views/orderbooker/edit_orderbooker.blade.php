@extends('layouts.main')

	@section('title','Edit OrderBooker')
	@section('content')

	<div class="alert alert-success alert-dismissible hide" role="alert">
	  Order Booker updated successfully.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="row">
		<div class="col">
			<form action="/orderbooker/{{ $orderbooker->id }}" method="post">
				<div class="card">
				  <div class="card-header">
					   Edit OrderBooker
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Name</div>
				  			    </div>
					  			<input type="text" name="name" id="name" class="form-control" value="{{ $orderbooker->name }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Phone</div>
				  			    </div>
					  			<input type="text" name="phone" id="phone" class="form-control" value="{{ $orderbooker->phone }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Target</div>
				  			    </div>
					  			<input type="number" name="target" id="target" class="form-control" value="{{ $orderbooker->target }}">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm" id="created_at" value="{{ $orderbooker->created_at() }}" required="required">
					  			<input type="hidden" name="_method" value="PUT">
					  			<input type="hidden" name="id" value="{{ $orderbooker->id }}">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" id="addstock" type="submit"><i class="fa fa-boxes"></i> Update</button>
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
		$('.alert').hide()
		console.log($('form').serialize());
		$('form').submit(function(e){
			e.preventDefault()
			axios.post("/orderbooker/{{ $orderbooker->id }}", $(this).serialize())
			.then(d => {
				console.log(d.data)
				if(d.data == "success")
				{
					$(".alert").show().delay(2000).slideUp(500, function() { $(this).alert('close')});
				}
			})
			.catch((err) => console.log(err) );
		})
	</script>

	@endsection
