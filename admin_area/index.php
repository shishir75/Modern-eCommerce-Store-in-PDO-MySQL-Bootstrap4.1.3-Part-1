<?php require_once 'includes/header.php'; ?>

<?php
  if (!isset($_SESSION['admin_email'])) {
    header('Location: login.php');
  }
?>

<body class="fixed-navbar">
  <div class="page-wrapper">
    <!-- START HEADER-->
		<?php require_once 'includes/top_nav.php'; ?>
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
		<?php require_once 'includes/sidebar.php'; ?>
    <!-- END SIDEBAR-->
    <div class="content-wrapper">
      <!-- START PAGE CONTENT-->


			<?php
				if (isset($_GET['dashboard'])) {
					require_once 'includes/dashboard.php';

				}elseif (isset($_GET['user_profile'])) {
          require_once 'includes/user_profile.php';

        }elseif (isset($_GET['add_product'])) {
          require_once 'includes/insert_products.php';

        }elseif (isset($_GET['view_products'])) {
          require_once 'includes/view_products.php';

        }elseif (isset($_GET['edit_product'])) {
          require_once 'includes/edit_product.php';

        }elseif (isset($_GET['add_p_cat'])) {
          require_once 'includes/insert_product_cat.php';

        }elseif (isset($_GET['view_p_cats'])) {
          require_once 'includes/view_p_cats.php';

        }elseif (isset($_GET['edit_p_cat'])) {
          require_once 'includes/edit_p_cat.php';

        }elseif (isset($_GET['add_cat'])) {
          require_once 'includes/add_cat.php';

        }elseif (isset($_GET['view_cats'])) {
          require_once 'includes/view_cats.php';

        }elseif (isset($_GET['edit_cat'])) {
          require_once 'includes/edit_cat.php';

        }elseif (isset($_GET['add_slide'])) {
          require_once 'includes/add_slide.php';

        }elseif (isset($_GET['view_slides'])) {
          require_once 'includes/view_slides.php';

        }elseif (isset($_GET['edit_slide'])) {
          require_once 'includes/edit_slide.php';

        }elseif (isset($_GET['view_customers'])) {
          require_once 'includes/view_customers.php';

        }elseif (isset($_GET['view_orders'])) {
          require_once 'includes/view_orders.php';

        }elseif (isset($_GET['view_payments'])) {
          require_once 'includes/view_payments.php';

        }elseif (isset($_GET['add_user'])) {
          require_once 'includes/add_user.php';

        }elseif (isset($_GET['view_users'])) {
          require_once 'includes/view_users.php';

        }elseif (isset($_GET['edit_user'])) {
          require_once 'includes/edit_user.php';

        }



			 ?>




			 <!-- END PAGE CONTENT-->

      <!-- COPYRIGHT START-->
			<?php require_once 'includes/copyright.php'; ?>
      <!-- COPYRIGHT END-->

    </div>
  </div>

<?php require_once 'includes/footer.php'; ?>
