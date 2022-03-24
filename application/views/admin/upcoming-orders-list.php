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
                           <li class="breadcrumb-item">Orders</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- <div class="row clearfix">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="body form-aj">
                       <form action="<?= base_url()?>Adminpanel/addCoupon" method="post" enctype="multipart/form-data">
                              <div class="min-box-row">
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Coupon</label>
                                       <input type="text" id="coupon" name="coupon" class="form-control" required="">
                                    </div>
                                 </div>
                                
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Quantity</label>
                                       <input type="text" id="qty" name="qty" class="form-control" required="">
                                    </div>
                                 </div>
                                 <div class="min-box">
                                    <div class="form-group">
                                       <label>Coupon Amount</label>
                                       <input type="number" id="coupon_amount" name="coupon_amount" class="form-control" required="">
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
            </div> -->
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
                                       <th>Image</th>
                                       <th>Model Name</th>
                                       <th>User Name</th>
                                       <th>From Date</th>
                                       <th>To Date</th>
                                       <th>Deposit</th>
                                       <th>Pricing</th>
                                       <th>Coupon Code</th>
                                       <th>Coupon Amount</th>
                                       <th>Extra Helmet</th>
                                       <th>Total Amount</th>
                                       <th>Final Amount</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php if(!empty($order_data)) { $s_no=1; foreach ($order_data as $order) {?>
                                    <tr class="gradeA">
                                       <td><?=$s_no?></td>
                                       <td><img style="width:80px; height:80px" src="<?= base_url().'/'.$order->image_url?>" alt=""></td>
                                       <td><?=$order->model_name?></td>
                                       <td><?=$order->name?></td>
                                       <td><?=$order->from_date?></td>
                                       <td><?=$order->to_date?></td>
                                       <td><?=$order->refundtable_deposit?></td>
                                       <td><?=$order->pricing?></td>
                                       <td><?=$order->coupon_code?></td>
                                       <td><?=$order->coupon_Amt?></td>
                                       <td><?php 
                                       if($order->extaHelmet == '1')
                                         {
                                          echo "Yes";
                                         } 

                                    ?></td>

                                       <td><?=$order->total_amount?></td>
                                       <td><?php 
                                       if($order->extaHelmet == '1')
                                       {
                                             echo $order->total_amount + 50;
                                       }
                                       else
                                       {
                                          echo $order->total_amount ;
                                       }   
                                       ?></td>
                                       <td><?php if($order->status == 1) { echo "Placed"; } else {echo "Pending";} ?></td>
                                       <td>
                                          
                                          <?php if($order->book_status == 1){?>
                                          <button type="button" freebike_id="<?=$order->model_at_branch_id?>" orde_id="<?=$order->id?>" class="btn btn-danger freebike">Free Bike</button>
                                          <?php }else{?>
                                             <span class="badge badge-success">Released Bike</span>
                                              <!-- <button type="button" class="btn btn-danger">Released Bike</button> -->
                                          <?php }?>
                                          <!-- <a href="javascript:void(0);" class="btn btn-outline-dark"><i class="icon-pencil" aria-hidden="true"></i></a> -->
                                          <!-- <a href="javascript:void(0);" class="btn btn-outline-dark"><i class="icon-trash" aria-hidden="true"></i></a> -->
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
      <script>
      $(".freebike").click(function(){
         var id = $(this).attr("freebike_id");
         var orderid = $(this).attr("orde_id");
         $.ajax({
            url: "<?= base_url()?>Adminpanel/freeBike", 
            data: {id:id, orderid:orderid},
            type: 'POST',
            success: function(data){
               location.reload();
               alert(data);
            }
         });
      });
      </script>
   </body>
</html>