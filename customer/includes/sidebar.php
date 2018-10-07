<?php
  $customer_session = $_SESSION['customer_email'];

  $get_customer = $getFromU->view_customer_by_email($customer_session);

  $customer_name = $get_customer->customer_name;
  $customer_image = $get_customer->customer_image;

?>



<div class="card sidebar-menu mb-5 profile">
  <div class="card-header p-3">
    <img class="card-img-top img-fluid rounded" src="assets/customer_images/<?php echo $customer_image; ?>" alt="Card image cap">
    <h6 class="card-title text-center mt-4 mb-0"><?php echo $customer_name; ?></h6>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item <?php if(isset($_GET['my_orders'])) { echo "active";} ?>"  >
      <a href="my_account.php?my_orders"><i class="fas fa-list-ul"></i> My Orders</a>
    </li>
    <li class="list-group-item <?php if(isset($_GET['pay_offline'])) { echo "active";} ?>">
      <a href="my_account.php?pay_offline"><i class="fab fa-cc-amazon-pay"></i> Pay Offline</a>
    </li>
    <li class="list-group-item <?php if(isset($_GET['edit_account'])) { echo "active";} ?>">
      <a href="my_account.php?edit_account"><i class="fas fa-edit"></i> Edit Account</a>
    </li>
      <li class="list-group-item <?php if(isset($_GET['change_pass'])) { echo "active";} ?>">
        <a href="my_account.php?change_pass"><i class="fas fa-exchange-alt"></i> Change Passsword</a>
    </li>
      <li class="list-group-item <?php if(isset($_GET['delete_account'])) { echo "active";} ?>">
        <a href="my_account.php?delete_account"><i class="fas fa-trash-alt"></i> Delete Account</a>
    </li>
      <li class="list-group-item">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </li>
  </ul>

</div>