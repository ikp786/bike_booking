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
   <body  onload="showMesssage()" class="theme-orange">
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
      <div id="wrapper m-cities">
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
                        <li class="breadcrumb-item">Manage Cities</li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row clearfix justify-content-center">
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
                        <?php //echo form_open_multipart('upload/do_upload');?>
                        <form method="post" action="<?= base_url()?>Adminpanel/addCity" enctype="multipart/form-data">
                           <input type="hidden" id="city_id" name="city_id">
                              <div class="min-box-row">
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>City Name *</label>
                                       <input type="text" name="city_name" class="form-control" id="city_name" required="">
                                    </div>
                                 </div>
                                 <!-- <div class="min-box">
                                    <div class="form-group">
                                       <label>City Icon </label>
                                       <input type="file" name="icon_url" id="icon_url" class="form-control">
                                    </div>
                                 </div> -->
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Remark</label>
                                       <textarea  name="remark" id="remark"></textarea>
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
                        <div class="table-responsive">
                           <table class="table table-hover js-basic-example dataTable table-custom">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>S.NO</th>
                                    <th>City Name</th>
                                    <!-- <th>City Icon</th> -->
                                    <th class="text-right">Remark</th>
                                    <th>Action</th>

                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if(!empty($city_data)) { $s_no=1; foreach ($city_data as $city) {?>
                                    <tr class="gradeA">
                                       <td><?=$s_no?></td>
                                       <td><?=$city->city_name?></td>
                                       <!-- <td><img style="width:80px; height:80px" src="<?= base_url().'/'.$city->icon_url?>" alt=""></td> -->
                                       <td class="text-right"><?= $city->remark?></td>
                                       <td>
                                          <a href="javascript:void(0);"  city_id="<?=$city->id?>" class="btn btn-outline-dark editcity"><i class="icon-pencil "  aria-hidden="true"></i></a>
                                          <button class="btn btn-outline-dark deleteCity" city_id="<?=$city->id?>"><i class="icon-trash" aria-hidden="true"></i></button>
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
        function showMesssage() {
            var message = '<?=($message)?$message:''?>';
            if(message){
                swal(message);
            }
        }

         // $(".deleteCity").click(function(){
         // var city_id = $(this).attr('city_id');
         //    $.ajax({
         //       url: '<?= base_url().'Adminpanel/deleteData'?>',
         //       type: "post",
         //       data: { "id" : city_id, "flag" : 'city'},
         //       success: function(result){
         //          // swal("Good job!", result, "success");
         //          swal({
         //                title: "Deleted Successfully", 
         //                text: result, 
         //                type: "success"
         //             },
         //             function(){ 
         //                location.reload();
         //             }
         //          );
         //       }
         //    });
         // });

          $(document).on('click','.deleteCity',function(){
   var city_id = $(this).attr('city_id');
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this City!.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
               url: '<?= base_url().'Adminpanel/deleteData'?>',
               type: "post",
               data: { "id" : city_id, "flag" : 'city'},
               success: function(result){
                  // swal("Good job!", result, "success");
                 
                        location.reload();
               }
            });
        }
    });
});

         $(".editcity").click(function(){
         var city_id = $(this).attr('city_id');
            $.ajax({
               url: '<?= base_url().'Adminpanel/getCityData/'?>'+city_id,
               type: "get",
               dataType:'json',
               success: function(result){
                 console.log(result);
                 let id=result.id;
                 let city_name=result.city_name;
                 let remark=result.remark;

                 $('#city_name').val(city_name);
                 $('#city_id').val(id);
                 $('#remark').val(remark);
               }
            });
         });
         
     </script>
   </body>
</html>