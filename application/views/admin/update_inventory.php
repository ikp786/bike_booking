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
                           <li class="breadcrumb-item"><a href="<?= base_url('manage-cities')?>"><i class="icon-home"></i></a></li>
                           <li class="breadcrumb-item">Create Inventory</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row clearfix">
               <div class="col-lg-12">
                  <div class="card">
                      <?php
                     if($this->session->flashdata('success_msg')) {
                        echo $this->session->flashdata('success_msg');
                     }
                     ?>
                     <div class="body form-aj">
                        <form action="<?= base_url()?>Adminpanel/updateInventory" method="post" enctype="multipart/form-data">
                              <div class="min-box-row">
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>User Name </label>
                                       <input type="text" value="<?php echo isset($inventory['user_name'])? $inventory['user_name']:'' ; ?>" name="user_name" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>City</label>
                                       <input type="text" value="<?php echo isset($inventory['city'])? $inventory['city']:'' ; ?>" name="city" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Branch</label>
                                      <input type="text" value="<?php echo isset($inventory['branch'])? $inventory['branch']:'' ; ?>" name="branch" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Manufacturer</label>
                                       <input type="text" value="<?php echo isset($inventory['manufacturer'])? $inventory['manufacturer']:'' ; ?>" name="manufacturer" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Type</label>
                                       <input type="text" value="<?php echo isset($inventory['type'])? $inventory['type']:'' ; ?>" name="type" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Model</label>
                                       <input type="text" value="<?php echo isset($inventory['model'])? $inventory['model']:'' ; ?>" name="model" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Deposit Amount</label>
                                       <input onkeypress="return validateNumber(event)" type="text" value="<?php echo isset($inventory['deposit_amount'])? $inventory['deposit_amount']:'' ; ?>" name="deposit_amount" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Price</label>
                                       <input onkeypress="return validateNumber(event)" type="text" value="<?php echo isset($inventory['price'])? $inventory['price']:'' ; ?>"  name="price" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Access Price</label>
                                       <input onkeypress="return validateNumber(event)" type="text" value="<?php echo isset($inventory['access_price'])? $inventory['access_price']:'' ; ?>" name="access_price" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Damage Price</label>
                                       <input onkeypress="return validateNumber(event)" type="text"  value="<?php echo isset($inventory['damage_price'])? $inventory['damage_price']:'' ; ?>" name="damage_price" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Final Price</label>
                                       <input onkeypress="return validateNumber(event)" type="text" value="<?php echo isset($inventory['final_price'])? $inventory['final_price']:'' ; ?>"  name="final_price" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Access Hours/Days</label>
                                       <input onkeypress="return validateNumber(event)" type="text" value="<?php echo isset($inventory['access_hours'])? $inventory['access_hours']:'' ; ?>" name="access_hours" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Bike Image</label>
                                       <input type="file" name="bike" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Bike Start Reading</label>
                                       <input type="file" name="bike_start" class="form-control">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Bike End Reading</label>
                                       <input type="file" name="bike_end" class="form-control">
                                    </div>
                                 </div>
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Remark</label>
                                       <textarea name="remark" id="remark" ><?php echo isset($inventory['remark'])? $inventory['remark']:'' ; ?> </textarea>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <input type="hidden" name="id" value="<?php echo $this->uri->segment('3'); ?>">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                              </div>
                           </form>
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

      <script type="text/javascript">
         function validateNumber(e) {
   const pattern = /^[0-9]$/;
   return pattern.test(e.key )
}
      </script>
   </body>
</html>
