<?php
	if (!isset($_GET['p_cat_id'])) {
		if (!isset($_GET['cat_id'])) {
			$per_page = 3;
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}else{
				$page = 1;
			}
			$start_from = ($page - 1) * $per_page;
?>

<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">Shop</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus neque nisi cupiditate, eligendi molestias corporis nihil ipsa distinctio in repellendus!</p>
  </div>
</div>


<div class="row">
	<?php
		$get_products = $getFromU->selectAllProducts($start_from, $per_page);
		foreach ($get_products as $get_product) {
			$product_id = $get_product->product_id;
			$product_title = $get_product->product_title;
			$product_price = $get_product->product_price;
			$product_img1 = $get_product->product_img1;
	?>
	<div class="col-sm-6 col-md-4 justify-content-center single">
		<div class="product mb-4">
			<div class="card">
			  <a href="details.php?product_id=<?php echo $product_id; ?>"><img class="card-img-top img-fluid p-3" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Card image cap"></a>
			  <div class="card-body text-center">
			    <h6 class="card-title"><a href="details.php?product_id=<?php echo $product_id; ?>"><?php echo $product_title; ?></a></h6>
			    <h5 class="card-text">Price : $<?php echo $product_price; ?></h5>
			    <div class="row">
						<div class="col-md-6  pr-1 pb-2">
							<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-outline-info form-control">Details</a>
						</div>
						<div class="col-md-6 pr-lg-3 pr-1">
							<a href="details.php?product_id=<?php echo $product_id; ?>" class="btn btn-success form-control"><i class="fas fa-shopping-cart"></i> Add</a>
						</div>
					</div>
			  </div>
			</div>
		</div>
	</div> <!-- SINGLE PRODUCT END -->
	<?php } ?>  <!-- get_products end -->

</div> <!-- ROW END -->

<div class="row mb-4">
	<div class="col-lg-6 offset-lg-3 d-flex">
		<ul class="pagination mx-auto">

			<?php
				$total_pages = $getFromU->countPages("products", $per_page);
				if ($total_pages >=2) {
			?>
				<li class="page-item <?php if($_GET['page'] == 1) { echo 'active';}?>"><a class="page-link" href="shop.php?page=1">First Page</a></li>
			<?php
					for ($i = 2; $i < $total_pages; $i++) {
			?>
				<li class="page-item <?php if($_GET['page'] == $i) { echo 'active';}?>"  ><a class="page-link" href="shop.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php } ?>
				<li class="page-item <?php if($_GET['page'] == $total_pages) { echo 'active';}?>"><a class="page-link" href="shop.php?page=<?php echo $total_pages; ?>">Last Page</a></li>
			<?php } ?>

		</ul>
	</div>
</div> <!-- Pagination ROW END -->


<?php  } } ?>