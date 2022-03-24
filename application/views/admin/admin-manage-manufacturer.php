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
                           <li class="breadcrumb-item">Manage Manufacturer</li>
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
                       <form action="<?= base_url()?>Adminpanel/addManufacturer" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="manufacture_id" id="manufacture_id">
                              <div class="min-box-row">
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Manufacturer Name *</label>
                                       <input type="text" id="manufacturer_name" name="manufacturer_name" class="form-control" required="">
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
                                       <th>Manufacturer Name</th>
                                       <th>Remark</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php if(!empty($manufacturer_data)) { $s_no=1; foreach ($manufacturer_data as $manufacturer) {?>
                                    <tr class="gradeA">
                                       <td><?=$s_no ?></td>
                                       <td><?=$manufacturer->manufacturer_name?></td>
                                       <td><?=$manufacturer->remark?></td>
                                       <td>
                                          <a href="javascript:void(0);" manufacture_id="<?=$manufacturer->id?>" class="btn btn-outline-dark editManufacture"><i class="icon-pencil" aria-hidden="true"></i></a>
                                          <a href="javascript:void(0);" manufacture_id="<?=$manufacturer->id?>" class="btn btn-outline-dark deleteManufacture"><i class="icon-trash" aria-hidden="true"></i></a>
                                       </td>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script>
          $(document).on('click','.deleteManufacture',function(){
   var manufacture_id = $(this).attr('manufacture_id');
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this manufacture!.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
               url: '<?= base_url().'Adminpanel/deleteManufacture'?>',
               type: "post",
               data: { "id" : manufacture_id},
               success: function(result){
                 
                        location.reload();
               }
            });
        }
    });
});

         $(".editManufacture").click(function(){
         var manufacture_id = $(this).attr('manufacture_id');
            $.ajax({
               url: '<?= base_url().'Adminpanel/getManufactureData/'?>'+manufacture_id,
               type: "get",
               dataType:'json',
               success: function(result){
                 console.log(result);

              

                 let manufacture_id=result.id;
                 let manufacturer_name=result.manufacturer_name;
                 let remark=result.remark;
                 
              
                 $('#manufacture_id').val(manufacture_id);
                 $('#manufacturer_name').val(manufacturer_name);
                 $('#remark').val(remark);
              
               }
            });
         });
      </script>
   </body>
</html>