@extends('layouts.main')

	@section('title','Sales Report')
	@section('content')

	<div class="row">
		<div class="col">
			Sales Reports
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
	  			<input type="date" id="filterdatejoinexpenses-created_at" oninput="filter()" class="filter date form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/sales_report" class="table table-sm table-hover">
			</table>
		</div>
	</div>
	<script>
		
		filter()

	</script>


	@endsection