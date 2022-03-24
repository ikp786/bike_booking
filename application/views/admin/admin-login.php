<!doctype html>
<html lang="en">
   <head>
      <?php $this->load->view('admin/include/head');?>
     
   </head>
   <body class="theme-orange addquery">
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
      <div id="wrapper">
         <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
               <div class="auth-box">
                  
                     <div class="card login-a-header" >
                        <div class="header">
                        <img src="<?= base_url()?>assets/user/img/logo.png" alt="Snaprides">
                     </div>
                     <div class="body">
                           <?php if(!empty($error_data)) {?>
                              <span style="color:red"><?=$error_data?></span>
                           <?php }?>
                           <form action="<?=base_url()?>Adminpanel/checkAdminLogin" method="post">
                              <div class="form-group">
                                 <label for="signin-email" class="control-label sr-only">Email</label>
                                 <input type="email" class="form-control" id="signin-email" name="email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                 <label for="signin-password" class="control-label sr-only">Password</label>
                                 <input type="password" class="form-control" id="signin-password"  name="password" placeholder="Password">
                              </div>
                              <div class="form-group clearfix">
                                 <label class="fancy-checkbox element-left">
                                       <input type="checkbox">
                                       <span>Remember me</span>
                                 </label>								
                              </div>
                              <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                           </form>
                     </div>
                  </div>
				</div>
			</div>
		</div>
      </div>

      <?php $this->load->view('admin/include/foot');?>
   </body>
</html>