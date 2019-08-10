<div class="row ml-2">
	<div class="col p-0">
		<input type="text" name="product" class="form-control form-control-sm product" placeholder="product" required="required">
		<script>
		jQuery(document).ready(function($) {
			$('input.product').typeahead({
		        source: function (query, result) {
		            $.ajax({
		                url: "http://localhost:8000/search_products",
						data: 'searchString=' + query,            
		                dataType: "json",
		                type: "GET",
		                success: function (data) { result($.map(data, function (item) { return item; }));
		                }
		            });
		        }
		    });
		});
		</script>
	</div>
	<div class="col p-0">
		<input type="number" step="any" name="qty" oninput="count_total_purchase(this)" class="form-control form-control-sm qty" placeholder="qty" required="required">
	</div>
	<div class="col p-0">
		<input type="number" step="any" name="total_purchase" oninput="count_per_unit_purchase(this)" class="form-control form-control-sm total_purchase" placeholder="total_purchase" id="total_purchase" required="required">
	</div>
	<div class="col p-0">
		<input type="number" step="any" name="unit_sale" class="form-control form-control-sm unit_sale" placeholder="unit_sale" required="required">
	</div>
	<div class="col p-0">
		<input type="number" step="any" name="unit_purchase" class="form-control form-control-sm unit_purchase" oninput="count_total_purchase(this)" placeholder="unit_purchase" required="required">
	</div>
	<div class="col p-0">
		<input type="date" name="expire" class="form-control form-control-sm expire">
	</div>
	<div class="col p-0">
		<button onclick="delRow(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash delrowbtn"></i></button>
	</div>
</div>