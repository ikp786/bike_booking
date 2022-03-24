<!doctype html>
<html lang="en">
   <head>
      <?php $this->load->view('admin/include/head');?>
      <!-- datatable-css -->
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/sweetalert/sweetalert.css"/>
      <link rel="stylesheet" href=""/>
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
      <div id="wrapper m-manufacturer">
         <?php $this->load->view('admin/include/header');?>
         <?php $this->load->view('admin/include/sidebar');?>
         <div id="main-content">
            <div class="container-fluid">
               <div class="block-header">
                  <div class="row">
                     <div class="col-lg-6 col-md-8 col-sm-12">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="<?= base_url('manage-cities')?>"><i class="icon-home"></i></a></li>
                           <li class="breadcrumb-item">Contact-Us List</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- <div class="row clearfix">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="body form-aj">
                       <form action="<?= base_url()?>Adminpanel/addCoupon" method="post" enctype="multipart/form-data">
                              <div class="min-box-row">
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Coupon</label>
                                       <input type="text" id="coupon" name="coupon" class="form-control" required="">
                                    </div>
                                 </div>
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Quantity</label>
                                       <input type="text" id="qty" name="qty" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Coupon Amount</label>
                                       <input type="number" id="coupon_amount" name="coupon_amount" class="form-control" required="">
                                    </div>
                                 </div>                                 
                                 <div class="min-box">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                              </div>
                           </form>
                     </div>
                  </div>
               </div>
            </div> -->
               <div class="row clearfix">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="body">
                           <!-- <button  class="btn btn-primary m-b-15 float-right" type="button"><a href="<?= base_url()?>queryadd"> Add Query</a> -->
                           </button>
                           <div class="table-responsive">
                              <table class="table table-hover js-basic-example dataTable table-custom">
                                 <thead class="thead-dark">
                                    <tr>
                                       <th>S.NO</th>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Email</th>
                                       <th>Contact</th>
                                       <th>Message</th>
                                       <th>Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php if(!empty($contactus_data)) { $s_no=1; foreach ($contactus_data as $contactus) {?>
                                    <tr class="gradeA">
                                       <td><?=$s_no?></td>
                                       <td><?=$contactus->first_name?></td>
                                       <td><?=$contactus->last_name?></td>
                                       <td><?=$contactus->email?></td>
                                       <td><?=$contactus->phone_number?></td>
                                       <td><?=$contactus->message?></td>
                                       <td><?=$contactus->created_at?></td>
                                    </tr>                                
                                 <?php  $s_no++; } } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('admin/include/foot');?>
      <script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/js/pages/tables/jquery-datatable.js"></script>
      <script src="<?= base_url()?>assets/admin/default/bundles/vendorscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/bundles/datatablescripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/vendor/sweetalert/sweetalert.min.js"></script> 
      <script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/js/pages/tables/jquery-datatable.js"></script>
   </body>
</html>