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
                           <li class="breadcrumb-item">User List</li>
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
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Contact</th>
                                       <th>Password</th>
                                       <th>Driving</th>
                                       <th>Aadhar</th>
                                       <th>Other</th>
                                       <th>Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php if(!empty($user_data)) { $s_no=1; foreach ($user_data as $user) {?>
                                    <tr class="gradeA">
                                       <td><?=$s_no?></td>
                                       <td><?=$user->name?></td>
                                       <td><?=$user->email?></td>
                                       <td><?=$user->contact_no?></td>
                                       <td><?=substr(password_hash($user->password,PASSWORD_DEFAULT),0,10) . '...'?></td>
                                       <td><?php if($user->licence){ ?> <img data-toggle="modal" data-target="#imgdriving" height="50px" width="50px" src="<?php  echo base_url('assets/uploads/'.$user->licence) ?>"><?php } ?> </td>
                                       <td><?php if($user->aadhar){ ?><img data-toggle="modal" data-target="#imgadhar" height="50px" width="50px" src="<?php  echo base_url('assets/uploads/'.$user->aadhar) ?>"><?php } ?></td>
                                       <td><?php if($user->other_doc){ ?><img data-toggle="modal" data-target="#imgother" height="50px" width="50px" src="<?php  echo base_url('assets/uploads/'.$user->other_doc) ?>"><?php } ?></td>
                                       <td><?=$user->created_at?></td>
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
      
      <div class="modal fade" id="imgdriving" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="text-align: center;">
                <img src="http://snaprides.co.in/assets/uploads/right.png"/>
              </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="imgadhar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="text-align: center;">
                <img src="http://snaprides.co.in/assets/uploads/right.png"/>
              </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="imgother" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="text-align: center;">
                <img src="http://snaprides.co.in/assets/uploads/right.png"/>
              </div>
            </div>
          </div>
      </div>
      <script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/js/pages/tables/jquery-datatable.js"></script>
      <script src="<?= base_url()?>assets/admin/default/bundles/vendorscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/bundles/datatablescripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/vendor/sweetalert/sweetalert.min.js"></script> 
      <script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/js/pages/tables/jquery-datatable.js"></script>
   </body>
</html>