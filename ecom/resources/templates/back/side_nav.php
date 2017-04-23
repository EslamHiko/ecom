<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class=<?php if($_SERVER['PHP_SELF'] == "/ecom/public/admin/index.php" && isset($_GET['orders']) == null
        && isset($_GET['products']) == null && isset($_GET['add_product']) == null
        && isset($_GET['categories']) == null &&  isset($_GET['users']) == null ) echo "active"; ?>>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li class=<?php if($_SERVER['PHP_SELF'] == "/ecom/public/admin/index.php" && isset($_GET['orders']) ) echo "active"; ?>>
            <a href="index.php?orders"><i class="fa fa-fw fa-dashboard"></i> Orders</a>
        </li>
        <li class=<?php if($_SERVER['PHP_SELF'] == "/ecom/public/admin/index.php" && isset($_GET['products']) ) echo "active"; ?>>
            <a href="index.php?products"><i class="fa fa-fw fa-bar-chart-o"></i> View Products</a>
        </li>
        <li class=<?php if($_SERVER['PHP_SELF'] == "/ecom/public/admin/index.php" && isset($_GET['add_product']) ) echo "active"; ?>>
            <a href="index.php?add_product"><i class="fa fa-fw fa-table"></i> Add Product</a>
        </li>

        <li class=<?php if($_SERVER['PHP_SELF'] == "/ecom/public/admin/index.php" && isset($_GET['categories']) ) echo "active"; ?>>
            <a href="index.php?categories"><i class="fa fa-fw fa-desktop"></i> Categories</a>
        </li>
        
    </ul>
</div>
