<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Users</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Users</li>
  </ol>
</nav>

<?php if (isset($_SESSION['insert_user_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['insert_user_msg']; unset($_SESSION['insert_user_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['update_user_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['update_user_msg']; unset($_SESSION['update_user_msg']); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
    </div>
<?php endif ?>


<?php if (isset($_SESSION['delete_user_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_user_msg']; unset($_SESSION['delete_user_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Users List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Serial No</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Image</th>
                        <th>Contact No</th>
                        <th>Country</th>
                        <th>Job</th>
                        <th>User About</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $i = 0;
                        $view_admins = $getFromU->viewAllFromTable('admins');
                        foreach ($view_admins as $view_admin) {
                            $admin_id = $view_admin->admin_id;
                            $admin_name = $view_admin->admin_name;
                            $admin_email = $view_admin->admin_email;
                            $admin_image = $view_admin->admin_image;
                            $admin_contact = $view_admin->admin_contact;
                            $admin_country = $view_admin->admin_country;
                            $admin_job = $view_admin->admin_job;
                            $admin_about = $view_admin->admin_about;
                            $i++;

                            if (strlen($admin_about) >= 90) {
                                $admin_about = substr($admin_about, 0, 100). " ... " . substr($admin_about, -5);
                            }
                            else {
                                $admin_about = $admin_about;
                            }

                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $admin_name; ?></td>
                        <td><?php echo $admin_email; ?></td>
                        <td class="text-center"><img class="rounded" src="admin_images/<?php echo $admin_image; ?>" height="40px" width="60px"></td>
                        <td class="text-right"><?php echo $admin_contact; ?></td>
                        <td><?php echo $admin_country; ?></td>
                        <td><?php echo $admin_job; ?></td>
                        <td class="text-justify"><?php echo $admin_about; ?></td>

                        <td>
                            <a class="text-info" href="index.php?edit_user=<?php echo $admin_id; ?>"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <a class="text-danger" onclick="DeleteUser('<?php echo $admin_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
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
        $('#example-table').DataTable({
            pageLength: 10,
        });
    });


</script>
