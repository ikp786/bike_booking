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
                    <form id="forget-password" method="post">
                        <h3>Forget Password</h3>
                        <p style="display: none;" class="pass alert alert-success" role="alert"> </p>
                        <p style="display: none;" class="passw alert alert-danger" role="alert"> </p>
                        <p>Don't have an account? <a href="<?= base_url();?>sign-up">Sign Up!</a></p>

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email">
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
        $('#forget-password').validate({
            rules:{ 
                email:{
                    required : true, 
                },
               
            },
            messages:{   
                email:{
                required: '<span style="color:red">Enter Your Email Id</span>',
                }, 
            }
        });

        $(document).on('submit', '#forget-password', function(e){
            e.preventDefault();
    let email = $('#email').val();
    if(email != ''){
        $.ajax({
            type:'post',
            url:'<?= base_url().'User/forget_password' ?>',
            data:{email:email},
            success: function(data){
                if(data=='1')
                {
                    $('.pass').text('Password reset link send successfully');
                    $('.pass').show();
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