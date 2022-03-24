<!doctype html>
<html lang="zxx">
    <head>
    	<?php include("include/head.php")?>	
    	<style>
    	    .home-benaer-main .b-image img {
                height: 300px;
                min-height: 300px;
            }
    	</style>
    </head>
    <body class="main-all-page my_account"> 
    	<?php include("include/header.php")?>
        <section class="home-benaer-main" style="height: 300px;background-image: url(<?= base_url()?>assets/user/img/banner-im.png);">
            <div class="b-image">
                <img src="<?= base_url()?>assets/user/img/banner-im.png" alt="">
            </div>
            <div class="content">
                <div class="box-main">
                   <div class="box">
                        <div class="name-box">
                            <h3 class="teg-n">My Account</h3>
                        </div>
                   </div>
                </div>
            </div>
        </section>
       <section class="acount-section">
        <div class="lofin-form-box ">
            <div class="main-box-login">
                <!--<div class="remove-cl-but"><i class="fa fa-times" aria-hidden="true"></i></div>-->
                <div class="pop-up-box-m">
                    <div class="left-m29">
                        <div class="image">
                            <img src="<?= base_url()?>assets/user/img/pavan.png" alt="">
                        </div>
                        <div class="content">
                            <h5><?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; }?></h5>
                            <p><?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?></p>
                            <h6>Snaprides Credits: 0</h6>   
                        </div>
                        <div class="box-links">
                            <ul class="nav pop-up-menu">
                                <li><a class="active" data-toggle="tab" href="#booking1"><span> Booking History</span></a></li>
                                <li><a data-toggle="tab" href="#booking2"><span>Your Profile</span></a></li>
                                <li><a data-toggle="tab" href="#change-password"><span>Change Password</span></a></li>
                                <li><a  href="<?=base_url()?>User/logout"><span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="right-m29">
                        <div class="tab-content">
                            <div id="booking1" class="tab-pane active " role="tabpanel">
                                <div class="main-box-content">
                                    <div class="box-top-hadinf-in">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped mb-0" >
                                                <thead>
                                                    <tr>
                                                        <th>S.NO</th>
                                                        <th>Image</th>
                                                        <th>Model Name</th>
                                                        <th>User Name</th>
                                                        <th>From Date</th>
                                                        <th>To Date</th>
                                                        <th>Deposit</th>
                                                        <!-- <th>Pricing</th> -->
                                                        <th>Coupon Code</th>
                                                        <th>Coupon Amount</th>
                                                        <th>Total Amount</th>
                                                        <th>Status</th>
                                                        <!--<th>Action</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $order_data = "";
                                                    if(isset($_SESSION['user_id']))
                                                    {
                                                        $order_data = $this->db->select('booking_order.*, user.name')->from('booking_order')
                                                        ->join('user', 'user.id = booking_order.user_id')->where('user_id', $_SESSION['user_id'])->get()->result();
                                                    }
                                                    if(!empty($order_data)) { $s_no=1; foreach ($order_data as $order) {?>
                                                        <tr>
                                                            <td><?=$s_no?></td>
                                                            <td><img style="width:80px; height:80px" src="<?= base_url().'/'.$order->image_url?>" alt=""></td>
                                                            <td><?=$order->model_name?></td>
                                                            <td><?=$order->name?></td>
                                                            <td><?=$order->from_date?></td>
                                                            <td><?=$order->to_date?></td>
                                                            <td><?=$order->refundtable_deposit?></td>
                                                            <!-- <td><?=$order->pricing?></td> -->
                                                            <td><?=$order->coupon_code?></td>
                                                            <td><?=$order->coupon_Amt?></td>
                                                            <td><?=$order->total_amount?></td>
                                                            <td><?php if($order->status == 1) { echo "Placed"; } else {echo "Pending";} ?></td>
                                                            <!--<td>-->
                                                                <!-- <a href="javascript:void(0);" class="btn btn-outline-dark"><i class="icon-pencil" aria-hidden="true"></i></a> -->
                                                            <!--    <a href="javascript:void(0);" class="btn btn-outline-dark"><i class="icon-trash" aria-hidden="true"></i></a>-->
                                                            <!--</td>-->
                                                        </tr>                                
                                                    <?php  $s_no++; } } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="booking2" class="tab-pane" role="tabpanel">
                                <?php 
                                if(isset($_SESSION['user_id'])){
                                    $userData = $this->db->select('*')->from('user')->where('id', $_SESSION['user_id'])->get()->row();
                                ?>
                                <form>
                                    <div class="main-box-content">
                                        <div class="box-top-hadinf">
                                            <h4 class="name">Edit Account</h4>
                                            <div class="fo-grop">
                                                <input type="text" name="name" class="input-control active" idd="f-name" placeholder="Name" value="<?=$userData->name?>">
                                            </div>
                                            <!-- <div class="fo-grop">
                                                <input type="text" name="l-name" class="input-control active" idd="l-name" placeholder="Last Name" value="Vishwakarma">
                                            </div>                                     -->
                                            <div class="fo-grop">
                                                <input type="email" name="email" class="input-control active" idd="email" placeholder="email" value="<?=$userData->email?>">
                                            </div>
                                            <div class="fo-grop">
                                                <input type="tel" name="contact_no" class="input-control number-f active" idd="mobile" placeholder="Mobile" value="<?=$userData->contact_no?>">
                                            </div>
                                            <div class="fo-grop text-aria">
                                                <textarea name="address" idd="address" class="input-control active" placeholder="Enter Address"  rows="4" ><?=$userData->address?></textarea>
                                            </div>
                                            <div class="button-page j">
                                                <button type="button" id="profileUpdate" class="btn-theme">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                              <?php }?>      
                            </div>
                            <div id="change-password" class="tab-pane" role="tabpanel">
                                <form  class="password-form">
                                    <div class="main-box-content">
                                            <span style="color:green;" id="successMess"></span>
                                        <div class="box-top-hadinf">
                                            <h4 class="name">Change Password</h4>
                                            <div class="fo-grop">
                                                <input type="password" id="old_password" name="old_password" class="input-control number-f " idd="old-password" placeholder="Old Password" value=""><br>
                                                <span class="olpass"></span>
                                            </div>
                                            <div class="fo-grop">
                                                <input type="password" id="new_password" name="new_password" class="input-control number-f " idd="new-password" placeholder="New Password" value=""><br>
                                                <span class="newpass"></span>
                                            </div>                                    
                                            <div class="fo-grop">
                                                <input type="password" id="confirm_password" name="confirm_password" class="input-control number-f " idd="confirm-password" placeholder="Confirm Password" value=""><br>
                                                <span class="conpass"></span>
                                            </div>
                                          
                                        </div>  <div class="button-page">
                                                <span></span>
                                                <button type="button" id="passwordUpdate" class="btn-theme">Submit</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
       </section>
       
	    <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
       
    </body>
</html>