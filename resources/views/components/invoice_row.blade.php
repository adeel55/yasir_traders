<tr class="tr">
	<td>
		<select class="product" onchange="productSelected(this)"></select>
	</td>
	<td>
		<input type="number" step="any" name="qty" min="0" class="form-control form-control-sm qty" placeholder="qty" oninput="checkMaxQty(this);countTotalPrice(this)" required="required">
		<input type="hidden" value="0" class="max_qty">
	</td>
	<td>
		<input type="number" step="any" min="0" name="bonus" oninput="checkMaxBonus(this)" class="form-control form-control-sm bonus">
	</td>
	<td>
		<input type="number" step="any" min="0" oninput="countTotalPrice(this)" name="unit_price" class="form-control form-control-sm unit_price" placeholder="unit_price" required="required">
	</td>
	<td>
		<input type="number" step="any" min="0" name="total_price" class="form-control form-control-sm total_price" required="required">
	</td>
	<td class="d-print-none">
		<input type="number" step="any" min="0" name="discount" class="form-control form-control-sm discount" oninput="countDiscountAmount(this)">
	</td>
	<td class="d-none">
		<input type="number" step="any" min="0" name="discount_amount" value="0" class="form-control form-control-sm discount_amount">
	</td>
	<td>
		<input type="number" step="any" min="0" name="discount_total" class="form-control form-control-sm discount_total" placeholder="Disc.Total" required="required">
	</td>
	<td class="d-print-none">
		<button onclick="add_invoice_row()" type="button" class="btn btn-sm btn-info inv-btn"><i class="fa fa-arrow-down"></i></button>
	</td>
	<td class="d-print-none">
		<button onclick="delInvoiceRow(this)" type="button" class="btn btn-sm btn-danger inv-btn"><i class="fa fa-trash delrowbtn"></i></button>
	</td>
</tr>
