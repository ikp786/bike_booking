<!doctype html>
<html lang="zxx">
    <head>
    	<?php include("include/head.php")?>
    	<style>
    	    .home-benaer-main .b-image img {
                height: 300px;
                min-height: 300px;
            }
            @media only screen and (max-width: 767px){
                .home-benaer-main {
                    height: 300px;
                }
            }
            @media only screen and (max-width: 1150px){
                .home-benaer-main {
                     height: 300px;
            }
            }

    	</style>
    </head>
    <body class="main-all-page  safety-page"> 
    	<?php include("include/header.php")?>
        <section class="home-benaer-main" style="background-image: url(<?= base_url()?>assets/user/img/banner-im.png);">
            <div class="b-image">
                <img src="<?= base_url()?>assets/user/img/banner-im.png" alt="">
            </div>
            <div class="content">
                <div class="box-main">
                   <div class="box">
                        <div class="name-box">
                            <h3 class="teg-n" style="font-size:36px !important;">Contact Us</h3>
                        </div>
                        
                   </div>
                </div>
            </div>
        </section>
        
        <section class="detail-section">
          <div class="container">
              <div class="main-box">
              <div class="wrapper">
                 <div class="box-1">
                    <a href="javascript:void(0);" class="">
                       <div class="body">
                          <img src="assets/user/img/location1-1.png" alt="">
                          <h4 class="name">Address</h4>
                          <p>G-56, opposite Vijay Nagar Sweet House, Indore,  Indore 110016</p>
                       </div>
                    </a>
                 </div>
                 <div class="box-1">
                    <a href="javascript:void(0):" class="">
                       <div class="body">
                          <img src="assets/user/img/email.png" alt="">
                          <h4 class="name">Email</h4>
                          <ul>
                             <li>snaprider@gmail.com
                             </li>
                          </ul>
                       </div>
                    </a>
                 </div>
                 <div class="box-1">
                    <a href="javascript:void(0):" class="">
                       <div class="body">
                          <img src="assets/user/img/phone.png" alt="">
                          <h4 class="name">Phone</h4>
                          <ul>
                             <li>+91 8888777777
                              </li>
                          </ul>
                       </div>
                    </a>
                 </div>
              </div>
              </div>
          </div>
      </section>
      <section class="contact-section-form">
         <div class="main-box">
            <div class="wrapper">
                 <div class="right-box">
                  <div class="form">
                        <div class="hd-name">
                           <span>Reach Us</span>
                        </div>
                        <?php
                           if($this->session->flashdata('success_msg')) {
                              echo $this->session->flashdata('success_msg');
                           }
                        ?>
                        <form action="<?=base_url()?>User/addContactUs" id="contactus_form" method="post">
                           <div class="wrapper">
                              <div class="col-md-6 form-group">
                                 <input class="form-control"  type="text" name="first_name" placeholder="First Name" id="first_name" name="first_name" required>
                              </div>
                              <div class="col-md-6 form-group">
                                 <input class="form-control"  type="text" name="last_name" placeholder="Last Name" id="last_name" name="last_name">
                              </div>
                           </div>
                           <div class="form-group">
                              <input class="form-control"  type="email" name="email" placeholder="Your Email" id="email" name="email" required>
                           </div>
                           <div class="form-group">
                              <input class="form-control" onkeypress="return validateNumber(event)"  type="text" maxlength="10" name="phone_number" placeholder="Contact Number" id="phone" name="phone" required>
                           </div>
                           <div class="form-group">
                              <textarea class="form-control" name="message" placeholder="Type Your Message Here !" rows="" id="message" name="message" required></textarea>
                           </div>
                           <div class="form-group mt-4">
                              <button type="submit" class="btn-theme-login">Submit</button>
                           </div>
                        </form>
                  </div>
               </div>
               <div class="left-box">
                  <div class="img">
                     <img src="<?= base_url()?>assets/user/img/cn.png" alt="">
                  </div>
               </div>
            </div>
         </div>
      </section>
       
	    <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
        <script src="<?= base_url()?>assets/user/js/product.js"></script>
        <script type="text/javascript">
           function validateNumber(e) {
   const pattern = /^[0-9]$/;
   return pattern.test(e.key )
}
        </script>
    </body>
</html>