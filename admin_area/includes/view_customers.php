<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Customers</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Customers</li>
  </ol>
</nav>



<?php if (isset($_SESSION['customer_delete_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['customer_delete_msg']; unset($_SESSION['customer_delete_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Customers List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Serial</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Contact No.</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>IP Address</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $i =0;
                        $view_customers = $getFromU->viewAllFromTable('customers');
                        foreach ($view_customers as $view_customer) {
                            $customer_name = $view_customer->customer_name;
                            $customer_email = $view_customer->customer_email;
                            $customer_country = $view_customer->customer_country;
                            $customer_city = $view_customer->customer_city;
                            $customer_contact = $view_customer->customer_contact;
                            $customer_address = $view_customer->customer_address;
                            $customer_image = $view_customer->customer_image;
                            $customer_ip = $view_customer->customer_ip;
                            $customer_id = $view_customer->customer_id;
                            $i++;
                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td> <?php echo $customer_country; ?></td>
                        <td><?php echo $customer_city; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td><?php echo $customer_address; ?></td>
                        <td class="text-center"><img class="rounded" src="../customer/assets/customer_images/<?php echo $customer_image; ?>" height="40px" width="60px"></td>
                        <td><?php echo $customer_ip; ?></td>
                        <td>
                            <a class="text-danger" onclick="DeleteCustomer('<?php echo $customer_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
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
