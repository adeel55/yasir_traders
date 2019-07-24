					<div class="row m-0">
						<div class="col-4 p-0">
							<input type="number" placeholder="amount" step="any" oninput="countTotalExpenses()" class="form-control form-control-sm expense_amount" required>
						</div>
						<div class="col p-0">
							<input type="text" placeholder="description" class="form-control form-control-sm expense_description" required>
						</div>
						<div class="col-1 p-0 d-print-none">
							<button class="btn btn-danger btn-sm" onclick="delExpenseRow(this)"><i class="fa fa-trash"></i></button>
						</div>
					</div>
