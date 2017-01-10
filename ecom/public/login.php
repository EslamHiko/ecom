  <?php include '../resources/config.php'; ?>

  <?php include TEMP_FRONT . DS . 'header.php'; ?>
    <!-- Page Content -->

    <?php
      if (isset($_SESSION['Username'])) {
        redirect("index.php");
      }
      login();
     ?>
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
        <div class="col-sm-4 col-sm-offset-5">
            <form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                <div class="form-group"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>

    </header>


        </div>

    </div>
    <h2 class="text-center bg-warning"><?php displayMsg() ?></h2>

        <!-- Footer -->
        <?php include TEMP_FRONT . DS . 'footer.php'; ?>
