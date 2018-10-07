<?php
	$customer_session = $_SESSION['customer_email'];
	$get_customer = $getFromU->view_customer_by_email($customer_session);

	$c_id = $get_customer->customer_id;
	$customer_name = $get_customer->customer_name;
	$customer_email = $get_customer->customer_email;
	$customer_country = $get_customer->customer_country;
	$customer_city = $get_customer->customer_city;
	$customer_contact = $get_customer->customer_contact;
	$customer_address = $get_customer->customer_address;
	$customer_image = $get_customer->customer_image;

?>

<div class="card">
	<div class="card-header text-center">
		<h5 class="mt-4">Update Account</h5>
	</div>
	<div class="card-body">
		<?php
			if (isset($_POST['update'])) {
				$customer_id = $c_id;
				$customer_name = $_POST['c_name'];
				$customer_email = $_POST['c_email'];
				$customer_pass = $_POST['c_password'];
				$customer_country = $_POST['c_country'];
				$customer_city = $_POST['c_city'];
				$customer_contact = $_POST['c_mobile'];
				$customer_address = $_POST['c_address'];

				$customer_image = $_FILES['c_image']['name'];
				$c_image_tmp = $_FILES['c_image']['tmp_name'];
				move_uploaded_file($c_image_tmp, "assets/customer_images/$customer_image");

				$update_customer = $getFromU->update_customer("customers", $customer_id, array("customer_name" => $customer_name, "customer_email" => $customer_email, "customer_pass" => $customer_pass, "customer_country" => $customer_country, "customer_city" => $customer_city, "customer_contact" => $customer_contact, "customer_address" => $customer_address, "customer_image" => $customer_image));

				echo '<script>alert("Your Account has been Updated Successfully. Please Login again")</script>';
				echo '<script>window.open("../logout.php", "_self")</script>';




			}

		?>




		<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer Name</label>
					<input type="text" name="c_name" value="<?php echo $customer_name; ?>" class="form-control" id="validationCustom03" placeholder="Enter Your Name" required>
					<div class="invalid-feedback">
						Please provide a valid Name.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer Email</label>
					<input type="email" name="c_email" value="<?php echo $customer_email; ?>" class="form-control" id="validationCustom03" placeholder="Enter Your Email" required>
					<div class="invalid-feedback">
						Please provide a valid Email Address.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer Password</label>
					<input type="password" name="c_password" class="form-control" id="validationCustom03" placeholder="Enter Your Password" required>
					<div class="invalid-feedback">
						Please provide a Password
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer Country</label>
					<input type="text" name="c_country" value="<?php echo $customer_country; ?>" class="form-control" id="validationCustom03" placeholder="Enter Your Country" required>
					<div class="invalid-feedback">
						Please provide a Country
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer City</label>
					<input type="text" name="c_city" value="<?php echo $customer_city; ?>" class="form-control" id="validationCustom03" placeholder="Enter Your City" required>
					<div class="invalid-feedback">
						Please provide a City
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer Contact No.</label>
					<input type="tel" name="c_mobile" value="<?php echo $customer_contact; ?>" class="form-control" id="validationCustom03" placeholder="Enter Your Mobile No" required>
					<div class="invalid-feedback">
						Please provide a Mobile No
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="validationCustom03">Customer Address</label>
					<input type="text" name="c_address" value="<?php echo $customer_address; ?>" class="form-control" id="validationCustom03" placeholder="Enter Your Address" required>
					<div class="invalid-feedback">
						Please provide Address.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="c_image">Customer Image</label>
					<input type="file" name="c_image" value="<?php echo $customer_image; ?>" class="form-control image_file" id="c_image" required>
					<img src="assets/customer_images/<?php echo $customer_image; ?>" class="img-fluid img-thumbnail mt-2" width="100" height="100">
					<div class="invalid-feedback">
						Please provide a Profile Image
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 offset-lg-4">
					<button class="btn btn-info form-control" type="submit" name="update"><i class="fas fa-user-edit"></i> Update User</button>
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