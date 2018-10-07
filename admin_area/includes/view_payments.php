<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">View Payments</h1>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Payments</li>
  </ol>
</nav>



<?php if (isset($_SESSION['delete_payment_msg'])): ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['delete_payment_msg']; unset($_SESSION['delete_payment_msg']); ?>
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
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Payments List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Payment No</th>
                        <th>Invoice No</th>
                        <th>Amount Paid</th>
                        <th>Payment Method</th>
                        <th>Reference No</th>
                        <th>Payment Code</th>
                        <th>Payment Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot><tr></tr></tfoot>
                <tbody>
                    <?php
                        $i = 0;
                        $view_payments = $getFromU->viewAllFromTable('payments');
                        foreach ($view_payments as $view_payment) {
                            $payment_id = $view_payment->payment_id;
                            $invoice_no = $view_payment->invoice_no;
                            $amount = $view_payment->amount;
                            $payment_mode = $view_payment->payment_mode;
                            $ref_no = $view_payment->ref_no;
                            $code = $view_payment->code;
                            $payment_date = $view_payment->payment_date;
                            $i++;

                    ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $invoice_no; ?></td>
                        <td class="text-right">$ <?php echo number_format($amount, 2); ?></td>
                        <td><?php echo $payment_mode; ?></td>
                        <td><?php echo $ref_no; ?></td>
                        <td><?php echo $code; ?></td>
                        <td><?php echo $payment_date; ?></td>
                        <td>
                            <a class="text-danger" onclick="DeletePayment('<?php echo $payment_id; ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
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
