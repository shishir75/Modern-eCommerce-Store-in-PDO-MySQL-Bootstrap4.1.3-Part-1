<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Category</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Category</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_cat_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['insert_cat_msg']; unset($_SESSION['insert_cat_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['cat_update_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['cat_update_msg']; unset($_SESSION['cat_update_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_cat_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-white text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_cat_msg']; unset($_SESSION['delete_cat_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>






<div class="page-content fade-in-up">
    <div class="ibox rounded">
        <div class="ibox-head bg-light">
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Category List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table2" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Cat ID</th>
                        <th>Cat Title</th>
                        <th>Cat Description</th>
                        <th>Total Products</th>
                        <th>Sold</th>
                        <th>Remaining</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $view_cats = $getFromU->viewAllFromTable('categories');
                        foreach ($view_cats as $view_cat) {
                            $cat_id = $view_cat->cat_id;
                            $cat_title = $view_cat->cat_title;
                            $cat_desc = $view_cat->cat_desc;
                            $product_store = $getFromU->countFromTableByCatID('products', $cat_id);
                    ?>

                    <tr>
                        <td><?php echo $cat_id; ?></td>
                        <td><?php echo $cat_title; ?></td>
                        <td><?php echo $cat_desc; ?></td>
                        <td><?php echo $product_store; ?></td>
                        <td><?php echo 4; ?></td>
                        <td><?php echo 6; ?></td>
                        <td>
                            <a class="text-info" href="index.php?edit_cat=<?php echo $cat_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a class="text-danger" onclick="DeleteCat('<?php echo $cat_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>

                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- CORE PLUGINS, Must Need-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- PAGE LEVEL SCRIPTS-->
<script>
    $(function() {
        $('#example-table2').DataTable({
            pageLength: 10,
        });
    });


</script>
