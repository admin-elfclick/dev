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
    <link rel="stylesheet" type="text/css" href="{{ asset('/Front') }}/css/responsive.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <!-- STYLESHEETS IMPORT END -->
</head>

<body>
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
                            <a class="myCart__btn" href="#">
                                Signup / Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mega Menu Started -->
        <div class="nav__category">
            <div class="nav__container">
                <div class="menu__items__section">
                    <ul class="menu">
                        <li id="show__all__Categories"><a href="#">All Categories &nbsp; <i class="fas fa-bars"></i></a>
                            <div class="megaMenuMainCategoryContainer">
                                <ul>
                                    <li>Computer and Accessories <i class="fas fa-angle-right"></i>
                                        <div class="computer__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li><a href="#">Laptops</a></li>
                                                        <li><a href="#">Mini Laptops and NetBooks</a></li>
                                                        <li><a href="#">Notebooks</a></li>
                                                        <li><a href="#">Ultrabooks</a></li>
                                                        <li><a href="#">Hybrid PCs</a></li>
                                                        <li><a href="#">Macbooks</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li><a href="#">Desktop and Monitors</a></li>
                                                        <li><a href="#">CPUs</a></li>
                                                        <li><a href="#">All in ones</a></li>
                                                        <li><a href="#">Monitors</a></li>
                                                        <li><a href="#">UPS</a></li>
                                                        <li><a href="#">Servers</a></li>
                                                        <li><a href="#">Desktop Bundles</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li><a href="#">Computing Accessories</a></li>
                                                        <li><a href="#">Computer Peripherals</a></li>
                                                        <li><a href="#">Bags, Cases, Covers & Sleeves</a></li>
                                                        <li><a href="#">Laptop & Desktop Accessories</a></li>
                                                        <li><a href="#">Storage Devices</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:200px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/comp21.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>Phones and Tablets <i class="fas fa-angle-right"></i>
                                    <div class="Phones__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                        <li><a href="#">Feature Phones</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li><a href="#">Mobile Phone Accessories</a></li>
                                                        <li><a href="#">Cables</a></li>
                                                        <li><a href="#">Cases & Covers</a></li>
                                                        <li><a href="#">Screen Protectors</a></li>
                                                        <li><a href="#">Chargers & Power Banks</a></li>
                                                        <li><a href="#">Earphones & Headsets</a></li>
                                                        <li><a href="#">Smartwatches & Bands</a></li>
                                                        <li><a href="#">Clips, Holders & Stands</a></li>
                                                        <li><a href="#">Batteries</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul>
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Android</a></li>
                                                        <li><a href="#">iOS</a></li>
                                                        <li><a href="#">Windows</a></li>
                                                        <li><a href="#">Other OS'</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:200px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/phones21.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>Electronics</li>
                                    <li>ELF-click Fashion</li>
                                    <li>Home and Kitchen</li>
                                    <li>Baby, Kids and Toys</li>
                                    <li>Other Categories</li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">Computers and Accessories</a></li>
                        <li><a href="#">Phones and Tablets</a></li>
                        <li><a href="#">Electronics</a></li>
                        <li><a href="#">ELF-click Fashion</a></li>
                        <li><a href="#">Home and Kitchen</a></li>
                        <li><a href="#">Baby, Kids and Toys</a></li>
                        <li><a href="#">Other Categories</a></li>
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

    <div class="copyrightSection">
        <div class="container">
            <div class="copyrightDiv">
                <p>Copyright &copy; {{ now()->year }} ELF-CLICK.COM. All Rights Reserved</p>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{ asset('/Front') }}/js/modernizr.custom.46884.js"></script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
</body>

</html>