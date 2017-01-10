<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">
        <?php
        $query = "SELECT * From category";
        $args = array();
        $rows = query($query,$args)->fetchAll();
        foreach ($rows as $row) {
          echo '<a href="category.php?cat_id='.$row['Cat_ID'].'" class="list-group-item">'.$row['Cat_Title'].'</a>';
        }
         ?>
    </div>
</div>
