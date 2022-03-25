<!doctype html>
<html lang="zxx">

<head>
    <?php include("include/head.php") ?>
    <style>
        @media only screen and (max-width: 460px) {
            .home-benaer-main {
                height: 700px;
            }
        }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff !important;
        background-color: #fe9100 !important;
    }

    .nav-pills .nav-link {
        border-radius: 0.25rem;
        background: #020202;
        color: #fff;
    }
</style>

<body class="main-all-page home">
    <?php include("include/header.php") ?>
    <section class="home-benaer-main" style="background-image: url(<?= base_url() ?>assets/user/img/benner.png);">
        <div class="b-image">
            <img src="<?= base_url() ?>assets/user/img/benner.png" alt="">
        </div>
        <div class="content">
            <div class="box-main pb-4">
                <div class="box">
                    <div class="name-box">
                        <h1 class="teg-n">Rent Today Own Tomorrow</h1>
                        <p>NOW STARS AT ₹ 8/hOUR</p>
                    </div>
                    <div class="form-box">
                        <form action="<?= base_url() ?>User/product" method="post" autocomplete="off">
                            <div class="input-box">
                                <div class="form-group">
                                    <select name="city_id" id="city_id" required=''>
                                        <!-- <option value="0">Select city</option> -->
                                        <option value="">Select City</option>
                                        <?php if (!empty($city_data)) {
                                            foreach ($city_data as $city) { ?>
                                                <option value="<?= $city->id ?>"><?= $city->city_name ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="booked_type_id" id="booked_type_id" required>
                                        <option value="4">HOURLY</option>
                                        <option value="1">DAILY</option>
                                        <option value="2">WEEKLY</option>
                                        <option value="3">MONTHLY</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <input type='datetime-local' class="form-control" name="from_date" id="from_date" required/> -->
                                    <input type="text" id="datetimepicker1" class="form-control" name="from_date" placeholder="dd-mm-yyyy AM/PM" required />
                                </div>
                                <div class="form-group">
                                    <!-- <input type='datetime-local' class="form-control" name="to_date" id="to_date" required/> -->
                                    <input type="text" id="datetimepicker2" class="form-control" name="to_date" placeholder="dd-mm-yyyy AM/PM" required />
                                </div>
                                <button id="RideNow" type="submit" class="btn-theme">RIDE NOW</button>
                            </div>
                        </form>
                        <!-- <div class="loinks-box">
                                <a href="javascript:void(0);"><img src="assets/user/img/google.png" alt=""></a>
                                <a href="javascript:void(0);"><img src="assets/user/img/app.png" alt=""></a>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="index-section-1">
        <div class="container">
            <div class="section-name">
                <h3 class="title-name">Why Snapriders Credits?</h3>
                <div class="disc">
                    <p>We simplified bike rentals, so you can focus on what's important to you.</p>
                </div>
            </div>


<div class="row">
    <div class="col-12 col-md-5 mb-3">
        <img src="assets\user\img/bbb.png" class="w-100" alt="img">
    </div>
    <div class="col-12 col-md-7">
    <div class="row">
                <?php for ($i = 1; $i < 5; $i++) { ?>
                    <div class="single-service-wrap col-12 col-md-6  mb-4">
                        <div class="service-single" style="border-radius: 0px 50px 0px 50px !important;">
                            <div class="service-img-blk">
                                <img class="w-100" src="<?= base_url() ?>assets/user/img/snapriders-credits<?= $i ?>.png" alt="">
                            </div>
                            <div class="service-content-blk">
                                <h5 class="mb-1">
                                    <?php
                                    switch ($i) {
                                        case "1":
                                            echo "Safe Rides";
                                            break;
                                        case "2":
                                            echo "Flexible Ownership";
                                            break;
                                        case "3":
                                            echo "Smarter Mobility";
                                            break;
                                        case "4":
                                            echo "Snaprides Stations";
                                            break;
                                    }
                                    ?>
                                </h5>
                                <p class="mb-0">
                                    Your safety is our priority. From sanitizing all bikes before every use, to extensive on-ground safety measures, your rides with Snaprides will always be safe and reliable. We also offer helmets on-demand.
                                </p>
                                <!-- <a href="javascript:void(0);">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </div>
</div>
            



        </div>
    </section>
    <section id="appdown" class="py-5  text-center mt-5 " data-aos="fade-up" style="background-image: linear-gradient(102deg, black, #a59e9e00),url(http://snaprides.co.in/sandy/assets/user/img/bikee.jpg);display: flex;
    align-items: center;background-position:center;background-size:100% auto; height:300px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 ">
                <h3 class="apphead text-warning">
                    Download Snaprides App Now !
                </h3>
                <p class="greyp text-white f1_1rem mb-4 mb-md-0 ">
                    Download the App and Experience the Ride. Explore the diverse range of rides in India. 
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center ">
                <div class="text-center">
                    <a href="#"><img src="http://snaprides.co.in/sandy/assets/user/img/playstore.png" alt="image" class="img-fluid mr-0 mr-sm-4 mb-4 mb-sm-0" style="height: 80px;"></a>
                    <a href="#"><img src="http://snaprides.co.in/sandy/assets/user/img/appstore.png" alt="image" class="img-fluid" style=" height: 80px;"></a>
                </div>
            </div>
        </div>
        
    </div>
</section>
    <section class="index-section-5">
        <div class="container">
            <div class="section-name">
                <h3 class="title-name mt-5">Popular Bikes for Rent</h3>
                <div class="disc">
                    <p>Our complete press coverage.</p>
                </div>
            </div>
            <div class="content-box">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-new-bikes-tab" data-toggle="pill" href="#pills-new-bikes" role="tab" aria-controls="pills-new-bikes" aria-selected="true">New Bikes</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" id="pills-light-weight-bikes-tab" data-toggle="pill" href="#pills-light-weight-bikes" role="tab" aria-controls="pills-light-weight-bikes" aria-selected="false">Light Weight Bikes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-heavy-bikes-tab" data-toggle="pill" href="#pills-heavy-bikes" role="tab" aria-controls="pills-heavy-bikes" aria-selected="false">Heavy Bikes</a>
                    </li>
                </ul>
                <div class="tab-content bike-catagory-list" id="pills-tabContent">
				
				
				<div class="tab-pane fade show active" id="pills-new-bikes" role="tabpanel" aria-labelledby="pills-new-bikes-tab">
                        <div class="d-flex row">
                            <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-new-bikes-bajaj-avenger-tab" data-toggle="pill" href="#v-pills-new-bikes-bajaj-avenger" role="tab" aria-controls="v-pills-new-bikes-bajaj-avenger" aria-selected="true">Avenger</a>
                                <a class="nav-link" id="v-pills-new-honda-shine-tab" data-toggle="pill" href="#v-pills-new-honda-shine" role="tab" aria-controls="v-pills-new-honda-shine" aria-selected="false">Shine</a>
                                <a class="nav-link" id="v-pills-new-jupiter-tab" data-toggle="pill" href="#v-pills-new-jupiter" role="tab" aria-controls="v-pills-new-jupiter" aria-selected="false">jupiter</a>
                            </div>
                            <div class="tab-content col-10" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-new-bikes-bajaj-avenger" role="tabpanel" aria-labelledby="v-pills-new-bikes-bajaj-avenger-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day 000000000</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-new-honda-shine" role="tabpanel" aria-labelledby="v-pills-new-honda-shine-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day 111111111</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span> <img src="assets\user\img\check.png" alt=""> </span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span> <img src="assets\user\img\check.png" alt=""> </span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-new-jupiter" role="tabpanel" aria-labelledby="v-pills-new-jupiter-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day 2222222222222</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
				
				
				
                    
                    <div class="tab-pane fade" id="pills-light-weight-bikes" role="tabpanel" aria-labelledby="pills-light-weight-bikes-tab">
                        <div class="d-flex row">
                            <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-new-bikes-bajaj-150-tab" data-toggle="pill" href="#v-pills-new-bikes-bajaj-150" role="tab" aria-controls="v-pills-new-bikes-bajaj-150" aria-selected="true">Bajaj Pulsur 150</a>
                                <a class="nav-link" id="v-pills-new-honda-activa-tab" data-toggle="pill" href="#v-pills-new-honda-activa" role="tab" aria-controls="v-pills-new-honda-activa" aria-selected="false">Honda Activa</a>
                                <a class="nav-link" id="v-pills-new-hero-pro-tab" data-toggle="pill" href="#v-pills-new-hero-pro" role="tab" aria-controls="v-pills-new-hero-pro" aria-selected="false">Hero Splendor PRO</a>
                            </div>
                            <div class="tab-content col-10" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-new-bikes-bajaj-150" role="tabpanel" aria-labelledby="v-pills-new-bikes-bajaj-150-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day5555555</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-new-honda-activa" role="tabpanel" aria-labelledby="v-pills-new-bikes-honda-activa">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day ggggggggggg</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span> <img src="assets\user\img\check.png" alt=""> </span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span> <img src="assets\user\img\check.png" alt=""> </span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-new-hero-pro" role="tabpanel" aria-labelledby="v-pills-new-her-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day kkkkkkkkkkkkkkkkkkkkkkk</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="http://snaprides.co.in/sandy/assets/admin/images/branch/3.jpg" alt="img">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
					
					
					
					
					<div class="tab-pane fade" id="pills-heavy-bikes" role="tabpanel" aria-labelledby="pills-heavy-bikes-tab">
                        <div class="d-flex row">
                            <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-new-bikes-avenger-220-tab" data-toggle="pill" href="#v-pills-new-bikes-avenger-220" role="tab" aria-controls="v-pills-new-bikes-avenger-220" aria-selected="true">Bajaj Pulsur 150 777</a>
                                <a class="nav-link" id="v-pills-new-bikes-profile-tab" data-toggle="pill" href="#v-pills-new-bikes-profile" role="tab" aria-controls="v-pills-new-bikes-profile" aria-selected="false">Honda Activa 8888</a>
                                <a class="nav-link" id="v-pills-new-bikes-messages-tab" data-toggle="pill" href="#v-pills-new-bikes-messages" role="tab" aria-controls="v-pills-new-bikes-messages" aria-selected="false">Hero Splendor PRO 2222</a>
                            </div>
                            <div class="tab-content col-10" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-new-bikes-avenger-220" role="tabpanel" aria-labelledby="v-pills-new-bikes-avenger-220-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day ))))))))</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="http://snaprides.co.in/sandy/assets/admin/images/branch/3.jpg" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-new-bikes-profile" role="tabpanel" aria-labelledby="v-pills-new-bikes-profile-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day !!!!!!!!!!!!</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span> <img src="assets\user\img\check.png" alt=""> </span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span> <img src="assets\user\img\check.png" alt=""> </span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="v-pills-new-bikes-messages" role="tabpanel" aria-labelledby="v-pills-new-bikes-messages-tab">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="description">
                                                <div class="description-price">
                                                    <h4>600 <span>₹/per a day ########</span></h4>
                                                </div>
                                                <ul class="description-list">
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Available</p>
                                                    </li>
                                                    <li>
                                                        <p><span><img src="assets\user\img\check.png" alt=""></span> Refundable Security Deposit Rs 1000 Drop off time next
                                                            day morning 9.00 AM to 9.30 AM (morning to morning 24Hrs), after
                                                            that 2nd day will be start. Penalty on being late without information
                                                            - first 2 Hrs- Rs 200, next 2 Hrs Rs 400, after that full day rent will
                                                            be charged. Ride Limit - 150 KM, after that Rs 2/KM will be charged.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <img class="w-100" src="assets\admin\images\branch\3.jpg" alt="img">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
					
					
					
                   
                </div>
            </div>
            
            </div>
        </div>
            <section class="index-section-4 mt-5">
                <div class="container">
                    <div class="section-name">
                        <h3 class="title-name">FAQs</h3>
                        <div class="disc">
                            <p>Renting a Bike should be Easy, Like our FAQs.</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="main-b">
                            <div class="left">
                                <div class="box">
                                    <h6>How do I pay?</h6>
                                    <p>You can pay online using debit/credit card or e-wallets. You can also pay at the hub station during your vehicle pick-up.</p>
                                    <hr>
                                    <h6>Where can I pick up the bike from?</h6>
                                    <p>While booking your bike, you’ll be given an option to select a pick-up location in your vicinity.</p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="box">
                                    <h6>What documents do I need to show while booking?</h6>
                                    <p>You need to show your original valid driving license and submit any one original government verified ID proof.</p>
                                    <hr>
                                    <h6>Will I be getting a complimentary helmet?</h6>
                                    <p>Due to COVID-19 pandemic, we avoid providing helmets to customers. We suggest customers to bring their own helmets.</p>
                                </div>
                            </div>
                            <div class="disc">
                                <p>If you have any more doubts, please visit our FAQ Section Our Daily Bike Renting Plan is the most affordable plan in India. Check out our Fleet and Pricing section on top for more detailed information and if you are a bike enthusiast, check out our Blog Announcing our exclusive association with StrodeBike - Smart Electric Cycles enabled with Snaprides Nucleus to provide best riding experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="index-section-2">
                <div class="container my-5">
                    <div class="section-name">
                        <h3 class="title-name">Featured On</h3>
                        <div class="disc">
                            <p>Our complete press coverage.</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="main-boxs-slider image-slider owl-theme owl-carousel">
                            <?php for ($i = 1; $i < 5; $i++) { ?>
                                <div class="box-a">
                                    <a href="javascript:void(0);">
                                        <img src="<?= base_url() ?>assets/user/img/featured<?= $i ?>.png" alt="">
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="index-section-3">
                <div class="container">
                    <div class="section-name">
                        <h3 class="title-name">Contact US</h3>
                        <div class="disc">
                            <p>Any Bike Renting Issue? Feel Free to Contact us.</p>
                        </div>
                    </div>
                    <div class="content">
                        <div class="main-b">
                            <div class="left">
                                <div class="box">
                                    <form action="">
                                        <div class="form-b">
                                            <div class="input-box">
                                                <span class="icont-b">
                                                    <img src="<?= base_url() ?>assets/user/img/svg1.png" alt="">
                                                </span>
                                                <input type="text" name="f-name" placeholder="First Name" id="">
                                            </div>
                                            <div class="input-box">
                                                <span class="icont-b">
                                                    <img src="<?= base_url() ?>assets/user/img/svg1.png" alt="">
                                                </span>
                                                <input type="text" name="f-name" placeholder="Last Name" id="">
                                            </div>
                                            <div class="input-box">
                                                <span class="icont-b">
                                                    <img src="<?= base_url() ?>assets/user/img/svg2.png" alt="">
                                                </span>
                                                <input type="email" name="f-name" placeholder="Email" id="">
                                            </div>
                                            <div class="input-box">
                                                <span class="icont-b">
                                                    <img src="<?= base_url() ?>assets/user/img/svg4.png" alt="">
                                                </span>
                                                <select name="" id="">
                                                    <option value="">Indore</option>
                                                    <option value="">Indore</option>
                                                    <option value="">Indore</option>
                                                    <option value="">Indore</option>
                                                </select>
                                            </div>
                                            <div class="input-box">
                                                <span class="icont-b">
                                                    <img src="<?= base_url() ?>assets/user/img/svg5.png" alt="">
                                                </span>
                                                <textarea name="" id="" placeholder="Message" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn-theme">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="right">
                                <div class="box">
                                    <img src="http://snaprides.co.in/sandy/assets/user/img/popular_bike.jpg" class="w-100 h-100">
                                    <!-- <div class="faq-bg">
                                <div class="faq-accordion">
                                    <ul class="accordion">
                                        <li class="accordion-item">
                                            <a class="accordion-title active" href="javascript:void(0)">
                                                <span>
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </span> Mumbai - corporate hq
                                            </a>

                                            <div class="accordion-content show">
                                                <p>Office No. 8, Floor-3, Plot-422, Nav Bhavna, Swatantrya Veer Savarkar Road, Prabhadevi Mumbai Mumbai City MH 400025 IN</p>
                                            </div>
                                        </li>
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <span>
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </span>
                                                Bengaluru
                                            </a>

                                            <div class="accordion-content">
                                                <p>Office No. 8, Floor-3, Plot-422, Nav Bhavna, Swatantrya Veer Savarkar Road, Prabhadevi Mumbai Mumbai City MH 400025 IN</p>
                                            </div>
                                        </li>
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <span>
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </span>
                                                Hyderabad
                                            </a>

                                            <div class="accordion-content">
                                                <p>Office No. 8, Floor-3, Plot-422, Nav Bhavna, Swatantrya Veer Savarkar Road, Prabhadevi Mumbai Mumbai City MH 400025 IN</p>
                                            </div>
                                        </li>
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <span>
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </span>
                                                Jaipur
                                            </a>

                                            <div class="accordion-content">
                                                <p>Office No. 8, Floor-3, Plot-422, Nav Bhavna, Swatantrya Veer Savarkar Road, Prabhadevi Mumbai Mumbai City MH 400025 IN</p>
                                            </div>
                                        </li>
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <span>
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </span>
                                                Gurugram
                                            </a>

                                            <div class="accordion-content">
                                                <p>Office No. 8, Floor-3, Plot-422, Nav Bhavna, Swatantrya Veer Savarkar Road, Prabhadevi Mumbai Mumbai City MH 400025 IN</p>
                                            </div>
                                        </li>
                                        <li class="accordion-item">
                                            <a class="accordion-title" href="javascript:void(0)">
                                                <span>
                                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </span>
                                                Mysuru
                                            </a>

                                            <div class="accordion-content">
                                                <p>Office No. 8, Floor-3, Plot-422, Nav Bhavna, Swatantrya Veer Savarkar Road, Prabhadevi Mumbai Mumbai City MH 400025 IN</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- <ul class="list-tegs">
                        <?php for ($i = 1; $i < 14; $i++) { ?>
                            <li>
                                <a href="javascript:void(0);">
                                <?php
                                switch ($i) {
                                    case "1":
                                        echo "Honda Activa for rent";
                                        break;
                                    case "2":
                                        echo "rentYamaha FZ for rent";
                                        break;
                                    case "3":
                                        echo "Yamaha FZ for rent";
                                        break;
                                    case "4":
                                        echo "Pulsar 150 for rent";
                                        break;
                                    case "5":
                                        echo "Pulsar 150 for rent";
                                        break;
                                    case "6":
                                        echo "Honda Dio for rent";
                                        break;
                                    case "7":
                                        echo "Royal Enfield 350 Classic for rent";
                                        break;
                                    case "8":
                                        echo "Avenger 220 Cruise for rent";
                                        break;
                                    case "9":
                                        echo "Dominar 400 ABS for rent ";
                                        break;
                                    case "10":
                                        echo "Bajaj CT 100 for rent";
                                        break;
                                    case "11":
                                        echo "Pulsar NS 200 for rent";
                                        break;
                                    case "12":
                                        echo "Avenger 220 Cruise for rent ";
                                        break;
                                    case "13":
                                        echo "Avenger 220 Street for rent ";
                                        break;
                                }
                                ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul> -->

    </section>
    <?php include("include/footer.php") ?>
    <?php include("include/foot.php") ?>
    <script src="<?= base_url() ?>assets/user/js/index.js"></script>
    <script>
        $(document).ready(function() {

            $('#datetimepicker1').datetimepicker({
                format: "d-m-Y H:00 a",
                minDate: 0,
                allowTimes: ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],
                //step:60
            });

            $('#datetimepicker2').change(function() {

                var bookTypeId = $('#booked_type_id').val();

                console.log($('#datetimepicker1').datetimepicker('getValue'));

                const l = new Date($('#datetimepicker1').datetimepicker('getValue'));
                const d = new Date($('#datetimepicker2').datetimepicker('getValue'));

                let hoursel = l.getHours();
                let datesel = l.getDate();

                //const d = new Date();
                let hourcur = d.getHours();
                let datecur = d.getDate();

                // if(bookTypeId == '')
                if ((hourcur == hoursel) && (datesel == datecur)) {
                    $('#datetimepicker2').val("").datetimepicker("update");
                    return swal({
                        title: "Error",
                        text: "Please select valid time",
                        icon: "error",
                        button: false,
                        timer: 3000
                    });

                    return false;
                } else if ((hourcur <= hoursel) && (l > d)) {
                    $('#datetimepicker2').val("").datetimepicker("update");
                    return swal({
                        title: "Error",
                        text: "Please select valid time",
                        icon: "error",
                        button: false,
                        timer: 3000
                    });

                    return false;
                } else if ((hourcur < hoursel) && (l == d)) {
                    $('#datetimepicker2').val("").datetimepicker("update");
                    return swal({
                        title: "Error",
                        text: "Please select valid date and time",
                        icon: "error",
                        button: false,
                        timer: 3000
                    });

                    return false;
                }
            });

            // Date Caluse
            $('#datetimepicker1').change(function() {

                const l = new Date($('#datetimepicker1').datetimepicker('getValue'));
                let hoursel = l.getHours();
                let datesel = l.getDate();

                const d = new Date();
                let hourcur = d.getHours();
                let datecur = d.getDate();

                if ((datesel == datecur) && (hourcur > hoursel)) {
                    return swal({
                        title: "Error",
                        text: "Please select valid time",
                        icon: "error",
                        button: false,
                        timer: 3000
                    });

                    return false;
                }

                var bookType = $('#booked_type_id').val();
                //console.log(bookType);
                //if(bookType === "1"){
                $('#datetimepicker2').datetimepicker({
                    format: "d-m-Y H:00 a",
                    //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                    minDate: $('#datetimepicker1').datetimepicker('getValue'),
                    allowTimes: ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],
                    // maxDate:$('#datetimepicker1').datetimepicker('getValue'),
                    //step:60
                });
                //  }else if(bookType === "2"){
                //     var mdate = new Date();
                //     var showDate = $('#datetimepicker1').datetimepicker('getValue');
                //     //var date = mdate.setDate(showDate.getDate() + 6);
                //     //console.log(date);
                //     $('#datetimepicker2').datetimepicker({
                //         format:"d-m-Y H:00 a",
                //         //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                //         //minDate:$('#datetimepicker1').datetimepicker('getValue'),
                //         allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                //         //maxDate:date,
                //         //step:15
                //     });
                // }else if(bookType === "3"){
                //     var mdate = new Date();
                //     var showDate = $('#datetimepicker1').datetimepicker('getValue');
                //     var date = mdate.setDate(showDate.getDate() + 29);
                //     $('#datetimepicker2').datetimepicker({
                //         format:"d-m-Y H:00 a",
                //         //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                //       //  minDate:$('#datetimepicker1').datetimepicker('getValue'),
                //         allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                //         //maxDate:date,
                //         //step:15
                //     });
                // }else if(bookType === "4"){
                //     $('#datetimepicker2').datetimepicker({
                //         format:"d-m-Y H:00 a",
                //         //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                //         minDate:$('#datetimepicker1').datetimepicker('getValue'),
                //         allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                //         maxDate:$('#datetimepicker1').datetimepicker('getValue'),
                //         //step:60
                //     });
                //  }
            });
        });

        $(document).on('click', '#RideNow', function() {

            var city_id = $('#city_id').val();
            //console.log(city_id);
            if (city_id == '') {
                return swal({
                    title: "Error",
                    text: "Please select City",
                    icon: "error",
                    button: false,
                    timer: 3000
                });

                return false;
            }
        });
    </script>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.full.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.min.css" rel="stylesheet" />


</html>