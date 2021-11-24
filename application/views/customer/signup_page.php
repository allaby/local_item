<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?= base_url() ?>assets/fontoffice/img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                        <h1 class="section-title white-color">Account</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- LOGIN AREA START (Register) -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <h1 class="section-title">Register <br>Your Account</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
                        Sit aliquid, Non distinctio vel iste.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="" id="create_cust" class="ltn__form-box contact-form-box">
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" onblur="checkstring($(this).val(), $(this).attr('id'))">
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" onblur="checkstring($(this).val(), $(this).attr('id'))">
                        <input type="text" name="email" id="email" placeholder="Email*">
                        <input type="password" name="password" id="password1" placeholder="Password*">
                        <input type="password" name="confirmpassword" id="password2" placeholder="Confirm Password*">
                        <!-- <label class="checkbox-inline">
                                <input type="checkbox" value="" id="">
                                I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                            </label> -->
                        <label class="checkbox-inline">
                            <input type="checkbox" value="" id="terms">
                            By clicking "create account", I consent to the privacy policy.
                        </label>
                        <div class="btn-wrapper">
                            <button id="submitbtn" class="theme-btn-1 btn reverse-color btn-block" type="submit" onclick="new_customer() ; return false">CREATE ACCOUNT</button>
                        </div>
                    </form>
                    <div class="by-agree text-center">
                        <p>By creating an account, you agree to our:</p>
                        <p><a href="#">TERMS OF CONDITIONS &nbsp; &nbsp; | &nbsp; &nbsp; PRIVACY POLICY</a></p>
                        <div class="go-to-btn mt-50">
                            <a href="login.html">ALREADY HAVE AN ACCOUNT ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN AREA END -->
<script>
    function checkstring(_string, _id) {
        // console.log(_id)
        let matchPattern = _string.match(/\d+/g);
        if (matchPattern != null) {
            alert("Only letter")
            $("#" + _id).val("");
        }
    }

    function new_customer() {
        $('#submitbtn').prop('disabled', true);
        $("#submitbtn").html('CREATING...')

        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var password = $("#password1").val();
        var pass_confirm = $("#password2").val();

        var terms = $("#terms").is(":checked") ? 1 : 0;

        $.ajax({
            method: "POST",
            url: '<?= base_url() ?>customer/create',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password,
                pass_confirm: pass_confirm,
                terms: terms
            },
            success: function(data) {
                console.log(data);
                var val = data.split("||");
                if (val[0] == "false") {
                    alert(val[1])
                    $('#submitbtn').prop('disabled', false);
                    $("#submitbtn").html('CREATE ACCOUNT')
                } else if (val[0] == "true") {
                    alert(val[1]);
                    $('#submitbtn').prop('disabled', false);
                    $("#submitbtn").html('COMPTE CREE')
                    $("#create_cust")[0].refresh();
                }
            }

        })

    }
</script>