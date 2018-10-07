<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['order_id'])) {
		$order_id = $_GET['order_id'];

    	$sql = "DELETE FROM pending_orders WHERE order_id = :order_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":order_id", $order_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_order_msg'] = "Order has been Deleted Successfully";
        	header('Location: ../index.php?view_orders');
        }

	}
?>