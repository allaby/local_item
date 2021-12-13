<!doctype html>
<html class="no-js" lang="zxx">


<!-- Mirrored from tunatheme.com/tf/html/broccoli-preview/broccoli/index-5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Nov 2021 13:08:44 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Broccoli - Organic Food HTML Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/fontoffice/img/favicon.png" type="image/x-icon" />
    <!-- Font Icons css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontoffice/css/font-icons.css">
    <!-- plugins css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontoffice/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontoffice/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fontoffice/css/responsive.css">
</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <!-- HEADER AREA START (header-5) -->
        <header class="ltn__header-area ltn__header-5 ltn__header-transparent gradient-color-2">
            <!-- ltn__header-top-area start -->
            <div class="ltn__header-top-area top-area-color-white d-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a></li>
                                    <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> info@webmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="top-bar-right text-right">
                                <div class="ltn__top-bar-menu">
                                    <ul>
                                        <li>
                                            <!-- ltn__language-menu -->
                                            <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                                <ul>
                                                    <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                        <ul>
                                                            <li><a href="#">Arabic</a></li>
                                                            <li><a href="#">Bengali</a></li>
                                                            <li><a href="#">Chinese</a></li>
                                                            <li><a href="#">English</a></li>
                                                            <li><a href="#">French</a></li>
                                                            <li><a href="#">Hindi</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- ltn__social-media -->
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-top-area end -->

            <!-- ltn__header-middle-area start -->
            <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-black plr--9---">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="site-logo-wrap">
                                <div class="site-logo">
                                    <a href="index.html"><img src="<?= base_url() ?>assets/fontoffice/img/logo-2.png" alt="Logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col header-menu-column menu-color-white">
                            <div class="header-menu d-none d-xl-block">
                                <nav>
                                    <div class="ltn__main-menu">
                                        <ul>
                                            <li class=""><a href="<?= base_url() ?>">Accueil</a>
                                            </li>
                                            <li class=""><a href="#">About</a>
                                            </li>
                                            <li class=""><a href="<?= base_url() ?>shop">Shop</a>
                                            </li>
                                            <li><a href="#">Contact</a></li>
                                            <!-- <li class="special-link"><a href="contact.html">GET A QUOTE</a></li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="ltn__header-options ltn__header-options-2">
                            <!-- header-search-1 -->
                            <div class="header-search-wrap">
                                <div class="header-search-1">
                                    <div class="search-icon">
                                        <i class="icon-search for-search-show"></i>
                                        <i class="icon-cancel  for-search-close"></i>
                                    </div>
                                </div>
                                <div class="header-search-1-form">
                                    <form id="#" method="get" action="#">
                                        <input type="text" name="search" value="" placeholder="Search here..." />
                                        <button type="submit">
                                            <span><i class="icon-search"></i></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- user-menu -->
                            <?php if ($this->session->userdata('is_logged') == true) { ?>
                                <div class="ltn__drop-menu user-menu">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-user"></i></a>
                                            <ul>
                                                <li><a href="<?= base_url() ?>myaccount/dashboard">Mon Compte</a></li>
                                                <li><a href="javascript:void(0)">Wishlist</a></li>
                                                <li><a href="<?= base_url() ?>myaccount/logout">Se deconnecter</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            <?php } else { ?>
                                <div class="ltn__drop-menu user-menu">
                                    <ul>
                                        <li>
                                            <a href="<?= base_url() ?>customer/login" title="Connexion"><i class="icon-user"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <!-- mini-cart -->
                            <div class="mini-cart-icon">
                                <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                    <i class="icon-shopping-cart"></i>
                                    <sup id="cart_count"></sup>
                                </a>
                            </div>
                            <!-- mini-cart -->
                            <!-- Mobile Menu Button -->
                            <div class="mobile-menu-toggle d-xl-none">
                                <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                    <svg viewBox="0 0 800 600">
                                        <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                        <path d="M300,320 L540,320" id="middle"></path>
                                        <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-middle-area end -->

        </header>
        <!-- HEADER AREA END -->

        <!-- Utilize Cart Menu Start -->
        <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <span class="ltn__utilize-menu-title">Cart</span>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="mini-cart-product-area ltn__scrollbar">
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="<?= base_url() ?>assets/fontoffice/img/product/1.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Red Hot Tomato</a></h6>
                            <span class="mini-cart-quantity">1 x $65.00</span>
                        </div>
                    </div>
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="<?= base_url() ?>assets/fontoffice/img/product/2.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Vegetables Juices</a></h6>
                            <span class="mini-cart-quantity">1 x $85.00</span>
                        </div>
                    </div>
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="<?= base_url() ?>assets/fontoffice/img/product/3.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Orange Sliced Mix</a></h6>
                            <span class="mini-cart-quantity">1 x $92.00</span>
                        </div>
                    </div>
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            <a href="#"><img src="<?= base_url() ?>assets/fontoffice/img/product/4.png" alt="Image"></a>
                            <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">Orange Fresh Juice</a></h6>
                            <span class="mini-cart-quantity">1 x $68.00</span>
                        </div>
                    </div>
                </div>
                <div class="mini-cart-footer">
                    <div class="mini-cart-sub-total">
                        <h5>Subtotal: <span>$310.00</span></h5>
                    </div>
                    <div class="btn-wrapper">
                        <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                        <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                    </div>
                    <p>Free Shipping on All Orders Over $100!</p>
                </div>

            </div>
        </div>
        <!-- Utilize Cart Menu End -->

        <!-- Utilize Mobile Menu Start -->
        <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                    <div class="site-logo">
                        <a href="index.html"><img src="<?= base_url() ?>assets/fontoffice/img/logo.png" alt="Logo"></a>
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu-search-form">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="ltn__utilize-menu">
                    <ul>
                        <li><a href="#">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home Pages 01</a></li>
                                <li><a href="index-2.html">Home Pages 02</a></li>
                                <li><a href="index-3.html">Home Pages 03</a></li>
                                <li><a href="index-4.html">Home Pages 04</a></li>
                                <li><a href="index-5.html">Home Pages 05 <span class="menu-item-badge">video</span></a></li>
                                <li><a href="index-6.html">Home Pages 06</a></li>
                                <li><a href="index-7.html">Home Pages 07</a></li>
                                <li><a href="index-8.html">Home Pages 08</a></li>
                                <li><a href="index-9.html">Home Pages 09</a></li>
                                <li><a href="index-10.html">Home Pages 10</a></li>
                                <li><a href="index-11.html">Home Pages 11 <span class="menu-item-badge">Service</span></a></li>
                            </ul>
                        </li>
                        <li><a href="#">About</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team Details</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="locations.html">Google Map Locations</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="shop-grid.html">Shop Grid</a></li>
                                <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                                <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                <li><a href="product-details.html">Shop details </a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="order-tracking.html">Order Tracking</a></li>
                                <li><a href="account.html">My Account</a></li>
                                <li><a href="login.html">Sign in</a></li>
                                <li><a href="register.html">Register</a></li>
                            </ul>
                        </li>
                        <li><a href="#">News</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">News</a></li>
                                <li><a href="blog-grid.html">News Grid</a></li>
                                <li><a href="blog-left-sidebar.html">News Left sidebar</a></li>
                                <li><a href="blog-right-sidebar.html">News Right sidebar</a></li>
                                <li><a href="blog-details.html">News details</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="team-details.html">Team Details</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="history.html">History</a></li>
                                <li><a href="contact.html">Appointment</a></li>
                                <li><a href="locations.html">Google Map Locations</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                    <ul>
                        <li>
                            <a href="account.html" title="My Account">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-user"></i>
                                </span>
                                My Account
                            </a>
                        </li>
                        <li>
                            <a href="wishlist.html" title="Wishlist">
                                <span class="utilize-btn-icon">
                                    <i class="far fa-heart"></i>
                                    <sup>3</sup>
                                </span>
                                Wishlist
                            </a>
                        </li>
                        <li>
                            <a href="cart.html" title="Shoping Cart">
                                <span class="utilize-btn-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                    <sup>5</sup>
                                </span>
                                Shoping Cart
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ltn__social-media-2">
                    <ul>
                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Utilize Mobile Menu End -->

        <div class="ltn__utilize-overlay"></div>


        <!-- SLIDER AREA START (slider-4) -->
        <div class="ltn__slider-area ltn__slider-4 position-relative">
            <div class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">

                <!-- HTML5 VIDEO -->
                <video autoplay muted loop id="myVideo">
                    <source src="<?= base_url() ?>assets/fontoffice/media/1.mp4" type="video/mp4">
                </video>

                <!-- YouTube VIDEO -->
                <!-- <div class="ltn__youtube-video-background">
                <iframe frameborder="0" height="100%" width="100%"
                  src="https://www.youtube.com/embed/eySTo2GgvoY?playlist=eySTo2GgvoY&loop=1&controls=0&showinfo=0&autoplay=1&mute=1">
                </iframe>
            </div> -->


                <!-- ltn__slide-item -->
                <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-7 bg-image--- bg-overlay-theme-black-20" data-bg="<?= base_url() ?>assets/fontoffice/img/slider/41.jpg">
                    <div class="ltn__slide-item-inner text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 align-self-center">
                                    <div class="slide-item-info">
                                        <div class="slide-item-info-inner ltn__slide-animation">
                                            <h6 class="slide-sub-title white-color animated">// TALENTED ENGINEER & MECHANICS</h6>
                                            <h1 class="slide-title text-uppercase white-color animated ">Orgacin Firm <br> Service Provide</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SLIDER AREA END -->

        <!-- ABOUT US AREA START -->
        <div class="ltn__about-us-area pt-115 pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 align-self-center">
                        <div class="about-us-info-wrap">
                            <div class="section-title-area ltn__section-title-2">
                                <h6 class="section-subtitle ltn__secondary-color">// About Us</h6>
                                <h1 class="section-title">Get Amazing Service From Us<span>.</span></h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                            <div class="about-us-info-wrap-inner about-us-info-devide">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <div class="list-item-with-icon">
                                    <ul>
                                        <li><a href="contact.html">24/7 Online Support</a></li>
                                        <li><a href="team.html">Expert Team</a></li>
                                        <li><a href="service-details.html">Pure Equipment</a></li>
                                        <li><a href="shop.html">Unlimited Product</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 align-self-center">
                        <div class="get-a-quote-wrap">
                            <h2>Get A Quote</h2>
                            <form action="#" class="get-a-quote-form">
                                <div class="input-item input-item-name ltn__custom-icon">
                                    <input type="text" placeholder="Enter your name">
                                </div>
                                <div class="input-item input-item-email ltn__custom-icon">
                                    <input type="email" placeholder="Enter your email">
                                </div>
                                <div class="input-item">
                                    <select class="nice-select">
                                        <option>Select Service Type</option>
                                        <option>Gardening</option>
                                        <option>Landscaping</option>
                                    </select>
                                </div>
                                <div class="btn-wrapper mt-0">
                                    <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">get an appointment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT US AREA END -->

        <!-- WHY CHOOSE US AREA START -->
        <div class="ltn__why-choose-us-area section-bg-1 pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="why-choose-us-info-wrap">
                            <div class="section-title-area ltn__section-title-2">
                                <h6 class="section-subtitle ltn__secondary-color">// Why Choose Us</h6>
                                <h1 class="section-title">We're Providing The Best Solution<span>.</span></h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="why-choose-us-feature-item">
                                        <div class="why-choose-us-feature-icon">
                                            <!-- <i class="icon-car-parts-1"></i> -->
                                            <img src="<?= base_url() ?>assets/fontoffice/img/icons/icon-img/21.png" alt="#">
                                        </div>
                                        <div class="why-choose-us-feature-brief">
                                            <h3><a href="service-details.html">Anytime Get Your Service</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="why-choose-us-feature-item">
                                        <div class="why-choose-us-feature-icon">
                                            <!-- <i class="icon-automobile"></i> -->
                                            <img src="<?= base_url() ?>assets/fontoffice/img/icons/icon-img/22.png" alt="#">
                                        </div>
                                        <div class="why-choose-us-feature-brief">
                                            <h3><a href="service-details.html">Curated Products Service</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="why-choose-us-img-wrap">
                            <div class="why-choose-us-img-1 text-left">
                                <img src="<?= base_url() ?>assets/fontoffice/img/others/1.jpg" alt="Image">
                            </div>
                            <div class="why-choose-us-img-2 text-right">
                                <img src="<?= base_url() ?>assets/fontoffice/img/others/2.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- WHY CHOOSE US AREA END -->

        <!-- PRICING PLAN AREA START -->
        <div class="ltn__pricing-plan-area pt-115 pb-120" id="liton_pricing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h6 class="section-subtitle ltn__secondary-color">// Our Price</h6>
                            <h1 class="section-title">Pricing Plan<span>.</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-50">
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__pricing-plan-item text-center">
                            <h2 class="pricing-title">Gardening</h2>
                            <div class="pricing-price">
                                <h2><sup>$</sup>49<sub>/M</sub></h2>
                            </div>
                            <ul>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                            </ul>
                            <div class="btn-wrapper">
                                <a href="#" class="theme-btn-2 btn">PURCHASE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__pricing-plan-item text-center active ---active-price">
                            <span class="pricing-badge">Most Popular</span>
                            <h2 class="pricing-title">Gardening</h2>
                            <div class="pricing-price">
                                <h2><sup>$</sup>79<sub>/M</sub></h2>
                            </div>
                            <ul>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                            </ul>
                            <div class="btn-wrapper">
                                <a href="#" class="theme-btn-2 btn">PURCHASE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__pricing-plan-item text-center">
                            <h2 class="pricing-title">Gardening</h2>
                            <div class="pricing-price">
                                <h2><sup>$</sup>99<sub>/M</sub></h2>
                            </div>
                            <ul>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                                <li>Lorem, ipsum dolor</li>
                                <li>Lorem ipsum dolor sit</li>
                            </ul>
                            <div class="btn-wrapper">
                                <a href="#" class="theme-btn-2 btn">PURCHASE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRICING PLAN AREA END -->

        <!-- SERVICE AREA START (Service 1) -->
        <div class="ltn__service-area ltn__primary-bg before-bg-1 pt-115 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h6 class="section-subtitle ltn__secondary-color">// Service</h6>
                            <h1 class="section-title white-color">What We Do<span>.</span></h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__service-item-1">
                            <div class="service-item-img">
                                <img src="<?= base_url() ?>assets/fontoffice/img/service/1.jpg" alt="#">
                                <div class="service-item-icon d-none">
                                    <i class="icon-mechanic"></i>
                                </div>
                            </div>
                            <div class="service-item-brief">
                                <h3><a href="service-details.html">Harvest Innovations</a></h3>
                                <p>Lorem ipsum dolor sit amet, consect</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__service-item-1">
                            <div class="service-item-img">
                                <img src="<?= base_url() ?>assets/fontoffice/img/service/2.jpg" alt="#">
                                <div class="service-item-icon d-none">
                                    <i class="icon-car-parts-3"></i>
                                </div>
                            </div>
                            <div class="service-item-brief">
                                <h3><a href="service-details.html">Agriculture Farming</a></h3>
                                <p>Lorem ipsum dolor sit amet, consect</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="ltn__service-item-1">
                            <div class="service-item-img">
                                <img src="<?= base_url() ?>assets/fontoffice/img/service/3.jpg" alt="#">
                                <div class="service-item-icon d-none">
                                    <i class="icon-repair"></i>
                                </div>
                            </div>
                            <div class="service-item-brief">
                                <h3><a href="service-details.html">Ecological Farming</a></h3>
                                <p>Lorem ipsum dolor sit amet, consect</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SERVICE AREA END -->

        <!-- FEATURE AREA START ( Feature - 3) -->
        <div class="ltn__feature-area pt-115 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 section-title-style-3">
                            <div class="section-brief-in">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                            <div class="section-title-in">
                                <h6 class="section-subtitle ltn__secondary-color">// Why Choose Us</h6>
                                <h1 class="section-title">Get Extra Benifits<span>.</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row  justify-content-center">
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-3 text-right">
                                    <div class="ltn__feature-icon">
                                        <span><i class="icon-car-parts"></i></span>
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="service-details.html">Fresh Food</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consect
                                            icing elit, sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-3 text-right">
                                    <div class="ltn__feature-icon">
                                        <span><i class="icon-exterior"></i></span>
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="service-details.html">Safe Food</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consect
                                            icing elit, sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-3 text-right">
                                    <div class="ltn__feature-icon">
                                        <span><i class="icon-car-parts-6"></i></span>
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="service-details.html">Quickest Delivery</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consect
                                            icing elit, sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature-banner-img text-center mb-30">
                            <img src="<?= base_url() ?>assets/fontoffice/img/others/2.png" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row  justify-content-center">
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-3">
                                    <div class="ltn__feature-icon">
                                        <span><i class="icon-car-parts-7"></i></span>
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="service-details.html">Healthy Food Habit</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consect
                                            icing elit, sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-3">
                                    <div class="ltn__feature-icon">
                                        <span><i class="icon-car-parts-8"></i></span>
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="service-details.html">Environmental safety</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consect
                                            icing elit, sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-3">
                                    <div class="ltn__feature-icon">
                                        <span><i class="icon-car-parts-3"></i></span>
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h3><a href="service-details.html">Honesty & Integrity</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consect
                                            icing elit, sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->

        <!-- IMAGE SLIDER AREA START (img-slider-2) -->
        <div class="ltn__img-slider-area ltn__img-slider-2 section-bg-1 pt-115 pb-250">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h6 class="section-subtitle ltn__secondary-color">// Portfolio</h6>
                            <h1 class="section-title">We Have Done<span>.</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row ltn__image-slider-2-active slick-arrow-1 slick-arrow-1-inner">
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-2">
                            <a href="img/img-slide/1.jpg" data-rel="lightcase:myCollection">
                                <img src="<?= base_url() ?>assets/fontoffice/img/img-slide/1.jpg" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-2">
                            <a href="img/img-slide/2.jpg" data-rel="lightcase:myCollection">
                                <img src="<?= base_url() ?>assets/fontoffice/img/img-slide/2.jpg" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-2">
                            <a href="img/img-slide/3.jpg" data-rel="lightcase:myCollection">
                                <img src="<?= base_url() ?>assets/fontoffice/img/img-slide/3.jpg" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-2">
                            <a href="img/img-slide/4.jpg" data-rel="lightcase:myCollection">
                                <img src="<?= base_url() ?>assets/fontoffice/img/img-slide/4.jpg" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-2">
                            <a href="img/img-slide/1.jpg" data-rel="lightcase:myCollection">
                                <img src="<?= base_url() ?>assets/fontoffice/img/img-slide/1.jpg" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-2">
                            <a href="img/img-slide/2.jpg" data-rel="lightcase:myCollection">
                                <img src="<?= base_url() ?>assets/fontoffice/img/img-slide/2.jpg" alt="Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- IMAGE SLIDER AREA END -->

        <!-- CALL TO ACTION START ( Service Form ) -->
        <div class="ltn__service-form-wrap-area">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-xl-11 offset-xl-1">
                        <div class="ltn__service-form-area ltn__service-form-1 ltn__service-form-margin bg-image bg-overlay-theme-black-60 pt-115 pb-95" data-bg="img/bg/2.jpg">
                            <div class="row">
                                <div class="col-xl-5 col-lg-12 align-self-center">
                                    <div class="ltn__service-form-brief">
                                        <div class="section-title-area ltn__section-title-2 mb-0">
                                            <h6 class="section-subtitle white-color">// Call To Action</h6>
                                            <h1 class="section-title white-color">Get An Free Service
                                                From Us.</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-12 align-self-center">
                                    <div class="ltn__service-form-wrap ltn__service-form-color-white">
                                        <form action="#" class="ltn__service-form-box">
                                            <ul>
                                                <li>
                                                    <select class="nice-select">
                                                        <option>Service Name</option>
                                                        <option>Gardening</option>
                                                        <option>Landscaping</option>
                                                        <option>Land Prepare</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <div class="input-item input-item-date mb-0 ltn__custom-icon">
                                                        <input type="text" name="date" placeholder="DATE">
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="btn-wrapper">
                                                        <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Check Availability</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CALL TO ACTION END -->

        <!-- BLOG AREA START (blog-3) -->
        <div class="ltn__blog-area pt-115 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2 text-center">
                            <h1 class="section-title white-color---">Leatest Blog</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?= base_url() ?>assets/fontoffice/img/blog/1.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">Common Engine Oil Problems and Solutions</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?= base_url() ?>assets/fontoffice/img/blog/2.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">How and when to replace brake rotors</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2020</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?= base_url() ?>assets/fontoffice/img/blog/3.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">Elenance, Servicing & Repairs</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>August 22, 2020</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?= base_url() ?>assets/fontoffice/img/blog/4.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">Healthiest Vegetables on Earth</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?= base_url() ?>assets/fontoffice/img/blog/5.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Services</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">How te Your Tires Last Longer</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2020</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->

        <!-- FEATURE AREA START ( Feature - 3) -->
        <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url() ?>assets/fontoffice/img/icons/icon-img/11.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Curated Products</h4>
                                            <p>Provide Curated Products for
                                                all product over $100</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url() ?>assets/fontoffice/img/icons/icon-img/12.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Handmade</h4>
                                            <p>We ensure the product quality
                                                that is our main goal</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url() ?>assets/fontoffice/img/icons/icon-img/13.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Natural Food</h4>
                                            <p>Return product within 3 days
                                                for any product you buy</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-12">
                                    <div class="ltn__feature-item ltn__feature-item-8">
                                        <div class="ltn__feature-icon">
                                            <img src="<?= base_url() ?>assets/fontoffice/img/icons/icon-img/14.png" alt="#">
                                        </div>
                                        <div class="ltn__feature-info">
                                            <h4>Free home delivery</h4>
                                            <p>We ensure the product quality
                                                that you can trust easily</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURE AREA END -->