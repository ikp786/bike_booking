<!doctype html>
<html lang="zxx">
    <head>
    	<?php include("include/head.php")?>
    	<style>
    	    .home-benaer-main .b-image img {
                height: 300px;
                min-height: 300px;
            }
            @media only screen and (max-width: 780px){
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
                            <h3 class="teg-n">About Us</h3>
                        </div>
                        
                   </div>
                </div>
            </div>
        </section>
        
        <section class="index-section-5">
            <div class="container">
                <!--<div class="section-name">-->
                <!--    <h3 class="title-name">How Snaprides is ensuring safety for <br> everyone</h3>-->
                    
                <!--</div>-->
                <div class="box-in-services">
                        <ul class="sub-ul">
                            <li class="sub-list" id="mobile-page-1">
                                <div class="services-ing">
                                    <img src="<?=base_url()?><?=$aboutus_data->image_one?>" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                           <?=$aboutus_data->description_one?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sub-list" id="mobile-page-2">
                                <div class="services-ing">
                                    <img src="<?=base_url()?><?=$aboutus_data->image_two?>" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                            <?=$aboutus_data->description_two?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sub-list" id="mobile-page-3">
                                <div class="services-ing">
                                    <img src="<?= base_url()?><?=$aboutus_data->image_three?>" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                             <?=$aboutus_data->description_three?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sub-list" id="mobile-page-4">
                                <div class="services-ing">
                                    <img src="<?= base_url()?><?=$aboutus_data->image_four?>" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                            <?=$aboutus_data->description_four?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
            </div>
        </section>
       
	    <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
        <script src="<?= base_url()?>assets/user/js/product.js"></script>

    </body>
</html>