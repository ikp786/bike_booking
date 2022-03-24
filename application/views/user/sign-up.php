<!doctype html>
<html lang="zxx">
<head>
    <?php include("include/head.php")?>
    <style>
        .log-sign-box.up {
            max-width: 520px;
        }
    </style>
</head>

<body class="main-all-page product allpage">
    <?php include("include/header.php")?>
    <section class="login-sign-up">
        <div class="container">
            <div class="log-sign-box up">
                <div class="right">
                    <form action="<?= base_url()?>User/userRegister" enctype="multipart/form-data" method="post" id="user_signup">
                        <h2>Sign-Up</h2>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label>Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">
                             <label>E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>
                        <div class="form-group col-md-6">
                             <label>Contact Number</label>
                            <input type="text" maxlength="10" onkeypress="return validateNumber(event)"  class="form-control" id="contact" name="contact_no" placeholder="Contact Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Driving Licence</label>
                            <input type="file" class="form-control" id="licence" name="licence" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Aadhar card</label>
                            <input type="file" class="form-control" id="aadhar" name="aadhar" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Any Government ID</label>
                            <input type="file" class="form-control" id="other" name="other" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" id="passwordl" name="password"
                                placeholder="Password">
                            <span toggle="#passwordl" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <span id="passwordError" style="color:red">Password should be min 8 char max 20 and 1 special char,1 numeric,1 lowercase Alphabet, 1 UpperCase Alphabet</span>
                        </div>
                        <div class="form-group col-md-6">
                             <label>Confirm Password</label>
                            <input type="password" class="form-control" id="cpasswordl" name="confirm_password"
                                placeholder="Confirm password">
                            <span toggle="#cpasswordl" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div> 
                        </div>
                        <!-- <div class="form-group otp-box">
                            <input type="number" class="form-control" id="name" name="otp" placeholder="1 2 3 4">
                            <a href="javascript:void(0);" class="re-send-otp">Re-Send OTP</a>
                        </div> -->
                        <button type="submit"  class="btn-theme">Sign up</button>
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
        $('#user_signup').validate({
        rules:{ 
            name:{
                required : true, 
            },
            email:{
                required : true,
                email : true,
                remote: {
                url: "<?= base_url().'user/email_check' ?>",
                    type: "post",
                    data: { email: function(){ return $("#email").val(); } }
                   },
            },
            contact_no:{ 
                required : true,
                number: true,
                minlength: 10,
                maxlength: 10,
                remote: {
                url: "<?= base_url().'user/contact_check' ?>",
                    type: "post",
                    data: { contact: function(){ return $("#contact").val(); } }
                   },
            },
            password : {
                minlength : 5,
                required:true
            },
            confirm_password : {
                required:true,
                minlength : 5,
                equalTo : "#passwordl"
            },
            licence:{
                required : true, 
            },
            aadhar:{
                required : true, 
            },
            other:{
                required : true, 
            }
        },
        messages:{   
            name:{
            required: '<span style="color:red">Enter Your First Name</span>',
            }, 
            licence:{
            required: '<span style="color:red">Select Driving Licence</span>',
            }, 
            aadhar:{
            required: '<span style="color:red">Select Aadhar Card</span>',
            }, 
            other:{
            required: '<span style="color:red">Select Government ID</span>',
            }, 
            contact_no:{
            required:'<span style="color:red">Enter Contact Number</span>',
            number:'<span style="color:red">Enter Valid Contact Number</span>',
            minlength:'<span style="color:red">Enter Valid Contact Number</span>',
            maxlength:'<span style="color:red">Enter Valid Contact Number</span>',  
            remote:'<span style="color:red">This Contact Number Is Already Registered</span>',
            },
            email:{
            required:'<span style="color:red">Enter Email Address</span>',
            email:'<span style="color:red">Enter Valid Email Address</span>',
            remote:'<span style="color:red">This Email Address Is Already Registered</span>',
            },
            password:{
            required: '<span style="color:red">Enter Password</span>',
            minlength: '<span style="color:red">Enter Password To Confirm</span>',
            },
            confirm_password:{
            required: '<span style="color:red">Enter Confirm Password</span>',
            minlength: '<span style="color:red">Enter Password To Confirm</span>',
            equalTo:'<span style="color:red">Confirm Password Did Not Match With Password</span>',
            }
        }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#passwordError").hide();
            $('#passwordl').keydown(function(){
                var password = $("#passwordl").val();
                let regexEmail = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/;
                if (password.match(regexEmail)) {
                    $("#passwordError").hide(); 
                } else {
                    $("#passwordError").show();
                }
            });
        });

        function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key )
        }
    </script>
</body>

</html>