<tr>
	<td>
		<select name="product_id" class="form-control product" required="required"></select>
	</td>
	<td>
		<input type="number" step="any" min="0" name="qty" oninput="count_total_purchase(this)" class="form-control form-control-sm qty" placeholder="qty" required="required">
	</td>
	<td>
		<input type="number" step="any" min="0" name="total_purchase" oninput="count_per_unit_purchase(this)" class="form-control form-control-sm total_purchase" placeholder="total_purchase" id="total_purchase" required="required">
	</td>
	<td>
		<input type="number" step="any" min="0" name="unit_sale" class="form-control form-control-sm unit_sale" placeholder="unit_sale" required="required">
	</td>
	<td>
		<input type="number" step="any" min="0" name="unit_purchase" class="form-control form-control-sm unit_purchase" oninput="count_total_purchase(this)" placeholder="unit_purchase" required="required">
	</td>
	<td>
		<input type="date" name="expire" class="form-control form-control-sm expire">
	</td>
	<td>
		<button onclick="delRow(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash delrowbtn"></i></button>
	</td>
</tr>