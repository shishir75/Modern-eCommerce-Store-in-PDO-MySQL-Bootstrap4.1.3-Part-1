<?php
	$customer_email = $_SESSION['customer_email'];

	if (isset($_POST['yes'])) {
		$delete_customer = $getFromU->delete_customer($customer_email);
		if ($delete_customer === true) {
			session_destroy();
			echo '<script>alert("Your Account has been Deleted")</script>';
			echo '<script>window.open("../index.php", "_self")</script>';

		}
	}elseif (isset($_POST['no'])) {
		header('Location: my_account.php?my_orders');
	}



?>




<div class="card text-center">
	<div class="card-body">
		<center>
			<div class="card-title my-4"><h3>Do You Really Want to Delete this Account?</h3></div>
			<form method="post">
				<input type="submit" name="yes" class="btn btn-danger" value="Yes, I want to Delete">
				<input type="submit" name="no" class="btn btn-primary" value="No, I don't want to Delete">
			</form>
		</center>
	</div>
</div>