@extends('layouts.main')

	@section('title','Add Stock')
	@section('content')

	<div class="alert alert-success alert-dismissible hide" role="alert">
	  Purchase updated successfully.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="row">
		<div class="col">
			<form action="#">
				<div class="card">
				  <div class="card-header">
					   Add Stock
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col p-0">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Company</div>
				  			    </div>
					  			<input type="text" name="company" id="company" class="form-control form-control-sm" value="{{ $inventory->company }}" required="required">
				  			</div>
				  		</div>
				  		<div class="col p-0">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="date" class="form-control form-control-sm" id="date" value="{{ $inventory->putdate() }}"  required="required">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
					<div id="rows" class="rows">
						<div class="row pl-4 pr-4">
							<div class="col p-0">
								<input type="text" name="product" class="form-control form-control-sm product" id="product" placeholder="product" value="{{ $inventory->product }}" required="required" readonly>
								<script>
								jQuery(document).ready(function($) {
									$('input.product').typeahead({
								        source: function (query, result) {
								            $.ajax({
								                url: "http://localhost:8000/search_products",
												data: 'searchString=' + query,            
								                dataType: "json",
								                type: "GET",
								                success: function (data) { result($.map(data, function (item) { return item; }));
								                }
								            });
								        }
								    });
								});
								</script>
							</div>
							<div class="col p-0">
								<input type="number" step="any" name="qty" oninput="count_per_unit_purchase(this)" class="form-control form-control-sm qty" id="qty" min="0" placeholder="qty" value="{{ $inventory->qty }}" required="required">
							</div>
							<div class="col p-0">
								<input type="number" step="any" min="0" name="carton" class="form-control form-control-sm carton" id="carton" placeholder="carton" value="{{ $inventory->carton }}" >
							</div>
							<div class="col p-0">
								<input type="number" step="any" name="total_purchase" oninput="count_per_unit_purchase(this)" class="form-control form-control-sm total_purchase" id="total_purchase" placeholder="total_purchase" value="{{ $inventory->total_purchase }}" required="required">
							</div>
							<div class="col p-0">
								<input type="number" step="any" name="unit_sale" class="form-control form-control-sm unit_sale" id="unit_sale" value="{{ $inventory->unit_sale }}" placeholder="unit_sale" required="required">
							</div>
							<div class="col p-0">
								<input type="number" step="any" name="unit_purchase" class="form-control form-control-sm unit_purchase" id="unit_purchase" value="{{ $inventory->unit_purchase }}" placeholder="unit_purchase" required="required">
							</div>
							<div class="col p-0">
								<input type="date" name="expire" class="form-control form-control-sm expire" id="expire" value="{{ $inventory->expire }}" >
							</div>
							<div class="col-1 p-0 d-print-none">
								<button onclick="delRow(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash delrowbtn"></i></button>
							</div>
						</div>
					</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-info" type="button" onclick="window.history.go(-1);"><i class="fa fa-arrow-back"></i> Back</button>
				    <button class="btn btn-success" id="addstock" type="submit"><i class="fa fa-boxes"></i> Update Stock</button>
				    <button class="btn btn-info" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		$('.alert').hide();
		$('form').submit(function(e){
			e.preventDefault()
			var tr = $('#rows');
			axios.post("/inventory/{{ $inventory->id }}", {'_method':'PUT','_token' : $("input[name='_token']").val(),'company' : $('#company').val(),'date' : $('#date').val(),'product':$(tr).find('.product').val(),'qty':$(tr).find('.qty').val(),'carton':$(tr).find('.carton').val(),'unit_purchase':$(tr).find('.unit_purchase').val(),'unit_sale':$(tr).find('.unit_sale').val(),'total_purchase':$(tr).find('.total_purchase').val(),'expire':$(tr).find('.expire').val()} )
			.then(d => {
				console.log(d.data);
				if(d.data == "success")
				{
					$(".alert").show().delay(3000).slideUp(500, function() {
					    $(this).alert('close');
					})
				}
			}).catch((err) => console.log(err));
		})
		
		
	</script>

	@endsection

