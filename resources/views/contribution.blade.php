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

        <link
            href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.2/dist/sweetalert2.min.css
"
            rel="stylesheet">

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
                                            <a href="#loyalty" aria-label="Toggle navigation">Loyalty</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#products" aria-label="Toggle navigation">Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#article" aria-label="Toggle navigation">Article</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- navbar collapse -->
                                <div class="button">
                                    <div class="btn">Point Ditambah:
                                        {{ number_format($formData->points, 0) }}
                                    </div>
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

        <section class="hero-area">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                        <div class="hero-content">
                            <div class="header-content ">
                                <h4 class="wow fadeInUp" data-wow-delay=".2s">Terima Kasih atas Kontribusimu,
                                    {{ $formData->name }}!</h4>
                                <h1 class="wow fadeInUp" data-wow-delay=".4s">Setiap Pembelianmu Membantu Petani Kelapa</h1>
                                <p class="wow fadeInUp" data-wow-delay=".8s">
                                    Kamu telah membantu sekitar
                                    <strong>50 petani</strong>
                                    dalam membuka jalan menuju masa depan yang lebih sejahtera.
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

        <section class="features section" id="loyalty">
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
                        <section class="progress-area mb-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                                        <div class="progress-content ">
                                            <p class="wow fadeInUp text-center" data-wow-delay=".4s">
                                                Sejauh ini, kamu telah berkontribusi sebesar
                                                <strong>{{ number_format($customerContributionPercent, 2) }}
                                                    %</strong>. Lihat dampakmu secara visual di bawah ini!
                                            </p>
                                            <div class="progress-bar wow fadeInUp my-3" data-wow-delay=".6s">
                                                <div class="progress" style="width: {{ $customerContributionPercent }}%;"></div>
                                            </div>
                                            <p class="wow fadeInUp text-center" data-wow-delay=".8s">
                                                Dengan terus berkontribusi, Anda tidak hanya meningkatkan kesejahteraan lebih
                                                banyak petani, tetapi juga membawa kita lebih dekat pada tujuan keberlanjutan
                                                bersama. Dapatkan keuntungan eksklusif dan naikkan peringkat Anda sekarang!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h3 class="wow zoomIn mb-4 text-center" data-wow-delay=".2s">Top 3 Customer</h3>
                        @foreach($top3Customers as $customer)
                        <div class="single-feature wow fadeInUp">
                            <div class="row">
                                <div class="col-12 wow fadeInUp" data-wow-delay=".2s">

                                    <h4>{{ $customer->name }}</h4>
                                    <p>Poin:
                                        {{ number_format($customer->total_points, 0) }}
                                        Points</p>
                                    <p>Peringkat:
                                        {{ $loyaltyRank }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

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
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Rekomendasi Produk 1 -->

                        <div class="single-service">
                            <img src="{{ url('https://tococoindonesia.com/upload/products/' . $product['product_img_1']) }}" alt="">
                            <h4 class="text-title">{{ $product['product_name'] }}
                                -
                                {{ $product['product_varian'] }}</h4>
                            <p>{{ implode(' ', array_slice(explode(' ', $product['product_desc']), 0, 10)) }}...</p>
                            <div class="cta-buttons">
                                <a
                                    href="https://shopee.co.id/tococochipsofficial"
                                    class="btn btn-danger m-2"
                                    target="_blank">
                                    <img src="{{ asset('fe/images/logo/shopee.png')}}" width="20px" alt="">
                                    Shopee
                                </a>
                                <a
                                    href="https://tokopedia.com/tococochipsofficial"
                                    class="btn btn-success m-2"
                                    target="_blank">
                                    <img src="{{ asset('fe/images/logo/tokped.png')}}" width="25px" alt="">
                                    Tokopedia
                                </a>
                                <a
                                    href="https://wa.me/+6281392385176?text=Halo%20kak,%20saya%20ingin%20bertanya%20mengenai%20{{ urlencode($product['product_name']) }}.%20Bisa%20dibantu?"
                                    class="btn btn-info m-2"
                                    target="_blank">
                                    <i class="lni lni-whatsapp"></i>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Start Blog Section Area -->
        <section class="blog-section section" id="article">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 class="wow zoomIn" data-wow-delay=".2s">Artikel Terbaru</h3>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Berita dan Cerita Kami</h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">Jelajahi dan pelajari lebih lanjut
                                tentang manfaat kelapa, kisah petani, dan bagaimana kontribusi kamu membantu
                                menciptakan perubahan.</p>
                        </div>

                    </div>

                </div>
                <div class="row">
                    @if(!empty($blogs)) @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                        <!-- Start Single Blog Grid -->
                        <div class="single-blog-grid">
                            <div class="blog-img">
                                <a href="{{ url('https://tococoindonesia.com/blog/' . $blog['blog_slug']) }}">
                                    <img
                                        src="{{ asset('https://tococoindonesia.com/upload/blogs/' . $blog['blog_img']) }}"
                                        alt="#">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="meta-info">
                                    <a class="date" href="javascript:void(0)">by.
                                        {{ $blog['author'] }}</a>
                                </div>
                                <h4>
                                    <a href="{{ url('https://tococoindonesia.com/blog/' . $blog['blog_slug']) }}">{{ $blog['blog_title'] }}</a>
                                    <!-- Make sure 'blog_title' exists -->
                                </h4>
                            </div>
                        </div>
                    </div>
                    @endforeach @else
                    <p>Tidak ada artikel terbaru saat ini.</p>
                    @endif
                </div>

            </div>
        </div>
    </section>

    <!-- Start Call Action Area -->
    <section class="call-action">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7 col-12">
                        <div class="text">
                            <h2>Siap Menukarkan Poin Anda?
                                <br>
                                <span>Gabung dengan Komunitas Kami Sekarang dan Tukarkan Poin Eksklusif Anda.</span>
                            </h2>
                            <p style="display: block; margin-top: 10px;">Dengan menukarkan poin Anda, Anda
                                dapat berkontribusi lebih jauh kepada petani kelapa kami dan mendapatkan produk
                                eksklusif serta diskon khusus.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-12">
                        <div class="button">
                            <a
                                href="https://wa.me/+6281392385176?text={{ urlencode('Halo, saya ingin menukarkan poin saya dan bergabung dengan program loyalitas!') }}"
                                class="btn btn-success"
                                target="_blank">
                                Tukarkan Poin Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Action Area -->

    <!-- Start Footer Area -->

    <footer class="text-center bg-body-tertiary">
        <!-- Grid container -->
        <div class="container">
            <!-- Section: Social media -->
            <section class="">
                <!-- Facebook -->
                <a class="navbar-brand" href="">
                    <img src="{{ asset('fe/images/logo/logo.png') }}" width="50px" alt="Logo">
                    <img src="{{ asset('fe/images/logo/logo-txt.png') }}" width="90px" alt="Logo">

                </a>
                <!-- Github -->

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            Powered By
            <a class="text-body" href="https://tiancode.my.id/">Tiancode.my.id</a>
            <br>
            Copyright &copy;
            <span >{{date('Y')}}</span>
        </div>
        <!-- Copyright -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-arrow-up-circle"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('fe/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('fe/js/wow.min.js') }}"></script>
    <script src="{{ asset('fe/js/sweetallert.js') }}"></script>
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
     
    </script>

    @if(session('success'))
    <script>
        Swal
            .fire({
                title: 'Selamat!',
                text: '{{ session(' success.message ') }} Anda mendapatkan {{ session('success.points') }} poin! ',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tukar Poin'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ session('success.exchange_link') }}"; // Menggunakan link WhatsApp dari controller
                }
            });
    </script>
    @endif
</body>

</html>