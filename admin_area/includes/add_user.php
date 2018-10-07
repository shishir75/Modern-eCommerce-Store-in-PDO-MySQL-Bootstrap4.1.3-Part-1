<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['add_user'])) {
		$admin_name = $getFromU->checkInput($_POST['admin_name']);
		$admin_email = $getFromU->checkInput($_POST['admin_email']);
		$admin_pass = $getFromU->checkInput($_POST['admin_pass']);
		$admin_contact = $getFromU->checkInput($_POST['admin_contact']);
		$admin_country = $getFromU->checkInput($_POST['admin_country']);
		$admin_job = $getFromU->checkInput($_POST['admin_job']);
		$admin_about = $getFromU->checkInput($_POST['admin_about']);


		$admin_image = $_FILES['admin_image']['name'];
		$temp_name = $_FILES['admin_image']['tmp_name'];

		$check_email = $getFromU->check_admin_by_email($admin_email);


		if ($check_email === false) {

			move_uploaded_file($temp_name, "admin_images/$admin_image");

			$insert_user = $getFromU->create("admins", array("admin_name" => $admin_name, "admin_email" => $admin_email, "admin_pass" => $admin_pass, "admin_contact" => $admin_contact, "admin_country" => $admin_country, "admin_job" => $admin_job, "admin_about" => $admin_about, "admin_image" => $admin_image));

			if ($insert_user) {
				$_SESSION['insert_user_msg'] = "User has been added Sucessfully";
				header('Location: index.php?view_users');

			}else {
				echo '<script>alert("User has not been added")</script>';
			}
		}else {
			$_SESSION['insert_user_error_msg'] = "This Email is Already being used";
			header('Location: index.php?add_user');
		}

	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert User</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert User</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_name">User Name</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="admin_name" class="form-control" id="admin_name" placeholder="User Name" required>
				      <div class="invalid-feedback">
				        Please provide a User Name.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_email">User Email</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="email" name="admin_email" class="form-control" id="admin_email" placeholder="User Email" required>
				      <div class="invalid-feedback">
				        Please provide a User Email.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_pass">User Password</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="password" name="admin_pass" class="form-control" id="admin_pass" placeholder="User Password" required>
				      <div class="invalid-feedback">
				        Please provide a User Password.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_country">User Country</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="admin_country" class="form-control" id="admin_country" placeholder="User Country" required>
				      <div class="invalid-feedback">
				        Please provide a User Country.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_job">User Job</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="admin_job" class="form-control" id="admin_job" placeholder="User Job" required>
				      <div class="invalid-feedback">
				        Please provide a User Job.
				      </div>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_contact">User Contact</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="admin_contact" class="form-control" id="admin_contact" placeholder="User Contact" required>
				      <div class="invalid-feedback">
				        Please provide a User Contact.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_about">User About</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="admin_about" class="form-control" id="admin_about" rows="5" placeholder="User About" required></textarea>
				      <div class="invalid-feedback">
				        Please provide User About.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_image">User Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="admin_image" id="admin_image" required>
				      <div class="invalid-feedback">
				        Please provide a User Image.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_user" type="submit"><i class="fas fa-plus-circle"></i> Insert User</button>
				  	</div>
				  </div>
				</form>
			</div>
		</div>

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





<?php require_once 'includes/footer.php'; ?>

