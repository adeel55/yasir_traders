@extends('layouts.main')

	@section('title','Add Stock')
	@section('content')

	<div id="msg"></div>
	<div class="row">
		<div class="col">
			<form id="form" action="#">
				<div class="card">
				  <div class="card-header">
					   Add Stock
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Company</div>
				  			    </div>
					  			<select name="company_id" id="company" class="company" required></select>
				  			</div>
				  		</div>
				  		<div class="col-lg-6 col-md-12 my-2">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text">Date</div>
				  			    </div>
					  			<input type="date" name="date" class="form-control form-control-sm date" id="date" required="required">
					  			@csrf
				  			</div>
				  		</div>
				  	</div>
				  	<hr>
				  	<table class="table table-sm table-responsive w-100 d-block d-md-table">
				  		<thead>
				  			<tr class="small">
				  				<th>Name</th>
				  				<th>Qty</th>
				  				<th>Total Purchase</th>
				  				<th>Unit Sale</th>
				  				<th>Unit Purchase</th>
				  				<th>Expire</th>
				  				<th>Del</th>
				  			</tr>
				  		</thead>
				  		<tbody id="rows" class="rows stock_rows">
							@include('components.stock_row')
				  		</tbody>
				  	</table>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" id="addstock" type="submit"><i class="fa fa-boxes"></i> Add Stock</button>
				    <button type="button" class="btn btn-warning" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				    <button type="button" class="btn btn-info" id="stock_btn" onclick="add_stock_row()"><i class="fa fa-align-justify"></i> Insert</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		reset_form = function(){
			$("form").trigger("reset");
			$('select.company').empty()
			$('select.product').empty()
			today_form_date();
		}
		reset_form()
		$('#form').submit(function(e){
			e.preventDefault()
			var data = {};
			var rowsdata = $('#rows').children();
			var rows = [];
			for(var i=0; i<rowsdata.length;i++){

				rows.push({'product':$(rowsdata[i]).find('.product').val(),'qty':$(rowsdata[i]).find('.qty').val(),'unit_purchase':$(rowsdata[i]).find('.unit_purchase').val(),'unit_sale':$(rowsdata[i]).find('.unit_sale').val(),'total_purchase':$(rowsdata[i]).find('.total_purchase').val(),'expire':$(rowsdata[i]).find('.expire').val()});
			}

			axios.post("/inventory", {'_token' : $("input[name='_token']").val(),'company' : $('#company').val(),'date' : $('#date').val(),'rows': rows} )
			.then(d => {
				$('#msg').html(d.data);
				$(".alert").delay(2000).slideUp(500, function() { $(this).alert('close')});
				reset_form()
			})
			.catch((err) => console.log(err) );
		})

		jQuery(document).ready(function($) {
	        $('select.company').select2({
	          ajax: {
	            url: '/search2_companies',
	            data: function (params) {
	              var query = { searchString: params.term }
	              return query;
	            }
	          }
	        });
	        $('select.product').select2({
	          ajax: {
	            url: '/search2_products',
	            data: function (params) {
	              var query = { searchString: params.term }
	              return query;
	            }
	          }
	        });
	    })
		
		
	</script>

	@endsection

