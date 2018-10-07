<?php require_once 'includes/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
	<a class="navbar-brand home" href="#">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto text-uppercase">
			<li >
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="shop.php">Shop</a>
			</li>
			<?php if (!isset($_SESSION['customer_email'])): ?>
				<li><a href="checkout.php">My Account</a></li>
			<?php else: ?>
				<li><a href="customer/my_account.php?my_orders">My Account</a></li>
			<?php endif ?>
			<li>
				<a href="cart.php">Shopping Cart</a>
			</li>
			<li>
				<a href="contact.php">Contact Us</a>
			</li>
		</ul>

			<a href="cart.php" class="btn btn-success mr-2"><i class="fas fa-shopping-cart"></i><span> <?php echo $getFromU->count_product_by_ip($ip_add); ?> items in Cart</span></a>

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
				    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
				    <li class="breadcrumb-item" aria-current="page">Register</li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div> <!-- col-md-3 End -->


			<div class="col-md-9 mb-4">
				<div class="card">
				  <div class="card-header text-center">
						<h5 class="mt-4">Register A New Account</h5>
				  </div>
				  <div class="card-body">
					  <?php
					  	if (isset($_POST['register'])) {
					  		$c_name = $_POST['c_name'];
					  		$c_email = $_POST['c_email'];
					  		$c_pass = $_POST['c_pass'];
					  		$c_country = $_POST['c_country'];
					  		$c_city = $_POST['c_city'];
					  		$c_contact = $_POST['c_mobile'];
					  		$c_address = $_POST['c_address'];

					  		$c_image = $_FILES['c_image']['name'];
					  		$c_image_tmp = $_FILES['c_image']['tmp_name'];

					  		$c_ip = $getFromU->getRealUserIp();

					  		move_uploaded_file($c_image_tmp, "customer/assets/customer_images/$c_image");

					  		$check_customer = $getFromU->check_customer_by_email($c_email);

					  		if ($check_customer === true) {
					  			$error = "You are already Registered using this Email";
					  		}else{
					  			$add_customer = $getFromU->create("customers", array("customer_name" => $c_name, "customer_email" => $c_email, "customer_pass" => $c_pass, "customer_country" => $c_country, "customer_city" => $c_city, "customer_contact" => $c_contact, "customer_address" => $c_address, "customer_image" => $c_image, "customer_ip" => $c_ip ));

					  			if ($add_customer) {
					  				$check_cart = $getFromU->count_product_by_ip($c_ip);

					  				if ($check_cart > 0) {
					  					$_SESSION['customer_email'] = $c_email;
					  					//$add_msg = "You have successfully Registered";
					  					echo '<script>alert("You have successfully Registered")</script>';
					  					echo '<script>window.open("checkout.php", "_self")</script>';
					  				}else{
					  					echo '<script>alert("You have successfully Registered")</script>';
					  					echo '<script>window.open("index.php", "_self")</script>';
					  				}
					  			}
					  		}
					  	}
					  ?>

						<?php if (isset($error)): ?>
							<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
							  <?php echo $error; ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
						<?php endif ?>

						<?php if (isset($add_msg)): ?>
							<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
							  <?php echo $add_msg; ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
						<?php endif ?>


						<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_name">Customer Name</label>
						      <input type="text" name="c_name" class="form-control" id="c_name" placeholder="Enter Your Name" required>
						      <div class="invalid-feedback">
						        Please provide a valid Name.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_email">Customer Email</label>
						      <input type="email" name="c_email" class="form-control" id="c_email" placeholder="Enter Your Email" required>
						      <div class="invalid-feedback">
						        Please provide a valid Email Address.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_password">Customer Password</label>
						      <input type="password" name="c_pass" class="form-control" id="c_password" placeholder="Enter Your Password" required>
						      <div class="invalid-feedback">
						        Please provide a Password
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_country">Customer Country</label>
						      <input type="text" name="c_country" class="form-control" id="c_country" placeholder="Enter Your Country" required>
						      <div class="invalid-feedback">
						        Please provide a Country
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_city">Customer City</label>
						      <input type="text" name="c_city" class="form-control" id="c_city" placeholder="Enter Your City" required>
						      <div class="invalid-feedback">
						        Please provide a City
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_mobile">Customer Contact No.</label>
						      <input type="tel" name="c_mobile" class="form-control" id="c_mobile" placeholder="Enter Your Mobile No" required>
						      <div class="invalid-feedback">
						        Please provide a Mobile No
						      </div>
						    </div>
						  </div>

						   <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_address">Customer Address</label>
						      <input type="text" name="c_address" class="form-control" id="c_address" placeholder="Enter Your Address" required>
						      <div class="invalid-feedback">
						        Please provide Address.
						      </div>
						    </div>
						  </div>

						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="c_image">Customer Image</label>
						      <input type="file" name="c_image" class="form-control image_file" id="c_image" placeholder="Enter Your Image" required>
						      <div class="invalid-feedback">
						        Please provide a Profile Image
						      </div>
						    </div>
						  </div>


						  <div class="form-group mt-3">
					    	<div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" id="invalidCheck" required >
								  <label class="custom-control-label" for="invalidCheck">Subscribe to Newsletter</label>
								</div>
						  </div>

						  <div class="form-group mt-3">
					    	<div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" id="invalidCheck1" required >
								  <label class="custom-control-label" for="invalidCheck1">Agree to Terms &amp; Conditions</label>
								</div>
						  </div>

						  <div class="row">
						  	<div class="col-lg-4 offset-lg-4">
						  		<button class="btn btn-info form-control" name="register" type="submit"><i class="fas fa-user-plus"></i> Register</button>
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
				</div>



			</div> <!-- col-md-9 End -->


		</div> <!-- Row End -->





	  </div> <!-- SINGLE PRODUCT ROW END -->

	</div>
</div>




<?php require_once 'includes/footer.php'; ?>