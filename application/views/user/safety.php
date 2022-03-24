<!doctype html>
<html lang="zxx">
    <head>
    	<?php include("include/head.php")?>
    	<style>
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
                            <h3 class="teg-n">VHOW Snaprides IS ENSURING YOU GET COVID-19 SAFE TWO-WHEELERS</h3>
                        </div>
                        
                   </div>
                </div>
            </div>
        </section>
        <section class="index-section-5">
            <div class="container">
                <div class="section-name">
                    <h3 class="title-name">Advantages for using two wheeler for <br> safety and health</h3>
                    <div class="disc">
                        <p>With safety being the top priority for every individual, it gets riskier to use public transport at the moment with so many concerns regarding the hygiene and safety of such transportation. At the same time social distancing is becoming our number one practise which makes it even more difficult to use any kind of transport. Two wheelers being the most safest for commuting at this point, Snaprides Bikes is taking every measure to make two wheelers available to the public in a safe manner.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="index-section-5">
            <div class="container">
                <div class="section-name">
                    <h3 class="title-name">How Snaprides is ensuring safety for <br> everyone</h3>
                    
                </div>
                <div class="box-in-services">
                        <ul class="sub-ul">
                            <li class="sub-list" id="mobile-page-1">
                                <div class="services-ing">
                                    <img src="<?= base_url()?>assets/user/img/safety1.png" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                            <h4>Daily temperature checks for the team.</h4>
                                            <p>Operating at minimum capacity to ensure effective social distancing. Our on-ground team is regularly screened for any signs or symptoms of illness, only then are they allowed to continue working. They are provided with all the safety standards and follow all safety procedures.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sub-list" id="mobile-page-2">
                                <div class="services-ing">
                                    <img src="<?= base_url()?>assets/user/img/safety2.png" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                            <h4>All teams using masks at all times.</h4>
                                            <p>With Social distancing being the most, important thing at this moment, we provide our on-ground team with all the safety requirements. All the members are provided with masks to be worn at all times.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sub-list" id="mobile-page-3">
                                <div class="services-ing">
                                    <img src="<?= base_url()?>assets/user/img/safety3.png" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                            <h4>Stations are being sanitized daily.</h4>
                                            <p>Snaprides Stations are sanitized daily, our team makes sure that the station is safe for customers to visit, at the same time the bikes at the station are sanitized daily.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="sub-list" id="mobile-page-4">
                                <div class="services-ing">
                                    <img src="<?= base_url()?>assets/user/img/safety4.png" alt="">
                                </div>
                                <div class="subs-heading">
                                    <div class="c-box">
                                        <div class="sectin_ab">
                                            <h4>Aarogya Setu app used by all teams.</h4>
                                            <p>Our employees follow all the safety procedures to give the best experience to the customers, every employee uses the Aarogya Setu app to stay updated with the latest information.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
            </div>
        </section>
        <section class="index-section-1">
            <div class="container">
                <div class="section-name">
                    <h3 class="title-name">Steps our on-ground team is taking <br> to ensure safety.</h3>
                    
                </div>
                <div class="content">
                    <?php for($i=1; $i<5; $i++) { ?>
                        <div class="single-service-wrap">
                            <div class="service-single">
                                <div class="service-img-blk">
                                    <div class="image color-<?= $i ?>">
                                        <img src="<?= base_url()?>assets/user/img/safety-a<?= $i ?>.png" alt="">
                                    </div>
                                </div>
                                <div class="service-content-blk">
                                    <h5>
                                        <?php 
                                        switch ($i) {
                                            case "1":
                                                echo "Daily temperature checks for the entire team";
                                                break;
                                            case "2":
                                                echo "All teams using masks at all times.";
                                                break; 
                                            case "3":
                                                echo "Aarogya Setu app used by all teams.";
                                                break;
                                            case "4":
                                                echo "Stations are being sanitized daily.";
                                                break;
                                            }
                                        ?>
                                    </h5>
                                    <p>
                                    <?php 
                                        switch ($i) {
                                            case "1":
                                                echo "Our on-ground team is regularly screened for any signs or symptoms of illness, only then are they allowed to continue operations.";
                                                break;
                                            case "2":
                                                echo "With social distancing being imperative, Snaprides provides the on-ground team with masks. The teams are directed to wear the masks at all times.";
                                                break; 
                                            case "3":
                                                echo "Our on-ground team is regularly screened for any signs or symptoms of illness, only then are they allowed to continue operations.";
                                                break;
                                            case "4":
                                                echo "Snaprides Stations are being sanitized with disinfectant daily, our team makes sure that the station is safe for customers to visit at all times.";
                                                break;
                                            }
                                        ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section>
        <section class="safety-section-2">
            <div class="container">
                <div class="safety-main-box2">
                    <div class="section-name">
                        <h3 class="title-name">Benefits of choosing Snaprides</h3>
                    </div>
                    <div class="knowledge-box">
                        <ul class="main-box1">
                            <li class="list">
                                <div class="x-pas">
                                    <div class="image">
                                        <img src="<?= base_url()?>assets/user/img/safety-a0.png" alt="">
                                    </div>
                                    <h5>Learn about Snaprides 5</h5>
                                    <p>What is Snaprides Bikes? What are the benefits of using Snaprides? What are the bike options available? Where is Snaprides currently operational? Our Usage Policy</p>
                                </div>
                            </li>
                            <li class="list">
                                <div class="x-pas">
                                    <div class="image">
                                        <img src="<?= base_url()?>assets/user/img/safety-a0.png" alt="">
                                    </div>
                                    <h5>Getting Started 5</h5>
                                    <p>What is Snaprides Bikes? What are the benefits of using Snaprides? What are the bike options available? Where is Snaprides currently operational? Our Usage Policy</p>
                                </div>
                            </li>
                            <li class="list">
                                <div class="x-pas">
                                    <div class="image">
                                        <img src="<?= base_url()?>assets/user/img/safety-a0.png" alt="">
                                    </div>
                                    <h5>Plans & Promotions 8</h5>
                                    <p>What is Snaprides Bikes? What are the benefits of using Snaprides? What are the bike options available? Where is Snaprides currently operational? Our Usage Policy</p>
                                </div>
                            </li>
                            <li class="list">
                                <div class="x-pas">
                                    <div class="image">
                                        <img src="<?= base_url()?>assets/user/img/safety-a0.png" alt="">
                                    </div>
                                    <h5>Booking your Ride 9</h5>
                                    <p>What is Snaprides Bikes? What are the benefits of using Snaprides? What are the bike options available? Where is Snaprides currently operational? Our Usage Policy</p>
                                </div>
                            </li>
                            <li class="list">
                                <div class="x-pas">
                                    <div class="image">
                                        <img src="<?= base_url()?>assets/user/img/safety-a0.png" alt="">
                                    </div>
                                    <h5>Payments, Cancellation and Refund</h5>
                                    <p>What is Snaprides Bikes? What are the benefits of using Snaprides? What are the bike options available? Where is Snaprides currently operational? Our Usage Policy</p>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
       
	    <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
        <script src="<?= base_url()?>assets/user/js/product.js"></script>

    </body>
</html>