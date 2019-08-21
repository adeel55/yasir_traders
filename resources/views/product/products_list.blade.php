@extends('layouts.main')


	@section('title','Stock Items')
	@section('content')
	<div class="row">
		<div class="col">
			<h4>Purchases List</h4>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Product</div>
  			    </div>
	  			<input type="text" id="filterstrjoinproducts-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Company</div>
  			    </div>
	  			<input type="text" id="filterstrjoincompanies-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<a href="/product/create" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add New</a>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/product" class="table table-sm small table-responsive w-100 d-block d-md-table table-hover">
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