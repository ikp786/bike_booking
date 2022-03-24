<!doctype html>
<html lang="en">
   <head>
      <?php $this->load->view('admin/include/head');?>
      <!-- datatable-css -->
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url()?>assets/admin/vendor/sweetalert/sweetalert.css"/>
      
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
      <div id="wrapper m-type">
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
                        <li class="breadcrumb-item">Manage Type</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row clearfix justify-content-center">
            </div>
            <div class="row clearfix">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="body">
                        <button  class="btn btn-primary m-b-15 float-right" type="button"><a href="<?= base_url()?>queryadd"> Add Query</a>
                        </button>
                        <div class="table-responsive">
                           <table class="table table-hover js-basic-example dataTable table-custom">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>S.NO</th>
                                    <th>Scooter</th>
                                    <th>Motorcycle</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr class="gradeA">
                                   <td>1.</td>
                                    <td>Scooter</td>
                                    <td>Motorcycle</td>
                                 </tr>
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
   </body>
</html>