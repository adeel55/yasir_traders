@extends('layouts.main')

	@section('title','Invoices List')
	@section('content')
		
	<div class="row d-print-none">
		<div class="col">
			<h4><i class="fa fa-print"></i> Print Invoices List</h4>	
		</div>
	</div>
	<div class="row filters p-2 d-print-none">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Customer</div>
  			    </div>
  			    <select id="customer" class="filter" onchange="filter()"></select>
  			</div>
		</div>
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
  			     	<div class="input-group-text">Invoice No.</div>
  			    </div>
  			    <select id="invoiceid" class="filter" onchange="filter()"></select>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="date" onchange="filter()" class="filter date form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
			<button class="btn btn-warning btn-sm" type="button" onclick="print_invoices()"><i class="fa fa-print"></i> Print All These Invoices</button>
		</div>
	</div>
	<div class="row d-print-none">
		<div class="col p-2">
			<table id="table" data-url="/invoice" class="table small table-sm table-responsive w-100 d-block d-md-table table-hover">
			</table>
		</div>
	</div>
	<div id="invoice_pages" class="d-print-block d-none">
	</div>
	<script>
		// today_form_date()
		filter();

	jQuery(document).ready(function($) {
		$('#customer').select2({
		  ajax: {
		    url: '/search2_customer',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		})

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

		$('#invoiceid').select2({
		  ajax: {
		    url: '/search2_invoiceid',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		})
	});

	</script>


	@endsection