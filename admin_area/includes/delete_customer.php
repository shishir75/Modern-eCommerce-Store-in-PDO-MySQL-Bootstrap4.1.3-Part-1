<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['customer_id'])) {
		$customer_id = $_GET['customer_id'];

        $sql = "SELECT * FROM customers WHERE customer_id = :customer_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":customer_id", $customer_id);
        $stmt->execute();
        $view_customer = $stmt->fetch();
        $customer_image = $view_customer->customer_image;
        $image_path = realpath($_SERVER["DOCUMENT_ROOT"]) ."/eCommerce/customer/assets/customer_images/$customer_image";

    	$sql = "DELETE FROM customers WHERE customer_id = :customer_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":customer_id", $customer_id);
        if ($stmt->execute()) {
            if (file_exists($image_path)) {
               unlink($image_path);
            }

        	$_SESSION['customer_delete_msg'] = "Customer has been Deleted Successfully";
        	header('Location: ../index.php?view_customers');
        }

	}
?>