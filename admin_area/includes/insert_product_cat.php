<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['add_p_cat'])) {
		$p_cat_title = $getFromU->checkInput($_POST['p_cat_title']);
		$p_cat_desc = $getFromU->checkInput($_POST['p_cat_desc']);




		$insert_product_cat = $getFromU->create("product_categories", array("p_cat_title" => $p_cat_title, "p_cat_desc" => $p_cat_desc));

		if ($insert_product_cat) {
			$_SESSION['insert_product_cat_msg'] = "Product Category has been added Sucessfully";
			header('Location: index.php?view_p_cats');

		}else {
			echo '<script>alert("Product Category has not added")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Product Category</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Product Category</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="p_cat_title">Product Category Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="p_cat_title" class="form-control" id="p_cat_title" placeholder="Product Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Product Category Title.
				      </div>
				    </div>
				  </div>
					<div class="form-row mb-3">
				    <div class="col-md-3 ">
				      <label for="p_cat_desc">Product Category Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="p_cat_desc" class="form-control" rows="6" id="p_cat_desc" placeholder="Enter Product Category Description" required></textarea>
				      <div class="invalid-feedback">
				        Please provide Product Category Description.
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_p_cat" type="submit"><i class="fas fa-plus-circle"></i> Insert Product Category</button>
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

