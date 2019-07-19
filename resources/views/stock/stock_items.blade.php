@extends('layouts.main')


	@section('title','Stock Items')
	@section('content')
	<div class="row">
		<div class="col">
			<h4>Purchases List</h4>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Product</div>
  			    </div>
	  			<input type="text" id="filterstrjoinproducts-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Company</div>
  			    </div>
	  			<input type="text" id="filterstrjoincompanies-name" oninput="filter()" class="filter form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/product" class="table table-sm small table-hover">
			</table>
		</div>
	</div>
	<script>
		filter()

	</script>


	@endsection