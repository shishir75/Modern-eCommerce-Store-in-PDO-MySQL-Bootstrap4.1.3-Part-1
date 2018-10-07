<?php require_once 'includes/header.php'; ?>
<?php
	if (isset($_POST['add_slide'])) {
		$slide_name = $getFromU->checkInput($_POST['slide_name']);
		$slide_title = $getFromU->checkInput($_POST['slide_title']);
		$slide_text = $getFromU->checkInput($_POST['slide_text']);

		$slide_image = $_FILES['slide_image']['name'];
		$temp_name = $_FILES['slide_image']['tmp_name'];

		$view_slides = $getFromU->viewAllFromTable('slider');

		$count_slides = count($view_slides);

		if ($count_slides < 5) {

			move_uploaded_file($temp_name, "slides_images/$slide_image");

			$insert_slide = $getFromU->create("slider", array("slide_name" => $slide_name, "slide_title" => $slide_title, "slide_text" => $slide_text, "slide_image" => $slide_image));

			if ($insert_slide) {
				$_SESSION['insert_slide_msg'] = "Slide has been added Sucessfully";
				header('Location: index.php?view_slides');

			}else {
				echo '<script>alert("Slide has not been added")</script>';
			}
		}else {
			$_SESSION['insert_slide_error_msg'] = "You have already inserted 4 slides";
			header('Location: index.php?view_slides');
		}

	}

?>



<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Insert Slider</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Insert Slider</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="slide_name">Slide Name</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="slide_name" class="form-control" id="slide_name" placeholder="Slide Name" required>
				      <div class="invalid-feedback">
				        Please provide a Slide Name.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="slide_title">Slide Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="slide_title" class="form-control" id="slide_title" placeholder="Slide Title" required>
				      <div class="invalid-feedback">
				        Please provide a Slide Title.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="slide_text">Slide Text</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="slide_text" class="form-control" id="slide_text" rows="5" placeholder="Slide Text" required></textarea>
				      <div class="invalid-feedback">
				        Please provide a Slide Text.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="slide_image">Slide Image</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="slide_image" id="slide_image" placeholder="Category Title" required>
				      <div class="invalid-feedback">
				        Please provide a Slide Image.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="add_slide" type="submit"><i class="fas fa-plus-circle"></i> Insert Slide</button>
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

