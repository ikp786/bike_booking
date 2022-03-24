<?php/*
echo $terms->terms_condition;
 */?>
 <!doctype html>
<html lang="zxx">
    <head>
        <?php include("include/head.php")?>
    </head>
    <body class="main-all-page home"> 
        <?php include("include/header.php")?>
        <section class="home-benaer-main" style="background-image: url(<?= base_url()?>assets/user/img/benner.png);">
            <div class="b-image">
                <img src="<?= base_url()?>assets/user/img/benner.png" alt="">
            </div>
            <div class="content">
                <div class="box-main">
                   <div class="box">
                        <div class="name-box">
                            <h1 class="teg-n">Terms And Conditions</h1>
                        </div>
                   </div>
                </div>
            </div>
        </section>
      
        <section class="index-section-4">
            <div class="container">
                <div class="section-name">
                    <h3 class="title-name">Terms And Condition</h3>
                    <div class="disc">
                        <!-- <p>Renting a Bike should be Easy, Like our FAQs.</p> -->
                    </div>
                </div>
                <div class="content">
                    <div class="main-b termscondition">
                       <!--  <div class="left">
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
                        </div> -->
                        <div class="disc termscondition">
                           <?php echo $terms->terms_condition; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
        <script src="<?= base_url()?>assets/user/js/index.js"></script>
      
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.full.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.min.css" rel="stylesheet"/>
</html>