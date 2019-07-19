@extends('layouts.main')

	@section('title','Invoices List')
	@section('content')
		
	<div class="row">
		<div class="col">
			<h4>Invoices List</h4>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Customer</div>
  			    </div>
	  			<input type="text" id="filterstrjoincustomers-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">SaleMan</div>
  			    </div>
	  			<input type="text" id="filterstrjoinsale_men-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">OrderBooker</div>
  			    </div>
	  			<input type="text" id="filterstrjoinorder_bookers-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Invoice No.</div>
  			    </div>
	  			<input type="number" id="filternumjoininvoices-id" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="filterdatejoininvoices-created_at" oninput="filter()" class="filter date form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col p-2">
			<table id="table" data-url="/invoice" class="table small table-sm table-hover">
			</table>
		</div>
	</div>

	<script>
		// today_form_date()
		filter();
	</script>


	@endsection