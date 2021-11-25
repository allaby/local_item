<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="<?= base_url() ?>assets/fontoffice/img/bg/9.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h6 class="section-subtitle ltn__secondary-color">// Welcome to our company</h6>
                        <h1 class="section-title white-color">Cart</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SHOPING CART AREA START -->
<div class="liton__shoping-cart-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <div class="shoping-cart-table table-responsive">
                        <table class="table">
                            <!-- <thead>
                                <th class="cart-product-remove">Remove</th>
                                <th class="cart-product-image">Image</th>
                                <th class="cart-product-info">Product</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Subtotal</th>
                            </thead> -->
                            <tbody class="cart-items">

                            </tbody>
                        </table>
                    </div>
                    <div class="shoping-cart-total mt-50">
                        <h4>Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td>$618.00</td>
                                </tr>
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
                                    <td><strong><?= number_format($this->cart->total(), 2, ',', ' ') ; ?> €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right">
                            <a href="<?= base_url() ?>checkout" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOPING CART AREA END -->

<script>
    $(document).ready(function() {
        // alert("ready!");
        load_cart_table();
    });

    $(".removeitem").on("click", function(){
        var rowid = $(this).attr("data-id");
        console.log(rowid);
    })


    function update_cart(qty) {
        var item_id = $("#cart_item_id").val();
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>shop/update_cart",
            data: {
                qty: qty,
                item_id: item_id
            },
            success: function(data) {
                // console.log(data);
                if (data == "true") {
                    // alert('Cart updated')
                    load_cart_table();
                } else if (data == "false") {
                    alert('Cart not updated')
                }
            }
        })
    }

    function load_cart_table() {
        $.ajax({
            url: "<?= base_url() ?>shop/load_cart",
            success: function(data) {
                // console.log(data);
                $(".cart-items").fadeIn('slow');
                $(".cart-items").html(data);
            }
        })
    }


    function removerow(rowid) {
        console.log(rowid)
    };

    

</script>