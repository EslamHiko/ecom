
<div class="col-md-12">
  <div class="row">
    <h1 class="page-header">
       All Orders

    </h1>
  </div>

  <div class="row">
    <table class="table table-hover">
        <thead>

          <tr>
               <th>Order_ID</th>
               <th>Quantity</th>
               <th>Invoice Number</th>
               <th>Order Date</th>
               <th>Order Time</th>
               <th>Status</th>
          </tr>
        </thead>
        <tbody>

          <?php get_All_Orders(); ?>

        </tbody>
    </table>
</div>
