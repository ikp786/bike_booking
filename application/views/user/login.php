<!doctype html>
<html lang="zxx">

<head>
    <?php include("include/head.php")?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body onload="showMesssage()" class="main-all-page product allpage">
    <?php include("include/header.php")?>
    <section class="login-sign-up">
        <div class="container">
            <div class="log-sign-box">
                <div class="right">
                    <form id="user_login"  action="<?= base_url()?>User/checkLogin" method="post">
                        <h2>Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="username"
                                placeholder="Email / Contact">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="passwordl" name="password"
                                placeholder="Password">
                            <span toggle="#passwordl" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        </div>
                        <div class="Forgot-Password">
                            <span class="checkbox">
                                <input type="checkbox" class="aj-radio1" name="radiogroup-type" id="acolor-1">
                                <label for="acolor-1" class="aj-radio1">Remember</label>
                            </span>
                            <a href="<?= base_url();?>password">Forgot Password?</a>

                        </div>
                        <!-- <div class="social-box">
                            <a href="javascript:void(0);" class="box-sign-in-googel"><img
                                    src="<?= base_url()?>assets/user/img/googel.png" alt="" style=" width: 35px; "> Sign
                                in with </a>
                            <a href="javascript:void(0);" class="box-sign-in-facebook"><img
                                    src="<?= base_url()?>/assets/user/img/facebook.svg" alt="" style=" width: 35px; ">
                                Sign in with </a>
                        </div> -->
                        <button class="btn-theme">Sign In</button>
                        <p>Don't have an account? <a href="<?=base_url();?>sign-up">Sign Up!</a></p>

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
        function showMesssage(){
            var message = '<?=(isset($message))?$message:''?>';
            if(message){
                swal(message);
                message = '';
            }
        }

        $('#user_login').validate({
            rules:{ 
                username:{
                    required : true, 
                },
                password:{
                    required : true,
                },
            },
            messages:{   
                username:{
                required: '<span style="color:red">Enter Your Email/Contact Name</span>',
                }, 
                password:{
                required:'<span style="color:red">Enter Your Password Name</span>', 
                }
            }
        });
    </script>
    </script>
</body>

</html>