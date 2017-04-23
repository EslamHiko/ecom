<?php include '../resources/config.php' ?>

<?php include TEMP_FRONT . DS . 'header.php'; ?>


<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header>
        <h2>Shop</h2>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-9">
            <h3>Products</h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Cat Products -->
    <div class="row">


        <?php get_products_shop(); ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include TEMP_FRONT . DS . 'footer.php'; ?>

</div>
<!-- /.container -->
