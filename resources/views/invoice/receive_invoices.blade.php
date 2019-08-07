@extends('layouts.main')

	@section('title','Invoices List')
	@section('content')
	
	<div class="alert alert-success alert-dismissible hide" role="alert">
	  Invoices Received successfully.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="row">
		<div class="col">
			<h4>Receive Invoices</h4>	
		</div>
	</div>
	<form action="#">
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">OrderBooker</div>
  			    </div>
	  			<input type="text" id="filterstrjoinorder_bookers-name"  class="filter form-control" required>
	  			{{ csrf_field() }}
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">SaleMan</div>
  			    </div>
	  			<input type="text" id="filterstrjoinsale_men-name"  class="filter form-control" required>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="filterdatejoininvoices-created_at" oninput="filter()" class="filter date form-control" required>
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col p-2">
			<table id="table" data-url="/invoice_receive" class="table small table-sm table-hover">
			</table>
			<hr>
			<div class="row">
				<div id="expenses" class="col">
					<div class="row m-0 border">
						<div class="col-10 p-0">
							<h4 class="text-success p-2">Expenses</h4>
						</div>
						<div class="col-2 p-0 d-print-none">
							<button type="button" onclick="add_expense_row()" class="btn btn-success btn-sm m-2"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div id="expenses_rows">
						<div class="row m-0">
							<div class="col-4 p-0">
								<input type="number" placeholder="amount" step="any" oninput="countTotalExpenses()" class="form-control form-control-sm expense_amount" required>
							</div>
							<div class="col p-0">
								<input type="text" placeholder="description" class="form-control form-control-sm expense_description" required>
							</div>
							<div class="col-1 p-0 d-print-none">
								<button type="button" class="btn btn-danger btn-sm" onclick="delExpenseRow(this)"><i class="fa fa-trash"></i></button>
							</div>
						</div>
					</div>
					<div class="row m-0 border my-2">
						<div class="col p-0">
							<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text ">Total Expenses</div>
				  			    </div>
					  			<input type="number" step="any" id="total_expenses"  class="filter form-control" readonly>
				  			</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row p-0">
						<div class="col">
				  			<div class="input-group input-group-sm my-1">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text ">Invoices Total</div>
				  			    </div>
					  			<input type="number" step="any" id="discount_total"  class="filter form-control" readonly>
				  			</div>
						</div>
					</div>
					<div class="row p-0">
						<div class="col">
				  			<div class="input-group input-group-sm my-1">
				  			    <div class="input-group-prepend">
				  			     	<div class="input-group-text ">Invoices Received</div>
				  			    </div>
					  			<input type="number" step="any" id="total_received"  class="filter form-control" readonly>
				  			</div>
						</div>
					</div>
					<div class="row p-0 py-4">
						<div class="col">
				  			<button class="btn btn-success d-print-none" onclick=""><i class="fa fa-arrow-down"></i> Receive Invoices & Close Day</button>
						</div>
						<div class="col">
				  			<button class="btn btn-warning d-print-none" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>

	<script>
	today_form_date()
	filter()
	$('.alert').hide()

	reset_form = function(){
		$('form').trigger('reset');
		$('#table').html('');
	}


	$('form').submit(function(e){
			e.preventDefault()
			if(!confirm('Are you sure to Receive All Invoices and Close day?')) return;
			var data = {};
			var rowsdata = $('#tbody').children();
			var expenses = [];
			$('#expenses_rows .row').each(function(index,el){
				expenses.push({'amount':$(el).find('.expense_amount').val(),'description':$(el).find('.expense_description').val()});
		    });

		    getInvoices();

			// console.log({
			// 	'_token' : $("input[name='_token']").val(),
			// 	'orderbooker': $('#filterstrjoinorder_bookers-name').val(),
			// 	'saleman': $('#filterstrjoinsale_men-name').val(),
			// 	'discount_total': $('#discount_total').val(),
			// 	'received_amount': $('#total_received').val(),
			// 	'received_at': $('#filterdatejoininvoices-created_at').val(),
			// 	'expenses': expenses,
			// 	'invoices': invoices
			// });

			axios.post("/receive_invoices", {
				'_token' : $("input[name='_token']").val(),
				'orderbooker': $('#filterstrjoinorder_bookers-name').val(),
				'saleman': $('#filterstrjoinsale_men-name').val(),
				'discount_total': $('#discount_total').val(),
				'received_amount': $('#total_received').val(),
				'received_at': $('#filterdatejoininvoices-created_at').val(),
				'expenses': expenses,
				'invoices': invoices
			})
			.then(d => {
				console.log(d.data);
				if(d.data == "success")
				{
					reset_form()
					$(".alert").show().delay(3000).slideUp(500, function() {
					    $(this).alert('close');
					}); 
				}
			})
			.catch((err) => console.log(err) );
		});






	jQuery(document).ready(function($) {
		$('#filterstrjoinorder_bookers-name').typeahead({
	        source: function (query, result) {
	            $.ajax({
	                url: "/search_orderbooker",
					data: 'searchString=' + query,            
	                dataType: "json",
	                type: "GET",
	                success: function (data) {
						result($.map(data, function (item) {
							return item;
	                    }));
	                }
	            });
	        },
	        updater:function (item) {
	        	filter();
		        return item;
		    }
	    });

		$('#filterstrjoinsale_men-name').typeahead({
	        source: function (query, result) {
	            $.ajax({
	                url: "/search_salemen",
					data: 'searchString=' + query,            
	                dataType: "json",
	                type: "GET",
	                success: function (data) {
						result($.map(data, function (item) {
							return item;
	                    }));
	                },
	            });
	        },
	        updater:function (item) {
	        	filter();
		        return item;
		    }
	    });

	});
	</script>


	@endsection