<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['payment_id'])) {
		$payment_id = $_GET['payment_id'];

    	$sql = "DELETE FROM payments WHERE payment_id = :payment_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":payment_id", $payment_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_payment_msg'] = "Payment has been Deleted Successfully";
        	header('Location: ../index.php?view_payments');
        }

	}
?>