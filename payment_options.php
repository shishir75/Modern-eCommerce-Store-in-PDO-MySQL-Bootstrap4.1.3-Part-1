<?php
	$session_email = $_SESSION['customer_email'];

	$select_customer = $getFromU->view_customer_by_email($session_email);

	$customer_id = $select_customer->customer_id;

?>



<div class="card">
  <div class="card-body text-center">
    <h5 class="card-title">Payment Options For Yoy</h5>
    <p class="card-text mb-5">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="order.php?c_id=<?php echo $customer_id; ?>" class="btn btn-info text-white"><i class="fas fa-hand-holding-usd"></i> Pay Offline</a>
    <a href="#" class="btn btn-info text-white"><i class="fab fa-paypal"></i> Pay with PayPal</a>
    <img src="assets/images/PayPal.png" class="img-fluid" width="80%" height="200px">
  </div>
</div>