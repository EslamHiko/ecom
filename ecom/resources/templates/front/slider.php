<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
          for($i = 0; $i < get_Number_Of_Products(); $i++) {
            if($i == 0)
              echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>';
            else
              echo '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>';
          }
         ?>
    </ol>
    <div class="carousel-inner">

        <?php

         get_Product_Imgs();

         ?>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
