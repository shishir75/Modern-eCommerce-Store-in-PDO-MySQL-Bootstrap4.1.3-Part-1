<?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/eCommerce/core/init.php'); ?>

<?php

	if (isset($_GET['slide_id'])) {
		$slide_id = $_GET['slide_id'];

        $sql = "SELECT * FROM slider WHERE slide_id = :slide_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":slide_id", $slide_id);
        $stmt->execute();

        $view_slide = $stmt->fetch();
        $slide_image = $view_slide->slide_image;

    	$sql = "DELETE FROM slider WHERE slide_id = :slide_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":slide_id", $slide_id);
        if ($stmt->execute()) {
            unlink(realpath($_SERVER["DOCUMENT_ROOT"]) ."/eCommerce/admin_area/slides_images/$slide_image");
        	$_SESSION['delete_slide_msg'] = "Slide has been Deleted Successfully";
        	header('Location: ../index.php?view_slides');
        }

	}
?>