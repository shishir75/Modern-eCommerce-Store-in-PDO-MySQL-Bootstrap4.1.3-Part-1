<?php require_once 'includes/header.php'; ?>

<?php
	if (!isset($_SESSION['customer_email'])) {
		header('Location: ../checkout.php');
	}
?>
<?php
	if (isset($_GET['order_id'])) {
		$order_id = $_GET['order_id'];

		$view_order = $getFromU->view_customer_order_by_order_id($order_id);

		$invoice_no = $view_order->invoice_no;
		$amount = $view_order->due_amount;

	}




?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
	<a class="navbar-brand home" href="#">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto text-uppercase">
			<li >
				<a href="../index.php">Home</a>
			</li>
			<li>
				<a href="../shop.php">Shop</a>
			</li>
			<li>
				<a class="active" href="my_account.php">My Account</a>
			</li>
			<li>
				<a href="../cart.php">Shopping Cart</a>
			</li>
			<li>
				<a href="../contact.php">Contact Us</a>
			</li>
		</ul>
		<?php if (isset($_SESSION['customer_email'])): ?>
			<a href="cart.php" class="btn btn-success mr-2"><i class="fas fa-shopping-cart"></i><span> <?php echo $getFromU->count_product_by_ip($ip_add); ?> items in Cart</span></a>
		<?php else: ?>
			<a href="cart.php" class="btn btn-success mr-2"><i class="fas fa-shopping-cart"></i><span> 0 items in Cart</span></a>
		<?php endif ?>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="user_query" required="1">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
		</form>
	</div>
</nav>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
				    <li class="breadcrumb-item" aria-current="page">My Account</li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div>

			<div class="col-md-9 mb-5">
				<div class="card">
				  <div class="card-header text-center">
						<h5 class="mt-4">Confirm Payment</h5>
						<p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>. Our customer service is working for you 24/7</p>
				  </div>
				  <div class="card-body">
						<?php
							if (isset($_POST['confirm_payment'])) {
								$order_id = $_POST['order_id'];
								$invoice_no = $_POST['invoice_no'];
								$amount = $_POST['amount_sent'];
								$payment_mode = $_POST['payment_mode'];
								$ref_no = $_POST['ref_no'];
								$code = $_POST['code'];
								$payment_date = $_POST['date'];

								$complete = "Complete";

								$insert_payment = $getFromU->create("payments", array("invoice_no" => $invoice_no, "amount" => $amount, "payment_mode" => $payment_mode, "ref_no" => $ref_no, "code" => $code, "payment_date" => $payment_date));

								$update_customer_order = $getFromU->update_customer_order_status($complete, "customer_orders", $order_id);

								$update_pending_order = $getFromU->update_customer_order_status($complete, "pending_orders", $order_id);

								$_SESSION['update_customer_order_msg'] = "Your Payment has been Received. Order will be completed within 24 hours";
								header('Location: my_account.php?my_orders');

							}
						?>

						<form method="post" action="confirm.php" class="needs-validation" novalidate>
							<div class="form-row">
						    <div class="col-12 mb-3">
						      <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" class="form-control" id="order_id" required>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="invoice_no">Invoice No</label>
						      <input type="text" name="invoice_no" value="<?php echo $invoice_no; ?>" class="form-control" id="invoice_no" required>
						      <div class="invalid-feedback">
						        Please provide a Invoice No.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="amount_sent">Ammount Sent</label>
						      <input type="number" name="amount_sent" value="<?php echo $amount; ?>" class="form-control" id="amount_sent" required>
						      <div class="invalid-feedback">
						        Please provide a Ammount.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="payment_mode">Select Payment Method</label>
						      <select class="custom-select mr-sm-2" name="payment_mode" id="payment_mode">
						        <option selected>Choose...</option>
						        <option value="Bank Code">Bank Code</option>
						        <option value="UBL/Omni Paisa">UBL/Omni Paisa</option>
						        <option value="Easy Paisa">Easy Paisa</option>
						        <option value="Uestern Union">Uestern Union</option>
						      </select>
						      <div class="invalid-feedback">
						        Please select a method.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="ref_no">Transaction/Refference ID</label>
						      <input type="number" name="ref_no" class="form-control" id="ref_no" required>
						      <div class="invalid-feedback">
						        Please provide a Transaction/Refference ID.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="code">Easy Paisa/Omni Code</label>
						      <input type="text" name="code" class="form-control" id="code" required>
						      <div class="invalid-feedback">
						        Please provide a Easy Paisa/Omni Code.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="date">Payment Date</label>
						      <input type="date" name="date" class="form-control" id="date" placeholder="Enter Your Subject" required>
						      <div class="invalid-feedback">
						        Please select a Date.
						      </div>
						    </div>
						  </div>

						  <div class="row">
						  	<div class="col-lg-4 offset-lg-4">
						  		<button class="btn btn-info form-control" type="submit" name="confirm_payment"><i class="fas fa-check-circle"></i> Confirm Payment</button>
						  	</div>
						  </div>
						</form>

						<script>
							// Example starter JavaScript for disabling form submissions if there are invalid fields
							(function() {
							  'use strict';
							  window.addEventListener('load', function() {
							    // Fetch all the forms we want to apply custom Bootstrap validation styles to
							    var forms = document.getElementsByClassName('needs-validation');
							    // Loop over them and prevent submission
							    var validation = Array.prototype.filter.call(forms, function(form) {
							      form.addEventListener('submit', function(event) {
							        if (form.checkValidity() === false) {
							          event.preventDefault();
							          event.stopPropagation();
							        }
							        form.classList.add('was-validated');
							      }, false);
							    });
							  }, false);
							})();
						</script>

				  </div>
				</div>  <!-- Card End -->
			</div>



		</div>
	</div>
</div>

<?php require_once 'includes/footer.php'; ?>