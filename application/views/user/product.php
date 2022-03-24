<!doctype html>
<html lang="zxx">
   <head>
      <?php include("include/head.php")?>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <style>
         button.btn-theme{
         background: #FE9100;
         color: #fff;
         border: 0.5px solid #FE9100;
         border-radius: 5px;
         padding: 5px 16px;
         text-align: center;
         font-family: "Roboto";
         text-decoration: unset;
         border-radius: 0;
         }
         button.btn-theme:hover{
         background: #fff;
         color: #FE9100;
         border: 0.5px solid #FE9100;
         border-radius: 5px;
         padding: 5px 16px;
         text-align: center;
         font-family: "Roboto";
         text-decoration: unset;
         border-radius: 0;
         }
         .modal-footer {
             justify-content: space-between;
         }

      </style>
   </head>
   <body class="main-all-page product allpage">
      <?php include("include/header.php")?>
      <section class="home-benaer-main" >
         <div class="content">
            <div class="box-main">
               <div class="box">
                  <div class="form-box">
                     <form method="post" action="<?=base_url()?>User/product" autocomplete="off">
                        <div class="input-box">
                           <div class="form-group">
                              <select name="city_id" id="city_id" required>
                                 <!-- <option value="0">Select city</option> -->
                                 <option value="-1">All</option>
                                 <?php if(!empty($city_data)) { foreach($city_data as $city) {?>
                                 <option value="<?=$city->id?>" <?php if(!empty($post_data)){ if($post_data['city_id'] === $city->id){ echo "selected"; }}?>><?=$city->city_name?></option>
                                 <?php } }?>
                              </select>
                           </div>
                           <div class="form-group">
                              <select name="booked_type_id" id="booked_type_id" required>
                                 <option value="4" <?php if(!empty($post_data)){ if($post_data['booked_type_id'] === "4"){ echo "selected"; }}?>>HOURLY</option>
                                 <option value="1" <?php if(!empty($post_data)){ if($post_data['booked_type_id'] === "1"){ echo "selected"; }}?>>DAILY</option>
                                 <option value="2" <?php if(!empty($post_data)){ if($post_data['booked_type_id'] === "2"){ echo "selected"; }}?>>WEEKLY</option>
                                 <option value="3" <?php if(!empty($post_data)){ if($post_data['booked_type_id'] === "3"){ echo "selected"; }}?>>MONTHLY</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <!-- <span class="input-group-chang nae">dd/mm/yyyy, --:--</span> -->
                              <!-- <input type='datetime-local' idd="nae" name="from_date" class="form-control dexktop-control" min='<?php echo date("Y-m-d H:i:s");?>' required /> -->
                              <input type="text" id="datetimepicker1" class="form-control" name="from_date" placeholder="dd-mm-yyyy AM/PM" value="<?=(isset($post_data['from_date']))?$post_data['from_date']:''?>" required/>
                           </div>
                           <div class="form-group">
                              <!-- <span class="input-group-chang nae1">dd/mm/yyyy, --:--</span> -->
                              <!-- <input type='datetime-local' idd="nae1" name="to_date" class="form-control dexktop-control" 
                                 min='<?php echo date("Y-m-d H:i:s");?>' required/> -->
                              <input type="text" id="datetimepicker2" value="<?=(isset($post_data['to_date']))?$post_data['to_date']:''?>" class="form-control" name="to_date"
                                 placeholder="dd-mm-yyyy AM/PM" required/>
                           </div>
                           <button type="submit"  class="btn-theme">RIDE NOW</button>
                           <!-- <button type="button" id="resetForm" class="btn-theme ml-2"><i class="fa fa-refresh" aria-hidden="true"></i></button> -->
                        </div>
                     </form>
                  </div>
                  <div class="name-box1">
                     <!-- <p>0 Days 9 Hrs</p> -->
                     <p></p>
                     <h6><img src="<?= base_url()?>assets/user/img/date.png" alt=""> Save More, Book Monthly</h6>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="product-section">
         <div class="container">
            <div class="main-box-product">
               <div class="left-box">
                  <form method="post" action="<?=base_url()?>User/product">
                     <div class="box-left">
                        <div class="mian-box">
                           <ul class="mian">
                              <li class="aco-list filter"><span>Filters </span> <span><input id="ClearAll" type="reset" value="Clear all"></span></li>
                           </ul>
                           <div class="mian">
                              <ul class="accordion">
                                 <li class="accordion-item">
                                    <a class="accordion-title active" nextclass="brandID01" href="javascript:void(0)">
                                    MANUFACTURER <span class="icone"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    </a>
                                    <div class="accordion-content" id="brandID01" style="display: block;">
                                       <ul class="link">
                                          <?php if(!empty($manufacturer_data)) { foreach($manufacturer_data as $manufacturer) {?>
                                          <li>
                                             <label class="lebal">
                                                <input type="checkbox" class="inputs selector manufacturer" name="manufacturer_id[]" value="<?=$manufacturer->id?>" readonly="">
                                                <div class="name"><?=$manufacturer->manufacturer_name?></div>
                                             </label>
                                          </li>
                                          <?php } }?> 
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="accordion-item">
                                    <a class="accordion-title" nextclass="brandID02" href="javascript:void(0)">
                                    MODEL <span class="icone"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    </a>
                                    <div class="accordion-content" id="brandID02">
                                       <ul class="link">
                                          <?php if(!empty($model_data)) { foreach($model_data as $model) {?>
                                          <li>
                                             <label class="lebal">
                                                <input type="checkbox" class="inputs selector model" name="model_id[]" value="<?=$model->id?>" readonly="">
                                                <div class="name"><?=$model->model_name?></div>
                                             </label>
                                          </li>
                                          <?php } }?>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)" nextclass="brandID03">
                                    Type <span class="icone"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    </a>
                                    <div class="accordion-content" id="brandID03">
                                       <ul class="link">
                                          <?php if(!empty($type_data)) { foreach($type_data as $type) {?>
                                          <li>
                                             <label class="lebal">
                                                <input type="checkbox" class="inputs selector type"  name="type_id[]" id="type_id<?=$type->id?>" value="<?=$type->id?>" readonly="">
                                                <div class="name"><?=$type->type ?></div>
                                             </label>
                                          </li>
                                          <?php } }?>
                                       </ul>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="right-box">
                  <div id="product-show" class="row">
                     <?php if(!empty($product_data)) { foreach($product_data as $product) { ?>
                     <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                        <div class="main-box-c">
                            <!--<div class="remainbike">-->
                            <!--    Left : 2-->
                            <!--</div>-->
                           <div class="image">
                              <a href="javascript:void(0);">
                              <img src="<?= base_url().$product->image_url?>" alt="">
                              </a>
                           </div>
                           <div class="content">
                              <h5>
                                 <a href="javascript:void(0);"><?=$product->model_name?></a>
                                 <!--<span><?=$product->available_qty?></span>-->
                              </h5>
                               <h5>
                                 <a href="javascript:void(0);">Remaining Bikes:</a>
                                 <span><?=$product->available_qty?></span>
                              </h5>
                              <div class="disc">
                                 <span><?=$product->free_km?> Kms</span> 
                                 <span>Excess ₹2/km</span>
                              </div>
                              <div class="price-b">
                                 <span><b>₹<?=$product->deposit_amount?></b></span>
                                 <!-- <span><a href="<?= base_url()?>product-details" class="btn-theme">Book Now</a></span> -->
                                 <?php if(isset($this->session->userdata['email'])) { ?>
                                
                                  <span style="cursor:pointer" class="bookNow btn-theme" product_id='<?=$product->id?>' model_id='<?=$product->model_id?>'>Book Now</span>
                                  <span id="ModelOPen" data-toggle="modal" data-target="#chooselocationforbike"></span>
                                 <?php }else { ?>
                                 <span><a href="<?= base_url()?>login" class="btn-theme" data-toggle="modal" data-target="#loginModal">Book Now</a></span>
                                 <?php } ?>


                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } }?>
                  </div>
                  <div id="products-show"></div>
               </div>
            </div>
         </div>
      </section>
      <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form method="post" class="login_form">
                  <div class="modal-body">
                     <span style="color:red;" id="UserLoginErr"></span>
                     <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" name="email" placeholder="Email" class="form-control" id="email">
                     </div>
                     <div class="form-group">
                        <label for="message-text" class="col-form-label">password:</label>
                        <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <a href="<?php echo base_url('sign-up'); ?>" class="btn btn-success">Sign up</a>
                     <div class="btn-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary user_login">Login</button>
                     </div>
                     
                    
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="modal fade" id="chooselocationforbike" tabindex="-1" role="dialog" aria-labelledby="chooselocationforbike" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div  class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="chooselocationforbikes">Select Pickup Location</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  
                  
                        <div id="AllBranchs"></div>
                  
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary user_login">Submit</button> -->
               </div>
            </div>
         </div>
      </div>
      <?php include("include/footer.php")?>
      <?php include("include/foot.php")?>
      <script src="<?= base_url()?>assets/user/js/product.js"></script>
      <script>
         $(document).ready(function(){
         
             $('#datetimepicker1').datetimepicker({
                 format:"d-m-Y H:00 a",
                 minDate:0,
                 allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                 //step:15
             });
             
              $('#datetimepicker2').change(function(){

                    const l = new Date($('#datetimepicker1').datetimepicker('getValue'));
                    const d = new Date($('#datetimepicker2').datetimepicker('getValue'));

                    let hoursel = l.getHours();
                    let datesel = l.getDate();

                    //const d = new Date();
                    let hourcur = d.getHours();
                    let datecur = d.getDate();

                    // console.log(datesel);
                    // console.log(datecur);

                    if( (hourcur == hoursel) && (datesel == datecur))
                    {    
                        $('#datetimepicker2').val("").datetimepicker("update");
                        return swal({
                            title: "Error",
                            text: "Please select valid time",
                            icon: "error",
                            button: false,
                            timer: 3000
                        });

                        return false;
                    }


                    else if( (hourcur <= hoursel) && (l > d))
                    {    
                        $('#datetimepicker2').val("").datetimepicker("update");
                        return swal({
                            title: "Error",
                            text: "Please select valid time",
                            icon: "error",
                            button: false,
                            timer: 3000
                        });

                        return false;
                    }
                    else if( (hourcur < hoursel) && (l == d))
                    {                         
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
         
             $('.bookNow').click(function(){
                 // var fromDate = '<?=(isset($_SESSION['from_date']))?$_SESSION['from_date']:'Notset'?>';
                 // var toDate =  '<?=(isset($_SESSION['to_date']))?$_SESSION['to_date']:'Notset'?>';
                 var fromDate = '<?=(isset($post_data['from_date']))?$post_data['from_date']:'Notset'?>';
                 var toDate =  '<?=(isset($post_data['to_date']))?$post_data['to_date']:'Notset'?>';
                 var productID = $(this).attr('product_id');
                 var model_id = $(this).attr('model_id');
                 var city_id = $('#city_id').val();

                 if(fromDate === 'Notset' && toDate === 'Notset'){
                  //$('.modal-content').hide();
                     return swal('Please select From Date and To Date');
                     return false;
                 }else{
                    // var url = '<?= base_url()?>product-details/'+productID;
                    $.ajax({
                             type: "POST",
                             url: "<?= base_url().'User/getAllBranch' ?>",
                             data:{productID:productID,model_id:model_id,city_id:city_id},     
                             success: function(data) {
                             $('#ModelOPen').trigger('click');
                             $('#AllBranchs').html(data);
                         }
                     });
                     // window.location.replace(url);
                     // <span id="bookNow"><a href="<?= base_url()?>product-details/<?=$product->id?>" class="btn-theme">Book Now</a></span>
                 }
             });
         
         
             // $('#resetForm').click(function(){
             //     alert('gggg');
             //     var unsetsession = '<?php 
            //         if(isset($_SESSION['from_date']) && isset($_SESSION['to_date']) && isset($_SESSION['booked_type_id'])){
            //             unset($_SESSION['from_date']); 
            //             unset($_SESSION['to_date']); 
            //             unset($_SESSION['booked_type_id']); 
            //             echo "UnsetSession";
            //         }else{
            //             echo "";
            //         }
            //         ?>';
             //     if(unsetsession){
             //         $("#from_date").val('');
             //         $("#to_date").val('');
             //         $('#city_id').val(0);
             //         $('#booked_type_id').val(0);
             //     }
             // });
         
         
         
             
            // Date Clause
            $('#datetimepicker1').change(function(){
                
                 var bookType = $('#booked_type_id').val();
                 //console.log(bookType);
                  const l = new Date($('#datetimepicker1').datetimepicker('getValue'));
                    let hoursel = l.getHours();
                    let datesel = l.getDate();

                    const d = new Date();
                    let hourcur = d.getHours();
                    let datecur = d.getDate();

                    if( (datesel == datecur) && (hourcur > hoursel))
                    {
                        return swal({
                            title: "Error",
                            text: "Please select valid time",
                            icon: "error",
                            button: false,
                            timer: 3000
                        });

                        return false;
                    }
                 
                // if(bookType === "1"){
                     $('#datetimepicker2').datetimepicker({
                         format:"d-m-Y H:00 a",
                         //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                         minDate:$('#datetimepicker1').datetimepicker('getValue'),
                        // maxDate:$('#datetimepicker1').datetimepicker('getValue'),
                         allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                         //step:15
                     });
                 //  }else if(bookType === "2"){
                 //     var mdate = new Date();
                 //     var showDate = $('#datetimepicker1').datetimepicker('getValue');
                 //     var date = mdate.setDate(showDate.getDate() + 6);
                 //     //console.log(date);
                 //     $('#datetimepicker2').datetimepicker({
                 //         format:"d-m-Y H:00 a",
                 //         //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                 //         minDate:$('#datetimepicker1').datetimepicker('getValue'),
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
                 //        // defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                 //         minDate:$('#datetimepicker1').datetimepicker('getValue'),
                 //         allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                 //         //maxDate:date,
                 //         //step:15
                 //     });
                 // }
                 // else if(bookType === "4"){
                 //     $('#datetimepicker2').datetimepicker({
                 //         format:"d-m-Y H:00 a",
                 //         //defaultDate:$('#datetimepicker1').datetimepicker('getValue'),
                 //         minDate:$('#datetimepicker1').datetimepicker('getValue'),
                 //         maxDate:$('#datetimepicker1').datetimepicker('getValue'),
                 //         allowTimes:['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00'],
                 //         //step:15
                 //     });
                 //  }
            });           
         });
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.full.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.14/jquery.datetimepicker.min.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
      <script type="text/javascript">
         $(function() {
         
          $(".login_form").validate({
            rules: {
              email: {
                  required: true,
              },
              password: {
                  required: true,
              },
            },
            messages: {
              market: {
                required: "Please Enter Email",
              },
              start_time: {
                required: "Please Enter Password",
              },
            }
          });
         });
         
         $(document).on('click', '.user_login', function(){
             var email = $('#email').val();
             var password = $('#password').val();
             //console.log(email);
                $.ajax({
                 type: "POST",
                 url: "<?= base_url().'User/userlogin' ?>",
                 data:{email:email,password:password},     
                 success: function(data) {
                     var json = $.parseJSON(data);
                     if(json.success =='true')
                     {
                         location.reload();
                     }    
                     else
                     {
                         $('#UserLoginErr').text('Login details invalid');
                     }    
             }
         });
         });

         

   $('#ClearAll').click(function(){
           filters_data();
   });
   

         //   

   function filter_data()
   {
      $('#product-items').html('');
      var type = get_filter('type');
      var model = get_filter('model');
      var manufacturer = get_filter('manufacturer');

      var city_id = $('#city_id').val();
      var booked_type_id = $('#booked_type_id').val();
      var from_date = $('#datetimepicker1').val();
      var to_date = $('#datetimepicker2').val();

      $.ajax({
         url:"<?php echo base_url(); ?>user/filterData",
         method:"POST",
         data:{city_id:city_id,booked_type_id:booked_type_id,from_date:from_date,to_date:to_date,type:type,model:model,manufacturer:manufacturer},
         success:function(data)
         {
            $('#product-show').hide();
            $('#products-show').html(data);
         }
     })
      
   }

   function filters_data()
   {
      $('#product-items').html('');
      var city_id = $('#city_id').val();
      var booked_type_id = $('#booked_type_id').val();
      var from_date = $('#datetimepicker1').val();
      var to_date = $('#datetimepicker2').val();

      $.ajax({
         url:"<?php echo base_url(); ?>user/filterData",
         method:"POST",
         data:{city_id:city_id,booked_type_id:booked_type_id,from_date:from_date,to_date:to_date},
         success:function(data)
         {
            $('#product-show').hide();
            $('#products-show').html(data);
         }
     })
      
   }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

   $('.selector').click(function(){
        filter_data();
   });
         
      </script>
   </body>
</html>