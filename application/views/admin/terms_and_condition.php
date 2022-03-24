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
       <!-- <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->
       <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
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
                           <li class="breadcrumb-item">Terms & Condition</li>
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
                        <form action="<?= base_url()?>Adminpanel/terms_and_condition_update" method="post" enctype="multipart/form-data">
                              
                                 <div class="row">
                                    <div class="col-lg-12">
                                 
                                 <div class="min-box">
                                    <div class="form-group">
                                       
                                       <label>Remark</label>
                                         <textarea name="remark" rows="3" class="form-control"><?php echo $terms['terms_condition']; ?></textarea>
                                    </div>
                                 </div>
                                 </div>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
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
   CKEDITOR.replace('remark',{
              });
       
</script>
   </body>
</html>
