<!DOCTYPE html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <title>Comunity - Tococo Indonesia
        </title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg"/>

        <!-- ========================= CSS here ========================= -->
        <link rel="stylesheet" href="{{ asset('fe/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('fe/css/LineIcons.3.0.css') }}"/>
        <link rel="stylesheet" href="{{ asset('fe/css/animate.css') }}"/>
        <link rel="stylesheet" href="{{ asset('fe/css/glightbox.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('fe/css/main.css') }}"/>

    </head>

    <body>
        <!--[if lte IE 9]> <p class="browserupgrade"> You are using an
        <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/">upgrade your browser</a> to improve your
        experience and security. </p> <![endif]-->

        <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- /End Preloader -->

        <!-- Start Header Area -->
        <header class="header navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="nav-inner">
                            <!-- Start Navbar -->
                            <nav class="navbar navbar-expand-lg">
                                <a class="navbar-brand" href="">
                                    <img src="{{ asset('fe/images/logo/logo.png') }}" width="50px" alt="Logo">
                                    <img src="{{ asset('fe/images/logo/logo-txt.png') }}" width="90px" alt="Logo">

                                </a>
                                <button
                                    class="navbar-toggler mobile-menu-btn"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a href="" class="active" aria-label="Toggle navigation">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href=""  aria-label="Toggle navigation">Loyalty</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href=""  aria-label="Toggle navigation">Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href=""  aria-label="Toggle navigation">Article</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- navbar collapse -->
                                <div class="button">
                                    <div class="btn">Your Points : {{ number_format($formData->points, 0) }} </div>
                                </div>
                            </nav>
                            <!-- End Navbar -->
                          
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </header>
        <!-- End Header Area -->

        <!-- Start Hero Area -->
        <section class="hero-area">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                        <div class="hero-content">
                            <div class="header-content">
                                <h4 class="wow fadeInUp" data-wow-delay=".2s">Terima Kasih atas Kontribusimu,
                                    {{ $formData->name }}!</h4>
                                <h1 class="wow fadeInUp" data-wow-delay=".4s">Setiap Pembelianmu Membantu Petani Kelapa</h1>
                              
                                <p class="wow fadeInUp" data-wow-delay=".8s">
                                    Kamu telah membantu sekitar
                                    <strong>50
                                        petani</strong>
                                    dalam membuka jalan menuju masa depan yang lebih sejahtera
                                </p>
                                <h5 class="wow fadeInUp" data-wow-delay="1s">Nikmati produk eksklusif dan diskon hanya untukmu</h5>
                                <div class="button wow zoomIn" data-wow-delay="1.2s">
                                    <a href="#products">
                                        <i class="lni lni-arrow-down-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Hero Area -->

        <!-- Start Progress Area -->
      
        <!-- End Progress Area -->

        <!-- Start Loyalty Rank Area -->
        <section class="features section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 class="wow zoomIn" data-wow-delay=".2s">Peringkat Loyalitas Kamu</h3>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">
                                Kamu saat ini berada di peringkat:
                                <span
                                    style="color:
                            {{ $loyaltyRank === 'Master Pengupas Kelapa' ? '#ff9800' :
                               ($loyaltyRank === 'Petani Kelapa Berpengalaman' ? '#c0c0c0' :
                               ($loyaltyRank === 'Petani Pemula' ? '#cd7f32' : '#000')) }};">
                                    {{ $loyaltyRank }}
                                </span>
                            </h2>
                           
                        </div>
                    </div>
                </div>
                <section class="progress-area mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                                <div class="progress-content ">
                                
                                    <p class="wow fadeInUp text-center" data-wow-delay=".4s">
                                        Sejauh ini, kamu telah berkontribusi sebesar
                                        <strong>{{ number_format($contribution, 2) }} %</strong>. Lihat dampakmu secara visual di bawah ini!
                                    </p>
                                    <div class="progress-bar wow fadeInUp my-3" data-wow-delay=".6s" >
                                        <div class="progress" style="width: {{ $contribution }}%;"></div>
                                    </div>
                                    <p class="wow fadeInUp text-center" data-wow-delay=".8s">
                                        Dengan terus berkontribusi, Anda tidak hanya meningkatkan kesejahteraan lebih banyak petani, tetapi juga membawa kita lebih dekat pada tujuan keberlanjutan bersama. Dapatkan keuntungan eksklusif dan naikkan peringkat Anda sekarang!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="row">
                    <div class="col-12">
                        <h3 class="wow zoomIn mb-4 text-center" data-wow-delay=".2s">Top 3 Customer</h3>
                        @foreach($top3Customers as $customer)

                        <div class="single-feature wow fadeInUp">
                            <div class="row">
                                <div class="col-6 wow fadeInUp" data-wow-delay=".2s">
                                    
                                    <h4>
                                        {{ $customer['name'] }}</h4>
                                    <p>Kontribusi:
                                        {{ number_format($customer['contribution'], 2) }}%</p>
                                    <p>Poin:
                                        {{ number_format($customer['points'], 0) }} Points</p>
                                    <p>Peringkat:
                                        {{ $customer['loyaltyRank'] }}</p>
                                </div>
                                <div class="col-6  icon-rank text-center">
                                  
                                </div>
                                
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- End Loyalty Rank Area -->

        <!-- Start Services Area -->
        <section class="services section" id="products">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 class="wow zoomIn" data-wow-delay=".2s">Produk Rekomendasi</h3>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Temukan Produk Pilihan Kami</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Berikut adalah produk yang kami rekomendasikan untuk kamu.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Rekomendasi Produk 1 -->
                        <div class="single-service">
                               <img src="{{ asset('fe/images/products/tococoori.jpeg')}}" alt="">
                            <h4 class="text-title">Tococo Chips</h4>
                            <p>Produk terbaik untuk kesehatanmu. Dapatkan diskon eksklusif hanya untukmu!</p>
                            <div class="cta-buttons">
                                <a href="https://shopee.co.id/tococoindonesia" class="btn btn-danger m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/shopee.png')}}" width="20px" alt="">  Shopee
                                </a>
                                <a href="https://tokopedia.com/tococoindonesia" class="btn btn-success m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/tokped.png')}}" width="25px" alt=""> Tokopedia
                                </a>
                                <a href="https://wa.me/" class="btn btn-info m-2" target="_blank">
                                    <i class="lni lni-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Rekomendasi Produk 1 -->
                        <div class="single-service">
                               <img src="{{ asset('fe/images/products/tococoori.jpeg')}}" alt="">
                            <h4 class="text-title">Tococo Chips</h4>
                            <p>Produk terbaik untuk kesehatanmu. Dapatkan diskon eksklusif hanya untukmu!</p>
                            <div class="cta-buttons">
                                <a href="https://shopee.co.id/tococoindonesia" class="btn btn-danger m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/shopee.png')}}" width="20px" alt="">  Shopee
                                </a>
                                <a href="https://tokopedia.com/tococoindonesia" class="btn btn-success m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/tokped.png')}}" width="25px" alt=""> Tokopedia
                                </a>
                                <a href="https://wa.me/" class="btn btn-info m-2" target="_blank">
                                    <i class="lni lni-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Rekomendasi Produk 1 -->
                        <div class="single-service">
                               <img src="{{ asset('fe/images/products/tococoori.jpeg')}}" alt="">
                            <h4 class="text-title">Tococo Chips</h4>
                            <p>Produk terbaik untuk kesehatanmu. Dapatkan diskon eksklusif hanya untukmu!</p>
                            <div class="cta-buttons">
                                <a href="https://shopee.co.id/tococoindonesia" class="btn btn-danger m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/shopee.png')}}" width="20px" alt="">  Shopee
                                </a>
                                <a href="https://tokopedia.com/tococoindonesia" class="btn btn-success m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/tokped.png')}}" width="25px" alt=""> Tokopedia
                                </a>
                                <a href="https://wa.me/" class="btn btn-info m-2" target="_blank">
                                    <i class="lni lni-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Rekomendasi Produk 1 -->
                        <div class="single-service">
                               <img src="{{ asset('fe/images/products/tococoori.jpeg')}}" alt="">
                            <h4 class="text-title">Tococo Chips</h4>
                            <p>Produk terbaik untuk kesehatanmu. Dapatkan diskon eksklusif hanya untukmu!</p>
                            <div class="cta-buttons">
                                <a href="https://shopee.co.id/tococoindonesia" class="btn btn-danger m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/shopee.png')}}" width="20px" alt="">  Shopee
                                </a>
                                <a href="https://tokopedia.com/tococoindonesia" class="btn btn-success m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/tokped.png')}}" width="25px" alt=""> Tokopedia
                                </a>
                                <a href="https://wa.me/" class="btn btn-info m-2" target="_blank">
                                    <i class="lni lni-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Rekomendasi Produk 1 -->
                        <div class="single-service">
                               <img src="{{ asset('fe/images/products/tococoori.jpeg')}}" alt="">
                            <h4 class="text-title">Tococo Chips</h4>
                            <p>Produk terbaik untuk kesehatanmu. Dapatkan diskon eksklusif hanya untukmu!</p>
                            <div class="cta-buttons">
                                <a href="https://shopee.co.id/tococoindonesia" class="btn btn-danger m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/shopee.png')}}" width="20px" alt="">  Shopee
                                </a>
                                <a href="https://tokopedia.com/tococoindonesia" class="btn btn-success m-2" target="_blank">
                                    <img src="{{ asset('fe/images/logo/tokped.png')}}" width="25px" alt=""> Tokopedia
                                </a>
                                <a href="https://wa.me/" class="btn btn-info m-2" target="_blank">
                                    <i class="lni lni-whatsapp"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Call to Action untuk Sosial Media dan Marketplace -->
                <div class="row ">
                    <div class="section-title mt-5">
                            <h2 class="wow zoomIn" data-wow-delay=".2s">Ikuti kami</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Dapatkan informasi update terbaru</p>
                        </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-service">
                            <div class="f-icon">
                                <i class="lni lni-facebook-original"></i>
                            </div>
                            <h4 class="text-title">Ikuti Kami di Facebook</h4>
                            <p>Bergabunglah dengan komunitas kami dan dapatkan penawaran spesial.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".4s">
                        <div class="single-service">
                            <div class="f-icon">
                                <i class="lni lni-instagram"></i>
                            </div>
                            <h4 class="text-title">Ikuti Kami di Instagram</h4>
                            <p>Tetap terhubung untuk mendapatkan inspirasi, tips, dan diskon eksklusif.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".6s">
                        <div class="single-service">
                            <div class="f-icon">
                                <i class="lni lni-shopping-basket"></i>
                            </div>
                            <h4 class="text-title">Beli di Marketplace</h4>
                            <p>Temukan kami di Tokopedia dan Shopee, dan nikmati belanja yang mudah dan aman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- End Services Area -->

        <!-- Start About Area -->
        <section class="about section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="content">
                            <h2>
                                <span>ABOUT US
                                </span>
                                Everything Your Website Needs From Start Up To Success
                            </h2>
                            <p>Dictum non consectetur a erat nam at lectus urna. Hac habitasse platea
                                dictumst quisque sagittis. Augue lacus viverra vitae congue eu consequat ac</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="image">
                            <img src="{{ asset('fe/images/about/about-45.jpg') }}" alt="#">
                            <img class="shape" src="{{ asset('fe/images/shapes/shape.png') }}" alt="#">
                            <div class="play-thumb">
                                <a
                                    href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM"
                                    class="glightbox video">
                                    <i class="lni lni-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->


        <!-- Start Blog Section Area -->
        <section class="blog-section section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 class="wow zoomIn" data-wow-delay=".2s">Artikel Terbaru</h3>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Berita dan Cerita Kami</h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">Jelajahi dan pelajari lebih lanjut tentang manfaat kelapa, 
                                kisah petani, dan bagaimana kontribusi kamu membantu menciptakan perubahan.</p>
                        </div>                        
                    </div>
                </div>
                    <div class="row">
                        @if(!empty($externalData['data']))
                            @foreach ($externalData['data'] as $blog)
                                <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                                    <!-- Start Single Blog Grid -->
                                    <div class="single-blog-grid">
                                        <div class="blog-img">
                                            <a href="{{ url('http://127.0.0.1:8001/blog/' . $blog['blog_slug']) }}"> <!-- Link ke slug -->
                                                <img src="{{ asset('http://127.0.0.1:8001/upload/blogs/' . $blog['blog_img']) }}" alt="#">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="meta-info">
                                                <a class="date" href="javascript:void(0)">by. {{ $blog['author'] }}</a>
                                            </div>
                                            <h4>
                                                <a href="{{ url('http://127.0.0.1:8001/blog/' . $blog['blog_slug']) }}">{{ $blog['blog_title'] }}</a> <!-- Link ke slug -->
                                            </h4>
                                            <p>{{ Str::limit(strip_tags($blog['blog_content']), 100) }}...</p> <!-- Ringkasan konten -->
                                        </div>
                                    </div>
                                    <!-- End Single Blog Grid -->
                                </div>
                            @endforeach
                        @else
                            <p>Tidak ada blog terbaru saat ini.</p>
                        @endif
                    </div>

                    
                </div>
            </div>
        </section>
        <!-- End Blog Section Area -->


        <!-- Start Call Action Area -->
        <section class="call-action">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-7 col-12">
                            <div class="text">
                                <h2>Ready To Get Start?
                                    <br>
                                    <span>Choose Your Favirote Plan Now.</span>
                                </h2>
                                <p style="display: block;margin-top: 10px;">Explore and learn more about
                                    everything from machine learning and global payments to scaling your team.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5 col-12">
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Get Started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Call Action Area -->

        <!-- Start Footer Area -->
        <footer class="footer section">
            <!-- Start Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-about">
                                    <div class="logo">
                                        <a href="">
                                            <img src="{{ asset('fe/images/logo/logo.png') }}" width="40px" alt="Logo">

                                        </a>
                                    </div>
                                    <p>We are Hostpack 29 years of experience on this field with most talanted
                                        peoples and leaders.
                                    </p>
                                    <a class="call" href="tel:8884014678">
                                        <i class="lni lni-phone-set"></i>
                                        888-401-4678</a>
                                    <div class="payments">
                                        <img src="{{ asset('fe/images/footer/cards.png') }}" alt="#">
                                    </div>
                                    <ul class="social">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-facebook-filled"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-twitter-original"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-linkedin-original"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="copyright-text">© 2023 HostGrids.<br>
                                        Designed and Developed by
                                        <a href="https://graygrids.com/" target="_blank">GrayGrids</a>
                                    </p>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-2 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Pages</h3>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">About Us</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Services</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Pricing
                                                <span style="margin-left: 4px;" class="badge bg-success rounded text-white">Try Me</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Contact</a>
                                        </li>
                                    </ul>
                                    <h4 class="mt-40 mb-20 text-white" style="font-size: 18px;">Hosting</h4>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">Shared Hosting</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Dedicated Hosting</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Reseller Hosting</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-2 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer f-link">
                                    <h3>Security</h3>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Disclaimer</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">FAQ</a>
                                        </li>
                                    </ul>
                                    <h4 class="mt-40 mb-20 text-white" style="font-size: 18px;">Support</h4>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">Support Center</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Status Updates</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Knowledgebase</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Single Widget -->
                                <div class="single-footer latest-news">
                                    <h3>Latest News</h3>
                                    <div class="single-head">
                                        <!-- Start Single News -->
                                        <div class="single-news">
                                            <span class="date">
                                                <a href="javascript:void(0)">NOVEMBER 29, 2023</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="{{ asset('blog-single.html') }}">An artistic Technology turning real here</a>
                                            </h4>
                                        </div>
                                        <!-- End Single News -->
                                        <!-- Start Single News -->
                                        <div class="single-news">
                                            <span class="date">
                                                <a href="javascript:void(0)">NOVEMBER 22, 2023</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="{{ asset('blog-single.html') }}">better time for buying a web hosting is today</a>
                                            </h4>
                                        </div>
                                        <!-- End Single News -->
                                        <!-- Start Single News -->
                                        <div class="single-news">
                                            <span class="date">
                                                <a href="javascript:void(0)">NOVEMBER 15, 2023</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="{{ asset('blog-single.html') }}">better time for buying a web hosting is today</a>
                                            </h4>
                                        </div>
                                        <!-- End Single News -->
                                    </div>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Footer Top -->
            <!-- Start Footer Bottom Area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="inner-content">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <p class="text">Offers valid for a limited time only hostpack reflect multi
                                    annual discounts. Other terms and conditions may apply.
                                    <a href="javascript:void(0)">Click Here</a>

                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="align-right">
                                    <img src="{{ asset('fe/images/footer/certificate3.png') }}" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom Area -->
        </footer>
        <!--/ End Footer Area -->

        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top">
            <i class="lni lni-arrow-up-circle"></i>
        </a>

        <!-- ========================= JS here ========================= -->
        <script src="{{ asset('fe/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('fe/js/wow.min.js') }}"></script>
        <script src="{{ asset('fe/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('fe/js/count-up.min.js') }}"></script>
        <script src="{{ asset('fe/js/main.js') }}"></script>
        <script>
            window.onscroll = function () {
                let header_navbar = document.querySelector(".navbar-area");
                let sticky = header_navbar.offsetTop;

                let logo = document.querySelector('.navbar-brand img')
                if (window.pageYOffset > sticky) {
                    header_navbar
                        .classList
                        .add("sticky");
                    logo.src = '{{ asset("fe/images/logo/logo.png") }}'; // Mengubah source logo menjadi logo.png
                } else {
                    header_navbar
                        .classList
                        .remove("sticky");
                    logo.src = '{{ asset("fe/images/logo/logo.png") }}'; // Mengubah source logo menjadi logo.png
                }

                // show or hide the back-top-top button
                let backToTo = document.querySelector(".scroll-top");
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    backToTo.style.display = "flex";
                } else {
                    backToTo.style.display = "none";
                }
            };

        
            //========= glightbox
            GLightbox({
                'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZ' +
                        'A1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
                'type': 'video',
                'source': 'youtube', //vimeo, youtube or local
                'width': 900,
                'autoplayVideos': true
            });
        </script>
    </body>

</html>