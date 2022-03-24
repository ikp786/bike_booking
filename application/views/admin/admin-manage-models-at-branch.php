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
      <!-- Overlay For Sidebars -->
      <div id="wrapper m-models">
         <?php $this->load->view('admin/include/header');?>
         <?php $this->load->view('admin/include/sidebar');?>
      </div>
      <!--model-end -->
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
             <?php
                     if($this->session->flashdata('success_msg')) {
                        echo $this->session->flashdata('success_msg');
                     }
                     ?>
            <div class="row clearfix">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="body">
                        <a class="btn btn-primary m-b-15 float-right" href="<?= base_url()?>manage-models-branch-create"> Add Models at Branch</a>
                        
                        <div class="table-responsive">
                           <table class="table table-hover js-basic-example dataTable table-custom">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>S.NO</th>
                                    <th>City</th>
                                    <th>Branch</th>
                                    <th>Manufacturer</th>
                                    <th>Type</th>
                                    <th>Model</th>
                                    <th>Available Quantity</th>
                                    <th>Deposit Amount</th>
                                    
                                    <th>Tariff For 1 HRS Rate</th>
                                    <th>Tariff Per Rate Day</th>
                                    <th>Weekly Tariff</th>
                                    <th>Monthly Tariff</th>
                                    <!-- <th>30 Day Amount</th> -->
                                    <th>Free KM</th>
                                    <th>Extra Km</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if(!empty($modelAtBranch_data)) { $s_no=1; foreach ($modelAtBranch_data as $modelAtBranch) {?>
                                    <tr class="gradeA">
                                    <td><?= $s_no?></td>
                                    <td><?= $modelAtBranch->city_name?></td>
                                    <td><?= $modelAtBranch->branch_name?></td>
                                    <td><?= $modelAtBranch->manufacturer_name?></td>
                                    <td><?= $modelAtBranch->type?></td>
                                    <td><?= $modelAtBranch->model_name?></td>
                                    <td><?= $modelAtBranch->available_qty?></td>
                                    <td><?= $modelAtBranch->deposit_amount?></td>
                                    <td><?= $modelAtBranch->hourly_rate?></td>
                                    <td><?= $modelAtBranch->perday_rate?></td>
                                    <td><?= $modelAtBranch->weekly_rate?></td>
                                    <td><?= $modelAtBranch->monthly_rate?></td>
                                    <!-- <td><?= $modelAtBranch->thirty_day_amount?></td> -->
                                    <td><?= $modelAtBranch->free_km?></td>
                                    <td><?= $modelAtBranch->extra_km?></td>
                                    <td><?= $modelAtBranch->remark?></td>
                                    <td>
                                       <a href="<?php echo base_url('Adminpanel/get_models_at_branch/').$modelAtBranch->main_id?>" class="btn btn-outline-dark"><i class="icon-pencil" aria-hidden="true"></i></a>
                                       <a href="javascript:void(0);" model_id="<?php echo $modelAtBranch->main_id?>" class="deleteModel btn btn-outline-dark"><i class="icon-trash" aria-hidden="true"></i></a>
                                    </td>
                                 </tr>
                                 <?php $s_no++;}}?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php $this->load->view('admin/include/foot');?>
      <script></script>
      <!-- datatable -->   
      <script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/js/pages/tables/jquery-datatable.js"></script>
      <script src="<?= base_url()?>assets/admin/default/bundles/vendorscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/bundles/datatablescripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/vendor/sweetalert/sweetalert.min.js"></script> 
      <script src="<?= base_url()?>assets/admin/default/bundles/mainscripts.bundle.js"></script>
      <script src="<?= base_url()?>assets/admin/default/js/pages/tables/jquery-datatable.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script>
           $(document).on('click','.deleteModel',function(){
   var model_id = $(this).attr('model_id');
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this model!.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
               url: '<?= base_url().'Adminpanel/deleteModelBranch'?>',
               type: "post",
               data: { "id" : model_id},
               success: function(result){
                  
                    location.reload();
               }
            });
        }
    });
});
      </script>
   </body>
</html>