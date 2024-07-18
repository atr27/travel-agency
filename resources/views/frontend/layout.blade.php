<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ahmad Taufik R Travel Agency</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/img/favicon.png') }}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/gijgo.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/slicknav.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" />
    <link rel="stylesheet"
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />

    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" />
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{ Storage::url($setting->logo) }}" alt="" width="150" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li>
                                                <a class="active" href="/">home</a>
                                            </li>
                                            <li>
                                                <a href="/about">About</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('destination.index') }}">Destination</a>
                                            </li>
                                            <li>
                                                <a href="/contact">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p>
                                            <i class="fa fa-phone"></i>
                                            {{ $setting->number }}
                                        </p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li>
                                                <a target="_blank" href="{{ $setting->instagram }}">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="{{ $setting->linkedin }}">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="{{ $setting->facebook }}">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    @if (auth()->user())
                                            <button onclick="event.preventDefault(); document.getElementById('logout').submit();" class="text-danger font-bold bg-white" style="border: none; cursor: pointer;">Logout</button>
                                            <form action="{{ route('logout') }}" id="logout" method="post" class="hidden">@csrf</form>
                                    @else
                                        <a href="/login" class="btn btn-danger">Login</a>
                                        <a href="/register" class="btn btn-danger ml-2">Register</a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('content')

    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="template/template/img/footer_logo.png" alt="" />
                                </a>
                            </div>
                            <p>
                                Pabaki, Bandung<br />
                                <a href="#">{{ $setting->number }}</a> <br />
                                <a href="#">
                                    @auth
                                        {{ auth()->user()->email }}
                                    @endauth
                                </a>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a target="_blank" href="{{ $setting->facebook }}">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="{{ $setting->instagram }}">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">Company</h3>
                            <ul class="links">
                                <li><a href="/about">About</a></li>
                                <li><a href="{{ route('destination.index') }}">Destination</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Popular destination</h3>
                            <ul class="links double_links">
                                <li><a href="#">Bali</a></li>
                                <li><a href="#">Lombok</a></li>
                                <li><a href="#">Yogyakarta</a></li>
                                <li><a href="#">Bandung</a></li>
                                <li><a href="#">Jakarta</a></li>
                                <li><a href="#">Malang</a></li>
                                <li><a href="#">Surabaya</a></li>
                                <li><a href="#">Padang</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">Instagram</h3>
                            <div class="instagram_feed">
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="https://th.bing.com/th/id/OIP.09J0C2vp0f5U4MhcoSeg0AHaE8?w=214&h=180&c=7&r=0&o=5&pid=1.7"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="data:image/jpeg;base64,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"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="https://th.bing.com/th/id/OIP.aSIT2DKu1nc3VtNpvKrSkQHaE8?w=261&h=180&c=7&r=0&o=5&pid=1.7"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="https://th.bing.com/th/id/OIP.ShZdQbYWtQHokK39wG-2KgHaEK?w=306&h=180&c=7&r=0&o=5&pid=1.7"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="https://th.bing.com/th/id/OIP.SNCZs_1LD97Q5clLEl-k0wHaEK?w=314&h=180&c=7&r=0&o=5&pid=1.7"
                                            alt="" />
                                    </a>
                                </div>
                                <div class="single_insta">
                                    <a href="#">
                                        <img src="https://th.bing.com/th/id/OIP.2W54G8QAurc0b3pp6xUUgAHaEu?w=261&h=180&c=7&r=0&o=5&pid=1.7"
                                            alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This website is made with
                            by
                            <a href="{{ $setting->linkedin }}">Ahmad Taufik R</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <input type="text" placeholder="Search" />
                    <button type="submit">search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- link that opens popup -->
    <!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
        src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js">
    </script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <!-- JS here -->
    <script src="{{ asset('template/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('template/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/js/ajax-form.js') }}"></script>
    <script src="{{ asset('template/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('template/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/js/scrollIt.js') }}"></script>
    <script src="{{ asset('template/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('template/js/wow.min.js') }}"></script>
    <script src="{{ asset('template/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins.js') }}"></script>
    <script src="{{ asset('template/js/gijgo.min.js') }}"></script>
    <script src="{{ asset('template/js/slick.min.js') }}"></script>

    <!--contact js-->
    <script src="{{ asset('template/js/contact.js') }}"></script>
    <script src="{{ asset('template/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.form.js') }}"></script>
    <script src="{{ asset('template/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('template/js/mail-script.js') }}"></script>

    <script src="{{ asset('template/js/main.js') }}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>',
            },
        });

    </script>
</body>

</html>
