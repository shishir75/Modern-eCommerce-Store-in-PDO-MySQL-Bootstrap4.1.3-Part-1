<?php

  $get_products = $getFromU->viewAllFromTable("products");
  $count_products = count($get_products);

  $get_customers = $getFromU->viewAllFromTable("customers");
  $count_customers = count($get_customers);

  $get_product_categories = $getFromU->viewAllFromTable("product_categories");
  $count_product_categories = count($get_product_categories);

  $get_pending_orders = $getFromU->viewAllFromTableWhereOrderStatus("pending_orders", "pending");
  $count_pending_orders = count($get_pending_orders);



?>




<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-12">
			<h2>Dashboard</h2><hr>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-tachometer-alt"></i> Dashboard</li>
			  </ol>
			</nav>
		</div>
	</div>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <?php if (isset($_SESSION['admin_login_success_msg'])): ?>
        <div class="alert alert-success text-center alert-dismissible fade show rounded" role="alert">
          <?php echo $_SESSION['admin_login_success_msg']; unset($_SESSION['admin_login_success_msg']); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
    </div>
  </div>

	<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-success color-white widget-stat rounded">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong"><?php echo $count_customers; ?></h2>
                <div class="m-b-5">CUSTOMERS</div><a class="text-white" href="index.php?view_customers"><i class="fas fa-users widget-stat-icon"></i></a>
                <div><i class="fa fa-level-up m-r-5"></i><small>25% Higher</small></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-info color-white widget-stat rounded">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong"><?php echo $count_products; ?></h2>
                <div class="m-b-5">PRODUCTS</div><a class="text-white" href="index.php?view_products"><i class="fas fa-clipboard-check widget-stat-icon"></i></a>
                <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-warning color-white widget-stat rounded">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong"><?php echo $count_product_categories; ?></h2>
                <div class="m-b-5">CATEGORIES</div><a class="text-white" href="index.php?view_cats"><i class="fas fa-list-ul widget-stat-icon"></i></a>
                <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="ibox bg-danger color-white widget-stat rounded">
            <div class="ibox-body">
                <h2 class="m-b-5 font-strong"><?php echo $count_pending_orders; ?></h2>
                <div class="m-b-5">PENDING ORDERS</div><a class="text-white" href="index.php?view_orders"><i class="fas fa-cart-plus widget-stat-icon"></i></a>
                <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
            </div>
        </div>
    </div>
  </div>


  <div class="row">
			<div class="col-lg-8">
        <div class="ibox rounded">
            <div class="ibox-head">
                <div class="ibox-title"><i class="fas fa-money-bill-alt"></i> Latest Orders</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item">option 1</a>
                        <a class="dropdown-item">option 2</a>
                    </div>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Invoice No</th>
                            <th>Product ID</th>
                            <th>Qty</th>
                            <th>Size</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $get_orders = $getFromU->view_pending_orders_with_limit();
                        $i = 0;
                        foreach ($get_orders as $get_order) {
                          $order_id = $get_order->order_id;
                          $customer_id = $get_order->customer_id;
                          $invoice_no = $get_order->invoice_no;
                          $product_id = $get_order->product_id;
                          $qty = $get_order->qty;
                          $size = $get_order->size;
                          $order_status = $get_order->order_status;

                          $get_customer_details = $getFromU->view_customer_by_id($customer_id);
                          $customer_name = $get_customer_details->customer_name;
                          $i++;
                      ?>
                      <tr>
                          <td>#<?php echo $i; ?></td>
                          <td><?php echo ucwords($customer_name); ?></td>
                          <td><a href="invoice.php?invoice_id=<?php echo $invoice_no; ?>"><?php echo $invoice_no; ?></a></td>
                          <td><?php echo $product_id; ?></td>
                          <td><?php echo $qty; ?></td>
                          <td><?php echo ucwords($size); ?></td>
                          <td>
                            <span class="w-100 badge <?php ($order_status === 'pending') ? print 'badge-danger' : print 'badge-success'; ?>"  > <?php echo ucwords($order_status); ?></span>
                          </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="ibox-footer text-center">
              <span><a href="index.php?view_orders">View All Orders</a></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
      <div class="ibox rounded">
        <div class="ibox-head">
          <div class="ibox-title"><i class="fas fa-medal"></i> Best Sellers</div>
        </div>
          <div class="ibox-body">
            <ul class="media-list media-list-divider m-0">
              <li class="media">
                  <a class="media-img" href="javascript:;">
                  	<img src="./assets/img/image.jpg" width="50px;" />
                  </a>
                  <div class="media-body">
                    <div class="media-heading">
                      <a href="javascript:;">Samsung</a>
                      <span class="font-16 float-right">1200</span>
                    </div>
                    <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                  </div>
              </li>
              <li class="media">
                  <a class="media-img" href="javascript:;">
                    <img src="./assets/img/image.jpg" width="50px;" />
                  </a>
                  <div class="media-body">
                      <div class="media-heading">
                        <a href="javascript:;">iPhone</a>
                        <span class="font-16 float-right">1150</span>
                      </div>
                      <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                  </div>
              </li>
              <li class="media">
                  <a class="media-img" href="javascript:;">
                    <img src="./assets/img/image.jpg" width="50px;" />
                  </a>
                  <div class="media-body">
                      <div class="media-heading">
                        <a href="javascript:;">iMac</a>
                        <span class="font-16 float-right">800</span>
                      </div>
                      <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                  </div>
              </li>
              <li class="media">
                  <a class="media-img" href="javascript:;">
                    <img src="./assets/img/image.jpg" width="50px;" />
                  </a>
                  <div class="media-body">
                      <div class="media-heading">
                        <a href="javascript:;">apple Watch</a>
                        <span class="font-16 float-right">705</span>
                      </div>
                      <div class="font-13">Lorem Ipsum is simply dummy text.</div>
                  </div>
              </li>
            </ul>
          </div>
          <div class="ibox-footer text-center">
            <a href="index.php?view_products">View All Products</a>
          </div>
      </div>
  	</div>

  </div>

</div>