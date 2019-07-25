@extends('layouts.main')

	@section('title','Sales Report')
	@section('content')

	<h4 class="text-center"><u>Yasir Traders</u></h4>	
	<div class="row">
		<div class="col">
			<h5>Sales Reports</h5>
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Customer</div>
  			    </div>
	  			<input type="text" id="filterstrjoinsale_men-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Date</div>
  			    </div>
	  			<input type="date" id="filterdatejoinexpenses-created_at" oninput="filter()" class="filter date form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/sale_report" class="table small table-sm table-hover">
			</table>
		</div>
	</div>
	<div class="row bt-2 py-2 d-print-none">
		<div class="col">
			<button class="btn btn-warning btn-sm" type="button" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
		</div>
	</div>
	<script>
		
		filter()

	</script>


	@endsection