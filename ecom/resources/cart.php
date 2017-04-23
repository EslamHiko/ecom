<?php require_once('config.php') ?>

<?php

  if(isset($_GET['add'])){

    $query = "SELECT Product_Quantity FROM products WHERE Product_ID = ". $_GET['add'];
    $args = array();
    $row = query($query,$args)->fetch();

    if ($row['Product_Quantity'] >= $_SESSION['product_' . $_GET['add']] && $row['Product_Quantity'] > 0) {
      $_SESSION['product_' . $_GET['add']] += 1;
      redirect("../public/checkout.php");
    } else {

      $_SESSION['msg'] = "Sorry We Don't Have Any More Of Product ".$_GET['add']." :(" ;
      redirect("../public/checkout.php");
    }

    redirect("../public/index.php");
  }

  if(isset($_GET['remove'])){
    $_SESSION['product_' . $_GET['remove']] -= 1;

    if($_SESSION['product_' . $_GET['remove']] < 1){
      redirect("../public/checkout.php");
    } else {
      redirect("../public/checkout.php");
    }

  }
  if (isset($_GET['delete'])) {

    $_SESSION['product_' . $_GET['delete']] = 0;
    redirect("../public/checkout.php");
  }
  function report(){
    foreach ($_SESSION as $name => $value) {
      # code...
        if ($value > 0){
          if(substr($name,0,8) == "product_"){
            $length = strlen($name - 8);
            $id = substr($name,8,$length);
            $query = "SELECT Product_ID,Product_Title, Product_Price From products WHERE Product_ID = ". $id . " ";
            $args = array();
            $rows = query($query,$args)->fetchAll();
            foreach ($rows as $row) {
              $sub = $row['Product_Price'] * $value;
              $query = "INSERT INTO reports (Product_ID, Product_Price, Product_Quantity)
                              Values(?,?,?)";
              $args = array($id,$row['Product_Price'],$value);
              query($query,$args)->execute();
          }
        }
      }
   }
 }
 ?>
