
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
                                    <span id="from_date_day_num">-</span>
                                    <small id="from_date_day">-</small>

                                </div>
                                <div class="time-date" id="from_date_month_time">
                                     -
                                </div>
                            </div>
                            <div class="sec-1">
                                <h6>END TRIP</h6> 
                                <div class="numb-1">
                                    <span id="to_date_day_num">-</span>
                                    <small id="to_date_day">-</small>
                                </div>
                                <div class="time-date" id="to_date_month_time">
                                </div>
                            </div>
                        </div>
                        <div class="sec-bio">
                            <div class="a1">
                                <h6>Refundable Deposit</h6>
                                <p>This amount has to be paid at the time of vehicle delivery</p>
                            </div>
                            <div class="a2" id="refundable_deposit">
                               -
                            </div>
                        </div>
                        <div class="price">
                            <h4>Pricing</h4>
							<div id="booking_breakdown"></div>
							<p><span>Booking Duration</span> <span id="booking_duration">-</span></p>
							<p><span>Total</span> <span id="total_cost">-</span></p>
                            <p><span>Taxes (18% GST)</span> <span id="taxes">-</span></p>
							<p><span>Total with tax</span> <span id="total_cost_with_taxes">-</span></p>
                        </div>
                        <div class="promo-code">
                            <input type="text" id="coupon" placeholder="PROMOCODE">
                            <button id="clearCoupon"  style=" border: none;"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <button id="applyCoupon" class="btn-theme">Apply</button>
                        </div>
						<p id="coupon_status" class="m-1 text-center"></p>
                        <div class="mt-3">
                            <b>Helmet</b>
                            <span > <input type="checkbox" checked='checked'> </span>
                        </div>
                        <div class="">
                            <b>Extra Helmet </b> Rs. <span id="extra_helmet_rate"></span>
                            <span><input type="checkbox" id="extra_helmet" value="1" name=""></span>
                        </div>
						<hr/>
						<div class="price-b coupon_area text-success" style="display:none;">
                            <b>Coupon applied - <span id="coupon_code"></span></b>
                            <span id="coupon_value">0</span>
                        </div>
						
                        <div class="price-b">
                            <b>Grand Total</b>
                            <span class="grand_total">-</span>
                        </div>

                        <div class="<!-- manin-swich -->">
                            <!-- <span class="switch" for="checkbox-off">
                                <input type="checkbox" id="checkbox-off" />
                                <div class="slider round"></div>
                            </span> -->
                            <input type="checkbox" id="checkbox-off" />
                            <a class="agreetems" target="_blank" href="<?php echo base_url('terms-&-condition'); ?>">I agree to the terms of use</a>
                        </div>
                        <div class="pyaemnt">
                            <button id="placedOrder" class="btn-theme" value="<?=$product_data[0]->id?>">Payment  ₹  <span class="grand_total"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	    <?php include("include/footer.php")?>
        <?php include("include/foot.php")?>
        <script src="<?= base_url()?>assets/user/js/product.js"></script>
        <script>
		const calculateCost = async (extra_helmet = 0, coupon = 0) => {
			let modelId = "<?=$product_data[0]->model_id;?>";
			let cityId = "<?=$product_data[0]->city_id;?>";
			let url = '/cost-calculation/?';
			let query_params = new URLSearchParams({
				m: modelId,
				c: cityId,
				extra_helmet: extra_helmet,
				coupon: coupon,
			})
			
			const response = await fetch(url + query_params);
			
			if(response.status != 200){
				$('#applyCoupon').prop('disabled', false); // enable coupon button
			}
			if(response.status === 200){
				let data = await response.json();
				$('#from_date_day_num').html(data.from_date_day_num);
				$('#from_date_day').html(data.from_date_day);
				$('#from_date_month_time').html(data.from_date_month_time);
				
				$('#to_date_day_num').html(data.to_date_day_num);
				$('#to_date_day').html(data.to_date_day);
				$('#to_date_month_time').html(data.to_date_month_time);
				
				$('#refundable_deposit').html(data.refundable_deposit);
				
				let booking_breakdown = '<table class="table"><tr><td>Duration</td><td>Rate</td><td>Total</td>';
				
				if(data.total_months != 0){
					booking_breakdown += "<tr><td>"+ data.total_months + " Months </td><td>"+data.mothly_rate+"</td><td>"+data.total_months * data.mothly_rate+"</td></tr>";
				}
				if(data.total_weeks != 0){
					booking_breakdown += "<tr><td>"+ data.total_weeks + " Weeks </td><td>"+data.weekly_rate+"</td><td>"+data.total_weeks * data.weekly_rate+"</td></tr>";
				}
				if(data.total_days != 0){
					booking_breakdown += "<tr><td>"+ data.total_days + " Days </td><td>"+data.daily_rate+"</td><td>"+data.total_days * data.daily_rate+"</td></tr>";
				}
				if(data.total_hours != 0){
					booking_breakdown += "<tr><td>"+ data.total_hours + " Hours </td><td>"+data.daily_rate+"</td><td>"+data.total_hours * data.daily_rate+"</td></tr>";
				}
						
				booking_breakdown += "</tr></table>";
				//$('#booking_breakdown').html(booking_breakdown);
				
				let booking_duration = "";
				if(data.booking_duration.months != 0) 	booking_duration += data.booking_duration.months + " months ";
				if(data.booking_duration.weeks != 0) 	booking_duration += data.booking_duration.weeks + " weeks ";
				if(data.booking_duration.days != 0)  	booking_duration += data.booking_duration.days + " days ";
				if(data.booking_duration.hours != 0) 	booking_duration += data.booking_duration.hours + " hours ";
				
				$('#booking_duration').html(booking_duration);
				
				$('#total_cost').html(data.total_cost);
				$('#taxes').html(data.taxes);
				$('#total_cost_with_taxes').html(data.total_cost_with_taxes);
				
				$('#extra_helmet_rate').html(data.extra_helmet_rate);
				$('#extra_helmet').val(data.extra_helmet);
				
				$('.grand_total').html(data.grand_total);
				
				
				if(data.coupon_status == 'valid'){
					$('.coupon_area').show();
					$('#coupon_code').html(data.coupon_code);
					$('#coupon_value').html(data.coupon_value);
					$('#coupon_status').html('<p class="text-success">Coupon Applied !</p>');
					$("#clearCoupon").show();
					$("#applyCoupon").hide();
				}else{
					if(data.coupon_status == 'expired'){
						$('#coupon_status').html('<p class="text-danger">Coupon Expired</p>');
					}
					if(data.coupon_status == 'invalid'){
						$('#coupon_status').html('<p class="text-danger">Invalid Coupon Code</p>');
					}
					$('.coupon_area').hide();
					$('#applyCoupon').prop('disabled', false);
				}
			}
		}
		
		$(document).ready(function(){
			$("#clearCoupon").hide();
			calculateCost();
			var extra_helmet_booked = ($('#extra_helmet').is(':checked')) ? 1 : 0;
			var couponCode = $('#coupon').val(); 
			$('#extra_helmet').change(function(){
				extra_helmet_booked = ($('#extra_helmet').is(':checked')) ? 1 : 0;
				calculateCost(extra_helmet_booked, couponCode);
			});
			
			$("#applyCoupon").click(function(){
				couponCode = $('#coupon').val(); 
				$('#applyCoupon').prop('disabled', true);
				calculateCost(extra_helmet_booked, couponCode);
			});
			$("#clearCoupon").click(function(){
				$("#clearCoupon").hide();
				$("#applyCoupon").show();
				$('.coupon_area').hide();
				$('#coupon_status').html('');
				$('#applyCoupon').prop('disabled', false);
				$('#coupon').val('');
				couponCode = '';
				calculateCost(extra_helmet_booked, couponCode);
			});
		});
        </script>

        
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>

            document.getElementById('placedOrder').onclick = function(e){
                if(!$('#checkbox-off').prop('checked')) {
                    swal("Please accept terms and conditions");
                    return false;
                }
                var totalAmt = $("#totalAmt").text();
				var totalAmt = $(".grand_total").first().text();
                var extaHelmet = $("#extra_helmet").val();
                
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
					
					var totalAmt = $(".grand_total").first().text();
                    var productID = $("#placedOrder").val();
                    var couponCode = $('#coupon').val(); 
                    var couponAmt = $('#coupon_value').text();
                    var extaHelmet = $("#extra_helmet").val();
                    
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