<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['p_cat_id'])) {
		$p_cat_id = $_GET['p_cat_id'];

		$sql = "DELETE FROM product_categories WHERE p_cat_id = :p_cat_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":p_cat_id", $p_cat_id);
    if ($stmt->execute()) {
    	$_SESSION['delete_p_cat_msg'] = "Product Catagory has been Deleted Successfully";
    	header('Location: ../index.php?view_p_cats');
    }


	}
?>