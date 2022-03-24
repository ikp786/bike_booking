<!doctype html>
<html lang="zxx">

<head>
    <?php include("include/head.php")?>
</head>

<body class="main-all-page product allpage">
    <?php include("include/header.php")?>
    <section class="login-sign-up">
        <div class="container">
            <div class="log-sign-box">
                <div class="right">
                    <form id="reset-password" method="post">
                        <h3>Reset Password</h3>
                        <p style="display: none;" class="pass alert alert-success" role="alert"> </p>
                        <p style="display: none;" class="passw alert alert-danger" role="alert"> </p>
                        <p>Don't have an account? <a href="<?= base_url();?>sign-up">Sign Up!</a></p>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="conf_password" name="conf_password"
                                placeholder="Confirm Password">
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

     <script>
        $('#reset-password').validate({
            rules:{ 
                password:{
                    required : true, 
                    minlength : 6,
                },
                 conf_password:{
                    required : true, 
                    minlength : 6,
                    equalTo : "#password",
                },
               
            },
            messages:{   
                password:{
                required: '<span style="color:red">Enter new password</span>',
                minlength : '<span style="color:"red">Enter Your Password min 6 Character</span>',
                }, 
                conf_password:{
                required: '<span style="color:red">Enter new confirm password</span>',
                equalTo :'<span style="color:red">Confirm Password Did Not Match With Password</span>',
                minlength : '<span style="color:"red">Enter Your Password min 6 Character</span>',
                }, 
            }
        });

      $(document).on('submit', '#reset-password', function(e){
            e.preventDefault();
            let password = $('#password').val();
            let id = "<?php echo $this->uri->segment('3'); ?>";
            if(password != ''){
                $.ajax({
                    type:'post',
                    url:"<?= base_url().'User/update_password' ?>",
                    data:{password:password,id:id},
                    success: function(data){
                        if(data=='1')
                        {
                            $('.pass').text('Password reset successfully done Please login');
                            $('.pass').show();
                            
                                setTimeout(function() {
                                window.location.href = '<?php echo base_url('login') ?>';
                            }, 3000);
                        }
                        else
                        {
                            $('.passw').text('Please try again');   
                            $('.passw').show();
                        }    
                    },
                  
                })
            }
        })
    </script>

</body>

</html>