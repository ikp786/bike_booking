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
                           <li class="breadcrumb-item">Manage Models at Branch</li>
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
                        <form action="<?= base_url()?>Adminpanel/addModelAtBranch" method="post" enctype="multipart/form-data">
                              <div class="min-box-row">
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Select City *</label>
                                       <select name="city_id" id="city_id">
                                          <option value="0">Select City</option>
                                          <?php if(!empty($city_data)) { foreach ($city_data as $city):?>
                                             <option value=<?=$city->id?>> <?=$city->city_name?> </option>
                                          <?php endforeach; }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Select Branch *</label>
                                       <select name="branch_id" id="branch_id">
                                             <option value="0">Select Branch</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Select Manufacturer *</label>
                                       <select name="manufacturer_id" id="manufacturer_id">
                                          <option value="0">Select Manufacturer</option>
                                          <?php if(!empty($manufacturer_data)) { foreach ($manufacturer_data as $manufacturer):?>
                                             <option value=<?=$manufacturer->id?>> <?=$manufacturer->manufacturer_name?> </option>
                                          <?php endforeach; }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Select Type *</label>
                                       <select name="type_id" id="type_id">
                                          <option value="0">Select Type</option>
                                          <?php if(!empty($type_data)) { foreach ($type_data as $type):?>
                                             <option value=<?=$type->id?>> <?=$type->type?> </option>
                                          <?php endforeach; }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Select Model *</label>
                                       <select name="model_id" id="model_id">
                                         <option value="0">Select Model</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Enter Available Quantity *</label>
                                       <input type="number" name="available_qty" id="available_qty" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Deposit Amount *</label>
                                       <input type="number" name="deposit_amount" id="deposit_amount" class="form-control" required="">
                                    </div>
                                 </div>
                                 <!-- <div class="min-box">
                                    <div class="form-group">
                                       <label>Minimum HRS Rate*</label>
                                       <input type="number" name="min_charge" id="min_charge" class="form-control" required="">
                                    </div>
                                 </div> -->
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Tariff For 1 HRS Rate*</label>
                                       <input type="number" name="hourly_rate" id="hourly_rate" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Tariff Per Day Rate*</label>
                                       <input type="number" name="perday_rate" id="perday_rate" class="form-control" required="">
                                    </div>
                                 </div>
                                 
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Weekly Tariff*</label>
                                       <input type="number" name="weekly_rate" id="weekly_rate" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Monthly Tariff*</label>
                                       <input type="number" name="monthly_rate" id="monthly_rate" class="form-control" required="">
                                    </div>
                                 </div>
                                 <!-- <div class="min-box">
                                    <div class="form-group">
                                       <label>30 Day Amount *</label>
                                       <input type="number" name="thirty_day_amount" id="thirty_day_amount"  class="form-control" required="">
                                    </div>
                                 </div> -->
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Free KM *</label>
                                       <input type="number" name="free_km" id="free_km" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Extra Km *</label>
                                       <input type="number" name="extra_km" id="extra_km" class="form-control" required="">
                                    </div>
                                 </div>
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Remark</label>
                                       <textarea name="remark" id="remark" ></textarea>
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
<script>
   $(document).ready(function(){

      $("#city_id").on("change", function(){
         var city_id = $("#city_id").val();
         if (city_id != 0) {
            $.ajax({
               url : "Adminpanel/getBranchByID",
               type : "POST",
               data : {id : city_id},
               success : function(data){
                  if (data) {
                     $("#branch_id").html(data);
                  }
               }
            });  
         }
      });

      $("#type_id").on("change", function(){
         var type_id = $("#type_id").val();
         var manufacturer_id = $("#manufacturer_id").val();
         if (type_id != 0 && manufacturer_id != 0) {
            $.ajax({
               url : "Adminpanel/getModelByID",
               type : "POST",
               data : { typeID : type_id, manufacturerID : manufacturer_id},
               success : function(data){
                  if(data){
                     $("#model_id").html(data);
                  }                 
               }
            });  
         }
      });

   });
</script>