<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('/Front') }}/assets/fabicon.png" type="image/png">
    <!-- STYLESHEETS IMPORT START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <!-- SLIDER IMPORTS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/slicebox.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/custom.css" />

    <!-- SLIDER IMPORTS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/Footer.css">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/menu.css">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/allProducts.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/responsive.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <!-- STYLESHEETS IMPORT END -->
</head>

<body>
<div class="preloader"></div>
    {{-- <section class="navigationLol">--}}
    @php
    $siteAds = \App\Models\TopAds::first();
    @endphp
    @if (!empty($siteAds))
    <img src="{{ asset("Back/images/ads/".$siteAds->image) }}" height="10%" width="100%">
    @endif

    <nav class="nav animate__animated animate__fadeInDown lol">
        <div class="nav__container">
            <div class="logo__header">
                @php
                $siteInfo = \App\Models\SiteInfo::first();
                @endphp

                <div class="logo">
                    <a href="{{ url('/') }}">
                        @isset($siteInfo->logo)
                        <img src="{{ asset("Back/images/logo/".$siteInfo->logo) }}" alt="Logo">
                        @endisset
                    </a>
                </div>
                <div class="store__locator">
                    <p><a href="#">Store Locator</a></p>
                    <p>Help <i class="fas fa-chevron-down"></i></p>
                    <div class="help__menu"></div>
                </div>
                <div class="search__bar">
                    <form method="GET" action="{{ route('search_item') }}" class="search__bar">
                        <input type="search" name="query" placeholder="Search products by title or name" />
                        <button type="submit" style="border: none">
                            <i class="fas fa-search search__icon" style="font-size: 10px;"></i>
                        </button>
                    </form>
                </div>
                <div class="login__cart__div">
                    <ul>
                        <li><a class="login__btn" href="{{ route('about_us') }}">About elf-click</a></li>
                        <li><a class="login__btn" href="{{ route('contact_us') }}">Contact us</a></li>
                        <li>
                          @if (!empty(Auth::user()))
                            <a class="myCart__btn" href="{!! route('logout') !!}">Logout</a>

                          @else
                            <a class="myCart__btn" href="{!! url('/login') !!}">
                              Signup / Login
                            </a>
                          @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- Mega Menu Started -->
        <div class="nav__category">
            <div class="nav__container">
                <div class="menu__items__section">

                      <!-- Nav Computer and Accessories List end -->
                      <ul class="menu">

                      @php
                        $sections = \App\Models\Section::sections();
                        // echo "<pre>"; print_r($sections); die();
                      @endphp

                        <li class="computer__nav__list"><a href="#">All Categories</a>
                          <div class="computer__subCat__nav__list__div subCat__list__div__design computerAbsolutePosition">



                              <div class="row">
                                @foreach ($sections as $section)
                                  <div class="col-md-3">
                                      <ul class="Sub__Cat__List__ul">
                                          <li><a class="sub__cat__list__ul__title" href="{{ route('cate_product',$section['id']) }}">{{ $section['name'] }}</a></li>
                                            @foreach ($section['categories'] as $category)
                                          <li><a href="{{ route('cate_product',$category['id']) }}">{{ $category['name'] }}</a></li>
                                          @endforeach

                                      </ul>
                                  </div>
                                @endforeach
                              </div>

                          </div>
                      </li>
                        @foreach ($sections as $section)
                          {{-- @if (count($section['categories']) >0 ) --}}

                        <!-- Nav Computer and Accessories List Start -->
                        <li class="computer__nav__list"><a href="#">{{ $section['name'] }}</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design computerAbsolutePosition">



                                <div class="row">
                                    @foreach ($section['categories'] as $category)

                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="{{ route('cate_product',$category['id']) }}">{{ $category['name'] }}</a></li>
                                              @foreach ($category['sub_categories'] as $sub)
                                            <li><a href="{{ route('cate_product',$sub['id']) }}">{{ $sub['name'] }} </a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                  @endforeach

                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/comp21.png" alt="">
                                    </div>
                                </div>

                            </div>
                        </li>
                      {{-- @endif --}}
                        <!-- Nav Computer and Accessories List end -->
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mega Menu End -->
    </nav>
    {{-- <header>
            <div class="toggle"></div>
            <nav class="menuLol">
                <div class="logo">
                    --}}{{--<a href="{{ url('/') }}">--}}{{--
                        <img src="{{ asset("Back/images/logo/".$siteInfo->logo) }}" width="120px" alt="Logo">
    --}}{{--</a>--}}{{--
                </div>
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li class="sub-menu">
                        <a href="#">Categories</a>
                        <ul>
                            <li><a href="#">electronics</a> </li>
                            <li><a href="#">man</a> </li>
                            <li><a href="#">women </a> </li>
                        </ul>
                    </li>
                    <li><a href="#">About</a> </li>
                    <li><a href="#">Contact</a> </li>
                </ul>
            </nav>
            <div class="search-icon"></div>
        </header>
    </section>
    <div class="search-boxLol">
        <input type="search" placeholder="Search a product by name">
        <div class="s-con"><i class="fas fa-search"></i></div>
    </div>--}}



    @yield('content')
    

    <footer class="Footer">
        <div class="container">
            <div class="row">
                <div class="footerContent col-md-2 col-12">
                    <h5>ABOUT ELF-CLICK</h5>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        {{-- <li><a href="#">Careers</a></li>
                        <li><a href="#">Out Blog</a></li>
                        <li><a href="#">Forum</a></li>--}}
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footerContent col-md-1 col-12">
                    <h5>PAYMENT</h5>
                    <ul>
                        <li><a href="#">elfclickPay</a></li>
                        <li><a href="#">Wallet</a></li>
                        <li><a href="#">Verve</a></li>
                        <li><a href="#">Mastercard</a></li>
                        <li><a href="#">Visa</a></li>
                    </ul>
                </div>
                <div class="footerContent col-md-2 col-12">
                    <h5>BUYING ON ELF-CLICK</h5>
                    <ul>
                        <li><a href="#">Buyer Safety Centre</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">elf-click Return Policy</a></li>
                        <li><a href="#">Digital Services</a></li>
                        <li><a href="#">Bulk Purchase</a></li>
                    </ul>
                </div>
                <div class="footerContent col-md-1 col-12">
                    <h5>MORE INFO</h5>
                    <ul>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Authentic Items Policy</a></li>
                    </ul>
                </div>
                <div class="footerContent col-md-2 col-12">
                    <h5>MAKE MONEY ON ELF-CLICK</h5>
                    <ul>
                        <li><a href="#">Become a elf-click Affiliate</a></li>
                    </ul>
                </div>
                <div class="footerContent col-md-4 col-12">
                    <h5>DOWNLOAD & CONNECT WITH US</h5>
                    <div class="appImg">
                        @isset($siteInfo->app_store_link)

                        <a href="{{ $siteInfo->app_store_link }}">

                            <img src="https://www.freepnglogos.com/uploads/app-store-logo-png/apple-app-store-how-setup-for-ios-development-11.png" alt="">
                        </a>
                        @endisset

                        @isset($siteInfo->play_store_link)

                        <a href="{{ $siteInfo->play_store_link }}">
                            <img src="https://cdn4.iconfinder.com/data/icons/social-media-logos-6/512/103-GooglePlay_play_google_play_apps-512.png" alt="">
                        </a>
                        @endisset

                    </div>
                    <h5>CONNECT WITH US</h5>
                    <div class="socialIcons">
                        @isset($siteInfo->facebook_link)
                        <a href="{{ $siteInfo->facebook_link }}" style="color: lightgrey;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endisset
                        @isset($siteInfo->twitter_link)
                        <a href="{{ $siteInfo->twitter_link }}" style="color: lightgrey;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        @endisset
                        @isset($siteInfo->instagram_link)
                        <a href="{{ $siteInfo->instagram_link }}" style="color: lightgrey;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        @endisset
                        @isset($siteInfo->youtube_link)
                        <a href="{{ $siteInfo->youtube_link }}" style="color: lightgrey;">
                            <i class="fab fa-youtube"></i>
                        </a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyrightSection">
        <div class="container">
            <div class="copyrightDiv">
                <p>Copyright &copy; {{ now()->year }} ELF-CLICK.COM. All Rights Reserved</p>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('/Front') }}/js/modernizr.custom.46884.js"></script>
    <script type="text/javascript" src="{{ asset('/Front') }}/js/jquery.elevateZoom-3.0.8.min.js"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyD8_4pjocuE4Ty8RC4lZCPKhMks4cpz2Vc",
            authDomain: "elfclicks-6f3b2.firebaseapp.com",
            projectId: "elfclicks-6f3b2",
            storageBucket: "elfclicks-6f3b2.appspot.com",
            messagingSenderId: "500940738969",
            appId: "1:500940738969:web:30f948a606572015c30308"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
    <script type="text/javascript" src="{{ asset('/Front') }}/js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.search-icon').click(function() {
                $('.search-icon').toggleClass('active')
                $('.search-boxLol').toggleClass('active')
            })
        });
        /*sub-menu*/

        $(document).ready(function() {
            $('ul li').click(function() {
                $(this).siblings().removeClass('active')
                $(this).toggleClass('active')
            })
        });
        /*menu bar*/
        $(document).ready(function() {
            $('.toggle').click(function() {
                $('.toggle').toggleClass('active')
                $('header').toggleClass('active-menu')
            })
        });
    </script>

    <script type="text/javascript" src="{{ asset('/Front') }}/js/jquery.slicebox.js"></script>

    <script type="text/javascript">
        $(function() {

            var Page = (function() {

                var $navArrows = $('#nav-arrows').hide(),
                    $navOptions = $('#nav-options').hide(),
                    $shadow = $('#shadow').hide(),
                    slicebox = $('#sb-slider').slicebox({
                        onReady: function() {

                            $navArrows.show();
                            $navOptions.show();
                            $shadow.show();

                        },
                        orientation: 'h',
                        cuboidsCount: 3
                    }),

                    init = function() {

                        initEvents();

                    },
                    initEvents = function() {

                        // add navigation events
                        $navArrows.children(':first').on('click', function() {

                            slicebox.next();
                            return false;

                        });

                        $navArrows.children(':last').on('click', function() {

                            slicebox.previous();
                            return false;

                        });

                        $('#navPlay').on('click', function() {

                            slicebox.play();
                            return false;

                        });

                        $('#navPause').on('click', function() {

                            slicebox.pause();
                            return false;

                        });

                    };

                return {
                    init: init
                };

            })();

            Page.init();

        });
    </script>
    <script>
        $(window).on('load', function(){
            $('.preloader').fadeOut(1000);
        });
        $('#zoom_01').elevateZoom();
    </script>
</body>

</html>
