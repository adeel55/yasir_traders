@extends('layouts.main')

	@section('title','Expense Report')
	@section('content')

	<h4 class="text-center"><u>Yasir Traders</u></h4>
	<div class="row">
		<div class="col">
			<h5>Expenses Report</h5>	
		</div>
	</div>
	<div class="row filters p-2">
		<div class="col-lg-4 col-md-6 col-sm-12 p-1 d-print-none">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text">Sale Man</div>
  			    </div>
  			    <div class="div-form-control form-control">
	  			    <select id="saleman" class="filter form-control" onchange="filter()" style="width: 100%"></select>
  			    </div>
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
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
  			<div class="input-group input-group-sm">
  			    <div class="input-group-prepend">
  			     	<div class="input-group-text ">From</div>
  			    </div>
	  			<input type="date" id="datefrom" onchange="filter()" class="filter form-control">
  			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-12 p-1">
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
			<table id="table" data-url="/expense" class="table small table-sm table-hover">
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
		$('#saleman').select2({
		  ajax: {
		    url: '/search2_salemen',
		    data: function (params) {
		      var query = { searchString: params.term }
		      return query;
		    }
		  }
		})
	});
	</script>


	@endsection