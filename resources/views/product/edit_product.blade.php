@extends('layouts.main')

	@section('title','Edit Product')
	@section('content')

	<div class="alert alert-success alert-dismissible hide" role="alert">
	  Product updated successfully.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="row">
		<div class="col">
			<form id="form" action="/product/{{ $product->id }}" method="post">
				<div class="card">
				  <div class="card-header">
					   Edit Product
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Name</div>
				  			    </div>
					  			<input type="text" name="name" class="form-control" value="{{ $product->name }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Company</div>
				  			    </div>
					  			<select name="company_id" class="form-control form-control-sm company_id">
									<option value="{{ $product->company_id }}" selected="selected">{{ $product->company->name }}</option>
								</select>
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Purchase Price</div>
				  			    </div>
					  			<input type="number" name="unit_purchase" min="0" step="any" class="form-control" value="{{ $product->unit_purchase }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Sale Price</div>
				  			    </div>
					  			<input type="number" name="unit_sale" min="0" step="any" class="form-control" value="{{ $product->unit_sale }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">QTY</div>
				  			    </div>
					  			<input type="number" name="qty" min="0" step="any" class="form-control" value="{{ $product->qty }}" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Created On</div>
				  			    </div>
					  			<input type="date" name="created_at" class="form-control form-control-sm" id="created_at" value="{{ $product->putdate() }}" readonly>
					  			<input type="hidden" name="_method" value="PUT">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" type="submit"><i class="fa fa-arrow-up"></i> Update</button>
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<script>
		$('.alert').hide()
		console.log($('form').serialize());
		$('#form').submit(function(e){
			e.preventDefault()
			axios.post("/product/{{ $product->id }}", $(this).serialize())
			.then(d => {
				console.log(d.data)
				if(d.data == "success")
				{
					$(".alert").show().delay(2000).slideUp(500, function() { $(this).alert('close')});
				}
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
