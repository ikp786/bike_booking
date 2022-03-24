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
                        <li class="breadcrumb-item">Manage Models</li>
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
                        <form action="<?= base_url()?>Adminpanel/addModel" method="post" enctype="multipart/form-data">
                           <input type="hidden" name="model_id" id="model_id">
                              <div class="min-box-row">
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Manufacturer Name *</label>
                                       <select name="manufacturer_id" id="manufacturer_id">
                                          <option value="0">Select Manufacturer</option>
                                          <?php if(!empty($manufacturer_data)) { foreach ($manufacturer_data as $manufacturer):?>
                                                <option value=<?=$manufacturer->id?>> <?=$manufacturer->manufacturer_name?></option>
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
                                             <option value=<?=$type->id?>> <?=$type->type?></option>
                                          <?php endforeach; }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Enter Model Name *</label>
                                       <input type="text" name="model_name" id="model_name"class="form-control" required="">
                                    </div>
                                 </div>
                                 
                               
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Image *</label>
                                       <input type="file" name="image_url" id="image_url" class="form-control" required="" accept="image/*">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Remark</label>
                                       <textarea name="remark" id="remark"></textarea>
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
                        <button  class="btn btn-primary m-b-15 float-right" type="button"><a href="<?= base_url()?>queryadd"> Add Query</a>
                        </button>
                        <div class="table-responsive">
                           <table class="table table-hover js-basic-example dataTable table-custom">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>S.NO</th>
                                    <th>Manufacturer Name</th>
                                    <th>Select Type</th>
                                    <th>Enter Model Name</th>
                                    <th>Image</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if(!empty($model_data)) { $Sno = 1;foreach ($model_data as $model):?>
                                    <tr class="gradeA">
                                   <td><?=$Sno?></td>
                                    <td><?=$model->manufacturer_name?></td>
                                    <td><?=$model->type?></td>
                                    <td><?=$model->model_name?></td>
                                    <td><img style="width:80px; height:80px" src="<?= base_url().$model->image_url?>" alt=""></td>
                                    <td><?=$model->remark?></td>
                                    <td>
                                       <a href="javascript:void(0);" model_id="<?=$model->id?>" class="editModel btn btn-outline-dark"><i class="icon-pencil" aria-hidden="true"></i></a>
                                       <a href="javascript:void(0);" model_id="<?=$model->id?>" class="deleteModel btn btn-outline-dark"><i class="icon-trash" aria-hidden="true"></i></a>
                                    </td>
                                 </tr>
                                 <?php  $Sno++; endforeach; }?>
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
               url: '<?= base_url().'Adminpanel/deleteModel'?>',
               type: "post",
               data: { "id" : model_id},
               success: function(result){
                 
                    location.reload();
               }
            });
        }
    });
});

         $(".editModel").click(function(){
         var model_id = $(this).attr('model_id');
            $.ajax({
               url: '<?= base_url().'Adminpanel/getModelData/'?>'+model_id,
               type: "get",
               dataType:'json',
               success: function(result){
                 
                 $('#image_url').removeAttr('required');
                  //console.log(value);
                  let modeldata = result.model_data;
                  let manufacturer_data = result.manufacturer_data;
                  let type_data = result.type_data;


                  let model_id=modeldata.id;
                 let model_name=modeldata.model_name;
                 let remark=modeldata.remark;
                 let manufacturer_id=modeldata.manufacturer_id;
                 let type_id=modeldata.type_id;

                 //let remark=result.remark;
                 
              //console.log(result.model_data);

                 $manufactures_html = ''; 
                 $.each(manufacturer_data,function(key,value) {
                  var select_option = '';
                  if(manufacturer_id == value.id) {
                     select_option = 'selected';
                  }
                  $manufactures_html += '<option value="'+value.id+'" '+select_option+'>'+value.manufacturer_name+'</option>'; 
                 })

                 $('#manufacturer_id').html();
                 $('#manufacturer_id').html($manufactures_html);



                 $type_html = ''; 
                 $.each(type_data,function(key,value) {
                  var select_option = '';
                  if(type_id == value.id) {
                     select_option = 'selected';
                  }
                  $type_html += '<option value="'+value.id+'" '+select_option+'>'+value.type+'</option>'; 
                 })

                 $('#type_id').html();
                 $('#type_id').html($type_html);
              
                 $('#model_id').val(model_id);
                 $('#model_name').val(model_name);
                 $('#remark').val(remark);
              
               }
            });
         });
      </script>
   </body>
</html>