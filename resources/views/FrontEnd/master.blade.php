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
                        <button type="submit" style="background-color: orange;border: 1px solid orange;">
                            <i class="fas fa-search search__icon"></i>
                        </button>
                    </form>
                    </div>
                    <div class="login__cart__div">
                        <ul>
                            <li><a class="login__btn" href="{{ route('contact_us') }}">Contact us</a></li>
                            <li><a class="login__btn" href="{{ route('about_us') }}">About Us</a></li>
                            <li>
                                <a class="myCart__btn" href="#">
                                    <i class="fas fa-shopping-cart"></i>
                                    My Cart
                                    <span>0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav__category lol2">
                <div class="nav__container lol3">
                    <div class="menu__items__section lol4">
                        <ul class="menu">
                            <li class="sub-menu">
                                <a href="{{ route('all_categories') }}"> Categories {{--<i class="fas fa-bars"></i>--}}</a>
                               {{-- <ul>
                                    <li><a href="#">Mobile</a></li>
                                    <li><a href="#">Lol</a></li>
                                </ul>--}}
                            </li>
                            @php
                                $categories = \App\Models\Category::where('status',1)->latest()->limit(7)->get();
                            @endphp

                            @forelse($categories as $cate)
                                <li><a href="{{ route('cate_product',$cate->id) }}">{{ $cate->name }}</a></li>
                            @empty

                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
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
        $(document).ready(function (){
            $('.search-icon').click(function () {
                $('.search-icon').toggleClass('active')
                $('.search-boxLol').toggleClass('active')
            })
        });
        /*sub-menu*/

        $(document).ready(function (){
            $('ul li').click(function () {
                $(this).siblings().removeClass('active')
                $(this).toggleClass('active')
            })
        });
        /*menu bar*/
        $(document).ready(function (){
            $('.toggle').click(function () {
                $('.toggle').toggleClass('active')
                $('header').toggleClass('active-menu')
            })
        });

    </script>

        <script type="text/javascript" src="{{ asset('/Front') }}/js/jquery.slicebox.js"></script>

        <script type="text/javascript">
            $(function() {

                var Page = (function() {

                    var $navArrows = $( '#nav-arrows' ).hide(),
                        $navOptions = $( '#nav-options' ).hide(),
                        $shadow = $( '#shadow' ).hide(),
                        slicebox = $( '#sb-slider' ).slicebox( {
                            onReady : function() {

                                $navArrows.show();
                                $navOptions.show();
                                $shadow.show();

                            },
                            orientation : 'h',
                            cuboidsCount : 3
                        } ),

                        init = function() {

                            initEvents();

                        },
                        initEvents = function() {

                            // add navigation events
                            $navArrows.children( ':first' ).on( 'click', function() {

                                slicebox.next();
                                return false;

                            } );

                            $navArrows.children( ':last' ).on( 'click', function() {

                                slicebox.previous();
                                return false;

                            } );

                            $( '#navPlay' ).on( 'click', function() {

                                slicebox.play();
                                return false;

                            } );

                            $( '#navPause' ).on( 'click', function() {

                                slicebox.pause();
                                return false;

                            } );

                        };

                    return { init : init };

                })();

                Page.init();

            });
        </script>
    </body>

</html>
