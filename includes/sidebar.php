<div class="card sidebar-menu">
  <div class="card-header">Product Categories</div>
  <ul class="list-group list-group-flush category-menu">
    <?php
      $product_cats = $getFromU->viewAllFromTable("product_categories");
      foreach ($product_cats as $product_cat) {
        $p_cat_id = $product_cat->p_cat_id;
        $p_cat_title = $product_cat->p_cat_title;
    ?>
    <li class="list-group-item"><a href="shop.php?p_cat_id=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
    <?php } ?>

  </ul>
</div>

<div class="card sidebar-menu">
  <div class="card-header">Categories</div>
  <ul class="list-group list-group-flush category-menu">
    <?php
      $cats = $getFromU->viewAllFromTable("categories");
      foreach ($cats as $cat) {
        $cat_id = $cat->cat_id;
        $cat_title = $cat->cat_title;
    ?>
    <li class="list-group-item"><a href="shop.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></li>
    <?php } ?>

  </ul>
</div>