<ul class="nav navbar-nav">
    <li>
        <a href="shop.php">Shop</a>
    </li>
 <?php if (isset($_SESSION['Username'])) {
   echo '<li>
          <a href="admin">Admin</a>
         </li>';
 } ?>

     <li>
        <a href="checkout.php">Checkout</a>
    </li>
    <li>
        <a href="contact.php">Contact</a>
    </li>
</ul>
<?php
    if (isset($_SESSION['Username'])) {
      echo '
      <ul class="nav navbar-nav navbar-right">
            <li><a href="logOut.php"><span class="glyphicon glyphicon-log-out"></span> Login Out</a></li>
      </ul>
      ';
    } else {
      echo '
      <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      ';

    }
 ?>

<!--Modal-->
