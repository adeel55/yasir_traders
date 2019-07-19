@extends('layouts.main')

	@section('title','Statements')
	@section('content')

		
	<div class="row">
		<div class="col">
			<h5>Accounts Statements</h5>	
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
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/statement" class="table table-sm small table-hover">
			</table>
		</div>
	</div>
	<script>
		
		filter()

	</script>


	@endsection