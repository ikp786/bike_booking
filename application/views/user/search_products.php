<style type="text/css">
   #no-products {
       text-align: center;
       margin: 0 auto;
   } 
</style>
<div class="row">
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
      <?php } }
      else
        { ?>
            <p id="no-products">No bikes found ..!</p>
       <?php  } 

      ?>
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

<script type="text/javascript">
   $('.bookNow').click(function(){
                  var fromDate = '<?=(isset($_SESSION['from_date']))?$_SESSION['from_date']:'Notset'?>';
                  var toDate =  '<?=(isset($_SESSION['to_date']))?$_SESSION['to_date']:'Notset'?>';
                // var fromDate = '<?=(isset($post_data['from_date']))?$post_data['from_date']:'Notset'?>';
                 //var toDate =  '<?=(isset($post_data['to_date']))?$post_data['to_date']:'Notset'?>';
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
</script>
