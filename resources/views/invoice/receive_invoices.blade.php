@extends('layouts.main')

	@section('title','Invoices List')
	@section('content')
	
	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<h4>Receive Invoices</h4>	
		</div>
	</div>
	<form id="form" action="#">
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Order Booker</div>
  			    </div>
  			    <select id="orderbooker" class="filter" onchange="filter()"></select>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Sale Man</div>
  			    </div>
  			    <select id="saleman" class="filter" onchange="filter()"></select>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="date" oninput="filter()" class="filter date form-control" required>
	  			{{ csrf_field() }}
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col p-2">
			<table id="table" data-url="/invoice_receive" class="table small table-sm table-responsive w-100 d-block d-md-table table-hover">
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
		$('#form').trigger('reset');
		$('#table').html('');
	}


	$('#form').submit(function(e){
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
				'orderbooker': $('#orderbooker').val(),
				'saleman': $('#saleman').val(),
				'discount_total': $('#discount_total').val(),
				'received_amount': $('#total_received').val(),
				'date': $('#date').val(),
				'expenses': expenses,
				'invoices': invoices
			})
			.then(d => {
				reset_form()
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
				$('#saleman').empty();
			})
			.catch((err) => console.log(err) );
		});






	jQuery(document).ready(function($) {
		$('#orderbooker').select2({
		  ajax: {
		    url: '/search2_orderbooker',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		})

		$('#saleman').select2({
		  ajax: {
		    url: '/search2_salemen',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		})
	});
	</script>


	@endsection