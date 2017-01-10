<?php include '../resources/config.php' ?>

<?php include TEMP_FRONT . DS . 'header.php'; ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!--- Category Section !-->
            <?php include TEMP_FRONT . DS . 'side_nav.php'; ?>
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                	  <div class="modal-dialog">
            				<div class="loginmodal-container">
            					<h1>Login to Your Account</h1><br>
            				  <form>
            					<input type="text" name="user" placeholder="Username">
            					<input type="password" name="pass" placeholder="Password">
            					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
            				  </form>

            				  <div class="login-help">
            					<a href="#">Register</a> - <a href="#">Forgot Password</a>
            				  </div>
            				</div>
            			</div>
            		  </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <!-- Carousel !-->
                        <?php include TEMP_FRONT . DS . 'slider.php'; ?>
                    </div>

                </div>

                <div class="row">

                    <?php get_all_products() ?>

                </div> <!-- Row Ends Here !-->

            </div>

        </div>

    </div>

    <?php include TEMP_FRONT . DS . 'footer.php'; ?>
