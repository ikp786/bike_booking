
<!doctype html>
<html lang="zxx">
    <head>
    	<?php include("include/head.php")?>
        <style type="text/css">
            .product .product-details-box .amin-box-a .right-b .min-box .sec-1 .time-date {
    font-size: 10px;
}
        </style>
        <script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous">
       </script>
       <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="main-all-page product allpage"> 
    	<?php include("include/header.php")?>
        <section  class="product-details-box">
            <div class="container">
                <div class="amin-box-a">
                    <div class="left-b">
                        <h6 class="product-name-b">
                            <!-- <small>HONDA</small><br> -->
                            <span><?=$product_data[0]->model_name;?></span>
                           
                        </h6>
                        <div class="image">
                            <img src="<?= base_url().$product_data[0]->image_url?>" alt="">
                        </div><br>
                        <div class="content">
                            <h6>PICKUP & RETURN LOCATION</h6>
                            <p><?php echo $branchDetails->branch_name; ?></p>
                            <p><?php echo $branchDetails->address; ?></p>
                            <p><?php echo $branchDetails->contact_no; ?></p>
                        </div>
                        <div class="disc-sec">
                            <div class="box1">
                                <small><?php echo $product_data[0]->remark;
                                ?></small>
                            </div>
                            <div class="box2">
                                <ul class="list">
                                    <li class="n-list"><img src="<?= base_url()?>assets/user/img/d-icone1.png" alt="">
                                        <?php echo $product_data[0]->hourly_rate
                                ?> km/hour</li>
                                    <li class="n-list"><img src="<?= base_url()?>assets/user/img/d-icone2.png" alt=""><?php echo $product_data[0]->free_km
                                ?> Kms free</li>
                                    <li class="n-list"><img src="<?= base_url()?>assets/user/img/d-icone3.png" alt=""> Excess  ₹  <?php echo $product_data[0]->extra_km
                                ?>/km</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-b">
                        <div class="min-box">
                            <div class="sec-1">
                                <h6>START TRIP</h6> 
                                <div class="numb-1">
                                    <span><?php if(isset($product_data[0]->from_date)) { echo date("d", strtotime($product_data[0]->from_date)); } ?></span>
                                    <small><?php if(isset($product_data[0]->from_date)) { echo date("l", strtotime($product_data[0]->from_date)); }?></small>

                                </div>
                                <div class="time-date">
                                     <?php if(isset($product_data[0]->from_date)) { echo date("F h:i:A", strtotime($product_data[0]->from_date)); }?>
                                </div>
                                <div class="time-date">
                                    <?php
                                        $day = '';
                                        $hour = '';
                                        $hours = '';

                                    if(isset($product_data[0]->days) && $product_data[0]->days > 0)
                                    {
                                        $day = $product_data[0]->days .' days,' ;
                                    } 
                                    if(isset($product_data[0]->hour) && $product_data[0]->hour > 0)
                                    {
                                        $hour = $product_data[0]->hour .' hours' ;
                                    } 
                                    if(isset($product_data[0]->hours) && $product_data[0]->hours > 0)
                                    {
                                        $hours = '('.$product_data[0]->hours.')'  ;
                                    }    
                                     ?>



                                     <?php if(isset($product_data[0]->hours) && $product_data[0]->hours > 0) { echo "Duration : <b> ". $day . $hour . $hours ." </b>" ; }?>
                                </div>
                            </div>
                            <div class="sec-1">
                                <h6>END TRIP</h6> 
                                <div class="numb-1">
                                    <span><?php if(isset($product_data[0]->to_date)) { echo date("d", strtotime($product_data[0]->to_date)); }?></span>
                                    <small><?php if(isset($product_data[0]->to_date)) { echo date("l", strtotime($product_data[0]->to_date)); }?></small>
                                </div>
                                <div class="time-date">
                                    <?php if(isset($product_data[0]->to_date)) { echo date("F h:i:A", strtotime($product_data[0]->to_date)); }?>
                                </div>
                            </div>
                        </div>
                        <div class="sec-bio">
                            <div class="a1">
                                <h6>Refundable Deposit</h6>
                                <p>This amount has to be paid at the time of vehicle delivery</p>
                            </div>
                            <div class="a2">
                               <?=$product_data[0]->deposit_amount?>
                            </div>
                        </div>
                        <div class="price">
                            <h4>Pricing</h4>
                            <p><span>Tariff (Inclusive of 18% GST)</span> <span id="priceing"></span></p>
                        </div>
                        <div class="promo-code">
                            <input type="text" id="coupon" placeholder="PROMOCODE">
                            <button id="clearCoupon"  style=" border: none;"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <button id="applyCoupon" class="btn-theme">Apply</button>
                        </div>
                        <!-- <div class="box-a-s">
                            <div class="input-box-a">
                                <span class="checkbox">
                                    <input type="checkbox" class="" name="interested" id="interested1">
                                    <label for="interested1" class="">
                                        <div class="box-main">
                                            <div class="left-r">
                                                <h6>Insure my ride</h6>
                                                <small>Covers the rider, pillion and the vehicle T&C apply</small>
                                            </div>
                                            <div class="right-r">
                                            ₹ 28
                                            </div>
                                        </div>
                                    </label>
                                </span>
                            </div>
                        </div> -->
                        <div class="price">
                            <P>coupon Amount <span id="couponAmt">0</span></P>
                        </div>
                        <div class="">
                            <b>Helmet</b>
                            <span > <input type="checkbox" checked='checked'> </span>
                        </div>
                        <div class="">
                            <b>Extra Helmet </b> Rs. 50
                            <span > <input type="checkbox" id="extaHelmet" value="0" name=""> </span>
                        </div>
                        <div class="price-b">
                            <b>Total Amount</b>
                            <span id="totalAmt"><?=$product_data[0]->deposit_amount?></span>
                        </div>


                        <!-- <div class="chak-box">
                            <span><svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.04834 6.09677L5.48382 10.5323L13.5483 1.25806" stroke="white" stroke-width="2"/></svg>  Includes all taxes</span>
                            <span><svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.04834 6.09677L5.48382 10.5323L13.5483 1.25806" stroke="white" stroke-width="2"/></svg>  Includes all taxes</span>
                        </div> -->
                        <div class="<!-- manin-swich -->">
                            <!-- <span class="switch" for="checkbox-off">
                                <input type="checkbox" id="checkbox-off" />
                                <div class="slider round"></div>
                            </span> -->
                            <input type="checkbox" id="checkbox-off" />
                            <a class="agreetems" target="_blank" href="<?php echo base_url('terms-&-condition'); ?>">I agree to the terms of use</a>
                            <!-- <label for="checkbox-off">I agree to the terms of use</label> -->
                        </div>
                        <div class="pyaemnt">
                            <button id="placedOrder" class="btn-theme" value="<?=$product_data[0]->id?>">PayMent  ₹  <?=$product_data[0]->deposit_amount?></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	    <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
        <script src="<?= base_url()?>assets/user/js/product.js"></script>
        <script>

            //Apply Coupons
            $(document).ready(function(){

                var payAmount = '<?='PayMent ₹ '.$product_data[0]->deposit_amount?>';
                var bookType =  <?=$_SESSION['booked_type_id']?>;
                var monthsVal = '<?= $product_data[0]->months?>';
                var weeksVal = '<?= $product_data[0]->weeks?>';
                //var min_charge = '<?= $product_data[0]->min_charge?>';
                var hoursVal = '<?= $product_data[0]->hours?>';
                var daysVal = '<?= $product_data[0]->days?>';
                var hourlyRate = '<?= $product_data[0]->hourly_rate?>';
                var weeklyRate = '<?= $product_data[0]->weekly_rate?>';
                var monthlyRate = '<?= $product_data[0]->monthly_rate?>';
                var deposteAmount = '<?= $product_data[0]->deposit_amount?>';
                var perdayRate = '<?= $product_data[0]->perday_rate?>';
                //priceing

                var hours = 0;
                var months = 0;
                var weeks = 0;
                var days = 0;
                if(monthsVal > 0)
                {
                    var months = monthsVal;
                } if(weeksVal > 0)
                {
                    var weeks = weeksVal;
                } if(daysVal > 0)
                {
                    var days = daysVal;
                }    
                var price = 0;
                var gst = 0;
                //console.log(bookType);
                if(bookType === 1){
                    // price = price + perdayRate;
                    price = price + monthlyRate* months + weeklyRate*weeks + days*perdayRate;
                    
                    gst = (18/100)*(price);
                    price = parseInt(price) + parseInt(gst);
                }else if(bookType === 2){
                    //price = price + weeklyRate*weeks + days*perdayRate;
                    price = price + monthlyRate* months + weeklyRate*weeks + days*perdayRate;

                    gst = (18/100)*(price);
                    
                    price = parseInt(price) + parseInt(gst);
                }else if(bookType === 3){
                    price = price + monthlyRate* months + weeklyRate*weeks + days*perdayRate;

                    //console.log(monthlyRate* months); console.log('----');console.log(weeklyRate*weeks); console.log('----');
                   // console.log(days*perdayRate);
                    gst = (18/100)*(price);
                    price = parseInt(price) + parseInt(gst);
                }else if(bookType === 4){
                    // price = price + perdayRate;
                    // if(hoursVal >5)
                    // {
                         price = price + hoursVal*hourlyRate;
                    // }    
                    // else
                    // {
                       // price = price + min_charge;
                    //}    
                    
                    gst = (18/100)*(price);
                    price = parseInt(price) + parseInt(gst);
                }
               console.log(price); console.log('----');
                   console.log(gst);
                $("#priceing").text("₹ "+ price);
                $('#totalAmt').text(parseInt(deposteAmount)+parseInt(price));
                var paytotal = parseInt(deposteAmount)+parseInt(price);
                $("#placedOrder").html("PayMent  ₹ "+ paytotal);
                
                $("#applyCoupon").click(function(){
                    $('#applyCoupon').prop('disabled', true);
                    var totalAmt = $("#totalAmt").text();
                    var couponCode = $('#coupon').val(); 
                    $.ajax({
                        url: '<?= base_url().'User/applyCoupon'?>',
                        type: "post",
                        data: { "couponcode" : couponCode},
                        success: function(result){
                            if(result != 'Coupon Expired' && result != 'Invalid Coupon'){
                                showCouponAmt =  parseInt(totalAmt) - result;
                                $('#couponAmt').text(result);
                                $('#totalAmt').text(showCouponAmt);
                                $('#placedOrder').text('PayMent ₹ '+ showCouponAmt);
                            }else{
                                swal(result);
                                //alert(result);
                            }
                        }
                    });
                });

                $("#clearCoupon").click(function(){
                    $('#applyCoupon').prop('disabled', false);
                    $('#coupon').val(''); 
                    location.reload();
                });



            });

            //Order Booking
            // $(document).ready(function(){
            //     $("#placedOrder").click(function(){
            //         var productID = $("#placedOrder").val();
            //         var totalAmt = $("#totalAmt").text();
            //         totalAmt =  parseInt(totalAmt);
            //         $.ajax({
            //             url: '<?= base_url().'User/orderBooking'?>',
            //             type: "post",
            //             data: { "id" : productID, "payAmount" : totalAmt},
            //             success: function(result){
            //                 alert(result);
            //             }
            //         });
            //     }); 
            // });
        </script>

        
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>

            document.getElementById('placedOrder').onclick = function(e){
                if(!$('#checkbox-off').prop('checked')) {
                    swal("Please accept terms and conditions");
                    return false;
                }
                var totalAmt = $("#totalAmt").text();
                var extaHelmet = $("#extaHelmet").val();
                
               // alert(totalAmt);
                var options = {
                "key": "rzp_test_CmSaYW8VFbxBao", // Enter the Key ID generated from the Dashboard
                "amount":parseInt(totalAmt)*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Senaprider Corp",
                "description": "Test Transaction",
                "image": "<?=base_url()?>assets/user/img/logo.png",
                //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){
                    var totalAmt = $("#totalAmt").text();
                    var productID = $("#placedOrder").val();
                    var couponCode = $('#coupon').val(); 
                    var couponAmt = $('#couponAmt').text();
                    var extaHelmet = $("#extaHelmet").val();

                    
                    $.ajax({
                        url: '<?= base_url().'User/orderBooking'?>',
                        type: "post",
                        data: { "id" : productID, "payAmount" : totalAmt, "couponAmt" : couponAmt,"couponCode": couponCode,"extaHelmet":extaHelmet },
                        success: function(result){

                            if(result == '1')
                            {
                                $msg = 'Your Order is Successfully placed';
                                swal($msg);
                                setTimeout(function() {
                                window.location.href = '<?php echo base_url() ?>';
                            }, 2000);
                            }    
                            else if(result == '2')
                            {
                                $msg = 'Something Went Wrong';
                                swal($msg);
                            }    
                           
                           // alert(result);
            
                        }
                    });
                },
                "prefill": {
                    "name": "Gaurav Kumar",
                    "email": "gaurav.kumar@example.com",
                    "contact": "9999999999"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#FE9100"
                }
            };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                // console.log(response);
                });
                rzp1.open();
                e.preventDefault();
            }
        </script>

        <script>
    $(document).ready(function(){
        $('#extaHelmet').click(function(){
            if($(this).prop("checked") == true){
               var totalAmt = $('#totalAmt').html();
               console.log(totalAmt);
              var finalAmount = parseInt(totalAmt) + 50;
              $('#totalAmt').text(finalAmount);
              $('#extaHelmet').val('1');
              
              $('#placedOrder').text('PayMent ₹ '+ finalAmount);
            }
            else if($(this).prop("checked") == false){
               var totalAmt = $('#totalAmt').html();
               var finalAmount = parseInt(totalAmt) - 50;
              $('#totalAmt').text(finalAmount);
              $('#extaHelmet').val('0');
              $('#placedOrder').text('PayMent ₹ '+ finalAmount);
            }
        });
    });
</script>

    </body>
</html>