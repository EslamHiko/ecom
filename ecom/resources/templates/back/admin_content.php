<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

<!-- FIRST ROW WITH PANELS -->

<!-- /.row -->
<div class="row">

           <div class="col-lg-4 col-md-6">
       <div class="panel panel-yellow">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-xs-3">
                       <i class="fa fa-shopping-cart fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge"><?php echo  get_Number_Of_Orders(); ?></div>
                       <div>New Orders!</div>
                   </div>
               </div>
           </div>
           <a href="?orders">
               <div class="panel-footer">
                   <span class="pull-left">View Details</span>
                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                   <div class="clearfix"></div>
               </div>
           </a>
       </div>
   </div>


   <div class="col-lg-4 col-md-6">
       <div class="panel panel-red">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-xs-3">
                       <i class="fa fa-support fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge"><?php echo get_Number_Of_Products(); ?></div>
                       <div>Products!</div>
                   </div>
               </div>
           </div>
           <a href="?products">
               <div class="panel-footer">
                   <span class="pull-left">View Details</span>
                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                   <div class="clearfix"></div>
               </div>
           </a>
       </div>
   </div>

   <div class="col-lg-4 col-md-6">
       <div class="panel panel-green">
           <div class="panel-heading">
               <div class="row">
                   <div class="col-xs-3">
                       <i class="fa fa-tasks fa-5x"></i>
                   </div>
                   <div class="col-xs-9 text-right">
                       <div class="huge"><?php echo get_Number_Of_Categories(); ?></div>
                       <div>Categories!</div>
                   </div>
               </div>
           </div>
           <a href="?categories">
               <div class="panel-footer">
                   <span class="pull-left">View Details</span>
                   <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                   <div class="clearfix"></div>
               </div>
           </a>
       </div>
   </div>


</div>

<!-- /.row -->


<!-- SECOND ROW WITH TABLES-->

<div class="row">






    <div class="col-lg-12">
       <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
           </div>
           <div class="panel-body">
               <div class="table-responsive">
                   <table class="table table-bordered table-hover table-striped">
                       <thead>
                           <tr>
                               <th>Order #</th>
                               <th>Order Date</th>
                               <th>Order Time</th>
                               <th>Amount (USD)</th>
                           </tr>
                       </thead>
                       <tbody>
                          <?php get10Trans(); ?>
                       </tbody>
                   </table>
               </div>
               <div class="text-right">
                   <a href="?orders">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
               </div>
           </div>
       </div>
   </div>


















</div>
<!-- /.row -->
