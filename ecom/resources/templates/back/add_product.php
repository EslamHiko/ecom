
<div class="col-md-12">
<div class="row">
  <h1 class="page-header">
     Add Product

  </h1>
</div>

<form action="index.php?add_product" method="post" enctype="multipart/form-data">


<div class="col-md-8">
  <?php if (isset($_POST['add'])) {
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES['IMG']['name']);
    $upload_OK = 0;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    echo $imageFileType;
    if( ($imageFileType != "jpg" &&
         $imageFileType != "png" &&
         $imageFileType != "jpeg"&&
         $imageFileType != "gif") ){
      $img = "http://placehold.it/640x420";
    } else {
      echo "string";
      $upload_OK = 1;
    }
    if($upload_OK)
     if(move_uploaded_file($_FILES["IMG"]["tmp_name"], $target_file)){
       $img = "img/" . basename( $_FILES["IMG"]["name"]);
     }
    insert_Product($_POST['product_title'],
           $_POST['product_price'],
           $_POST['product_description'],
           $img,
           $_POST['product_quantity'],
           $_POST['product_category'],
           $_POST['product_mini_description']);
    echo "<h2 class='text-center text-success'>File Added Successfully !</h2>";
  } ?>
<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control">
    </div>


    <div class="form-group">
           <label for="product-title">Product Description</label>
           <textarea name="product_description" id="" cols="30" rows="4" class="form-control"></textarea>
           <label for="product-title">Product Mini Description</label>
           <textarea name="product_mini_description" id="" cols="30" rows="3" class="form-control"></textarea>
    </div>



    <div class="form-group row">
      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
      <div class="col-xs-3">
        <label for="product-price">Product Quantity</label>
        <input type="number" name="product_quantity" class="form-control" size="60">
      </div>
    </div>

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
        <select name="product_category" id="" class="form-control">
            <option value="" disabled selected>Select Category</option>
            <?php
              get_cat_options();
             ?>
        </select>

</div>


    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="IMG" value="none">
    </div>

    <div class="form-group">
       <input type="submit" name="add" class="btn btn-primary btn-lg" value="Add Product">
   </div>

</aside><!--SIDEBAR-->



</form>
