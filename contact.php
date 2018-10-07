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
				<a class="active" href="contact.php">Contact Us</a>
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
				    <li class="breadcrumb-item" aria-current="page">Contact Us</li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div> <!-- col-md-3 End -->


			<div class="col-md-9 mb-4">
				<div class="card">
				  <div class="card-header text-center">
						<h5 class="mt-4">Contact Us</h5>
						<p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>. Our customer service is working for you 24/7</p>
				  </div>
				  <div class="card-body">
					<?php
						if (isset($_POST['submit'])) {

							// Admin Receives email through this code
							$sender_name = $_POST['name'];
							$sender_email = $_POST['email'];
							$sender_subject = $_POST['subject'];
							$sender_message = $_POST['message'];

							$receiver_email = "devzani.roy11@gmail.com";
							mail($receiver_email,$sender_name, $sender_subject, $sender_message, $sender_email);

							// Send email to sender thorugh this code
							$email = $_POST['email'];
							$subject = "Welcome to my Website";
							$msg = "I shall get you soon, Thanks for sending us email";
							$from = "devzani.roy11@gmail.com";

							mail($email, $subject, $msg, $from);

							echo '<h5 class="text-success text-center">Your message has been sent successfully</h5>';
						}
					?>

						<form method="post" class="needs-validation" novalidate>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="name">Name</label>
						      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required>
						      <div class="invalid-feedback">
						        Please provide a valid Name.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="email">Email</label>
						      <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
						      <div class="invalid-feedback">
						        Please provide a valid Email Address.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="subject">Subject</label>
						      <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Your Subject" required>
						      <div class="invalid-feedback">
						        Please provide a Subject.
						      </div>
						    </div>
						  </div>
						  <div class="form-row">
						    <div class="col-12 mb-3">
						      <label for="message">Message</label>
						      <textarea name="message" name="message" class="form-control" rows="3" id="message"  placeholder="Enter Your Message" required></textarea>
						      <div class="invalid-feedback">
						        Please provide a Message.
						      </div>
						    </div>
						  </div>
						  <!-- <div class="form-group mt-3">
					    	<div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" id="invalidCheck" checked="1" required >
								  <label class="custom-control-label" for="invalidCheck">Subscribe to Newsletter</label>
								</div>
						  </div> -->
						  <div class="row">
						  	<div class="col-lg-4 offset-lg-4">
						  		<button class="btn btn-info form-control" name="submit" type="submit"><i class="fas fa-comment"></i> Send Message</button>
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



			</div> <!-- col-md-9 End -->


		</div> <!-- Row End -->





	  </div> <!-- SINGLE PRODUCT ROW END -->

	</div>
</div>




<?php require_once 'includes/footer.php'; ?>