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
      <!-- <div class="page-loader-wrapper">
         <div class="loader">
            <p>Please wait...</p>
            <div class="m-t-30">
               <img src="<?= base_url()?>/assets/user/img/logo.png"  alt="Snaprides">
            </div>
         </div>
      </div> -->
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
                        <li class="breadcrumb-item">Inventory Management</li>
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
                        <a class="btn btn-primary m-b-15 float-right" href="<?= base_url()?>crate-inventory-management"> Add Inventory Management</a>
                        
                        <div class="table-responsive">
                           <table class="table table-hover js-basic-example dataTable table-custom">
                              <thead class="thead-dark">
                                 <tr>
                                    <th>S.NO</th>
                                    <th>Image</th>
                                    <th>User Name</th>
                                    <th>City</th>
                                    <th>Branch</th>
                                    <th>Manufacturer</th>
                                    <th>Type</th>
                                    <th>Model</th>
                                    <th>Deposit Amount</th>
                                    <th>Start Reading</th>
                                    <th>End Reading</th>
                                    <th>Price</th>
                                    <th>Access Price</th>
                                    <th>Access Hours/Days</th>
                                    <th>Damage Price</th>
                                    <th>Final Price</th>
                                    <th>Note</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php if(!empty($inventory)) { $s_no=1; foreach ($inventory as $row) {?>
                                    <tr class="gradeA">
                                    <td><?= $s_no?></td>
                                    <td>
                                       <?php if($row['image']){ ?>
                                       <img height="50px" width="50px" src="<?php echo base_url('assets/admin/inventory/'.$row['image']); ?>">
                                       <?php }?></td>
                                    <td><?= $row['user_name'];?></td>
                                    <td><?= $row['city'];?></td>
                                    <td><?= $row['branch'];?></td>
                                    <td><?= $row['manufacturer'];?></td>
                                    <td><?= $row['type'];?></td>
                                    <td><?= $row['model'];?></td>
                                    <td><?= $row['deposit_amount'];?></td>
                                    <td>
                                        <?php if($row['start_reading']){ ?>
                                       <img height="50px" width="50px" src="<?php echo base_url('assets/admin/inventory/'.$row['start_reading']); ?>">
                                       <?php }?>
                                    </td>
                                    <td>
                                       <?php if($row['end_reading']){ ?>
                                       <img height="50px" width="50px" src="<?php echo base_url('assets/admin/inventory/'.$row['end_reading']); ?>">
                                       <?php }?></td>
                                    <td><?= $row['price'];?></td>
                                    <td><?= $row['access_price'];?></td>
                                    <td><?= $row['access_hours'];?></td>
                                    <td><?= $row['damage_price'];?></td>
                                    <td><?= $row['final_price'];?></td>
                                    <td><?= $row['remark'];?></td>
                                    <td><?= date("F j, Y, g:i a", strtotime($row['create_date'])) ;?></td>
                                    <td>
                                       <a href="<?php echo base_url('Adminpanel/update_inventory/').$row['id']?>" class="btn btn-outline-dark"><i class="icon-pencil" aria-hidden="true"></i></a>
                                       <a onclick="confirmation(event)" href="<?php echo base_url('Adminpanel/delete_inventory/').$row['id']?>" class="btn btn-outline-dark"><i class="icon-trash" aria-hidden="true"></i></a>
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
        function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); 
        swal({
            title: "Are you sure?",
            text: "Do you want to delete this inventory!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
    }
      </script>
   </body>
</html>