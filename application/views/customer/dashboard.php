<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?= base_url() ?>assets/fontoffice/img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                        <h1 class="section-title white-color">My Account</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- WISHLIST AREA START -->
<div class="liton__wishlist-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- PRODUCT TAB AREA START -->
                <div class="ltn__product-tab-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ltn__tab-menu-list mb-50">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" href="#liton_tab_1_1">Tableau de bord <i class="fas fa-home"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_2">Mes commandes <i class="fas fa-file-alt"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_3">Mes reçus <i class="fas fa-arrow-down"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_4">Mon Adresse <i class="fas fa-map-marker-alt"></i></a>
                                        <a data-toggle="tab" href="#liton_tab_1_5">Paramêtres <i class="fas fa-user"></i></a>
                                        <a href="<?= base_url(); ?>myaccount/logout">Se déconnecter <i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="liton_tab_1_1">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>Salut <strong><?= $this->session->userdata('firstname') ?></strong> (je ne suis pas <strong><?= $this->session->userdata('firstname') ?></strong>? <small><a href="<?= base_url() ?>myaccount/logout">Se deconnecter</a></small> )</p>
                                            <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_2">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive" style="height : 300px ;overflow : scroll">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Commandes</th>
                                                            <th>Date</th>
                                                            <th>Statut</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($myorders as $order) : ?>
                                                            <tr>
                                                                <td><?= $order->code ?></td>
                                                                <td><?= ($order->creation_date) ?></td>
                                                                <td>
                                                                    <?php if ($order->status == 1) {
                                                                        echo "PENDING";
                                                                    } elseif ($order->status == 0) {
                                                                        echo "GRANTED";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?= number_format($order->total, 2, ',', ' ') ?> €</td>
                                                                <td>
                                                                    <a data-id="<?= $order->order_id ?>" href="javascript:void(0)" onclick="openorderdetail($(this).attr('data-id'))"><i class="fa fa-eye"></i></a>
                                                                    <a data-id="<?= $order->order_id ?>" href="javascript:void(0)" onclick=""><i class="fa fa-list"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_3">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Carsafe - Car Service PSD Template</td>
                                                            <td>Nov 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service HTML Template</td>
                                                            <td>Nov 10, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service WordPress Theme</td>
                                                            <td>Nov 12, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_4">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>The following addresses will be used on the checkout page by default.</p>
                                            <div class="row">
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <h4>Billing Address <small><a href="#">edit</a></small></h4>
                                                    <address>
                                                        <p><strong>Alex Tuntuni</strong></p>
                                                        <p>1355 Market St, Suite 900 <br>
                                                            San Francisco, CA 94103</p>
                                                        <p>Mobile: (123) 456-7890</p>
                                                    </address>
                                                </div>
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <h4>Shipping Address <small><a href="#">edit</a></small></h4>
                                                    <address>
                                                        <p><strong>Alex Tuntuni</strong></p>
                                                        <p>1355 Market St, Suite 900 <br>
                                                            San Francisco, CA 94103</p>
                                                        <p>Mobile: (123) 456-7890</p>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="liton_tab_1_5">
                                        <div class="ltn__myaccount-tab-content-inner">
                                            <p>The following addresses will be used on the checkout page by default.</p>
                                            <div class="ltn__form-box">
                                                <form action="#">
                                                    <div class="row mb-50">
                                                        <div class="col-md-6">
                                                            <label>First name:</label>
                                                            <input type="text" name="ltn__name" value="<?= $this->session->userdata('lastname') ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Last name:</label>
                                                            <input type="text" name="ltn__lastname" value="<?= $this->session->userdata('firstname') ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Display Name:</label>
                                                            <input type="text" name="ltn__lastname" placeholder="Ethan" value="<?= $this->session->userdata('firstname') ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Display Email:</label>
                                                            <input type="email" name="ltn__lastname" placeholder="example@example.com" value="<?= $this->session->userdata('email') ?>">
                                                        </div>
                                                    </div>
                                                    <form id="chang_pass_form">
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Current password (leave blank to leave unchanged):</label>
                                                                    <input type="password" name="ltn__name" id="chng_pass_old">
                                                                    <label>New password (leave blank to leave unchanged):</label>
                                                                    <input type="password" name="ltn__lastname" id="chng_pass_new">
                                                                    <label>Confirm new password:</label>
                                                                    <input type="password" name="ltn__lastname" id="chng_pass_new_conf">
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="btn-wrapper">
                                                            <button type="submit" id="chan_pass_smtbtn" onclick="changpass();return false" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT TAB AREA END -->
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="order_modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id='orderdetails'>
                <!-- <p>Modal body text goes here.</p> -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- WISHLIST AREA START -->


<script>
    function openorderdetail(_order) {
        $.ajax({
            method: 'POST',
            url: '<?= base_url(); ?>shop/orderdetails',
            data: {
                orderid: _order
            },
            success: function(data) {
                $("#orderdetails").html(data);
                $("#order_modal").modal("show");
                // console.log(data);
            }
        })
    }


    function changpass() {
        $("#chan_pass_smtbtn").attr("disabled", true);
        $("#chan_pass_smtbtn").html("UPDATING...");
        var old_pass = $("#chng_pass_old").val();
        var new_pass = $("#chng_pass_new").val();
        var conf_pass = $("#chng_pass_new_conf").val();
        // console.log(old_pass);
        $.ajax({
            method: 'POST',
            url: "<?= base_url() ?>customer/changpass",
            data: {
                old_pass: old_pass,
                new_pass: new_pass,
                conf_pass: conf_pass
            },
            success: function(data) {
                // console.log(data);
                var val = data.split("||");
                if (val[0] == "false") {
                    toastr.error(val[1])
                    $("#chan_pass_smtbtn").attr("disabled", false);
                    $("#chan_pass_smtbtn").html("SAVE CHANGE");
                } else if (val[0] == "true") {
                    $("#chan_pass_smtbtn").attr("disabled", false);
                    $("#chan_pass_smtbtn").html("SAVE CHANGE");
                    $("#chang_pass_form")[0].refresh();
                    Toast.fire({
                        icon: 'success',
                        title: val[1],
                    })
                }
            }
        })
    }
</script>