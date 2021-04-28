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

                        <!-- All Categories Start -->
                        <li id="show__all__Categories"><a href="#">All Categories &nbsp; <i class="fas fa-bars"></i></a>
                            <div class="megaMenuMainCategoryContainer">
                                <ul>
                                    <!-- Computer And Accessories Sub Category Start -->
                                    <li>Computer and Accessories <i class="fas fa-angle-right"></i>
                                        <div class="computer__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Laptops</a></li>
                                                        <li><a href="#">Mini Laptops and NetBooks</a></li>
                                                        <li><a href="#">Notebooks</a></li>
                                                        <li><a href="#">Ultrabooks</a></li>
                                                        <li><a href="#">Hybrid PCs</a></li>
                                                        <li><a href="#">Macbooks</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Desktop and Monitors</a></li>
                                                        <li><a href="#">CPUs</a></li>
                                                        <li><a href="#">All in ones</a></li>
                                                        <li><a href="#">Monitors</a></li>
                                                        <li><a href="#">UPS</a></li>
                                                        <li><a href="#">Servers</a></li>
                                                        <li><a href="#">Desktop Bundles</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Computing Accessories</a></li>
                                                        <li><a href="#">Computer Peripherals</a></li>
                                                        <li><a href="#">Bags, Cases, Covers & Sleeves</a></li>
                                                        <li><a href="#">Laptop & Desktop Accessories</a></li>
                                                        <li><a href="#">Storage Devices</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/comp21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Printers, Scanners & Accessories</a></li>
                                                        <li><a href="#">Printers</a></li>
                                                        <li><a href="#">Scanners</a></li>
                                                        <li><a href="#">Inks, Toners & Cartridges</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Wifi & Networking</a></li>
                                                        <li><a href="#">Switches</a></li>
                                                        <li><a href="#">Routers</a></li>
                                                        <li><a href="#">Modems</a></li>
                                                        <li><a href="#">Networking Peripherals</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">PC Gaming</a></li>
                                                        <li><a href="#">PC Games</a></li>
                                                        <li><a href="#">Pc Gaming Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Software</a></li>
                                                        <li><a href="#">Office & Business</a></li>
                                                        <li><a href="#">Operating Systems</a></li>
                                                        <li><a href="#">Security & Utilities</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Projectors</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Computer And Accessories Sub Category end -->

                                    <!-- Phones And Tablets Sub Category Start -->
                                    <li>Phones and Tablets <i class="fas fa-angle-right"></i>
                                        <div class="Phones__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Mobile Phones</a></li>
                                                        <li><a href="#">Feature Phones</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Mobile Phone Accessories</a></li>
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
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Tablets</a></li>
                                                        <li><a href="#">Android</a></li>
                                                        <li><a href="#">iOS</a></li>
                                                        <li><a href="#">Windows</a></li>
                                                        <li><a href="#">Other OS'</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/phones21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Tablet Accessories</a></li>
                                                        <li><a href="#">Cases & Covers</a></li>
                                                        <li><a href="#">Holders & Stands</a></li>
                                                        <li><a href="#">Other Accessories</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Shop By Price</a></li>
                                                        <li><a href="#">Up To 10,000</a></li>
                                                        <li><a href="#">Up To 20,000</a></li>
                                                        <li><a href="#">Up To 30,000</a></li>
                                                        <li><a href="#">Up To 40,000</a></li>
                                                        <li><a href="#">Up To 50,000</a></li>
                                                        <li><a href="#">Up To 60,000</a></li>
                                                        <li><a href="#">60,000 & Above</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Phones And Tablets Sub Category End -->

                                    <!-- Electronics Sub Category Start -->
                                    <li>Electronics <i class="fas fa-angle-right"></i>
                                        <div class="electronics__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Televisions</a></li>
                                                        <li><a href="#">Smart TVs</a></li>
                                                        <li><a href="#">LED TVs</a></li>
                                                        <li><a href="#">Curved TVs</a></li>
                                                        <li><a href="#">OLED TVs</a></li>
                                                        <li><a href="#">Plasma TVs</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">DVD Players & Recorders</a></li>
                                                        <li><a href="#">DVD Players</a></li>
                                                        <li><a href="#">DVD Recorders</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Cameras</a></li>
                                                        <li><a href="#">Digital Cameras</a></li>
                                                        <li><a href="#">Professional & SLR Cameras</a></li>
                                                        <li><a href="#">Camcorders & Video Cameras</a></li>
                                                        <li><a href="#">Camera Lenses & Accessories</a></li>
                                                        <li><a href="#">CCTV Cameras</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/Electronics21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Accessories</a></li>
                                                        <li><a href="#">TV Audio</a></li>
                                                        <li><a href="#">Headphones</a></li>
                                                        <li><a href="#">Television Accessories</a></li>
                                                        <li><a href="#">Other Accessories</a></li>
                                                        <li><a href="#">Gaming Accessories</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Home Theatres & Audio Systems</a></li>
                                                        <li><a href="#">Home Theatre</a></li>
                                                        <li><a href="#">HiFi Systems</a></li>
                                                        <li><a href="#">MP3 Players & Speakers</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Games and Consoles</a></li>
                                                        <li><a href="#">PS4</a></li>
                                                        <li><a href="#">PS3</a></li>
                                                        <li><a href="#">Xbox One</a></li>
                                                        <li><a href="#">Xbox 360</a></li>
                                                        <li><a href="#">Nintendo Wii</a></li>
                                                        <li><a href="#">Sony PSP</a></li>
                                                        <li><a href="#">PS Vita</a></li>
                                                        <li><a href="#">Nintendo 3DS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Electronics Bundles</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Electronics Sub Category End -->

                                    <!-- elf-click Fashion Sub Category Start -->
                                    <li>elf-click Fashion <i class="fas fa-angle-right"></i>
                                        <div class="elfclick__Fashion__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Women's Wear</a></li>
                                                        <li><a href="#">Dresses</a></li>
                                                        <li><a href="#">Tops</a></li>
                                                        <li><a href="#">Trousers</a></li>
                                                        <li><a href="#">Jumpsuits & Playsuits</a></li>
                                                        <li><a href="#">Suits & Blazers</a></li>
                                                        <li><a href="#">Skirts</a></li>
                                                        <li><a href="#">Co-ordinates</a></li>
                                                        <li><a href="#">Lingerie & Sleepwear</a></li>
                                                        <li><a href="#">Ready to Wear</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Women's Shoes</a></li>
                                                        <li><a href="#">Ballerinas & Flats</a></li>
                                                        <li><a href="#">Heels</a></li>
                                                        <li><a href="#">Sandals & Slippers</a></li>
                                                        <li><a href="#">Wedges</a></li>
                                                        <li><a href="#">Sport Shoes</a></li>
                                                        <li><a href="#">Shoes & Bags</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Women's Accessories</a></li>
                                                        <li><a href="#">Bags</a></li>
                                                        <li><a href="#">Belts</a></li>
                                                        <li><a href="#">Purses & Clutches</a></li>
                                                        <li><a href="#">Wallets</a></li>
                                                        <li><a href="#">Jewellery</a></li>
                                                        <li><a href="#">Hats & Scarves</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/fashion21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Men's Wear</a></li>
                                                        <li><a href="#">Shirts</a></li>
                                                        <li><a href="#">Polos</a></li>
                                                        <li><a href="#">T-Shirts</a></li>
                                                        <li><a href="#">Jeans</a></li>
                                                        <li><a href="#">Trousers & Shorts</a></li>
                                                        <li><a href="#">Suits, Blazers & Jackets</a></li>
                                                        <li><a href="#">Pyjamas</a></li>
                                                        <li><a href="#">jerseys</a></li>
                                                        <li><a href="#">Traditional Wear</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Men's Shoes</a></li>
                                                        <li><a href="#">Casual Shoes</a></li>
                                                        <li><a href="#">Formal Shoes</a></li>
                                                        <li><a href="#">Slippers & Sandals</a></li>
                                                        <li><a href="#">Shoe care & Accessories</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Men's Accessories</a></li>
                                                        <li><a href="#">Belts & Wallets</a></li>
                                                        <li><a href="#">Socks & Underwear</a></li>
                                                        <li><a href="#">Caps & Hats</a></li>
                                                        <li><a href="#">Jewellery</a></li>
                                                        <li><a href="#">Bags</a></li>
                                                        <li><a href="#">Ties & Cuffinks</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Watches</a></li>
                                                        <li><a href="#">Men's Watches</a></li>
                                                        <li><a href="#">Women's Watches</a></li>
                                                        <li><a href="#">Unisex Watches</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Fashion Bundles</a></li>
                                                        <li><a href="#">Women's Fashion Bundles</a></li>
                                                        <li><a href="#">Men's Fashion Bundles</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Style Finder for Women</a></li>
                                                        <li><a href="#">Monochrome</a></li>
                                                        <li><a href="#">Floral</a></li>
                                                        <li><a href="#">Bold in Black</a></li>
                                                        <li><a href="#">9 to 5 Chic</a></li>
                                                        <li><a href="#">Trending Now</a></li>
                                                        <li><a href="#">Red Hot</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Style Finder for Men</a></li>
                                                        <li><a href="#">Monochrome</a></li>
                                                        <li><a href="#">Prints</a></li>
                                                        <li><a href="#">Wardrobe Basics</a></li>
                                                        <li><a href="#">Men in Blue</a></li>
                                                        <li><a href="#">Business Look</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Plus Size</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Under 5k Shop</a></li>
                                                        <li><a href="#">Men's Fashion Under 5k</a></li>
                                                        <li><a href="#">Women's Fashion Under 5k</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Wedding Shop</a></li>
                                                        <li><a href="#">Women's Wedding Shop</a></li>
                                                        <li><a href="#">Men's Wedding Shop</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Textiles</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- elf-click Fashion Sub Category End -->

                                    <!-- Home and Kitchen Sub Category Start -->
                                    <li>Home and Kitchen <i class="fas fa-angle-right"></i>
                                        <div class="homeandkitchen__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Large Appliances</a></li>
                                                        <li><a href="#">Air Conditioners & Coolers</a></li>
                                                        <li><a href="#">Fans</a></li>
                                                        <li><a href="#">Freezers</a></li>
                                                        <li><a href="#">Washers & Dryers</a></li>
                                                        <li><a href="#">Refrigerators</a></li>
                                                        <li><a href="#">Cookers & Ovens</a></li>
                                                        <li><a href="#">Water Dispensers</a></li>
                                                        <li><a href="#">Vacuum Cleaners</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Small Appliances</a></li>
                                                        <li><a href="#">Blenders, Juicers & Mixers</a></li>
                                                        <li><a href="#">Hot Plates & Burners</a></li>
                                                        <li><a href="#">Irons & Steamers</a></li>
                                                        <li><a href="#">Processors & Mincers</a></li>
                                                        <li><a href="#">Toasters & Sandwich Makers</a></li>
                                                        <li><a href="#">Deep Fryers & Rice Cookers</a></li>
                                                        <li><a href="#">Electric Kettles</a></li>
                                                        <li><a href="#">Microwaves</a></li>
                                                        <li><a href="#">Yam Pounder</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Home Furnishings</a></li>
                                                        <li><a href="#">Bed & Bathroom Furnishings</a></li>
                                                        <li><a href="#">Curtains & Blinds</a></li>
                                                        <li><a href="#">Decor</a></li>
                                                        <li><a href="#">Light Fixtures</a></li>
                                                        <li><a href="#">Rugs & Capets</a></li>
                                                        <li><a href="#">Housekeeping & Pet Supplies</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/home21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Top Brands</a></li>
                                                        <li><a href="#">LG</a></li>
                                                        <li><a href="#">Samsung</a></li>
                                                        <li><a href="#">Polystar</a></li>
                                                        <li><a href="#">Scanfrost</a></li>
                                                        <li><a href="#">Hisense</a></li>
                                                        <li><a href="#">Saisho</a></li>
                                                        <li><a href="#">Haier Thermocool</a></li>
                                                        <li><a href="#">Master Chef</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Kitchen & Dining</a></li>
                                                        <li><a href="#">Cook & Bakeware</a></li>
                                                        <li><a href="#">Dining</a></li>
                                                        <li><a href="#">Kitchen Utensils</a></li>
                                                        <li><a href="#">Cooker Hoods & Ventilators</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Furniture</a></li>
                                                        <li><a href="#">Living Room Furniture</a></li>
                                                        <li><a href="#">Bedroom Furniture</a></li>
                                                        <li><a href="#">Office Furniture</a></li>
                                                        <li><a href="#">Kitchen & Dining Furniture</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Others</a></li>
                                                        <li><a href="#">Umbrellas</a></li>
                                                        <li><a href="#">Rain Boots & Raincoats</a></li>
                                                        <li><a href="#">Gas Cylinder & Accessories</a></li>
                                                        <li><a href="#">Towel Racks</a></li>
                                                        <li><a href="#">Garment Steamers</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Accessories For small & Large Appliances</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Home & Kitchen Bundles</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Appliances With Special Offers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Home and Kitchen Sub Category End -->

                                    <!-- Baby, Kids and Toys Sub Category Start -->
                                    <li>Baby, Kids and Toys <i class="fas fa-angle-right"></i>
                                        <div class="babykid__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Fashion for Girls</a></li>
                                                        <li><a href="#">Sets</a></li>
                                                        <li><a href="#">Dresses</a></li>
                                                        <li><a href="#">Tops, Jackets & Sweatshirts</a></li>
                                                        <li><a href="#">Denim, Trousers & Leggings</a></li>
                                                        <li><a href="#">Underwear & Socks</a></li>
                                                        <li><a href="#">Watches</a></li>
                                                        <li><a href="#">Shoes</a></li>
                                                        <li><a href="#">Sleepwear</a></li>
                                                        <li><a href="#">Bodysuits & Playsuits</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Fashion for Boys</a></li>
                                                        <li><a href="#">Polos & T-Shirts</a></li>
                                                        <li><a href="#">Sets</a></li>
                                                        <li><a href="#">Watches</a></li>
                                                        <li><a href="#">Denim & Trousers</a></li>
                                                        <li><a href="#">Bodysuits & Playsuits</a></li>
                                                        <li><a href="#">Sleepwear</a></li>
                                                        <li><a href="#">Underwear & Socks</a></li>
                                                        <li><a href="#">Shoes</a></li>
                                                        <li><a href="#">Shirts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Baby Essentials</a></li>
                                                        <li><a href="#">Bibs & Burp Cloths</a></li>
                                                        <li><a href="#">Bottle Feeding</a></li>
                                                        <li><a href="#">Breastfeeding</a></li>
                                                        <li><a href="#">Pacifiers & Teethers</a></li>
                                                        <li><a href="#">Baby Food & Formula</a></li>
                                                        <li><a href="#">Feeding & Nursing</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/BKT21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Maternity</a></li>
                                                        <li><a href="#">Maternity Tops & Jackets</a></li>
                                                        <li><a href="#">Maternity Dresses</a></li>
                                                        <li><a href="#">Maternity Trousers & Skirts</a></li>
                                                        <li><a href="#">Maternity Underwear</a></li>
                                                        <li><a href="#">Maternity Accessories</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">School Store</a></li>
                                                        <li><a href="#">Bags & Backpacks</a></li>
                                                        <li><a href="#">Lunchboxes & Waterbottles</a></li>
                                                        <li><a href="#">School Uniform & Accessories</a></li>
                                                        <li><a href="#">School Shoes</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Travel & Safety Gear</a></li>
                                                        <li><a href="#">Car Seats, Strollers & Carriers</a></li>
                                                        <li><a href="#">Baby Monitors & Safety Gates</a></li>
                                                        <li><a href="#">Mobile Beds & Nets</a></li>
                                                        <li><a href="#">high Chairs & Booster Seats</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Diapering & Daily Care</a></li>
                                                        <li><a href="#">Daily Care</a></li>
                                                        <li><a href="#">Bathtime Essentials</a></li>
                                                        <li><a href="#">Diapers & Baby Wipes</a></li>
                                                        <li><a href="#">Diaper Bags & Changing Mats</a></li>
                                                        <li><a href="#">Potty Training</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Kids' Beddings & Decor</a></li>
                                                        <li><a href="#">Bedding</a></li>
                                                        <li><a href="#">Decor Accessories</a></li>
                                                        <li><a href="#">Furniture</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Toys & Activities</a></li>
                                                        <li><a href="#">Tablets for Kids</a></li>
                                                        <li><a href="#">Educational Toys</a></li>
                                                        <li><a href="#">Activities</a></li>
                                                        <li><a href="#">Bicycles & Ride On</a></li>
                                                        <li><a href="#">Bouncers, Rockers & Swingers</a></li>
                                                        <li><a href="#">Games & Puzzles</a></li>
                                                        <li><a href="#">Play Pens & Play Mats</a></li>
                                                        <li><a href="#">Party Store</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Baby, Kids and Toys Sub Category End -->

                                    <!-- Other Category Sub Category Start -->
                                    <li>Other Category <i class="fas fa-angle-right"></i>
                                        <div class="other__Category__subCat__list__div subCat__list__div__design">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Beauty, Health & Personal Care</a></li>
                                                        <li><a href="#">Makeup</a></li>
                                                        <li><a href="#">Fragrances</a></li>
                                                        <li><a href="#">Hair Centre</a></li>
                                                        <li><a href="#">Health</a></li>
                                                        <li><a href="#">Personal Care</a></li>
                                                        <li><a href="#">Skin Care</a></li>
                                                        <li><a href="#">Sexual Wellness</a></li>
                                                        <li><a href="#">Contraceptives</a></li>
                                                        <li><a href="#">Other Contraceptives & Lubricats</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Sports and Fitness</a></li>
                                                        <li><a href="#">Fitness</a></li>
                                                        <li><a href="#">Outdoor & Indoor Games</a></li>
                                                        <li><a href="#">Sportswear</a></li>
                                                        <li><a href="#">Football</a></li>
                                                        <li><a href="#">Boxing</a></li>
                                                        <li><a href="#">Basketball</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Books & Media Library</a></li>
                                                        <li><a href="#">Books</a></li>
                                                        <li><a href="#">Musical Equipment</a></li>
                                                        <li><a href="#">Keyboard, Pianos & Drums</a></li>
                                                        <li><a href="#">Stage, Studio & Recording Equipment</a></li>
                                                        <li><a href="#">Wind Instruments</a></li>
                                                        <li><a href="#">String Instruments</a></li>
                                                        <li><a href="#">Audio Books</a></li>
                                                        <li><a href="#">African Tales</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/others21.png" alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Alcoholic Beverages</a></li>
                                                        <li><a href="#">Wines</a></li>
                                                        <li><a href="#">Spirits</a></li>
                                                        <li><a href="#">Liqueurs & Creams</a></li>
                                                        <li><a href="#">Whiskey</a></li>
                                                        <li><a href="#">Champagne</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Office & School Supplies</a></li>
                                                        <li><a href="#">Greeting Cards</a></li>
                                                        <li><a href="#">School Supplies</a></li>
                                                        <li><a href="#">Office Supplies</a></li>
                                                        <li><a href="#">Build Your Office</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Generators & Power Solutions</a></li>
                                                        <li><a href="#">Generators & Accessories</a></li>
                                                        <li><a href="#">Inverters</a></li>
                                                        <li><a href="#">UPS & Surge Protectors</a></li>
                                                        <li><a href="#">Solar & Alternative Energy</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Automotive</a></li>
                                                        <li><a href="#">Automotive Tools & Accessories</a></li>
                                                        <li><a href="#">Safety and Security</a></li>
                                                        <li><a href="#">Autocare & Maintenance</a></li>
                                                        <li><a href="#">Tyres & Batteries</a></li>
                                                        <li><a href="#">Replacement Parts</a></li>
                                                        <li><a href="#">Hand & Power Tools</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Building & Industrial</a></li>
                                                        <li><a href="#">Sewing Machines & Accessories</a></li>
                                                        <li><a href="#">Tools</a></li>
                                                        <li><a href="#">Plumbing Materials</a></li>
                                                        <li><a href="#">Construction Materials</a></li>
                                                        <li><a href="#">Paints</a></li>
                                                        <li><a href="#">Electrical Fittings</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Groceries</a></li>
                                                        <li><a href="#">Beverages</a></li>
                                                        <li><a href="#">Food</a></li>
                                                        <li><a href="#">Frozen Food</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <ul class="Sub__Cat__List__ul">
                                                        <li><a class="sub__cat__list__ul__title" href="#">Agriculture</a></li>
                                                        <li><a href="#">Seeds & Fertilizers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Other Category Sub Category End -->
                                </ul>
                            </div>
                        </li>
                        <!-- All Categories End -->


                        <!-- Nav Computer and Accessories List Start -->
                        <li class="computer__nav__list"><a href="#">Computers and Accessories</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design computerAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Laptops</a></li>
                                            <li><a href="#">Mini Laptops and NetBooks</a></li>
                                            <li><a href="#">Notebooks</a></li>
                                            <li><a href="#">Ultrabooks</a></li>
                                            <li><a href="#">Hybrid PCs</a></li>
                                            <li><a href="#">Macbooks</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Desktop and Monitors</a></li>
                                            <li><a href="#">CPUs</a></li>
                                            <li><a href="#">All in ones</a></li>
                                            <li><a href="#">Monitors</a></li>
                                            <li><a href="#">UPS</a></li>
                                            <li><a href="#">Servers</a></li>
                                            <li><a href="#">Desktop Bundles</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Computing Accessories</a></li>
                                            <li><a href="#">Computer Peripherals</a></li>
                                            <li><a href="#">Bags, Cases, Covers & Sleeves</a></li>
                                            <li><a href="#">Laptop & Desktop Accessories</a></li>
                                            <li><a href="#">Storage Devices</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/comp21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Printers, Scanners & Accessories</a></li>
                                            <li><a href="#">Printers</a></li>
                                            <li><a href="#">Scanners</a></li>
                                            <li><a href="#">Inks, Toners & Cartridges</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Wifi & Networking</a></li>
                                            <li><a href="#">Switches</a></li>
                                            <li><a href="#">Routers</a></li>
                                            <li><a href="#">Modems</a></li>
                                            <li><a href="#">Networking Peripherals</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">PC Gaming</a></li>
                                            <li><a href="#">PC Games</a></li>
                                            <li><a href="#">Pc Gaming Accessories</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Software</a></li>
                                            <li><a href="#">Office & Business</a></li>
                                            <li><a href="#">Operating Systems</a></li>
                                            <li><a href="#">Security & Utilities</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Projectors</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Computer and Accessories List end -->

                        <!-- Nav Phone and Tablets List Start -->
                        <li class="computer__nav__list"><a href="#">Phone And Tablets</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design PhoneAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Mobile Phones</a></li>
                                            <li><a href="#">Feature Phones</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Mobile Phone Accessories</a></li>
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
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Tablets</a></li>
                                            <li><a href="#">Android</a></li>
                                            <li><a href="#">iOS</a></li>
                                            <li><a href="#">Windows</a></li>
                                            <li><a href="#">Other OS'</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/phones21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Tablet Accessories</a></li>
                                            <li><a href="#">Cases & Covers</a></li>
                                            <li><a href="#">Holders & Stands</a></li>
                                            <li><a href="#">Other Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Shop By Price</a></li>
                                            <li><a href="#">Up To 10,000</a></li>
                                            <li><a href="#">Up To 20,000</a></li>
                                            <li><a href="#">Up To 30,000</a></li>
                                            <li><a href="#">Up To 40,000</a></li>
                                            <li><a href="#">Up To 50,000</a></li>
                                            <li><a href="#">Up To 60,000</a></li>
                                            <li><a href="#">60,000 & Above</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Phone and Tablets List end -->

                        <!-- Nav Electronics List Start -->
                        <li class="computer__nav__list"><a href="#">Electronics</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design ElectronicsAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Televisions</a></li>
                                            <li><a href="#">Smart TVs</a></li>
                                            <li><a href="#">LED TVs</a></li>
                                            <li><a href="#">Curved TVs</a></li>
                                            <li><a href="#">OLED TVs</a></li>
                                            <li><a href="#">Plasma TVs</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">DVD Players & Recorders</a></li>
                                            <li><a href="#">DVD Players</a></li>
                                            <li><a href="#">DVD Recorders</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Cameras</a></li>
                                            <li><a href="#">Digital Cameras</a></li>
                                            <li><a href="#">Professional & SLR Cameras</a></li>
                                            <li><a href="#">Camcorders & Video Cameras</a></li>
                                            <li><a href="#">Camera Lenses & Accessories</a></li>
                                            <li><a href="#">CCTV Cameras</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/Electronics21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Accessories</a></li>
                                            <li><a href="#">TV Audio</a></li>
                                            <li><a href="#">Headphones</a></li>
                                            <li><a href="#">Television Accessories</a></li>
                                            <li><a href="#">Other Accessories</a></li>
                                            <li><a href="#">Gaming Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Home Theatres & Audio Systems</a></li>
                                            <li><a href="#">Home Theatre</a></li>
                                            <li><a href="#">HiFi Systems</a></li>
                                            <li><a href="#">MP3 Players & Speakers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Games and Consoles</a></li>
                                            <li><a href="#">PS4</a></li>
                                            <li><a href="#">PS3</a></li>
                                            <li><a href="#">Xbox One</a></li>
                                            <li><a href="#">Xbox 360</a></li>
                                            <li><a href="#">Nintendo Wii</a></li>
                                            <li><a href="#">Sony PSP</a></li>
                                            <li><a href="#">PS Vita</a></li>
                                            <li><a href="#">Nintendo 3DS</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Electronics Bundles</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Electronics List end -->

                        <!-- Nav elf-click Fashion List Start -->
                        <li class="computer__nav__list"><a href="#">elf-click Fashion</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design FashionAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Laptops</a></li>
                                            <li><a href="#">Mini Laptops and NetBooks</a></li>
                                            <li><a href="#">Notebooks</a></li>
                                            <li><a href="#">Ultrabooks</a></li>
                                            <li><a href="#">Hybrid PCs</a></li>
                                            <li><a href="#">Macbooks</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Desktop and Monitors</a></li>
                                            <li><a href="#">CPUs</a></li>
                                            <li><a href="#">All in ones</a></li>
                                            <li><a href="#">Monitors</a></li>
                                            <li><a href="#">UPS</a></li>
                                            <li><a href="#">Servers</a></li>
                                            <li><a href="#">Desktop Bundles</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Computing Accessories</a></li>
                                            <li><a href="#">Computer Peripherals</a></li>
                                            <li><a href="#">Bags, Cases, Covers & Sleeves</a></li>
                                            <li><a href="#">Laptop & Desktop Accessories</a></li>
                                            <li><a href="#">Storage Devices</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/comp21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Printers, Scanners & Accessories</a></li>
                                            <li><a href="#">Printers</a></li>
                                            <li><a href="#">Scanners</a></li>
                                            <li><a href="#">Inks, Toners & Cartridges</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Wifi & Networking</a></li>
                                            <li><a href="#">Switches</a></li>
                                            <li><a href="#">Routers</a></li>
                                            <li><a href="#">Modems</a></li>
                                            <li><a href="#">Networking Peripherals</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">PC Gaming</a></li>
                                            <li><a href="#">PC Games</a></li>
                                            <li><a href="#">Pc Gaming Accessories</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Software</a></li>
                                            <li><a href="#">Office & Business</a></li>
                                            <li><a href="#">Operating Systems</a></li>
                                            <li><a href="#">Security & Utilities</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Projectors</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav elf-click Fashion List end -->

                        <!-- Nav Home and Kitchen List Start -->
                        <li class="computer__nav__list"><a href="#">Home and Kitchen</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design HomeKitchenAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Large Appliances</a></li>
                                            <li><a href="#">Air Conditioners & Coolers</a></li>
                                            <li><a href="#">Fans</a></li>
                                            <li><a href="#">Freezers</a></li>
                                            <li><a href="#">Washers & Dryers</a></li>
                                            <li><a href="#">Refrigerators</a></li>
                                            <li><a href="#">Cookers & Ovens</a></li>
                                            <li><a href="#">Water Dispensers</a></li>
                                            <li><a href="#">Vacuum Cleaners</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Small Appliances</a></li>
                                            <li><a href="#">Blenders, Juicers & Mixers</a></li>
                                            <li><a href="#">Hot Plates & Burners</a></li>
                                            <li><a href="#">Irons & Steamers</a></li>
                                            <li><a href="#">Processors & Mincers</a></li>
                                            <li><a href="#">Toasters & Sandwich Makers</a></li>
                                            <li><a href="#">Deep Fryers & Rice Cookers</a></li>
                                            <li><a href="#">Electric Kettles</a></li>
                                            <li><a href="#">Microwaves</a></li>
                                            <li><a href="#">Yam Pounder</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Home Furnishings</a></li>
                                            <li><a href="#">Bed & Bathroom Furnishings</a></li>
                                            <li><a href="#">Curtains & Blinds</a></li>
                                            <li><a href="#">Decor</a></li>
                                            <li><a href="#">Light Fixtures</a></li>
                                            <li><a href="#">Rugs & Capets</a></li>
                                            <li><a href="#">Housekeeping & Pet Supplies</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/home21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Top Brands</a></li>
                                            <li><a href="#">LG</a></li>
                                            <li><a href="#">Samsung</a></li>
                                            <li><a href="#">Polystar</a></li>
                                            <li><a href="#">Scanfrost</a></li>
                                            <li><a href="#">Hisense</a></li>
                                            <li><a href="#">Saisho</a></li>
                                            <li><a href="#">Haier Thermocool</a></li>
                                            <li><a href="#">Master Chef</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Kitchen & Dining</a></li>
                                            <li><a href="#">Cook & Bakeware</a></li>
                                            <li><a href="#">Dining</a></li>
                                            <li><a href="#">Kitchen Utensils</a></li>
                                            <li><a href="#">Cooker Hoods & Ventilators</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Furniture</a></li>
                                            <li><a href="#">Living Room Furniture</a></li>
                                            <li><a href="#">Bedroom Furniture</a></li>
                                            <li><a href="#">Office Furniture</a></li>
                                            <li><a href="#">Kitchen & Dining Furniture</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Others</a></li>
                                            <li><a href="#">Umbrellas</a></li>
                                            <li><a href="#">Rain Boots & Raincoats</a></li>
                                            <li><a href="#">Gas Cylinder & Accessories</a></li>
                                            <li><a href="#">Towel Racks</a></li>
                                            <li><a href="#">Garment Steamers</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Accessories For small & Large Appliances</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Home & Kitchen Bundles</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Appliances With Special Offers</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Home and Kitchen List end -->

                        <!-- Nav Baby, Kids and Toys List Start -->
                        <li class="computer__nav__list"><a href="#">Baby, Kids and Toys</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design BabyAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Fashion for Girls</a></li>
                                            <li><a href="#">Sets</a></li>
                                            <li><a href="#">Dresses</a></li>
                                            <li><a href="#">Tops, Jackets & Sweatshirts</a></li>
                                            <li><a href="#">Denim, Trousers & Leggings</a></li>
                                            <li><a href="#">Underwear & Socks</a></li>
                                            <li><a href="#">Watches</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Sleepwear</a></li>
                                            <li><a href="#">Bodysuits & Playsuits</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Fashion for Boys</a></li>
                                            <li><a href="#">Polos & T-Shirts</a></li>
                                            <li><a href="#">Sets</a></li>
                                            <li><a href="#">Watches</a></li>
                                            <li><a href="#">Denim & Trousers</a></li>
                                            <li><a href="#">Bodysuits & Playsuits</a></li>
                                            <li><a href="#">Sleepwear</a></li>
                                            <li><a href="#">Underwear & Socks</a></li>
                                            <li><a href="#">Shoes</a></li>
                                            <li><a href="#">Shirts</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Baby Essentials</a></li>
                                            <li><a href="#">Bibs & Burp Cloths</a></li>
                                            <li><a href="#">Bottle Feeding</a></li>
                                            <li><a href="#">Breastfeeding</a></li>
                                            <li><a href="#">Pacifiers & Teethers</a></li>
                                            <li><a href="#">Baby Food & Formula</a></li>
                                            <li><a href="#">Feeding & Nursing</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/BKT21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Maternity</a></li>
                                            <li><a href="#">Maternity Tops & Jackets</a></li>
                                            <li><a href="#">Maternity Dresses</a></li>
                                            <li><a href="#">Maternity Trousers & Skirts</a></li>
                                            <li><a href="#">Maternity Underwear</a></li>
                                            <li><a href="#">Maternity Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">School Store</a></li>
                                            <li><a href="#">Bags & Backpacks</a></li>
                                            <li><a href="#">Lunchboxes & Waterbottles</a></li>
                                            <li><a href="#">School Uniform & Accessories</a></li>
                                            <li><a href="#">School Shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Travel & Safety Gear</a></li>
                                            <li><a href="#">Car Seats, Strollers & Carriers</a></li>
                                            <li><a href="#">Baby Monitors & Safety Gates</a></li>
                                            <li><a href="#">Mobile Beds & Nets</a></li>
                                            <li><a href="#">high Chairs & Booster Seats</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Diapering & Daily Care</a></li>
                                            <li><a href="#">Daily Care</a></li>
                                            <li><a href="#">Bathtime Essentials</a></li>
                                            <li><a href="#">Diapers & Baby Wipes</a></li>
                                            <li><a href="#">Diaper Bags & Changing Mats</a></li>
                                            <li><a href="#">Potty Training</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Kids' Beddings & Decor</a></li>
                                            <li><a href="#">Bedding</a></li>
                                            <li><a href="#">Decor Accessories</a></li>
                                            <li><a href="#">Furniture</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Toys & Activities</a></li>
                                            <li><a href="#">Tablets for Kids</a></li>
                                            <li><a href="#">Educational Toys</a></li>
                                            <li><a href="#">Activities</a></li>
                                            <li><a href="#">Bicycles & Ride On</a></li>
                                            <li><a href="#">Bouncers, Rockers & Swingers</a></li>
                                            <li><a href="#">Games & Puzzles</a></li>
                                            <li><a href="#">Play Pens & Play Mats</a></li>
                                            <li><a href="#">Party Store</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Baby, Kids and Toys List end -->

                        <!-- Nav Other Categories List Start -->
                        <li class="computer__nav__list"><a href="#">Other Categories</a>
                            <div class="computer__subCat__nav__list__div subCat__list__div__design otherCategoriesAbsolutePosition">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Beauty, Health & Personal Care</a></li>
                                            <li><a href="#">Makeup</a></li>
                                            <li><a href="#">Fragrances</a></li>
                                            <li><a href="#">Hair Centre</a></li>
                                            <li><a href="#">Health</a></li>
                                            <li><a href="#">Personal Care</a></li>
                                            <li><a href="#">Skin Care</a></li>
                                            <li><a href="#">Sexual Wellness</a></li>
                                            <li><a href="#">Contraceptives</a></li>
                                            <li><a href="#">Other Contraceptives & Lubricats</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Sports and Fitness</a></li>
                                            <li><a href="#">Fitness</a></li>
                                            <li><a href="#">Outdoor & Indoor Games</a></li>
                                            <li><a href="#">Sportswear</a></li>
                                            <li><a href="#">Football</a></li>
                                            <li><a href="#">Boxing</a></li>
                                            <li><a href="#">Basketball</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Books & Media Library</a></li>
                                            <li><a href="#">Books</a></li>
                                            <li><a href="#">Musical Equipment</a></li>
                                            <li><a href="#">Keyboard, Pianos & Drums</a></li>
                                            <li><a href="#">Stage, Studio & Recording Equipment</a></li>
                                            <li><a href="#">Wind Instruments</a></li>
                                            <li><a href="#">String Instruments</a></li>
                                            <li><a href="#">Audio Books</a></li>
                                            <li><a href="#">African Tales</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img style="height: auto; width:250px;" src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/media/customcmsmenu/item/others21.png" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Alcoholic Beverages</a></li>
                                            <li><a href="#">Wines</a></li>
                                            <li><a href="#">Spirits</a></li>
                                            <li><a href="#">Liqueurs & Creams</a></li>
                                            <li><a href="#">Whiskey</a></li>
                                            <li><a href="#">Champagne</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Office & School Supplies</a></li>
                                            <li><a href="#">Greeting Cards</a></li>
                                            <li><a href="#">School Supplies</a></li>
                                            <li><a href="#">Office Supplies</a></li>
                                            <li><a href="#">Build Your Office</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Generators & Power Solutions</a></li>
                                            <li><a href="#">Generators & Accessories</a></li>
                                            <li><a href="#">Inverters</a></li>
                                            <li><a href="#">UPS & Surge Protectors</a></li>
                                            <li><a href="#">Solar & Alternative Energy</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Automotive</a></li>
                                            <li><a href="#">Automotive Tools & Accessories</a></li>
                                            <li><a href="#">Safety and Security</a></li>
                                            <li><a href="#">Autocare & Maintenance</a></li>
                                            <li><a href="#">Tyres & Batteries</a></li>
                                            <li><a href="#">Replacement Parts</a></li>
                                            <li><a href="#">Hand & Power Tools</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Building & Industrial</a></li>
                                            <li><a href="#">Sewing Machines & Accessories</a></li>
                                            <li><a href="#">Tools</a></li>
                                            <li><a href="#">Plumbing Materials</a></li>
                                            <li><a href="#">Construction Materials</a></li>
                                            <li><a href="#">Paints</a></li>
                                            <li><a href="#">Electrical Fittings</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Groceries</a></li>
                                            <li><a href="#">Beverages</a></li>
                                            <li><a href="#">Food</a></li>
                                            <li><a href="#">Frozen Food</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="Sub__Cat__List__ul">
                                            <li><a class="sub__cat__list__ul__title" href="#">Agriculture</a></li>
                                            <li><a href="#">Seeds & Fertilizers</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Nav Other Categories List Start -->
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