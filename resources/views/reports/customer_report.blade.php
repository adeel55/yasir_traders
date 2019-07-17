@extends('layouts.main')

	@section('title','OrderBookers List')
	@section('content')

	<div class="row">
		<div class="col">
			<h5>Customers Report</h5>	
		</div>
	</div>
	<div class="row">
		<div class="col">
			<input type="text" class="form-control form-control-sm">	
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table id="table" data-url="/customer_report" class="table table-sm table-hover">
			</table>
		</div>
	</div>
	<script>
		
		filter()

	</script>


	@endsection