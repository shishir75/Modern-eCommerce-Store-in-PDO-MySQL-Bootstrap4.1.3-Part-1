<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['add_cat'])) {
		$cat_title = $getFromU->checkInput($_POST['cat_title']);
		$cat_desc = $getFromU->checkInput($_POST['cat_desc']);




		$insert_cat = $getFromU->create("categories", array("cat_title" => $cat_title, "cat_desc" => $cat_desc));

		if ($insert_cat) {
			$_SESSION['insert_cat_msg'] = "Category has been added Sucessfully";
			header('Location: index.php?view_cats');

		}else {
			echo '<script>alert("Category has not added")</script>';
		}


	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Category</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Category</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="cat_title">Category Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="cat_title" class="form-control" id="cat_title" placeholder="Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Category Title.
				      </div>
				    </div>
				  </div>
					<div class="form-row mb-3">
				    <div class="col-md-3 ">
				      <label for="cat_desc">Category Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="cat_desc" class="form-control" rows="6" id="cat_desc" placeholder="Enter Category Description" required></textarea>
				      <div class="invalid-feedback">
				        Please provide Category Description.
				      </div>
				    </div>
				  </div>
				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_cat" type="submit"><i class="fas fa-plus-circle"></i> Insert Category</button>
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

