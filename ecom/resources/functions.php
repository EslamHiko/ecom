<?php
  // Get Products
  function get_products($query,$args){
    $i = 1;
    foreach (query($query,$args)->fetchAll() as $row) {
      if($i % 3 == 0)
      echo "<div class='row'>";
      echo '
       <div class="col-md-4">
           <div class="thumbnail">
               <a href="item.php?product_id='.$row['Product_ID'].'" ><img src="'.$row['Product_Image'].'" alt=""></a>
               <div class="caption" style="">
                   <h4 class="pull-right">&#36;'.$row['Product_Price'].'</h4>
                   <h4><a href="item.php?product_id='.$row['Product_ID'].'">'.$row['Product_Title'].'</a>
                   </h4>
                   <p>'.$row['Product_Mini_Description'].'</p>
                   <a class="btn btn-primary" target="" href="../resources/cart.php?add='.$row['Product_ID'].'">Add To Cart</a>
               </div>
           </div>
       </div>
       ';
       if($i % 3 == 0)
       echo "</div>";
       $i++;
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
  // Get Number Of Products In Category
  function get_Number_Of_Products_By_Cat($cat){
    $query = "SELECT * FROM Products WHERE Product_Cat_ID = ?";
    $args = array($cat);
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
  // Query
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
  // Insert
  function insert($query,$optional){
    include 'dbconnect.php';
    $stmt = $conn->prepare($query);
    try {
      $stmt->execute($optional);
    } catch (Exception $e) {
      echo "Error Inserting The Query : " . $e ;
    }
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
  // Get Cat Name
  function get_cat($id){
    $query = "SELECT * from category WHERE Cat_ID = ?";
    $args = array($id);
    $row = query($query,$args)->fetch();
    return $row['Cat_Title'];
  }
  function get_Cat_For_SideNav(){
    $query = "SELECT * From category";
    $args = array();
    $rows = query($query,$args)->fetchAll();
    foreach ($rows as $row) {
      echo '<a href="category.php?cat_id='.$row['Cat_ID'].'" class="list-group-item">'.$row['Cat_Title'].'</a>';
    }
  }
  // Admin Functions
  // Get Products For All Products Page
  function get_products_admin(){
    $query = "SELECT * FROM Products";
    $args = array();
    foreach (query($query,$args)->fetchAll() as $row) {
      echo '<tr>
            <td>'.$row['Product_ID'].'</td>
            <td>'.$row['Product_Title'].'</td>
            <td><img src=';if($row['Product_Image'][0] != 'h') echo '../'; echo $row['Product_Image'].' width = "120px" height = "70px"></td>
            <td>'.get_cat($row['Product_Cat_ID']).'</td>
            <td>'.$row['Product_Price'].'</td>
            <td>'.$row['Product_Quantity'].'</td>
        </tr>';
    }
  }
  // Get Categories For Admin
  function get_Categories(){
    $query = "SELECT * from Category";
    $args = array();
    foreach (query($query,$args)->fetchAll() as $row) {
      echo '<tr>
              <td>'.$row['Cat_ID'].'</td>
              <td>'.$row['Cat_Title'].'</td>
            </tr>';
    }
  }
  // Get Number Of Categories
  function get_Number_Of_Categories(){
    $query = "SELECT * from Category";
    $args = array();
    $i = 0;
    foreach(query($query,$args)->fetchAll() as $row){
      $i++;
    }
    return $i;
  }
  // Insert Categories
  function insert_cat($cat){
    $ins_sql = "INSERT INTO Category (Cat_Title) VALUES (?)";
    $args = array($cat);
    insert($ins_sql,$args);
  }
  // Function Get Categories Options
  function get_cat_options(){
    $query = "SELECT * From Category";
    $args = array();
    foreach (query($query,$args) as $row) {
      echo '<option value="'.$row['Cat_ID'].'" >'.$row['Cat_Title'].'</option>';
    }
  }
  // Insert Product
  function insert_Product($p_title,$p_price,$p_description,$p_IMG,$p_Quantity,$p_catID,$P_Mini_description){
    $ins_sql = "INSERT INTO Products (Product_Title,
                                      Product_Price,
                                      Product_Description,
                                      Product_Image,
                                      Product_Quantity,
                                      Product_Cat_ID,
                                      Product_Mini_Description
                                    )
                             VALUES (?,?,?,?,?,?,?)";
    $args = array($p_title,$p_price,$p_description,$p_IMG,$p_Quantity,$p_catID,$P_Mini_description);
    insert($ins_sql,$args);
  }
  // Get Number Of Orders
  function get_Number_Of_Orders(){
    $query = "SELECT * FROM orders";
    $args = array();
    $i = 0;
    foreach (query($query,$args)->fetchAll() as $row) {
      $i++;
    }
    return $i;
  }
  // Get First 10 Transactions
  function get10Trans(){
    $query = "SELECT * FROM orders";
    $args = array();
    $z = 10;
    if(get_Number_Of_Orders() < 10) $z = get_Number_Of_Orders();
    for($i = 0; $i < $z; $i++){
      echo '<tr>
          <td>'.query($query,$args)->fetchAll()[$i]['Order_ID'].'</td>
          <td>'.query($query,$args)->fetchAll()[$i]['Order_Date'].'</td>
          <td>'.query($query,$args)->fetchAll()[$i]['Order_Time'].'</td>
          <td>$ '.query($query,$args)->fetchAll()[$i]['Order_Amount'].'</td>
      </tr>';
    }
  }
  // Get All Transactions/Orders
  function get_All_Orders(){
    $query = "SELECT * FROM orders";
    $args = array();
    foreach (query($query,$args)->fetchAll() as $row) {
      echo '
      <tr>
          <td>'.$row['Order_ID'].'</td>
          <td>$ '.$row['Order_Amount'].'</td>
          <td>'.$row['Order_Transaction'].'</td>
          <td>'.$row['Order_Date'].'</td>
          <td>'.$row['Order_Time'].'</td>
          <td>'.$row['Order_Status'].'</td>
      </tr>
      ';
    }
  }
 ?>
