<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIDEPEJ - Bienvenido</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('image/icon.png') }}" rel="icon">
    <link href="{{ asset('image/icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- @include('frontend.partials.style') --}}
    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}
    <style>
        #btn-search{
            border-radius: 0px 5px 5px 0px !important
        }
        @media (max-width: 767px) {
            .btn-more, .sm-hide{
                display: none !important
            }
            .label-search{
                font-size: 20px
            }
        }
    </style>

    <!-- Template Main CSS File -->
    <link href="{{ asset('template/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: BizLand - v3.3.0
    * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->





    @stack('css')
</head>

    <body>

        <!-- ======= Top Bar ======= -->
        <section id="topbar" class="d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></i>
                <i class="bi bi-telephone-fill d-flex align-items-center ms-4"><span><a href="{{ setting('site.telefono') }}">{{ setting('site.telefono') }}</a></span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{ setting('redes-sociales.twitter') }}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="{{ setting('redes-sociales.facebook') }}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ setting('redes-sociales.instagram') }}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{ setting('redes-sociales.linkedin') }}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
            </div>
        </section>

        {{-- @include('frontend.partials.header') --}}
        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="/">SIS<span>COR</span></a></h1> -->
            <div class="container align-items-rigth">
                <a href="https://beni.gob.bo/" target="_blank">
                <img src="{{ asset('image/LOGO-BOTON-HOME.png')}}" alt="" width="230" height="60">
                </a>
            </div>
            
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                <li><a class="nav-link scrollto" href="{">Servicios</a></li>
                <li><a class="nav-link scrollto" href="#counts">Información</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contáctanos</a></li>
                <li><a class="nav-link scrollto" href="{{ route('voyager.login')}}">Administracion</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->



        @yield('content')

        {{-- @include('frontend.partials.footer') --}}

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container py-4">
                <div class="copyright">
                    &copy; Copyright <strong><span>GADBENI</span></strong> {{ date('Y') }}. Todos los derechos reservados
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                    Desarrollado por <a href="#"> Unidad de Desarrollo de Software</a>
                </div>
            </div>
        </footer>
        <!-- End Footer -->



        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        
        {{-- @include('frontend.partials.script') --}}

         <!-- Vendor JS Files -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('template/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/purecounter/purecounter.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('template/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('template/assets/js/main.js') }}"></script>
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#btn-search').click(function(){
                    let search = $('#input-search').val();
                    if(search){
                        $('#form-search input[name="search"]').val($('#input-search').val());
                        window.location = './#div-search';
                        $.post($('#form-search').attr('action'), $('#form-search').serialize(), function(res){
                            $('#div-search').html(res);
                        });
                    }
                });
            });
        </script>




    </body>

</html>