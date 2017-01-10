
<?php require_once("../resources/config.php") ; ?>
<?php include TEMP_FRONT . DS . 'header.php'; ?>


<?php
  report();
if (isset($_GET['tx'])) {
  $amount = $_GET['amt'];
  $currency = $_GET['cc'];
  $transaction = $_GET['tx'];
  $status = $_GET['st'];
  echo '
    <h1 class="text-center">Thank You Buying From Us ^_^</h1>
  ';
  $query = "INSERT INTO orders (Order_Amount, Order_Status, Order_Currency, Order_Transaction)
                  Values(?,?,?,?)";
  $args = array($amount,$status,$currency,$transaction);
  if(query($query,$args))
    echo '<h2 class="text-center text-success">Success</h2>';
  foreach ($_SESSION as $name => $value) {
    if(substr($name,0,8) == "product_")
      unset($_SESSION[$name]);
  }

} else {
  redirect('index.php');
}



 ?>

 <?php include TEMP_FRONT . DS . 'footer.php';
       //header('Refresh: 5; URL=index.php');
       //exit();
 ?>
