<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['admin_id'])) {
		$admin_id = $_GET['admin_id'];

    	$sql = "DELETE FROM admins WHERE admin_id = :admin_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":admin_id", $admin_id);
        if ($stmt->execute()) {
        	$_SESSION['delete_user_msg'] = "User has been Deleted Successfully";
        	header('Location: ../index.php?view_users');
        }

	}
?>