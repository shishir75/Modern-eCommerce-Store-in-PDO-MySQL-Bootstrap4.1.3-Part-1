<?php require_once 'includes/header.php'; ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navbar">
	<a class="navbar-brand home" href="#">Navbar</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto text-uppercase">
			<li >
				<a href="index.php">Home</a>
			</li>
			<li>
				<a class="active" href="shop.php">Shop</a>
			</li>
			<?php if (!isset($_SESSION['customer_email'])): ?>
				<li><a href="checkout.php">My Account</a></li>
			<?php else: ?>
				<li><a href="customer/my_account.php?my_orders">My Account</a></li>
			<?php endif ?>
			<li>
				<a href="cart.php">Shopping Cart</a>
			</li>
			<li>
				<a href="contact.php">Contact Us</a>
			</li>
		</ul>

			<a href="cart.php" class="btn btn-success mr-2"><i class="fas fa-shopping-cart"></i><span> <?php echo $getFromU->count_product_by_ip($ip_add); ?> items in Cart</span></a>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="user_query" required="1">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
		</form>
	</div>
</nav>


<div id="content">
	<div class="container">
		<div class="row">

		<?php
			if (isset($_GET['product_id'])) {
				$the_product_id = $_GET['product_id'];

				$get_products = $getFromU->viewProductByProductID($the_product_id);
				//var_dump($get_products);

				foreach ($get_products as $get_product) {
					$p_cat_id = $get_product->p_cat_id;
					$product_title = $get_product->product_title;
					$product_price = $get_product->product_price;
					$product_desc = $get_product->product_desc;
					$product_img1 = $get_product->product_img1;
					$product_img2 = $get_product->product_img2;
					$product_img3 = $get_product->product_img3;

					$get_p_cats = $getFromU->viewAllByCatID($p_cat_id);
					foreach ($get_p_cats as $get_p_cat) {
						$p_cat_title = $get_p_cat->p_cat_title;
						$p_cat_id = $get_p_cat->p_cat_id;

		?>




			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
				    <li class="breadcrumb-item"><a href="shop.php?p_cat_id=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
				    <li class="breadcrumb-item" aria-current="page"><?php echo $product_title; ?></li>
				  </ol>
				</nav>
			</div>

			<div class="col-md-3">
				<?php require_once 'includes/sidebar.php'; ?>
			</div>

			<div class="col-md-9">
				<div class="row" id="productMain">
					<div class="col-sm-6">
						<div id="mainImage">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							  <ol class="carousel-indicators">
							    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							  </ol>
							  <div class="carousel-inner">
							    <div class="carousel-item active">
							      <img class="d-block w-100 img-fluid " src="admin_area/product_images/<?php echo $product_img1; ?>" alt="First slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100 img-fluid " src="admin_area/product_images/<?php echo $product_img2; ?>" alt="Second slide">
							    </div>
							    <div class="carousel-item">
							      <img class="d-block w-100 img-fluid" src="admin_area/product_images/<?php echo $product_img3; ?>" alt="Third slide">
							    </div>
							  </div>
							  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="card text-center mb-3">
						  <div class="card-body">
						    <h4 class="card-title mb-4"><?php echo $product_title; ?></h4>
						    <?php

						    	if (isset($_POST['add_to_cart'])) {
						    		$p_id = $_POST['product_id'];
						    		$ip_add = $getFromU->getRealUserIp();
						    		$product_qty = $_POST['product_qty'];
						    		$product_size = $_POST['product_size'];

						    		$check_product_by_ip_id = $getFromU->check_product_by_ip_id($ip_add, $p_id);
						    		if ($check_product_by_ip_id === true) {
						    			echo '<script>alert("This product is already added in cart")</script>';
						    			//echo '<script>window.open("details.php?product_id=$p_id", "_self")</script>';
						    		}else{
						    			$insert_cart = $getFromU->create("cart", array("p_id" => $p_id, "ip_add" => $ip_add, "qty" =>$product_qty, "size" =>$product_size));
						    			echo '<script>alert("This product added successfully in cart")</script>';
						    			header('Location: shop.php');

						    		}

						    	}


						    ?>
								<form method="post">
									<div class="form-group row">
								    <label for="product_qty" class="col-sm-5 col-form-label-sm text-xl-right">Product Quantity</label>
								    <div class="col-sm-7">
								      <select name="product_qty" id="product_qty" class="form-control">
								      	<option value="1">1</option>
								      	<option value="2">2</option>
								      	<option value="3">3</option>
								      	<option value="4">4</option>
								      	<option value="5">5</option>
								      	<option value="6">6</option>
								      </select>
								    </div>
								  </div>

								  <div class="form-group row">
								    <label for="product_size" class="col-sm-5 col-form-label-sm text-xl-right">Product Size</label>
								    <div class="col-sm-7">
								      <select name="product_size" id="product_size" class="form-control" required>
								      	<option value="">--- Select a Size ---</option>
								      	<option value="small">Small</option>
								      	<option value="medium">Medium</option>
								      	<option value="large">Large</option>
								      	<option value="extra large">Extra Large</option>
								      </select>
								    </div>
								  </div>

								  <div class="form-group row">
								    <div class="col-sm-7">
								      <input type="hidden" name="product_id" value="<?php echo $the_product_id; ?>">
								    </div>
								  </div>

								  <h5 class="card-text mt-4">Total Price : $ <?php echo $product_price; ?></h5>
								  <button type="submit" name="add_to_cart" class="card-link btn btn-outline-info mt-3 px-4"><i class="fas fa-shopping-cart"></i> Add to Cart</button>

								</form>


						  </div>
						</div>


						<div class="row" id="thumbs">
							<div class="col-4">
								<a href="#" class="thumb"><img class="img-fluid img-thumbnail" src="admin_area/product_images/<?php echo $product_img1; ?>"></a>
							</div>
							<div class="col-4">
								<a href="#" class="thumb"><img class="img-fluid img-thumbnail" src="admin_area/product_images/<?php echo $product_img2; ?>"></a>
							</div>
							<div class="col-4">
								<a href="#" class="thumb"><img class="img-fluid img-thumbnail" src="admin_area/product_images/<?php echo $product_img3; ?>"></a>
							</div>
						</div>

					</div>

				</div>

				<div class="row my-4">
					<div class="col-12">
						<div class="card">
						  <div class="card-body">
						    <h5 class="card-title">Product Details</h5>
						    <p class="card-text"><?php echo $product_desc; ?></p>
						    <h5 class="card-title">Size &amp Fit</h5>
						    <ul>
						    	<li>Small</li>
						    	<li>Medium</li>
						    	<li>Large</li>
						    	<li>Extra Large</li>
						    </ul>
						    <hr>
						  </div>
						</div>
				 	</div>
			  </div>


			</div> <!-- col-md-9 END --3 -->
		<?php } } } ?>
		</div> <!-- Row end -->

		<div class="row suggestion_heading">
			<div class="col-md-12 ">
				<div class="text-center">
					<h2 class="">You may also Like this</h2>
				</div>
			</div>
		</div>

	  <div class="row">
	  	<?php
	  		//var_dump($p_cat_id);
	  		$view_products = $getFromU->viewProductByProductID($the_product_id);
	  		//var_dump($products);
	  		foreach ($view_products as $view_product) {
	  			$p_cat_id = $view_product->p_cat_id;
	  			//var_dump($p_cat_id);
	  			$products = $getFromU->viewProductByCatID($p_cat_id);
	  			foreach ($products as $product) {
		  			$product_id = $product->product_id;
		  			$product_title = $product->product_title;
		  			$product_price = $product->product_price;
		  			$product_img1 = $product->product_img1;
		  			//var_dump($product_id);
		  			if ($product_id == $the_product_id) {
		  				continue;
		  			}
	  	?>

	  	<div class="col-sm-6 col-md-3 justify-content-center single">
				<div class="product mb-4">
					<div class="card">
					  <a href="details.php?product_id=<?php echo $product_id; ?>"><img class="card-img-top img-fluid p-3" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Card image cap"></a>
					  <div class="card-body text-center">
					    <h6 class="card-title"><a href="details.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></h6>
					    <h5 class="card-text">Price : $ <?php echo $product_price; ?></h5>
					    <div class="row">
								<div class="col-md-6  pr-1 pb-2">
									<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-outline-info form-control">Details</a>
								</div>
								<div class="col-md-6  pr-lg-3 pr-1">
									<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> Add</a>
								</div>
							</div>
					  </div>
					</div>
				</div>
			</div> <!-- SINGLE PRODUCT END -->

			<?php  } } ?>
	  </div> <!-- SINGLE PRODUCT ROW END -->


	</div>
</div>


<?php require_once 'includes/footer.php'; ?>