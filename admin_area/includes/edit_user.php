<?php require_once 'includes/header.php'; ?>

<?php
	if (isset($_GET['edit_user'])) {
		$admin_id = $getFromU->checkInput($_GET['edit_user']);

		$view_admin = $getFromU->view_admin_by_admin_id($admin_id);

		$admin_name = $view_admin->admin_name;
		$admin_email = $view_admin->admin_email;
		$admin_pass = $view_admin->admin_pass;
		$admin_contact = $view_admin->admin_contact;
		$admin_country = $view_admin->admin_country;
		$admin_job = $view_admin->admin_job;
		$admin_about = $view_admin->admin_about;
		$admin_image = $view_admin->admin_image;

	}


?>






<?php
	if (isset($_POST['update_user'])) {
		$admin_name = $getFromU->checkInput($_POST['admin_name']);
		$admin_email = $getFromU->checkInput($_POST['admin_email']);
		$admin_pass = $getFromU->checkInput($_POST['admin_pass']);
		$admin_contact = $getFromU->checkInput($_POST['admin_contact']);
		$admin_country = $getFromU->checkInput($_POST['admin_country']);
		$admin_job = $getFromU->checkInput($_POST['admin_job']);
		$admin_about = $getFromU->checkInput($_POST['admin_about']);


		$admin_image = $_FILES['admin_image']['name'];
		$temp_name = $_FILES['admin_image']['tmp_name'];

		//$check_email = $getFromU->check_admin_by_email($admin_email);

		move_uploaded_file($temp_name, "admin_images/$admin_image");

		$update_user = $getFromU->update_user("admins",$admin_id, array("admin_name" => $admin_name, "admin_email" => $admin_email, "admin_pass" => $admin_pass, "admin_contact" => $admin_contact, "admin_country" => $admin_country, "admin_job" => $admin_job, "admin_about" => $admin_about, "admin_image" => $admin_image));

		if ($update_user) {
			$_SESSION['update_user_msg'] = "User has been Updated Sucessfully";
			header('Location: index.php?view_users');

		}else {
			echo '<script>alert("User has not been Updated")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update User</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Update User</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" required>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="admin_name">User Name</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="admin_name" class="form-control" id="admin_name" value="<?php echo $admin_name; ?>" placeholder="User Name" required>
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
				    	<input type="email" name="admin_email" class="form-control" id="admin_email" value="<?php echo $admin_email; ?>" placeholder="User Email" required>
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
				    	<input type="password" name="admin_pass" class="form-control" id="admin_pass" value="<?php echo $admin_pass; ?>" placeholder="User Password" required>
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
				    	<input type="text" name="admin_country" class="form-control" id="admin_country" value="<?php echo $admin_country; ?>" placeholder="User Country" required>
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
				    	<input type="text" name="admin_job" class="form-control" id="admin_job" value="<?php echo $admin_job; ?>" placeholder="User Job" required>
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
				    	<input type="number" name="admin_contact" class="form-control" value="<?php echo $admin_contact; ?>" id="admin_contact" placeholder="User Contact" required>
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
				    	<textarea name="admin_about" class="form-control" id="admin_about" rows="5" placeholder="User About" required><?php echo $admin_about; ?></textarea>
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
				    	<img src="admin_images/<?php echo $admin_image; ?>" height="40" width="40" class="rounded">
				      <div class="invalid-feedback">
				        Please provide a User Image.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_user" type="submit"><i class="fas fa-edit"></i> Update User</button>
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

