@extends('layouts.main')

	@section('title','Statements')
	@section('content')

		
	<div class="row">
		<div class="col">
			<h5>Accounts Statements</h5>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Orderbooker</div>
  			    </div>
  			    <select id="orderbooker" class="filter" onchange="filter()"></select>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Customer</div>
  			    </div>
  			    <select id="customer" class="filter" onchange="filter()"></select>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="date" onchange="filter()" class="filter date form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<a href="/statement/create" class="btn btn-sm btn-primary"><i class="fa fa-dollar"></i> Create Statement</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/statement" class="table table-sm small table-hover">
			</table>
		</div>
	</div>
	<div class="row bt-2 py-2 d-print-none">
		<div class="col">
			<button class="btn btn-warning btn-sm" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
		</div>
	</div>
	<script>


	// today_form_date()
	filter()


	jQuery(document).ready(function($) {
		$('#orderbooker').select2({
		  ajax: {
		    url: '/search2_orderbooker',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		});

		$('#customer').select2({
		  ajax: {
		    url: '/search2_customer',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		});
	});

	</script>

	@endsection