<?php require_once 'includes/header.php'; ?>

<?php

	if (isset($_GET['edit_product'])) {
		$product_id 			= $_GET['edit_product'];

		$view_product 		= $getFromU->view_Product_By_Product_ID($product_id);

		$product_title 		= $view_product->product_title;
		$p_cat_id 				= $view_product->p_cat_id;
		$cat_id 					= $view_product->cat_id;
		$product_price 		= $view_product->product_price;
		$product_desc 		= $view_product->product_desc;
		$product_keywords = $view_product->product_keywords;
		$product_img1 		= $view_product->product_img1;
		$product_img2 		= $view_product->product_img2;
		$product_img3 		= $view_product->product_img3;

		$view_p_category 	= $getFromU->view_All_By_p_cat_ID($p_cat_id);
		$the_p_cat_title 	= $view_p_category->p_cat_title;

		$view_category 		= $getFromU->view_All_By_cat_ID($cat_id);
		$the_cat_title 		= $view_category->cat_title;
	}

?>

<?php

	if (isset($_POST['update_product'])) {
		$product_title 		= $_POST['product_title'];
		$product_cat 			= $_POST['product_cat'];
		$cat_id 					= $_POST['cat'];
		$product_price 		= $_POST['product_price'];
		$product_desc 		= $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		$product_img1 		= $_FILES['product_img1']['name'];
		$product_img2 		= $_FILES['product_img2']['name'];
		$product_img3 		= $_FILES['product_img3']['name'];

		$temp_name1 			= $_FILES['product_img1']['tmp_name'];
		$temp_name2 			= $_FILES['product_img2']['tmp_name'];
		$temp_name3 			= $_FILES['product_img3']['tmp_name'];

		move_uploaded_file($temp_name1, "product_images/$product_img1");
		move_uploaded_file($temp_name2, "product_images/$product_img2");
		move_uploaded_file($temp_name3, "product_images/$product_img3");

		$update_product = $getFromU->update_product("products",$product_id, array("p_cat_id" => $product_cat, "cat_id" => $cat_id, "add_date" => date("Y-m-d H:i:s"), "product_title" => $product_title, "product_img1" => $product_img1,"product_img2" => $product_img2, "product_img3" => $product_img3, "product_price" => $product_price, "product_desc" => $product_desc, "product_keywords" => $product_keywords));

		if ($update_product) {
			$_SESSION['product_update_msg'] = "Product has been Updated Sucessfully";
			header('Location: index.php?view_products');
		}else {
			echo '<script>alert("Product has not added")</script>';
		}
	}

?>

<nav aria-label="breadcrumb" class="my-4">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Products</li>
	</ol>
</nav>



<div class="card rounded">
	<div class="card-header bg-light h5"><i class="fas fa-edit"></i> Update Products</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					 <div class="form-row mb-3">
				    <div class="col-md-9">
				    	<input type="hidden" name="product_id"  value="<?php echo $product_id; ?>" required>
				    </div>
				  </div>
				  <div class="form-row mb-3">
				    <div class="col-3">
				      <label for="product_title">Product Title</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="product_title" class="form-control" id="product_title" value="<?php echo $product_title; ?>" placeholder="Product Title" required>
				      <div class="invalid-feedback">
				        Please provide a Product Title.
				      </div>
				    </div>
				  </div>
					<div class="form-row mb-3">
						<div class="col-3">
							<label for="product_cat">Product Categories</label>
						</div>
						<div class="col-md-9">
							<select name="product_cat" id="product_cat" class="form-control" required>
								<option value="<?php echo $p_cat_id; ?>"><?php echo $the_p_cat_title; ?></option>
								<?php
									$p_categories = $getFromU->viewAllFromTable("product_categories");
									foreach ($p_categories as $p_category) {
										$p_cat_id = $p_category->p_cat_id;
										$p_cat_title = $p_category->p_cat_title;
										if ($p_cat_title == $the_p_cat_title) {
											continue;
										}
								?>
								<option value="<?php echo $p_cat_id; ?>" ><?php echo $p_cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Product Categories.
							</div>
						</div>
					</div>

					<div class="form-row mb-3">
						<div class="col-md-3">
							<label for="cat">Categories</label>
						</div>
						<div class="col-md-9">
							<select name="cat" id="cat" class="form-control" required>
								<option value="<?php echo $cat_id; ?>"><?php echo $the_cat_title; ?></option>
								<?php
									$categories = $getFromU->viewAllFromTable("categories");
									foreach ($categories as $category) {
										$cat_id = $category->cat_id;
										$cat_title = $category->cat_title;
										if ($cat_title == $the_cat_title) {
											continue;
										}
								?>
								<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
								<?php } ?>
							</select>
							<div class="invalid-feedback">
								Please select a Categories.
							</div>
						</div>
					</div>


				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img1">Product Image 1</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img1" id="product_img1" required>
				    	<img src="product_images/<?php echo $product_img1; ?>" width="30" height = "30">
				      <div class="invalid-feedback">
				        Please provide a Product Image 1.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img2">Product Image 2</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img2"  id="product_img2">
				    	<img src="product_images/<?php echo $product_img2; ?>" width="30" height = "30">
				      <div class="invalid-feedback">
				        Please provide a Product Image 2.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_img3">Product Image 3</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="file" name="product_img3"  id="product_img3">
				    	<img src="product_images/<?php echo $product_img3; ?>" width="30" height = "30">
				      <div class="invalid-feedback">
				        Please provide a Product Image 3.
				      </div>
				    </div>
				  </div>

					<div class="form-row mb-3">
				    <div class="col-md-3">
				      <label for="product_price">Product Price</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="number" name="product_price" class="form-control" id="product_price" value="<?php echo $product_price; ?>" placeholder="Enter Product Price" required>
				      <div class="invalid-feedback">
				        Please provide a Product Price.
				      </div>
				    </div>
				  </div>

					<div class="form-row mb-3">
				    <div class="col-md-3 ">
				      <label for="product_desc">Product Description</label>
				    </div>
				    <div class="col-md-9">
				    	<textarea name="product_desc" class="form-control" rows="6" id="product_desc" placeholder="Enter Product Description" required ><?php echo $product_desc; ?></textarea>
				      <div class="invalid-feedback">
				        Please provide Product Description.
				      </div>
				    </div>
				  </div>

				  <div class="form-row mb-3">
				    <div class="col-3 ">
				      <label for="product_keywords">Product Keyword</label>
				    </div>
				    <div class="col-md-9">
				    	<input type="text" name="product_keywords" class="form-control" value="<?php echo $product_keywords; ?>" id="product_keywords" placeholder="Enter Product Keyword" required>
				      <div class="invalid-feedback">
				        Please provide Product Keyword.
				      </div>
				    </div>
				  </div>



				  <div class="row">
				  	<div class="col-12 mt-4">
				  		<button class="btn btn-info form-control" name="update_product" type="submit"><i class="fas fa-edit"></i> Update Product</button>
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

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>