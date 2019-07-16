@extends('layouts.main')

	@section('title','Add Stock')
	@section('content')

	<div class="row">
		<div class="col">
			<form action="#">
				<div class="card">
				  <div class="card-header">
					   Add Stock
				  </div>
				  <div class="card-body">
				  	<div class="row m-0">
				  		<div class="col p-0">
				  			<div class="input-group input-group-sm">
				  			    <div class="input-group-prepend">
				  			      <div class="input-group-text ">Company</div>
				  			    </div>
					  			<input type="text" name="company typeahead" id="company" required="required">
				  			</div>
				  		</div>
				  		<div class="col p-0">
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
					<div id="rows" class="rows">
						@include('components.stock_row')
					</div>
				  </div>
				  <div class="card-footer d-print-none">
				    <button class="btn btn-success" id="addstock" type="submit">Add Stock</button>
				    <button type="button" class="btn btn-info" id="stock_btn" onclick="add_stock_row()">Insert</button>
				  </div>
				</div>
			</form>
		</div>	
	</div>
	<script>
		today_form_date();

		$('form').submit(function(e){
			e.preventDefault()
			var data = {};
			var rowsdata = $('#rows').children();
			var rows = [];
			for(var i=0; i<rowsdata.length;i++){

				rows.push({'product':$(rowsdata[i]).find('.product').val(),'qty':$(rowsdata[i]).find('.qty').val(),'carton':$(rowsdata[i]).find('.carton').val(),'unit_purchase':$(rowsdata[i]).find('.unit_purchase').val(),'unit_sale':$(rowsdata[i]).find('.unit_sale').val(),'total_purchase':$(rowsdata[i]).find('.total_purchase').val(),'expire':$(rowsdata[i]).find('.expire').val()});
			}
			// data['_token'] = $('meta[name="csrf-token"]').attr('content');
			// data['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
			data['_token'] = $("input[name='_token']").val();
			data['rows'] = rows;
			data['company'] = $('#company').val();
			data['date'] = $('#date').val();
			console.log(data);

			// $.ajax({
		 //         type:'POST',
		 //         url:'/inventory',
		 //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		 //         data: data,
		 //         success:function(d){
		 //            console.log(d);
		 //         }
		 //      });

			axios.post("/inventory", {'_token' : $("input[name='_token']").val(),'company' : $('#company').val(),'date' : $('#date').val(),'rows': rows} )
			.then(d => console.log(d.data) )
			.catch((err) => console.log(err) );
		})

		
	</script>

	@endsection

