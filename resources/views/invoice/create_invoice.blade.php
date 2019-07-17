@extends('layouts.main')


	@section('title','Create Invoice')
	@section('content')

	<div class="alert alert-success alert-dismissible hide" role="alert">
	  Invoice created successfully.
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
				  <div class="card-body p-2">
				  	<div class="row m-0">
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Invoice No.</div>
				  			    </div>
					  			<input type="number" name="invoiceno" class="form-control" id="invoiceno" readonly>
				  			</div>
				  		</div>
				  		<div class="col-6 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="date" class="form-control date" class="form-control form-control-sm" id="date" required="required">
					  			@csrf
				  			</div>
				  		</div>
				  		<div class="col-lg-4 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Customer</div>
				  			    </div>
					  			<input type="text" name="customer" class="form-control" id="customer" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-4 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">OrderBooker</div>
				  			    </div>
					  			<input type="text" name="orderbooker" class="form-control" id="orderbooker" required="required">
				  			</div>
				  		</div>
				  		<div class="col-lg-4 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">SaleMan</div>
				  			    </div>
					  			<input type="text" name="saleman" class="form-control" id="saleman" required="required">
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
					<table class="table table-sm small invoice-table">
						<thead>
							<th>Product</th>
							<th>QTY.</th>
							<th>Bonus</th>
							<th>Unit Price</th>
							<th>Total</th>
							<th>Disc(%)</th>
							<th>Disc. Total</th>
						</thead>
						<tbody id="tbody">
							@include('components.invoice_row')
						</tbody>
						<tfoot>
							<tr>
								<th colspan="5"></th>
								<th>Net. Total:</th>
								<th>
									<input type="number" step="any" class="" id="total_amount">
								</th>
							</tr>
							<tr>
								<th colspan="5"></th>
								<th>Discount:</th>
								<th>
									<input type="number" step="any" class="" id="total_discount">
								</th>
							</tr>
							<tr>
								<th colspan="5"></th>
								<th>Total:</th>
								<th>
									<input type="number" step="any" class="" id="discount_total">
								</th>
							</tr>
						</tfoot>
					</table>
					</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" id="addstock" type="submit">Create</button>
				    <button type="button" onclick="print()" class="btn btn-warning">Print</button>
				    <button type="button" class="btn btn-info" id="stock_btn" onclick="add_invoice_row()">Insert</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		today_form_date();
		$('.alert').hide();
		

		$('form').submit(function(e){
			e.preventDefault()
			var data = {};
			var rowsdata = $('#tbody').children();
			var rows = [];
			for(var i=0; i<rowsdata.length;i++){

			rows.push({'product':$(rowsdata[i]).find('.product').val(),'qty':$(rowsdata[i]).find('.qty').val(),'bonus':$(rowsdata[i]).find('.bonus').val(),'unit_price':$(rowsdata[i]).find('.unit_price').val(),'total_price':$(rowsdata[i]).find('.total_price').val(),'discount':$(rowsdata[i]).find('.discount').val(), 'discount_amount':$(rowsdata[i]).find('.discount_amount').val(),'discount_total':$(rowsdata[i]).find('.discount_total').val()});
			}
			// data['_token'] = $('meta[name="csrf-token"]').attr('content');
			// data['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
			data['_token'] = $("input[name='_token']").val();
			data['rows'] = rows;
			data['customer'] = $('#customer').val();
			data['orderbooker'] = $('#orderbooker').val();
			data['saleman'] = $('#saleman').val();
			data['date'] = $('#date').val();
			data['total_amount'] = $('#total_amount').val();
			data['total_discount'] = $('#total_discount').val();
			data['discount_total'] = $('#discount_total').val();
			console.log(data);


			axios.post("/invoice", {
				'_token' : $("input[name='_token']").val(),
				'customer': $('#customer').val(),
				'orderbooker': $('#orderbooker').val(),
				'saleman': $('#saleman').val(),
				'total_amount': $('#total_amount').val(),
				'total_discount': $('#total_discount').val(),
				'discount_total': $('#discount_total').val(),
				'date': $('#date').val(),'rows': rows} )
			.then(d => { console.log(d.data)
				$('form').trigger("reset");
				if(d.data == "success")
				$(".alert").show().delay(3000).slideUp(500, function() {
				    $(this).alert('close');
				});
			})
			.catch((err) => console.log(err) );
		});


		// Get Invoice No.
		axios.get("/get_invoice_no").then(d => $('#invoiceno').val(d.data));


		
	</script>

	@endsection

