@extends('layouts.main')

	@section('title','Customers Report')
	@section('content')

	<div class="row">
		<div class="col">
			<h5>Customers Report</h5>	
		</div>
	</div>
	<div class="row filters p-2">
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
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="filterdatejoinexpenses-created_at" onchange="filter()" class="filter date form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/orderbooker_customer_report" class="table small table-sm table-hover">
			</table>
		</div>
	</div>
	<script>
		
		filter()

	</script>


	@endsection