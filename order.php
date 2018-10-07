<?php require_once 'core/init.php'; ?>

<?php
	if (isset($_GET['c_id'])) {
		$customer_id = $_GET['c_id'];

		$ip_add = $getFromU->getRealUserIp();
		$status = "pending";
		$invoice_no = mt_rand();

		$select_carts = $getFromU->select_products_by_ip($ip_add);
		foreach ($select_carts as $select_cart) {
			$product_id = $select_cart->p_id;
			$product_size = $select_cart->size;
			$product_qty = $select_cart->qty;

			$get_products = $getFromU->viewProductByProductID($product_id);
			foreach ($get_products as $get_product) {
				$product_price = $get_product->product_price;
				$sub_total = $product_price * $product_qty;

				$insert_customer_order = $getFromU->create("customer_orders", array("customer_id" => $customer_id, "due_amount" => $sub_total, "invoice_no" => $invoice_no, "qty" => $product_qty, "size" => $product_size, "order_date" => date("Y-m-d H:i:s"), "order_status" => $status));

				$insert_pending_order = $getFromU->create("pending_orders", array("customer_id" => $customer_id, "invoice_no" => $invoice_no,"product_id" => $product_id, "qty" => $product_qty, "size" => $product_size, "order_status" => $status));

				$delete_cart = $getFromU->delete_cart($ip_add);

				$_SESSION['order_sub_msg'] = "Your Order has been Submitted Successfully";
				header('Location: customer/my_account.php?my_orders');
			}

		}
	}

?>


