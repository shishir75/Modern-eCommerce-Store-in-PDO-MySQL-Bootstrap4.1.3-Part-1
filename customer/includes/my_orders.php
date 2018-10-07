<div class="card text-center">
	<div class="card-body">
		<h3 class="card-title mt-4">My Orders</h3>
		<h6 class="card-subtitle mb-2 text-muted">Your Orders on One Place</h6>
		<p class="card-text my-3">If you have any questions, please feel free to <a href="../contact.php">contact us</a>. Our customer service is working for you 24/7</p>


		<?php if (isset($_SESSION['order_sub_msg'])): ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			  <?php echo $_SESSION['order_sub_msg']; unset($_SESSION['order_sub_msg']); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION['update_customer_order_msg'])): ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			  <?php echo $_SESSION['update_customer_order_msg']; unset($_SESSION['update_customer_order_msg']); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>


		<table class="table table-bordered table-responsive-xl table-hover mt-5">
			<thead>
				<tr>
					<th scope="col">O.N</th>
					<th scope="col">Due Ammount</th>
					<th scope="col">Invoice No</th>
					<th scope="col">Qty</th>
					<th scope="col">Size</th>
					<th scope="col">Order Date</th>
					<th scope="col">Paid/Unpaid</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$customer_session = $_SESSION['customer_email'];
					$get_customer = $getFromU->view_customer_by_email($customer_session);

  				$customer_id = $get_customer->customer_id;

  				$get_orders = $getFromU->view_customer_orders_by_id($customer_id);
  				$i = 0;
  				foreach ($get_orders as $get_order) {
  					$order_id = $get_order->order_id;
  					$due_amount = $get_order->due_amount;
  					$invoice_no = $get_order->invoice_no;
  					$qty = $get_order->qty;
  					$size = $get_order->size;
  					$order_date = substr($get_order->order_date, 0,10);
  					$order_status = $get_order->order_status;
  					$i++;
  					if ($order_status === "pending") {
  						$order_status = "Unpaid";
  					}else {
  						$order_status = "Paid";
  					}
				?>

					<tr>
						<th>#<?php echo $i; ?></th>
						<td>$<?php echo $due_amount; ?></td>
						<td><?php echo $invoice_no; ?></td>
						<td><?php echo $qty; ?></td>
						<td><?php echo ucwords($size); ?></td>
						<td><?php echo $order_date; ?></td>
						<td><?php echo $order_status; ?></td>
						<td><a href="confirm.php?order_id=<?php echo $order_id; ?>" class="btn btn-sm btn-info">Confirm if Paid</a></td>
					</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>
</div>