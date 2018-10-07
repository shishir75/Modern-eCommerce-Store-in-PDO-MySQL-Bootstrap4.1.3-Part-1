<?php
	if (isset($_GET['p_cat_id'])) {
		$p_cat_id = $_GET['p_cat_id'];
		$per_page = 3;
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$start_from = ($page - 1) * $per_page;

		$row_p_cats = $getFromU->getAllByID("product_categories", $p_cat_id);
		foreach ($row_p_cats as $row_p_cat) {
			$p_cat_title = $row_p_cat->p_cat_title;
			$p_cat_desc = $row_p_cat->p_cat_desc;
		?>

		<div class="card mb-3">
		  <div class="card-body">
		    <h5 class="card-title"><?php echo $p_cat_title; ?></h5>
		    <p class="card-text"><?php echo $p_cat_desc; ?></p>
		  </div>
		</div>

		<?php 	} ?>




<div class="row">
	<?php
		$get_products_by_cat_id = $getFromU->selectAllProductByP_cat_ID($start_from, $per_page, $p_cat_id);
		$count_product = count($get_products_by_cat_id);
		if ($count_product == 0) {
		?>
		<div class="card mb-3 w-100 text-center">
		  <div class="card-body">
		    <h5 class="card-title text-danger">Not Found</h5>
		    <p class="card-text text-warning">No Product Found in this Category</p>
		  </div>
		</div>


		<?php
		} else {
		foreach ($get_products_by_cat_id as $get_product_by_cat_id) {
			$product_id = $get_product_by_cat_id->product_id;
			$product_title = $get_product_by_cat_id->product_title;
			$product_price = $get_product_by_cat_id->product_price;
			$product_img1 = $get_product_by_cat_id->product_img1;
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
				$total_pages = $getFromU->countPagesBy_P_Cat("products", $per_page, $p_cat_id);
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


<?php } } ?>