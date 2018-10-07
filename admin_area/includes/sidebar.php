<?php
    $admin_email = $_SESSION['admin_email'];

    $get_admin = $getFromU->view_admin_by_email($admin_email);

    $admin_id = $get_admin->admin_id;
    $admin_name = $get_admin->admin_name;
    $admin_image = $get_admin->admin_image;

    $dashboard = (isset($_GET['dashboard'])) ? 'active' : '';

    $products = (isset($_GET['add_product']) || isset($_GET['view_products'])) ? 'active' : '';
    $add_product = (isset($_GET['add_product'])) ? 'active' : '';
    $view_products = (isset($_GET['view_products'])) ? 'active' : '';

    $p_cats = (isset($_GET['add_p_cat']) || isset($_GET['view_p_cats']) || isset($_GET['edit_p_cat'])) ? 'active' : '';
    $add_p_cat = (isset($_GET['add_p_cat'])) ? 'active' : '';
    $view_p_cats = (isset($_GET['view_p_cats'])) ? 'active' : '';

    $cats = (isset($_GET['add_cat']) || isset($_GET['view_cats']) || isset($_GET['edit_cat'])) ? 'active' : '';
    $add_cat = (isset($_GET['add_cat'])) ? 'active' : '';
    $view_cats = (isset($_GET['view_cats'])) ? 'active' : '';

    $slides = (isset($_GET['add_slide']) || isset($_GET['view_slides']) || isset($_GET['edit_slide'])) ? 'active' : '';
    $add_slide = (isset($_GET['add_slide'])) ? 'active' : '';
    $view_slides = (isset($_GET['view_slides'])) ? 'active' : '';

    $view_customers = (isset($_GET['view_customers'])) ? 'active' : '';

    $view_orders = (isset($_GET['view_orders'])) ? 'active' : '';

    $view_payments = (isset($_GET['view_payments'])) ? 'active' : '';

    $users = (isset($_GET['add_user']) || isset($_GET['view_users']) || isset($_GET['edit_user'])) ? 'active' : '';
    $add_user = (isset($_GET['add_user'])) ? 'active' : '';
    $view_users = (isset($_GET['view_users'])) ? 'active' : '';


?>



<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/users/<?php echo $admin_image; ?>" class="img-fluid img-circle" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"><?php echo $admin_name; ?></div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="<?php echo $dashboard; ?>" href="index.php?dashboard"><i class="sidebar-item-icon fas fa-tachometer-alt"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li class="heading">FEATURES</li>
            <li class="<?php echo $products; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fab fa-product-hunt"></i>
                    <span class="nav-label">Products</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?php echo $add_product; ?>" href="index.php?add_product"><i class="fas fa-plus-circle"></i> Insert Product</a>
                    </li>
                    <li>
                        <a class="<?php echo $view_products; ?>" href="index.php?view_products"><i class="fas fa-eye"></i> View Products</a>
                    </li>

                </ul>
            </li>
            <li class="<?php echo $p_cats; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Product Categories</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?php echo $add_p_cat; ?>" href="index.php?add_p_cat"><i class="fas fa-plus-circle"></i> Insert Category</a>
                    </li>
                    <li>
                        <a class="<?php echo $view_p_cats; ?>" href="index.php?view_p_cats"><i class="fas fa-eye"></i> View Categories</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $cats; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Categories</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?php echo $add_cat; ?>" href="index.php?add_cat"><i class="fas fa-plus-circle"></i> Insert Category</a>
                    </li>
                    <li>
                        <a class="<?php echo $view_cats; ?>" href="index.php?view_cats"><i class="fas fa-eye"></i> View Categories</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $slides; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fas fa-sliders-h"></i>
                    <span class="nav-label">Slides</span><i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?php echo $add_slide; ?>" href="index.php?add_slide"><i class="fas fa-plus-circle"></i> Insert Slide</a>
                    </li>
                    <li>
                        <a class="<?php echo $view_slides; ?>" href="index.php?view_slides"><i class="fas fa-eye"></i> View Slides</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $view_customers; ?>">
                <a href="index.php?view_customers"><i class="sidebar-item-icon fas fa-users"></i>
                    <span class="nav-label">View Customers</span>
                </a>
            </li>
            <li class="<?php echo $$view_orders; ?>">
                <a href="index.php?view_orders"><i class="sidebar-item-icon fas fa-list-alt"></i>
                    <span class="nav-label">View Orders</span>
                </a>
            </li>
            <li class="<?php echo $view_payments; ?>">
                <a href="index.php?view_payments"><i class="sidebar-item-icon fas fa-money-bill-alt"></i>
                    <span class="nav-label">View Payments</span>
                </a>
            </li>
            <li class="<?php echo $users; ?>">
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Users</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="<?php echo $add_user; ?>" href="index.php?add_user"><i class="fas fa-plus-circle"></i> Insert User</a>
                    </li>
                    <li>
                        <a class="<?php echo $view_users; ?>" href="index.php?view_users"><i class="fas fa-eye"></i> View Users</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="logout.php"><i class="sidebar-item-icon fas fa-power-off"></i>
                    <span class="nav-label">Logout</span>
                </a>
            </li>
            <li class="heading">PAGES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="mailbox.html">Inbox</a>
                    </li>
                    <li>
                        <a href="mail_view.html">Mail view</a>
                    </li>
                    <li>
                        <a href="mail_compose.html">Compose mail</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                    <span class="nav-label">Calendar</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                    <span class="nav-label">Pages</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="invoice.html">Invoice</a>
                    </li>
                    <li>
                        <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="register.html">Register</a>
                    </li>
                    <li>
                        <a href="lockscreen.html">Lockscreen</a>
                    </li>
                    <li>
                        <a href="forgot_password.html">Forgot password</a>
                    </li>
                    <li>
                        <a href="error_404.html">404 error</a>
                    </li>
                    <li>
                        <a href="error_500.html">500 error</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Menu Levels</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="javascript:;">Level 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label">Level 2</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                            <li>
                                <a href="javascript:;">Level 3</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>