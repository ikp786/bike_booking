<!doctype html>
<html lang="zxx">

<head>
    <?php include("include/head.php")?>
</head>

<body onload="showMesssage()"  class="main-all-page product allpage">
    <?php include("include/header.php")?>
    <section class="login-sign-up">
        <div class="container">
            <div class="log-sign-box">
                <div class="right">
                    <form id="otpVerify" method="post" action="<?php echo base_url('User/otp'); ?>">
                        <h3>OTP</h3>
                        <?php if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger" role="alert">
                         <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                        <p class="resendOtp"> </p>
                        <div class="form-group otp-box">
                            <input type="hidden"  id="email" name="email" value="<?php echo $this->session->userdata('email'); ?>">
                            <input type="text" onkeypress="return validateNumber(event)" maxlength="4" class="form-control" id="otp" name="otp" placeholder="0 0 0 0">
                            <a href="javascript:void(0);" class="re-send-otp"> Re-Send OTP</a>
                        </div>
                        <button type="submit" class="btn-theme">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include("include/footer.php")?>
    <?php include("include/foot.php")?>
    <script src="<?= base_url()?>assets/user/js/product.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script type="text/javascript">

         function showMesssage(){
            var message = '<?=(isset($message))?$message:''?>';
            if(message){
                swal(message);
                message = '';
            }
        }
    
        function validateNumber(e) {
   const pattern = /^[0-9]$/;
   return pattern.test(e.key )
}
    $(function() {

     $("#otpVerify").validate({
       rules: {
         otp: {
             required: true,
         },
       },
       messages: {
         otp: {
           required: "Please Enter OTP",
         }, 
       }
     });
   });

    $(document).on('click', '.re-send-otp', function(){
    let email = $('#email').val();
    if(email != ''){
        $.ajax({
            type:'post',
            url:'<?= base_url().'User/resendOtp' ?>',
            data:{email:email},
            success: function(data){
                if(data=='1')
                {
                    $('.resendOtp').text('OTP send successfully');
                }
                else
                {
                    $('.resendOtp').text('Please try again');   
                }    
            },
          
        })
    }
})

   </script>
</body>

</html>