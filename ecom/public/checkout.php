  <?php include '../resources/config.php' ?>

  <?php include TEMP_FRONT . DS . 'header.php'; ?>


    <!-- Page Content -->
    <div class="container">

<!-- /.row -->

<div class="row">
      <h3 class="text-center bg-warning"><?php displayMsg(); ?></h3>


      <h1>Checkout</h1>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="business" value="eslam.elhakmey3-facilitator-1@gmail.com">
    <table class="table table-striped">
      <thead>
        <tr>
         <th>Product</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Sub-total</th>

        </tr>
      </thead>
      <tbody>
          <?php get_cart(); ?>
      </tbody>
    </table>
  <?php  if($_SESSION['total_items'] > 0){
        echo '<input type="image" name="upload"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
        alt="PayPal - The safer, easier way to pay online">';
      }
    ?>
</form>



<!--  ***********CART TOTALS*************-->

<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php echo $_SESSION['total_items']; ?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">$ <?php echo $_SESSION['total_price']; ?></span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>

        <!-- Footer -->
        <?php include TEMP_FRONT . DS . 'footer.php'; ?>
