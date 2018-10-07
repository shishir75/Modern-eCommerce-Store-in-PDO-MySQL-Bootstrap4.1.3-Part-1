<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_slide'])) {
		$slide_id 				= $_GET['edit_slide'];

		$view_slide 	= $getFromU->selectSlideBySlideID($slide_id);
		$slide_name 			= $view_slide->slide_name;
		$the_slide_image 			= $view_slide->slide_image;
		$slide_title 			= $view_slide->slide_title;
		$slide_text 			= $view_slide->slide_text;

	}

?>

<?php

	if (isset($_POST['update_slide'])) {
		$slide_id 		= $_POST['slide_id'];
		$slide_name 		= $_POST['slide_name'];
		$slide_title 			= $_POST['slide_title'];
		$slide_text 			= $_POST['slide_text'];

		$slide_image = $_FILES['slide_image']['name'];
		$temp_name = $_FILES['slide_image']['tmp_name'];

		move_uploaded_file($temp_name, "slides_images/$slide_image");

		$update_slide = $getFromU->update_slide("slider",$slide_id, array("slide_name" => $slide_name, "slide_title" => $slide_title, "slide_image" => $slide_image, "slide_text" => $slide_text));

		if (file_exists("slides_images/$the_slide_image")) {
			unlink("slides_images/$the_slide_image");
		}

		if ($update_slide) {
			$_SESSION['slide_update_msg'] = "Slide has been Updated Sucessfully";
			header('Location: index.php?view_slides');
		}else {
			echo '<script>alert("Slide has not added")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Slide</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-plus-square"></i> Update Slider</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="slide_id" class="form-control" required value="<?php echo $slide_id; ?>">
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="slide_name">Slide Name</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="slide_name" class="form-control" id="slide_name" placeholder="Slide Name" required value="<?php echo $slide_name; ?>">
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
				    	<input type="text" name="slide_title" class="form-control" id="slide_title" placeholder="Slide Title" required value="<?php echo $slide_title; ?>">
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
				    	<textarea name="slide_text" class="form-control" id="slide_text" rows="5" placeholder="Slide Text" required> <?php echo $slide_text; ?></textarea>
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
				    	<input type="file" name="slide_image" id="slide_image" required>
				    	<img class="img-fluid rounded" src="slides_images/<?php echo $the_slide_image; ?>" width='80' height='80'>
				      <div class="invalid-feedback">
				        Please provide a Slide Image.
				      </div>
				    </div>
				  </div>

				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_slide" type="submit"><i class="fas fa-edit"></i> Update Slide</button>
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

