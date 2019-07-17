<tr>
	<td>
		<input type="text" name="product" class="form-control form-control-sm product" placeholder="product" required="required">
		<script>
		jQuery(document).ready(function($) {
			$('input.product').typeahead({
		        source: function (query, result) {
		            $.ajax({
		                url: "/search_products",
						data: 'searchString=' + query,            
		                dataType: "json",
		                type: "GET",
		                success: function (data) { result($.map(data, function (item) { return item; }));
		                }
		            });
		        },
		        updater:function (item) {
		        	axios.get('/get_sale_price?product=' + item['name'])
		        	.then(d => {
		        		$(document.activeElement).closest('tr').find('.unit_price').val(d.data);
		        	});
			        return item;
			    }
		    });
		});
		</script>
	</td>
	<td>
		<input type="number" step="any" name="qty" class="form-control form-control-sm qty" placeholder="qty" oninput="countTotalPrice(this)" required="required">
	</td>
	<td>
		<input type="number" step="any" name="bonus" class="form-control form-control-sm bonus">
	</td>
	<td>
		<input type="number" step="any" oninput="countTotalPrice(this)" name="unit_price" class="form-control form-control-sm unit_price" placeholder="unit_price" required="required">
	</td>
	<td>
		<input type="number" step="any" name="total_price" class="form-control form-control-sm total_price" required="required">
	</td>
	<td class="d-print-none">
		<input type="number" step="any" name="discount" class="form-control form-control-sm discount" oninput="countDiscountAmount(this)">
	</td>
	<td class="d-print-block d-none">
		<input type="number" step="any" name="discount_amount" value="0" class="form-control form-control-sm discount_amount">
	</td>
	<td>
		<input type="number" step="any" name="discount_total" class="form-control form-control-sm discount_total" placeholder="Disc.Total" required="required">
	</td>
	<td class="d-print-none">
		<button onclick="delInvoiceRow(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash delrowbtn"></i></button>
	</td>
</tr>
