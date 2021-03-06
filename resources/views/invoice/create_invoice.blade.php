@extends('layouts.main')


	@section('title','Create Invoice')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="#">
				<div class="card invoice">
				   <div class="card-header text-center">
					  @include('invoice._header')
				  </div>
				  <div class="card-body p-2">
				  	<div class="row m-0">
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Invoice No.</div>
				  			    </div>
					  			<input type="number" name="invoiceno" class="form-control" id="invoiceno" readonly>
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="date" class="form-control date" class="form-control form-control-sm" id="date" required="required">
					  			@csrf
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Customer</div>
				  			    </div>
					  			<input type="text" name="customer" class="form-control" id="customer" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Area</div>
				  			    </div>
					  			<input type="text" name="area" class="form-control" id="area" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">OrderBooker</div>
				  			    </div>
					  			<input type="text" name="orderbooker" class="form-control" id="orderbooker" required="required">
				  			</div>
				  		</div>
				  		<div class="col-md-6 col-sm-12 p-1">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">SaleMan</div>
				  			    </div>
					  			<input type="text" name="saleman" class="form-control" id="saleman" required="required">
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
					<table class="table table-sm small table-responsive w-100 d-block d-md-table invoice-table">
						<thead>
							<th>Product</th>
							<th>QTY.</th>
							<th>Bonus</th>
							<th>Unit Price</th>
							<th>Total</th>
							<th>Disc(%)</th>
							<th>Disc. Total</th>
							<th colspan="2" class="d-print-none">Del</th>
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
								<th colspan="3">Developed by: Encoder Solutions</th>
								<th colspan="2"></th>
								<th>Discount:</th>
								<th>
									<input type="number" step="any" class="" id="total_discount">
								</th>
							</tr>
							<tr>
								<th colspan="3">Phone: +92 335-0659527</th>
								<th colspan="2"></th>
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
				    <button class="btn btn-success" id="addstock" type="submit"><i class="fa fa-save"></i> Create</button>
				    <button type="button" onclick="print()" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
				    <button type="button" class="btn btn-info" id="stock_btn" onclick="add_invoice_row()"><i class="fa fa-align-justify"></i> Insert</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>

		$('.alert').hide();
		$('#form').submit(function(e){
			e.preventDefault()
			var data = {};
			var rowsdata = $('#tbody').children();
			var rows = [];
			for(var i=0; i<rowsdata.length;i++){

			rows.push({'product':$(rowsdata[i]).find('.product').val(),'qty':$(rowsdata[i]).find('.qty').val(),'bonus':$(rowsdata[i]).find('.bonus').val(),'unit_price':$(rowsdata[i]).find('.unit_price').val(),'total_price':$(rowsdata[i]).find('.total_price').val(),'discount':$(rowsdata[i]).find('.discount').val(), 'discount_amount':$(rowsdata[i]).find('.discount_amount').val(),'discount_total':$(rowsdata[i]).find('.discount_total').val()});
			}

			axios.post("/invoice", {
				'_token' : $("input[name='_token']").val(),
				'customer': $('#customer').val(),
				'area': $('#area').val(),
				'orderbooker': $('#orderbooker').val(),
				'saleman': $('#saleman').val(),
				'total_amount': $('#total_amount').val(),
				'total_discount': $('#total_discount').val(),
				'discount_total': $('#discount_total').val(),
				'date': $('#date').val(),'rows': rows} )
			.then(d => {
				reset_form()
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
				$('select').empty();
			})
			.catch((err) => console.log(err) );
		});


	reset_form = function(){
		$("#form").trigger("reset");
		$('select.product').empty();
		today_form_date();
		// Get Invoice No.
		axios.get("/get_invoice_no").then(d => $('#invoiceno').val(d.data));
	}
	reset_form()
	jQuery(document).ready(function($) {
        $('select.product').select2({
          ajax: {
            placeholder: 'Item',
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

