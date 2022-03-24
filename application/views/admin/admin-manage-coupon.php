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
                           <li class="breadcrumb-item">Manage Coupon</li>
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
                       <form action="<?= base_url()?>Adminpanel/addCoupon" method="post" enctype="multipart/form-data">
                              <div class="min-box-row">
                                <input type="hidden" name="coupon_id" id="coupon_id">
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Coupon</label>
                                       <input type="text" id="coupon" name="coupon" class="form-control" required="">
                                    </div>
                                 </div>
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Quantity</label>
                                       <input type="number" id="qty" onkeypress="return validateNumber(event)" name="qty" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Coupon Amount</label>
                                       <input type="number" onkeypress="return validateNumber(event)" id="coupon_amount" name="coupon_amount" class="form-control" required="">
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
                                       <th>coupon</th>
                                       <th>Quantity</th>
                                       <th>Amount</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php if(!empty($coupon_data)) { $s_no=1; foreach ($coupon_data as $coupon) {?>
                                    <tr class="gradeA">
                                       <td><?=$s_no?></td>
                                       <td><?=$coupon->coupon?></td>
                                       <td><?=$coupon->qty?></td>
                                       <td><?=$coupon->coupon_amount?></td>
                                       <td>
                                          <a href="javascript:void(0);" coupon_id="<?=$coupon->id?>" class="editcoupon btn btn-outline-dark"><i class="icon-pencil" aria-hidden="true"></i></a>
                                          <a href="javascript:void(0);" coupon_id="<?php echo $coupon->id?>" class="deleteModel btn btn-outline-dark"><i class="icon-trash" aria-hidden="true"></i></a>
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
         //   $(".deleteModel").click(function(){
         // var coupon_id = $(this).attr('coupon_id');
         //    $.ajax({
         //       url: '<?= base_url().'Adminpanel/deletecoupon'?>',
         //       type: "post",
         //       data: { "id" : coupon_id},
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

          $(document).on('click','.deleteModel',function(){
             var coupon_id = $(this).attr('coupon_id');
             swal({
                 title: "Are you sure?",
                 text: "Do you want to delete this coupon!.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                    $.ajax({
                        url: '<?= base_url().'Adminpanel/deletecoupon'?>',
                        type: "post",
                        data: { "id" : coupon_id},
                        success: function(result){
                           // swal("Good job!", result, "success");
                           location.reload();
                        }
                     });
                 }
             });
         });

            $(".editcoupon").click(function(){
         var coupon_id = $(this).attr('coupon_id');
            $.ajax({
               url: '<?= base_url().'Adminpanel/getCouponData/'?>'+coupon_id,
               type: "get",
               dataType:'json',
               success: function(result){
                 console.log(result);

              

                 let coupon_id=result.id;
                 let coupon=result.coupon;
                 let qty=result.qty;
                 let coupon_amount=result.coupon_amount;
                 
              
                 $('#coupon').val(coupon);
                 $('#coupon_id').val(coupon_id);
                 $('#qty').val(qty);
                 $('#coupon_amount').val(coupon_amount);
              
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