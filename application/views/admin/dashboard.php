<!doctype html>
<html lang="en">
   <head>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <?php $this->load->view('admin/include/head');?>
      <!-- datatable-css -->
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/sweetalert/sweetalert.css"/>
      <style>
          .card1{
              background: #F44539;
          }
          .card2{
              background: #B3C100;
          }.card3{
              background: #A5D8DD;
          }.card4{
              background: #4CB5F5;
          }.card5{
              background: #6AB187;
          }.card6{
              background: #1F3F49;
          }
      </style>
   </head>
   <body class="theme-orange">
      <!-- Page Loader -->
      <div class="page-loader-wrapper">
         <div class="loader">
            <p>Please wait...</p>
            <div class="m-t-30">
               <img src="<?= base_url()?>/assets/user/img/logo.png"  alt="Snaprides">
            </div>
         </div>
      </div>
      <!-- Overlay For Sidebars -->
      <div id="wrapper m-models">
         <?php $this->load->view('admin/include/header');?>
         <?php $this->load->view('admin/include/sidebar');?>
         <div id="main-content">
            <div class="container-fluid">
               <div class="block-header">
                  <div class="row">
                     <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>"><i class="icon-home"></i></a></li>
                           <li class="breadcrumb-item">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row clearfix">
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center bg-info">
                        <a href="<?= base_url('manage-user-list')?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $user; ?></h3>
                                  <span>Total No Of  User</span>
                               </div>
                            </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center bg-secondary">
                        <a href="<?= base_url('manage-cities')?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $city; ?></h3>
                                  <span>Number Of Cities</span>
                               </div>
                            </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center bg-warning">
                         <a href="<?= base_url('manage-models-at-branch') ?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $bikes; ?></h3>
                                  <span>Number Of Bikes</span>
                               </div>
                            </div>
                         </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center card1">
                         <a href="<?= base_url('manage-coupon-create')?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $coupons; ?></h3>
                                  <span>Total No Of  Coupans</span>
                               </div>
                            </div>
                         </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center card2">
                         <a href="<?= base_url('manage-branch')?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $branch; ?></h3>
                                  <span>Total Number Of Branch</span>
                               </div>
                            </div>
                         </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center card3">
                         <a href="<?= base_url('manage-orders-list')?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $earning['total_amount'] + $extraHelmet*50 ; ?></h3>
                                  <span>Total Earning</span>
                               </div>
                            </div>
                         </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <div class="card text-center bg-dark">
                         <a href="<?= base_url('manage-orders-list')?>">
                            <div class="body">
                               <div class="p-15 text-light">
                                  <h3><?php echo $totalOrder; ?></h3>
                                  <span>Total Number Of Booking</span>
                               </div>
                            </div>
                         </a>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="<?= base_url('running-orders-list')?>">
                         <div class="card text-center card4">
                        <div class="body">
                           <div class="p-15 text-light">
                              <h3><?php echo $running; ?></h3>
                              <span>Current/Running Booking</span>
                           </div>
                        </div>
                     </div>
                    </a>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <a href="<?= base_url('upcoming-orders-list')?>">
                          <div class="card text-center card5">
                        <div class="body">
                           <div class="p-15 text-light">
                              <h3><?php echo $upcoming; ?></h3>
                              <span>Total Number Of Upcoming Booking</span>
                           </div>
                        </div>
                     </div>
                     </a>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-6">
                     <a href="<?= base_url('complete-orders-list')?>">
                        <div class="card text-center card6">
                        <div class="body">
                           <div class="p-15 text-light">
                              <h3><?php echo $complete; ?></h3>
                              <span>Total Number Of Completed Booking</span>
                           </div>
                        </div>
                     </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('admin/include/foot');?>
   </body>
</html>