<?php
	if (isset($_POST['login'])) {
		$customer_email = $_POST['c_email'];
		$customer_pass = $_POST['c_pass'];

		$login = $getFromU->login($customer_email, $customer_pass);
		if ($login === false) {
			$error = "Email or Password is Wrong";
		}else {
			$_SESSION['login_success_msg'] = "You have Successfully Login";
		}
	}


?>

<div class="card">
  <div class="card-body">
    <h3 class="card-title text-center">Login</h3>
    <p class="card-text text-muted text-center">Already our Member?</p>
    <p class="card-text my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias eum excepturi veniam modi laborum sunt autem similique dicta quasi saepe voluptatibus ducimus iusto, illum maxime labore nesciunt obcaecati blanditiis.</p>

    <?php if (isset($error)): ?>
    	<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
			  <?php echo $error; ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
    <?php endif ?>


    <form method="post" class="needs-validation" novalidate>
		  <div class="form-row">
		    <div class="col-12 mb-3">
		      <label for="email" class="font-weight-bold">Email</label>
		      <input type="email" name="c_email" class="form-control" id="email" placeholder="Enter Your Email" required>
		      <div class="invalid-feedback">
		        Please provide a valid Email Address.
		      </div>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="col-12 mb-3">
		      <label for="password" class="font-weight-bold">Password</label>
		      <input type="password" name="c_pass" class="form-control" id="password" placeholder="Enter Your Password" required>
		      <div class="invalid-feedback">
		        Please provide a Password.
		      </div>
		    </div>
		  </div>

		  <div class="row">
		  	<div class="col-lg-4 offset-lg-4">
		  		<button class="btn btn-info form-control" name="login" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
		  	</div>
		  </div>
		</form>

		<a href="customer_register.php">New ? Register Here</a>

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