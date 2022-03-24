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
      <div id="wrapper m-branch">
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
                        <li class="breadcrumb-item">Manage Branch</li>
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
                        <form action="<?= base_url()?>Adminpanel/addBranch" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="branch_id" name="branch_id">
                              <div class="min-box-row">
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Select City *</label>
                                       <select name="city_id" id="city_id">
                                          <?php if(!empty($city_data)) { foreach ($city_data as $city):?>
                                             <option value=<?=$city->id?>> <?=$city->city_name?> </option>
                                          <?php endforeach; }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Branch Name *</label>
                                       <input type="text" name="branch_name" id="branch_name" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Address *</label>
                                       <input type="text" name="address" id="address" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Contact No *</label>
                                       <input type="text" maxlength="10" onkeypress="return validateNumber(event)"  name="contact_no" id="contact_no" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Google Map Link</label>
                                       <input type="url" name="google_map_link" id="google_map_link" class="form-control" required="">
                                    </div>
                                 </div>
                                 <!-- <div class="min-box">
                                    <div class="form-group">
                                       <label>Photo</label>
                                       <input type="file"  name="photo_url" id="photo_url" class="form-control" accept="image/*">
                                    </div>
                                 </div> -->
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
                       <!--  <button  class="btn btn-primary m-b-15 float-right" type="button"><a href="<?//= base_url()?>queryadd"> Add Query</a>
                        </button> -->
                        <div class="table-responsive">
                           <table class="table table-hover js-basic-example dataTable table-custom">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>S.NO</th>
                                    <th>Select City </th>
                                    <th>Branch Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Google Map Link</th>
                                    <!-- <th>Photo</th> -->
                                    <th>Remark</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if(!empty($branch_data)) { $Sno = 1;foreach ($branch_data as $branch):?>
                                    <tr class="gradeA">
                                   <td><?=$Sno;?></td>
                                    <td><?=$branch->city_name ?> </td>
                                    <td><?=$branch->branch_name ?> </td>
                                    <td><?=$branch->address ?></td>
                                    <td><?=$branch->contact_no ?></td>
                                    <td><?=$branch->google_map_link ?></a></td>
                                    <!-- <td><img style="width:80px; height:80px" src="<?=base_url().$branch->photo_url?>" alt=""></td> -->
                                    <td><?=$branch->remark?></td>
                                    <td>
                                       <a href="javascript:void(0);" branch_id="<?=$branch->id?>" class="btn btn-outline-dark editBranch"><i class="icon-pencil" aria-hidden="true"></i></a>
                                       <a href="javascript:void(0);" branch_id="<?=$branch->id?>" class="btn btn-outline-dark deleteBranch"><i class="icon-trash" aria-hidden="true"></i></a>
                                    </td>
                                 </tr>
                                 <?php $Sno++; endforeach; }?>
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
          $(document).on('click','.deleteBranch',function(){
   var branch_id = $(this).attr('branch_id');
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this branch!.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
               url: '<?= base_url().'Adminpanel/deleteBranch'?>',
               type: "post",
               data: { "id" : branch_id},
               success: function(result){
                 
                        location.reload();
               }
            });
        }
    });
});

         $(".editBranch").click(function(){
         var branch_id = $(this).attr('branch_id');
            $.ajax({
               url: '<?= base_url().'Adminpanel/getBranchData/'?>'+branch_id,
               type: "get",
               dataType:'json',
               success: function(result){
                 console.log(result);

                 $html = '';
                  $.each(result.city_data, function( index, value ) {
                     //alert( index + ": " + value.c );
                     $selected = '';
                     if(result.city_id == value.id) {
                        $selected = 'selected';
                     }
                     $html += '<option value="'+value.id+'"'+$selected+'>'+value.city_name+'</option>'
                  });

                   $('#city_id').html($html);

                 let branch_id=result.id;
                 let city_id=result.city_id;
                 let branch_name=result.branch_name;
                 let address=result.address;
                 let remark=result.remark;
                 let contact_no=result.contact_no;
                 let google_map_link=result.google_map_link;

                 $('#branch_id').val(branch_id);
                 $('#branch_name').val(branch_name);
                 $('#address').val(address);
                 $('#remark').val(remark);
                 $('#contact_no').val(contact_no);
                 $('#google_map_link').val(google_map_link);
               }
            });
         });

         function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key )
        }
      </script>
   </body>
</html>