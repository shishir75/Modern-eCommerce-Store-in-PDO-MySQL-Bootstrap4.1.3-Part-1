<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Orders</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Orders</li>
  </ol>
</nav>



<?php if (isset($_SESSION['delete_order_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_order_msg']; unset($_SESSION['delete_order_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Orders List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Order No</th>
                        <th>Customer Email</th>
                        <th>Invoice No</th>
                        <th>Product Title</th>
                        <th>Qty</th>
                        <th>Size</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $customer_orders = $getFromU->viewAllFromTable('pending_orders');
                        foreach ($customer_orders as $customer_order) {
                            $order_id = $customer_order->order_id;
                            $customer_id = $customer_order->customer_id;
                            $invoice_no = $customer_order->invoice_no;
                            $product_id = $customer_order->product_id;
                            $qty = $customer_order->qty;
                            $size = $customer_order->size;
                            $order_status = $customer_order->order_status;

                            $view_customer = $getFromU->view_customer_by_id($customer_id);
                            $customer_email = $view_customer->customer_email;

                            $view_product = $getFromU->view_Product_By_Product_ID($product_id);
                            $product_title = $view_product->product_title;

                            $view_customer_order = $getFromU->view_customer_order_by_order_id($order_id);
                            $order_date = $view_customer_order->order_date;
                            $due_amount = $view_customer_order->due_amount;

                            $total = $due_amount * $qty;

                            $tax = ($total * 5) / 100;
                            $shipping = ($total * 4.5) / 100;
                            $due_amount = $total + $tax + $shipping;


                    ?>

                    <tr>
                        <td><?php echo $order_id; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td><?php echo $invoice_no; ?></td>
                        <td> <?php echo $product_title; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo ucwords($size); ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td class="text-right">$ <?php echo number_format($due_amount, 2); ?></td>
                        <td><span class="w-100 badge <?php ($order_status === 'pending') ? print 'badge-danger' : print 'badge-success'; ?>"  > <?php echo ucwords($order_status); ?></span></td>
                        <td>
                            <a class="text-danger" onclick="DeleteOrder('<?php echo $order_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
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
