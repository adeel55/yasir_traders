@extends('layouts.main')

	@section('title','Stock Puchases')
	@section('content')

	<div id="msg"></div>	
	<div class="row">
		<div class="col">
			<h5>Stock Items Purchases List</h5>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Company</div>
  			    </div>
  			    <select id="company" class="filter" onchange="filter()"></select>
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Product</div>
  			    </div>
  			    <select id="product" class="filter" onchange="filter()"></select>
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
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">From</div>
  			    </div>
	  			<input type="date" id="datefrom" onchange="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">To</div>
  			    </div>
	  			<input type="date" id="dateto" onchange="filter()" class="filter form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/inventory" class="table table-sm small table-responsive w-100 d-block d-md-table table-hover">
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
		

		$('#company').select2({
		  ajax: {
		    url: '/search2_companies',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		});
		$('#product').select2({
		  ajax: {
		    url: '/search2_products',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		});
	});

	</script>


	@endsection