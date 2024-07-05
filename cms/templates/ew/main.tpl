<!DOCTYPE html>
<html class="no-js" lang="en">
    {include file="./modules/head.tpl"}
    <body>

        <!-- Preloader-start -->
        <div id="preloader">
            <div class="ta-preloader-block">
                <div class="ta-spinner-eff">
                    <div class="ta-bar ta-bar-top"></div>
                    <div class="ta-bar ta-bar-right"></div>
                    <div class="ta-bar ta-bar-bottom"></div>
                    <div class="ta-bar ta-bar-left"></div>
                </div>
            </div>
        </div>
        <!-- Preloader-start-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-level-up-alt"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header>
            <div id="sticky-header" class="menu-area transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    {include file="./modules/logo.tpl"}
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active"><a href="#"><i class="fa fa-home"></i></a></li>
                                            <li><a href="#workingArea">Working Plan</a></li>
                                            <li><a href="#servicesArea">Our Services</a></li>
                                            <!-- <li><a href="#testimonialArea">Reviews</a></li> -->
                                            <li><a href="tel:+12153036333" class="text-danger">(609)540-3247</a></li>
                                            <li><a href="tel:+12153036333" class="text-danger">(267)699-8739</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul class="list-wrap">
                                            <li class="header-btn"><a class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Get Free Estimate</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo">
                                        <a href="#"><img src="{$theme}/assets/img/logo/logo.png" alt="Logo"></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix list-wrap">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->

        <!-- mian-area -->
        <main>
            <!-- banner-area -->
            <section class="banner-area">
                <div class="banner-shape" data-background="{$theme}/assets/img/banner/banner_shape.jpg"></div>
                <div class="banner-bg" data-background="{$theme}/assets/img/banner/banner_bg.jpg">
                    <div class="banner-content">
                        <h2 class="title wow fadeInDown" data-wow-delay=".2s">YOUR HOME NEW LOOK STARTS HERE</h2>
                        <p class="wow fadeInUp" data-wow-delay=".2s">Windows, Doors, Siding, Roofing, Gutters.</p>
                        <p class="wow fadeInUp" data-wow-delay=".4s">We offer the Best Repair & Construction Services</p>
                        <a href="#" class="btn wow fadeInUp" data-wow-delay=".5s">Discover More</a>
                    </div>
                    <div class="banner-tooltip-wrap">
                        <div class="tooltip-item" id="item1">
                            <div class="tooltip-btn pulse">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-content">
                                <h2 class="title">Doors</h2>
                                <p>Never think about replacing your roof again! Every new roof installed by our team comes with a 100% lifetime warranty on both labor and materials.</p>
                            </div>
                        </div>
                        <div class="tooltip-item" id="item2">
                            <div class="tooltip-btn pulse">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-content">
                                <h2 class="title">Windows</h2>
                                <p>Siding Installation: Trust our experts to install your new siding with precision and care, ensuring a flawless finish that enhances the look of your home.</p>
                            </div>
                        </div>
                        <div class="tooltip-item top" id="item3">
                            <div class="tooltip-btn pulse">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-content">
                                <h2 class="title">Siding</h2>
                                <p>Siding Installation: Trust our experts to install your new siding with precision and care, ensuring a flawless finish that enhances the look of your home.</p>
                            </div>
                        </div>
                        <div class="tooltip-item top" id="item4">
                            <div class="tooltip-btn pulse">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-content">
                                <h2 class="title">Roofing</h2>
                                <p>Never think about replacing your roof again! Every new roof installed by our team comes with a 100% lifetime warranty on both labor and materials.</p>
                            </div>
                        </div>
                        <div class="tooltip-item" id="item5">
                            <div class="tooltip-btn pulse">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-content">
                                <h2 class="title">Gutters</h2>
                                <p>Installing a gutter system on a roof is essential for efficient drainage. It prevents water accumulation, which can lead to structural damage, mold growth, and erosion.</p>
                            </div>
                        </div>
                        <div class="tooltip-item left" id="item6">
                            <div class="tooltip-btn pulse">
                                <i class="fas fa-plus"></i>
                            </div>
                            <div class="tooltip-content">
                                <h2 class="title">Painting</h2>
                                <p>Installing a gutter system on a roof is essential for efficient drainage. It prevents water accumulation, which can lead to structural damage, mold growth, and erosion.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- brand-area -->
                <div class="brand-area">
                    <div class="container">
                        <div class="brand-inner">
                            <div class="row brand-active">
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/2.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/3.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/4.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/5.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/6.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/7.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/8.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/9.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="brand-item">
                                        <img src="{$theme}/assets/img/brand/10.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- brand-area-end -->
            </section>
            <!-- banner-area-end -->

            <!-- work-area -->
            <section class="work-area pt-150 pb-80" id="workingArea">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-title text-center mb-50">
                                <span class="sub-title">Working Plan</span>
                                <h2 class="title">Working Process Plan</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="work-item">
                                <div class="work-thumb">
                                    <img src="{$theme}/assets/img/images/work_img01.png" alt="">
                                    <h4 class="number">01</h4>
                                </div>
                                <div class="work-content">
                                    <h2 class="title">Full Assessment</h2>
                                    <p>Our experts will conduct a comprehensive assessment of your property, evaluating the condition and identifying necessary repairs or replacements. We provide detailed recommendations tailored to your needs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="work-item">
                                <div class="work-thumb">
                                    <img src="{$theme}/assets/img/images/work_img02.png" alt="">
                                    <h4 class="number">02</h4>
                                </div>
                                <div class="work-content">
                                    <h2 class="title">Material and Design</h2>
                                    <p>Choose from a diverse range of high-quality materials and design options. Our team guides you through selections that enhance functionality and aesthetic appeal, ensuring a seamless integration with your home’s style.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="work-item">
                                <div class="work-thumb">
                                    <img src="{$theme}/assets/img/images/work_img03.png" alt="">
                                    <h4 class="number">03</h4>
                                </div>
                                <div class="work-content">
                                    <h2 class="title">Professional Installation</h2>
                                    <p>Experienced professionals handle every aspect of installation with precision and care. We adhere to industry-leading standards to deliver flawless execution, ensuring durability and performance.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="work-item">
                                <div class="work-thumb">
                                    <img src="{$theme}/assets/img/images/work_img04.png" alt="">
                                    <h4 class="number">04</h4>
                                </div>
                                <div class="work-content">
                                    <h2 class="title">Support and Maintenance</h2>
                                    <p>We prioritize long-term satisfaction, offering ongoing maintenance services to preserve the integrity of your installations. Count on us for reliable support and proactive care to extend the lifespan and efficiency of your home improvements.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- work-area-end -->

            <!-- services-area -->
            <section class="services-area pt-150 pb-120" id="servicesArea">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                                <span class="sub-title tg-element-title">What We Do</span>
                                <h2 class="title tg-element-title">Our Services Areas</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 col-sm-10">
                            <div class="services-item sbg1 wow fadeInUp" data-wow-delay=".15s">
                                <div class="services-icon">
                                    <i class="fa fa-cog fs-4"></i>
                                </div>
                                <div class="services-content">
                                    <h2 class="title"><a href="#">Roofing Repair & Replacement</a></h2>
                                    <h2 class="number">01</h2>
                                </div>
                                <div class="services-overlay-content">
                                    <h2 class="title"><a href="#">Roofing Repair & Replacement</a></h2>
                                    <p>We provide top-quality roofing repair and replacement using modern materials and techniques, ensuring durability and reliability.</p>
                                    <!-- <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-10">
                            <div class="services-item sbg2 wow fadeInUp" data-wow-delay=".15s">
                                <div class="services-icon">
                                    <i class="fa fa-cog fs-4"></i>
                                </div>
                                <div class="services-content">
                                    <h2 class="title"><a href="#">Siding Repair & Replacement</a></h2>
                                    <h2 class="number">02</h2>
                                </div>
                                <div class="services-overlay-content">
                                    <h2 class="title"><a href="#">Siding Repair & Replacement</a></h2>
                                    <p>Refresh your home's exterior with our professional siding repair and replacement services. Fast, high-quality, and long-lasting results.</p>
                                    <!-- <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-10">
                            <div class="services-item sbg3 wow fadeInUp" data-wow-delay=".15s">
                                <div class="services-icon">
                                    <i class="fa fa-cog fs-4"></i>
                                </div>
                                <div class="services-content">
                                    <h2 class="title"><a href="#">Gutters Repair & Replacement</a></h2>
                                    <h2 class="number">03</h2>
                                </div>
                                <div class="services-overlay-content">
                                    <h2 class="title"><a href="#">Gutters Repair &  Replacement</a></h2>
                                    <p>Expert gutter repair and replacement to protect your home from moisture. Quality materials and quick installation guaranteed.</p>
                                    <!-- <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-10">
                            <div class="services-item sbg4 wow fadeInUp" data-wow-delay=".15s">
                                <div class="services-icon">
                                    <i class="fa fa-cog fs-4"></i>
                                </div>
                                <div class="services-content">
                                    <h2 class="title"><a href="#">Windows Repair & Replacement</a></h2>
                                    <h2 class="number">04</h2>
                                </div>
                                <div class="services-overlay-content">
                                    <h2 class="title"><a href="#">Windows Repair & Replacement</a></h2>
                                    <p>Professional window repair and replacement to enhance insulation and aesthetics of your home. Fast and reliable service.</p>
                                    <!-- <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->
        </main>
        <!-- mian-area-end -->

        <!-- footer-area -->
        <footer>
            <div class="footer-area footer-bg" data-background="{$theme}/assets/img/bg/footer_bg.jpg">
                <div class="footer-top">
                    <div class="container">
                        <div class="footer-logo-area">
                            <div class="row align-items-center">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="logo">
                                        <a href="#"><img src="{$theme}/assets/img/logo/logo.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="footer-contact">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="content">
                                            <span>Phone Number:</span>
                                            <a href="tel:+12153036333">+1(609)540-3247</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="footer-contact">
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="content">
                                            <span>Phone Number:</span>
                                            <a href="tel:+12153036333">+1(267)699-8739</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="copyright-text">
                                    <p>Exterior.Works © Copyright 2023. All Right Reserved</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-bootom-menu">
                                    <ul class="list-wrap">
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-area-end -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="contact-form-wrap" data-background="{$theme}/assets/img/images/contact_form_bg.jpg">
                        <h2 class="title">Get Free Estimate</h2>
                        <p>Send us a message and we' ll respond as soon as possible</p>
                        {include file="./submit_feedback.tpl"}
                    </div>
                </div>
            </div>
            </div>
        </div>

        {include file="./modules/bodyendscripts.tpl"}
    </body>
</html>