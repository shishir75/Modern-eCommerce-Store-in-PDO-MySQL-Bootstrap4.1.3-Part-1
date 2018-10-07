<?php
	$customer_email = $_SESSION['customer_email'];

	$get_customer = $getFromU->view_customer_by_email($customer_email);

	$customer_id = $get_customer->customer_id;

	if (isset($_POST['update_pass'])) {
		$old_password = $_POST['c_password'];
		$new_password1 = $_POST['cn_password1'];
		$new_password2 = $_POST['cn_password2'];

		$check_old_pass = $getFromU->check_old_pass_by_email($old_password, $customer_email);
		if ($check_old_pass === true) {
			if ($new_password1 !== $new_password2) {
				$error = "New Password does not Match";
			}else {
				$update_customer_pass = $getFromU->update_customer_password($customer_id, $new_password1);
				if ($update_customer_pass === true) {
					$update_pass_msg = "Your Password have been Updated Successfully";
				}else {
					$error = "Your Password have not been Updated";
				}
			}
		}else {
			$error = "Your Current Password is wrong";
		}

	}

?>

<div class="card">
	<div class="card-header text-center">
		<h5 class="mt-4">Update Password</h5>
	</div>
	<div class="card-body">
		<?php if (isset($error)): ?>
			<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
			  <?php echo $error; ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>

		<?php if (isset($update_pass_msg)): ?>
			<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			  <?php echo $update_pass_msg; ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif ?>


		<form method="post" class="needs-validation" novalidate>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="c_password">Current Password</label>
					<input type="password" name="c_password" class="form-control" id="c_password" placeholder="Enter Your Current Password" required>
					<div class="invalid-feedback">
						Enter Your Current Password
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="cn_password1">New Password</label>
					<input type="password" name="cn_password1" class="form-control" id="cn_password1" placeholder="Enter Your New Password" required>
					<div class="invalid-feedback">
						Enter Your New Password
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-12 mb-3">
					<label for="cn_password2">Re-Enter New Password</label>
					<input type="password" name="cn_password2" class="form-control" id="cn_password2" placeholder="Enter Your New Password Again" required>
					<div class="invalid-feedback">
						Enter Your New Password Again
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 offset-lg-4">
					<button class="btn btn-info form-control" type="submit" name="update_pass"><i class="fas fa-user-edit"></i> Update Password</button>
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