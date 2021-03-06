    <?php include '../resources/config.php' ?>

    <?php include TEMP_FRONT . DS . 'header.php'; ?>


    <!-- Page Content -->
    <div class="container">



        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-9">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Cat Products -->
        <div class="row">

            <?php
                  get_products_by_cat();
                  if(get_Number_Of_Products_By_Cat($_GET['cat_id']) == 0){
                    echo '<h2 class="text-center text-warning">No Products In This Category Right Now !</h2>';
                  }
             ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include TEMP_FRONT . DS . 'footer.php'; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
