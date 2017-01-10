<?php

  // Get Products
  function get_products($query,$args){
    foreach (query($query,$args)->fetchAll() as $row) {
      echo '
       <div class="col-sm-4 col-lg-4 col-md-4">
           <div class="thumbnail">
               <a href="item.php?product_id='.$row['Product_ID'].'" ><img src="'.$row['Product_Image'].'" alt=""></a>
               <div class="caption">
                   <h4 class="pull-right">&#36;'.$row['Product_Price'].'</h4>
                   <h4><a href="item.php?product_id='.$row['Product_ID'].'">'.$row['Product_Title'].'</a>
                   </h4>
                   <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                   <a class="btn btn-primary" target="" href="../resources/cart.php?add='.$row['Product_ID'].'">Add To Cart</a>
               </div>

           </div>
       </div>
       ';
     }
   }
   // Get Products In The Cart
   function get_cart(){
     $item_name = 1;
     $item_number = 1;
     $amount = 1;
     $quantity = 1;
     $_SESSION['total_price'] = 0;
     $_SESSION['total_items'] = 0;
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
               echo '
                   <tr>
                       <td>'.$row['Product_Title'].'</td>
                       <td>$'.$row['Product_Price'].'</td>
                       <td>'.$value.'</td>
                       <td>$'.$sub.'</td>
                       <td><a class = "btn btn-warning" href="../resources/cart.php?remove='.$row['Product_ID'].'"><span class="glyphicon glyphicon-minus"></span></a>
                           <a class = "btn btn-success" href="../resources/cart.php?add='.$row['Product_ID'].'"><span class="glyphicon glyphicon-plus"></span></a>
                           <a class = "btn btn-danger" href="../resources/cart.php?delete='.$row['Product_ID'].'"><span class="glyphicon glyphicon-remove"></span></a>
                       </td>
                   </tr>

               ';
               echo '
                    <input type="hidden" name="item_name_'.$item_name.'" value="'.$row['Product_Title'].'">
                    <input type="hidden" name="item_number_'.$item_number.'" value="'.$row['Product_ID'].'">
                    <input type="hidden" name="amount_'.$amount.'" value="'.$row['Product_Price'].'">
                    <input type="hidden" name="quantity_'.$quantity.'" value="'.$value.'">
               ';
               $item_name++;
               $item_number++;
               $amount++;
               $quantity++;
               $_SESSION['total_items'] += $value;
               $_SESSION['total_price'] += $sub;
           }
         }
       }
    }
  }
  // Get ALL Products
  function get_all_products(){
    $query = "SELECT * FROM Products";
    $args = array();
    get_products($query,$args);
    }

  //Get Products In Shop Page
  function get_products_shop(){
    $query = "SELECT * FROM Products";
    $args = array();
    get_products($query,$args);
    }

  //Get Products In Cat Page
  function get_products_by_cat(){
    $query = "SELECT * FROM Products WHERE Product_Cat_ID = ?";
    $args = array($_GET['cat_id']);
    get_products($query,$args);
    }
  // Get Number Of Products
  function get_Number_Of_Products(){
    $query = "SELECT * FROM Products";
    $args = array();
    $i = 0;
    foreach (query($query,$args)->fetchAll() as $key) {
      $i++;
    }
    return $i;
  }
  // Get Imgs For slider
  function get_Product_Imgs(){
    $query = "SELECT * FROM Products ";
    $args = array();
    $i = 0;
    foreach (query($query,$args)->fetchAll() as $row) {
      if($i == 0)
        echo '<div class="item active">
            <img class="slide-image" style="height:500px;" src="'. $row['Product_Image'] .'" alt="">
            </div>';
      else
        echo '<div class="item">
            <img class="slide-image" style="height:500px;" src="'. $row['Product_Image'] .'" alt="">
            </div>';
      $i++;
    }
  }

  // DB Helping Functions
  function query($query,$optional){
    include 'dbconnect.php';
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute($optional);
    } catch (Exception $e) {
      echo "Error Executing The Query : " . $e ;
    }
    return $stmt;
  }

  // Login Function
  function login(){
    include 'dbconnect.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $hashedPass = sha1($password);

    // Check if User Exist In The Database
    $stmt = $conn->prepare("SELECT
                                  *
                           FROM
                                  users
                           WHERE
                                  User = ?
                           AND
                                  Pass = ?
                           ");
    $stmt->execute(array($username, $hashedPass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    // If Count > 0 That Means There Is A Record In The DB
    if ($count > 0) {
      $_SESSION['Username'] = $username; // Register Session Name
      $_SESSION['ID'] = $row['UserID']; // Register Session ID
      header('Location: admin'); // Redirect To Dashboard Page
      exit();
    } else {
      $_SESSION['msg'] = "Wrong Username Or Passwor";
    }
    } else {
      header('Location : login.php');

  }
}

//Display Wrong Massage
function displayMsg(){
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
}

//Send msg
function send_msg(){
  if(isset($_POST['submit'])){
    $to = "eslam.elhakmey3@gmail.com";
    $from = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    $header = "From: " . $from ." " . $email;

    //$result = mail($to,$subject,$msg,$header);
    if(!$result){
      $_SESSION['msg'] = '<h2 class="text-center bg-success" > Message Sent Successfully ^_^ </h2>';
      displayMsg();
    } else {
      $_SESSION['msg'] = '<h2 class="text-center bg-warning" > Failed :( </h2>';
      displayMsg();
    }
  }

}
// Redirect Function
  function redirect($url){
    header("Location: ". $url . " ");
    exit();
  }

 ?>
