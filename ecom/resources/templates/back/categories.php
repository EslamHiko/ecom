

<h1 class="page-header">
  Product Categories
</h1>
<?php if(isset($_POST['add_cat'])){
  insert_cat($_POST['cat_name']);
  echo '<h2 class="text-center text-success">Category Inserted Successfully !</h2>';
  }
?>

<div class="col-md-4">
    <form action="index.php?categories" method="post">
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="cat_name" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="add_cat" class="btn btn-primary" value="Add Category">
        </div>
    </form>
</div>

<div class="col-md-8">
    <table class="table">
            <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
        </tr>
            </thead>
        <tbody>
                <?php get_Categories(); ?>
        </tbody>
      </table>
</div>
