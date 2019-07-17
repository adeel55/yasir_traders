@extends('layouts.main')

	@section('title','SalesMen List')
	@section('content')
		
	<div class="row">
		<div class="col">
			<h5>Sale Man List</h5>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Sr. No</div>
  			    </div>
	  			<input type="number" id="filternumid" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Sale Man</div>
  			    </div>
	  			<input type="text" id="filterstrname" oninput="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">Phone</div>
  			    </div>
	  			<input type="text" id="filterstrphone" oninput="filter()" class="filter date form-control">
  			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/saleman" class="table table-sm table-hover">
			</table>
		</div>
	</div>
	<script>
		
		filter()

	</script>


	@endsection