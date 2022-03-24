<style>
    .my-custom-scrollbar {
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }

    .table-wrapper-scroll-x {
        display: block;
    }

    .header_form .input-box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: 100%;
        box-shadow: 0px 0px 12px #eee;
    }

    .nice-select {
        -webkit-tap-highlight-color: transparent;
        background-color: #fff;
        border-radius: 0px;
        border: unset;
        box-sizing: border-box;
        clear: both;
        cursor: pointer;
        display: block !important;
        float: left;
        font-family: inherit;
        font-size: 14px;
        font-weight: normal;
        height: 45px;
        line-height: 44px;
        outline: none;
        padding-left: 18px;
        padding-right: 30px;
        position: relative;
        text-align: left !important;
        -webkit-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        white-space: unset;
        width: 60%;

    }

    .form-control {
        border: unset;
        border-radius: 0;
        height: 45px;
        font-size: 14px;
    }

    .btn-theme {
        background: #FE9100;
        color: #fff;
        border: 0.5px solid #FE9100;
        border-radius: 5px;
        padding: 5px 16px;
        text-align: center;
        font-family: "Roboto";
        text-decoration: unset;
        border-radius: 0;
        width: 65%;
        height: 45px;
        font-size: 14px;
    }

    .header-top.sticker.stick .contact-dropdown i {
        color: #000;
    }

    .contact-dropdown i {
        color: #fff;
    }

    .contact-dropdown img {
        margin: auto;
    }

    .contact-dropdown .dropdown-menu {
        background-color: #fffbf5;
        border: none;
        box-shadow: 0px 0px 12px #eee;
    }

    .contact-dropdown .dropdown-menu .list i {
        color: #000 !important;
    }

    .fade.show {
        opacity: 1;
        z-index: 1;
    }

    .modal-content {
        border: 0;
    }

    .modal-content .modal-header {
        background: #fe9a01;
        border-bottom: 0;
    }

    .modal-content .modal-header .close {
        opacity: 1;
        color: #fff;
        font-size: 22px;
        font-weight: 400;
    }

    .modal-body .phone i {
        color: #FE9100;
        margin-right: 10px;
    }

    .modal-footer {
        justify-content: start;
        text-align: center !important;
        display: block;
    }

    .mail {
        color: #000 !important;
        transition: all ease-in-out 0.3s;
    }

    .mail:hover {
        color: #fe9a01 !important;
    }

    .custom-modal-dialog {
        max-width: 400px !important;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .custom-modal-dialog h4 {
        font-size: 20px;
        font-weight: 500;
        color: #fe9a01;

    }
</style>
<header class="header-top sticker">
    <div class="container">
        <div class="nav-box">
            <div class="url-box">
                <ul class="nev-b">

                    <!-- <li class="nev-item"><a href="<?= base_url() ?>product" class="">Features</a></li>
                    <li class="nev-item"><a href="javascript:void(0);" class="welcome-modal">Platforms</a></li>
                    <li class="nev-item"><a href="<?= base_url() ?>safety" class=""> Covid-Safety </a></li> -->
                    <li class="nev-item logo-a">
                        <a href="<?= base_url() ?>" class="logo-b">
                            <img src="<?= base_url() ?>assets/user/img/logo.png" alt="">
                        </a>
                    </li>
                    <!-- <li>
                        <p class="mb-0 mob-number"><i class="fa fa-phone"></i> Contact Us
                        <span>+91-123455688</span></p>
                    </li> -->
                    <li>
                        <?php
                        $city_data = $this->db->get('city')->result();
                        ?>
                        <form action="<?= base_url() ?>User/product" method="post" class="header_form">
                            <div class="input-box d-flex">
                                <select name="city_id" id="city_id_h" required=''>
                                    <!-- <option value="0">Select city</option> -->
                                    <option value="">Select City</option>
                                    <?php if (!empty($city_data)) {
                                        foreach ($city_data as $city) { ?>
                                            <option value="<?= $city->id ?>"><?= $city->city_name ?></option>
                                    <?php }
                                    } ?>
                                </select>
                                <select name="booked_type_id" id="booked_type_id_h" required>
                                    <option value="4">HOURLY</option>
                                    <option value="1">DAILY</option>
                                    <option value="2">WEEKLY</option>
                                    <option value="3">MONTHLY</option>
                                </select>
                                <!-- <input type='datetime-local' class="form-control" name="from_date" id="from_date" required/> -->
                                <input type="text" id="datetimepicker1_h" class="form-control" name="from_date" placeholder="dd-mm-yyyy AM/PM" required />
                                <!-- <input type='datetime-local' class="form-control" name="to_date" id="to_date" required/> -->
                                <input type="text" id="datetimepicker2_h" class="form-control" name="to_date" placeholder="dd-mm-yyyy AM/PM" required />

                                <button id="RideNow_h" type="submit" class="btn-theme">RIDE NOW</button>
                            </div>

                        </form>




                    </li>

                    <!-- <?php if (isset($_SESSION['user_id'])) { ?>
                      <li class="nev-item"><a href="<?= base_url() ?>my_account" class="">My Account</a></li>
                    <?php } ?>
                    <li class="nev-item"><a href="<?= base_url() ?>about" class="">About Us</a></li>
                    <li class="nev-item"><a href="<?= base_url() ?>contact_us" class="">Contact Us </a></li> -->
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nev-item">

                            <a href="<?= base_url() ?>User/logout">Logout</a>
                        </li>
                    <?php } elseif (!isset($_SESSION['user_id'])) { ?>
                        <li class="nev-item d-flex align-items-center ml-3">
                            <div class="contact-dropdown">
                                <h6 class="text-warning mb-0 cursor-pointer" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-phone text-warning mr-2"></i> Get In Touch </h6>

                                <!-- <div class="dropdown-menu py-0 p-2" aria-labelledby="dropdownMenuButton">
                                <div class="d-block align-item-center">
                                    <div class="text-center">
                                    <img src="assets\user\img\support.png"class="w-25 h-25 mb-2" alt="img">

                                    </div>
                                    <div class="list">
                                        <p class="mb-0"> <i class="fa fa-caret-right"></i> +1 201 984 9269</p>
                                        <p class="mb-0"> <i class="fa fa-caret-right"></i> +1 201 984 9269</p>
                                        <p class="mb-0"> <i class="fa fa-caret-right"></i> dami@.com</p>
                                    </div>
                                </div>

                            </div> -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog custom-modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="text-center">Call Us Now</h4>
                                                <ul class="phone d-flex justify-content-between mt-3">
                                                    <li><span><i class="fa fa-phone"></i></span><a href="tel:1234567890" class="mail">1234567890</a></li>
                                                    <li><span><i class="fa fa-phone"></i></span><a href="tel:1234567890" class="mail">1234567890</a></li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <h4 class="text-center mb-3">Write Us On</h4>
                                                <a href="mailto:support@snaprides.com" class="text-lowercase mail">support@snaprides.com</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url() ?>login">Login</a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="right-url">
                <ul class="links">
                    <li class="nev-item-last-a logo-a">
                        <a href="<?= base_url() ?>" class="logo-b">
                            <img src="<?= base_url() ?>assets/user/img/logo.png" alt="">
                        </a>
                    </li>
                    <li class="nev-item-last">
                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn ">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>

<div class="mobile-menu_wrapper" id="mobileMenu">
    <div class="offcanvas-menu-inner">
        <a href="#" class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="image-box">
            <!--<div class="box-image logo-a">-->
            <!--    <a href="<?= base_url() ?>" class="logo-b">-->
            <!--        <img src="<?= base_url() ?>assets/user/img/logo.png" alt="">-->
            <!--    </a>-->

            <!--</div>-->
        </div>
        <nav class="offcanvas-navigation">
            <ul class="mobile-menu">
                <li class="menu-item-has-children active"><a href="<?= base_url() ?>product"><span class="mm-text">Features</span></a></li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0);" class="welcome-modal">
                        <span class="mm-text">Platforms </span>
                    </a>

                <li class="menu-item-has-children"><a href="<?= base_url() ?>safety" class="ask-a-question"><span class="mm-text"> Covid-Safety </span></a></li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="menu-item-has-children"><a href="<?= base_url() ?>my_account" class="notes-free-pdf"><span class="mm-text"> My Account </span></a></li>
                <?php } ?>
                <!--<li class="menu-item-has-children"><a href="javascript:void(0);" class="notes-free-pdf"><span class="mm-text"> Pricing </span></a></li>-->
                <li class="menu-item-has-children"><a href="<?= base_url() ?>about" class="notes-free-pdf"><span class="mm-text"> About Us </span></a></li>
                <li class="menu-item-has-children"><a href="<?= base_url() ?>contact_us" class="notes-free-pdf"><span class="mm-text"> Contact Us </span></a></li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="menu-item-has-children"><a href="<?= base_url() ?>User/logout" class="notes-free-pdf"><span class="mm-text"> Logout </span></a></li>
                <?php } ?>
                <?php if ($_SESSION['user_id'] == '') { ?>
                    <li class="menu-item-has-children"><a href="<?= base_url() ?>login" class="notes-free-pdf"><span class="mm-text"> Login </span></a></li>

                <?php } ?>
            </ul>
        </nav>

    </div>
</div>

<div class="lofin-form-box1">
    <div class="main-box-login1">
        <div class="remove-cl-but"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="min-box-a">
            <div class="left-box">
                <div class="select-box">
                    <select name="" id="">
                        <option value="">Bengaluru</option>
                        <option value="">Hyderabad</option>
                        <option value="">Jaipur</option>
                        <option value="">Gurugram</option>
                        <option value="">Mysuru</option>
                        <option value="">Pune</option>
                        <option value="">Udaipur</option>
                        <option value="">Ahmedabad</option>
                        <option value="">Indore</option>
                    </select>
                    <ul class="listl">
                        <li class="links">MADHAPUR</li>
                        <li class="links">GACHIBOWLI</li>
                        <li class="links">AMEERPET</li>
                        <li class="links">DILSUKHNAGAR</li>
                        <li class="links">SECUNDERABAD</li>
                        <li class="links">RAIDURGAM POLICE</li>
                        <li class="links">COMMISSIONARATE</li>
                        <li class="links">CHANDA NAGAR</li>
                    </ul>
                </div>
            </div>
            <div class="right-box">
                <div class="min-slider">
                    <div class="main-box-benefits-i benefits-slider-a owl-theme owl-carousel">
                        <?php for ($i = 1; $i < 7; $i++) { ?>
                            <div class="single-benefits-wrap">
                                <div class="service-single">
                                    <a href="javascript:void(0);">
                                        <div class="service-img-blk">

                                            <img src="<?= base_url() ?>assets/user/img/product<?= $i ?>.png" alt="">
                                        </div>
                                        <div class="service-content-blk">
                                            <h6>Honda</h6>
                                            <p>Cliq</p>
                                            <p>₹ 249 / Daily(24 hrs)</p>
                                            <p>₹ 249 / Weekly(Mon-Fri)</p>
                                            <p>₹ 249 / Monthly(30 days)</p>
                                            <p>Minimum Billing ₹ 79/4 hours</p>
                                            <p>*conditions apply</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    //Update profile
    $(document).ready(function() {
        $("#profileUpdate").click(function() {
            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var contact_no = $("input[name='contact_no']").val();
            var address = $("textarea[name='address']").val();
            $.ajax({
                url: '<?= base_url() . 'User/updateProfile' ?>',
                type: "post",
                data: {
                    "id": '<?= (isset($userData->id)) ? ($userData->id) : 0  ?>',
                    "name": name,
                    "email": email,
                    "contact_no": contact_no,
                    "address": address
                },
                success: function(result) {
                    if (result == 'Profile update successfully') {
                        alert(result);
                    }
                }
            });
        });
    });


    $(document).ready(function() {

$('#datetimepicker1_h').datetimepicker({
    format: "d-m-Y H:00 a",
    minDate: 0,
    allowTimes: ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],
    //step:60
});

$('#datetimepicker2_h').change(function() {

    var bookTypeId = $('#booked_type_id_h').val();

    console.log($('#datetimepicker1_h').datetimepicker('getValue'));

    const l = new Date($('#datetimepicker1_h').datetimepicker('getValue'));
    const d = new Date($('#datetimepicker2_h').datetimepicker('getValue'));

    let hoursel = l.getHours();
    let datesel = l.getDate();

    //const d = new Date();
    let hourcur = d.getHours();
    let datecur = d.getDate();

    // if(bookTypeId == '')
    if ((hourcur == hoursel) && (datesel == datecur)) {
        $('#datetimepicker2_h').val("").datetimepicker("update");
        return swal({
            title: "Error",
            text: "Please select valid time",
            icon: "error",
            button: false,
            timer: 3000
        });

        return false;
    } else if ((hourcur <= hoursel) && (l > d)) {
        $('#datetimepicker2_h').val("").datetimepicker("update");
        return swal({
            title: "Error",
            text: "Please select valid time",
            icon: "error",
            button: false,
            timer: 3000
        });

        return false;
    } else if ((hourcur < hoursel) && (l == d)) {
        $('#datetimepicker2_h').val("").datetimepicker("update");
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

// Date Caluse
$('#datetimepicker1_h').change(function() {

    const l = new Date($('#datetimepicker1_h').datetimepicker('getValue'));
    let hoursel = l.getHours();
    let datesel = l.getDate();

    const d = new Date();
    let hourcur = d.getHours();
    let datecur = d.getDate();

    if ((datesel == datecur) && (hourcur > hoursel)) {
        return swal({
            title: "Error",
            text: "Please select valid time",
            icon: "error",
            button: false,
            timer: 3000
        });

        return false;
    }

    var bookType = $('#booked_type_id_h').val();
    
    $('#datetimepicker2_h').datetimepicker({
        format: "d-m-Y H:00 a",
    
        minDate: $('#datetimepicker1_h').datetimepicker('getValue'),
        allowTimes: ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'],        
    });
    
});
});


    $(document).on('click', '#RideNow_h', function() {

var city_id = $('#city_id_h').val();
//console.log(city_id);
if (city_id == '') {
    return swal({
        title: "Error",
        text: "Please select City",
        icon: "error",
        button: false,
        timer: 3000
    });

    return false;
}
});
</script>



<!--
<div class="otp-verify-form-box">
    <div class="main-box-otp-verify">
    <div class="remove-cl-but"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="image-profile">
        <img src="<?= base_url() ?>assets/user/img/profile.png" alt="">
    </div>
        <form action="">
            <h6 class="top-name">Enter OTP</h6>
            <p><small>Please enter OTP sent to   <span>+91 7354815494</span></small></p>
            <input type="tel" name="opt" maxlength="6" minlength="6" required id="" placeholder=" 0 0 0 0 0 0 ">
            <button type="submit" class="btn-theme-a1">Submit</button>
        </form>
    </div>
</div> -->