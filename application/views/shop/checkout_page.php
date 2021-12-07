<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?= base_url() ?>assets/fontoffice/img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                        <h1 class="section-title white-color">Checkout</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="ltn__checkout-area mb-105">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__checkout-inner">
                    <?php if ($this->session->userdata('is_logged') == false) : ?>
                        <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                            <h5>Not login yet? <a class="ltn__secondary-color" href="#ltn__returning-customer-login" data-toggle="collapse">Click here to login</a></h5>
                            <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn_coupon-code-form ltn__form-box">
                                    <p>Please login your accont.</p>
                                    <form action="" id="login_form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="email" id="ltn_email" name="ltn_name" placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="password" id="ltn_pass" name="ltn_pass" placeholder="Enter password">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" id="submitbtn" onclick="login();return false" class="btn theme-btn-1 btn-effect-1 text-uppercase">Se connecter</button>
                                        <!-- <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Remember me</label>
                                    <p class="mt-30"><a href="register.html">Lost your password?</a></p> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                        <h5>Have a coupon? <a class="ltn__secondary-color" href="#ltn__coupon-code" data-toggle="collapse">Click here to enter your code</a></h5>
                        <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                            <div class="ltn__coupon-code-form">
                                <p>If you have a coupon code, please apply it below.</p>
                                <form action="#">
                                    <input type="text" name="coupon-code" placeholder="Coupon code">
                                    <button class="btn theme-btn-2 btn-effect-2 text-uppercase">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__checkout-single-content mt-50">
                        <h4 class="title-2">Billing Details</h4>
                        <div class="ltn__checkout-single-content-info">
                            <form action="" id="ord_form">
                                <h6>Personal Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="ord_firstname" id="ord_firstname" placeholder="First name" value="<?= $this->session->userdata('firstname') ? $this->session->userdata('firstname') : " " ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="ord_lastname" id="ord_lastname" placeholder="Last name" value="<?= $this->session->userdata('lastname') ? $this->session->userdata('lastname') : " " ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="ord_email" id="ord_email" placeholder="email address" value="<?= $this->session->userdata('email') ? $this->session->userdata('email') : " " ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-phone ltn__custom-icon">
                                            <input type="text" name="ord_phone" id="ord_phone" placeholder="phone number" value="<?= $this->session->userdata('phone') ? $this->session->userdata('phone') : " " ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-website ltn__custom-icon">
                                            <input type="text" name="ord_company" id="ord_company" placeholder="Company name (optional)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-item input-item-website ltn__custom-icon">
                                            <input type="text" name="ord_comp_phone" id="ord_comp_phone" placeholder="Company address (optional)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Country</h6>
                                        <div class="input-item">
                                            <select class="nice-select" id="ord_country">
                                                <option value="">Select Country</option>
                                                <?php if ($this->session->userdata('country')) : ?>
                                                    <option value="<?= $this->session->userdata('country') ?>" selected><?= $this->session->userdata('country') ?></option>
                                                <?php endif; ?>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Aland Islands">Aland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curacao">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kosovo">Kosovo</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Martin">Saint Martin</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Sint Maarten">Sint Maarten</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                <option value="South Sudan">South Sudan</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-Leste">Timor-Leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Address</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" id="ord_address" name="ord_address" placeholder="House number and street name" value="<?= $this->session->userdata('street') ? $this->session->userdata('street') : " " ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" id="ord_address2" name="ord_address2" placeholder="Apartment, suite, unit etc. (optional)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Town / City</h6>
                                        <div class="input-item">
                                            <input type="text" id="ord_city" name="ord_city" placeholder="City" value="<?= $this->session->userdata('city') ? $this->session->userdata('city') : " " ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <h6>State </h6>
                                        <div class="input-item">
                                            <input type="text" placeholder="State" id="ord_state" name="ord_state">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <h6>Zip</h6>
                                        <div class="input-item">
                                            <input type="text" id="ord_zip" value="<?= $this->session->userdata('postalcode') ? $this->session->userdata('postalcode') : '' ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Create an account?</label></p> -->
                                <h6>Order Notes (optional)</h6>
                                <div class="input-item input-item-textarea ltn__custom-icon">
                                    <textarea name="ord_note" id="ord_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ltn__checkout-payment-method mt-50">
                    <h4 class="title-2">Payment Method</h4>
                    <div id="checkout_accordion_1">
                        <!-- card -->
                        <div class="card">
                            <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1" aria-expanded="false">
                                Check payments
                            </h5>
                            <div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">
                                <div class="card-body">
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="true">
                                Cash on delivery
                            </h5>
                            <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
                                <div class="card-body">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div>
                        </div>
                        <!-- card -->
                        <div class="card">
                            <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-3" aria-expanded="false">
                                PayPal <img src="<?= base_url() ?>assets/fontoffice/img/icons/payment-3.png" alt="#">
                            </h5>
                            <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
                                <div class="card-body">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__payment-note mt-30 mb-30">
                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                    </div>
                    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit" onclick="placeorder();return false">Place order</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping-cart-total mt-50">
                    <h4 class="title-2">Cart Totals</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Shipping and Handing</td>
                                <td>$15.00</td>
                            </tr>
                            <tr>
                                <td>Vat</td>
                                <td>$00.00</td>
                            </tr>
                            <tr>
                                <td><strong>Order Total</strong></td>
                                <td><strong><?= number_format($this->cart->total(), 2, ',', ' '); ?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->
<script>
    function login() {
        $('#submitbtn').prop('disabled', true);
        $("#submitbtn").html('Connexion...')

        var email = $("#ltn_email").val();
        var password = $("#ltn_pass").val();

        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>customer/signin",
            data: {
                email: email,
                password: password,
            },
            success: function(data) {
                console.log(data);
                var val = data.split("||");
                if (val[0] == "false") {
                    alert(val[1]);
                    $('#submitbtn').prop('disabled', false);
                    $("#submitbtn").html('Se connecter');
                } else if (val[0] == "true") {
                    $('#submitbtn').prop('disabled', false);
                    $("#submitbtn").html('Connexion établie, patienter svp...');
                    location.reload();
                }
            }
        })
    }


    function placeorder() {
        var firstname = $('#ord_firstname').val();
        var lastname = $('#ord_lastname').val();
        var email = $('#ord_email').val();
        var phone = $('#ord_phone').val();
        var company = $('#ord_company').val();
        var company_phone = $('#ord_comp_phone').val();
        var country = $('#ord_country').val();
        var address = $('#ord_address').val();
        var address2 = $('#ord_address2').val();
        var city = $('#ord_city').val();
        var state = $('#ord_state').val();
        var zip = $('#ord_zip').val();
        var note = $('#ord_note').val();

        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>shop/place_order',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                phone: phone,
                company: company,
                company_phone: company_phone,
                country: country,
                address: address,
                address2: address2,
                city: city,
                state: state,
                zip: zip,
                note: note
            },
            success: function(data) {
                console.log(data);
                var val = data.split("||");
                if (val[0] == "false") {
                    toastr.error(val[1])
                } else if (val[0] == "true") {
                    Toast.fire({
                        icon: 'success',
                        title: 'Votre commande à été soumise avec succes'
                    })
                    window.location.href = "<?= base_url() ?>customer/invoice/"+val[1];
                }
            }
        })
    }
</script>