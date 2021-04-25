@extends('FrontEnd.master')

@section('title')
    ELF-CLICK-Home
@endsection

@section('content')
    <section class="nav__container row mt-5">
        <div class="animate__animated animate__fadeInLeft slider__container col-md-8 col-sm-8 col-xs-12" style="margin-top: 45px;">
            <div class="wrapper">
                <ul id="sb-slider" class="sb-slider">
                    @forelse($sliders as $slide)
                        <li>
                            <a href="{{ route('cate_product',$slide->id) }}" target="_blank">
                                <img src="{{ asset("Back/images/slider/".$slide->image) }}" alt="image-img"/>
                            </a>
                        </li>
                    @empty

                    @endforelse
                </ul>
                <div id="nav-arrows" class="nav-arrows">
                    <a href="#">Next</a>
                    <a href="#">Previous</a>
                </div>
                <div id="nav-options" class="nav-options">
                    <span id="navPlay">Play</span>
                    <span id="navPause">Pause</span>
                </div>
            </div>
        </div>


        <div class="animate__animated animate__fadeInRight sliderLeft__container col-md-4 col-sm-4 col-xs-12" style="margin-top: 20px;">
            <div class="sliderLeft__content row">
                @forelse($banners as $ban)
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a href="{{ route('banner_pro',$ban->id) }}" class="sliderLeft__img">
                            <img src="{{ asset("Back/images/banner/".$ban->image) }}" style="margin-top: 10px;" alt="">
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>

    @php
        $content = \App\Models\Content::where('status',1)->limit(1)->get();
    @endphp

    @forelse($content as $con)
    <section class="container animate__animated animate__fadeInUp">

        <div class="recommended__title">

            <h3>{{ $con->title }}</h3>
            <a href="{{ route('content_product',$con->id) }}">See All Items</a>
        </div>
        <div class="recommended__container">
            @php
                $products = \App\Models\Product::where([['status',1],'content_id' => $con->id])->latest()->limit(3)->get();
            @endphp
            <div class="row">
                @forelse($products as $pro)
                    <div class="recommended__Items col-md-4 col-sm-6 col-12">
                        <a href="{{ route('view',$pro->slug) }}" class="recommended__content">
                            <div class="recommendedImg">
                                <img src="{{ asset("Back/images/product/".$pro->product_img) }}" alt="">
                            </div>
                            <div class="recommended__items__details">
                                <p>{{ $pro->product_name }}</p>
                                <span>${{ $pro->product_price }}</span><span class="discountPrice">${{ $pro->product_price_old }}</span>

                                {{--<p class="youSaveP">You save $ </p>--}}
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="recommended__Items col-md-4 col-sm-6 col-12">
                        <div class="recommended__content">
                            <div class="recommended__items__details">
                                <p>Oops... No Product Found</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    @empty

    @endforelse

    @php
        $contentt = \App\Models\Content::where('status',1)->skip(1)->take(1)->get();
    @endphp

    @forelse($contentt as $cont)
    <section class="container animate__animated animate__fadeIn">
        <div class="recommended__title">
            <h3>{{ $cont->title }}</h3>
            <a href="{{ route('content_product',$cont->id) }}">See All Items</a>
        </div>
        <div class="recommended__container">
            @php
                $productT = \App\Models\Product::where([['status',1],'content_id' => $cont->id])->latest()->limit(4)->get();
            @endphp
            <div class="row">
                @forelse($productT as $sponsored)
                <div class="recommended__Items col-md-3 col-sm-6 col-12">
                    <a href="{{ route('view',$sponsored->slug) }}" class="recommended__content sponsoredItemSection">
                        <div class="recommendedImg sponsoredItemSection__img">
                            {{--<span class="percentOffText">28% OFF</span>--}}
                            <img src="{{ asset("Back/images/product/".$sponsored->product_img) }}" alt="">
                        </div>
                        <div class="recommended__items__details">
                            <p>{{ $sponsored->product_name }}</p>
                            <span>${{ $sponsored->product_price }}</span><span class="discountPrice">${{ $sponsored->product_price_old }}</span>
                            {{--<p class="youSaveP">You save $0.56</p>--}}
                        </div>
                    </a>
                </div>
                @empty
                    <div class="recommended__Items col-md-6 col-sm-6 col-12">
                        <div class="recommended__content">
                            <div class="recommended__items__details">
                                <p>Oops... No Product Found</p>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    @empty

    @endforelse

    {{--============ banner ======--}}

    @php
        $banner  = \App\Models\Banner::where('status',1)->latest()->skip(4)->take(1)->get();
    @endphp
    @forelse($banner as $ban)
        <section class="simpleProductBannerSec animate__animated animated__fadeIn">
            <div class="container">
                <div class="productSimpleBannerWrapper">
                    <a href="{{ route('banner_pro',$ban->id) }}">
                        <img src="{{ asset("Back/images/banner/".$ban->image) }}" alt="" class="simpleProductBannerImg">
                    </a>
                </div>
            </div>
        </section>
    @empty

    @endforelse


    @php
        $contentth = \App\Models\Content::where('status',1)->skip(2)->take(1)->get();
    @endphp

    @forelse($contentth as $conth)
    <section class="container animate__animated animate__fadeIn">
        <div class="recommended__title">
            <h3>{{ $conth->title }}</h3>
            <a href="{{ route('content_product',$conth->id) }}">See All Items</a>
        </div>
        <div class="recommended__container">
            @php
                $productTh = \App\Models\Product::where([['status',1],'content_id' => $conth->id])->latest()->limit(4)->get();
            @endphp
            <div class="row">
                @forelse($productTh as $deal)
                <a href="{{ route('view',$deal->slug) }}" class="recommended__Items col-md-4 col-sm-6 col-12">
                    <div class="recommended__content">
                        <div class="recommendedImg">
                            <img src="{{ asset("Back/images/product/".$deal->product_img) }}" alt="">
                        </div>
                        <div class="recommended__items__details">
                            <p>{{ $deal->product_name }}</p>
                            <span>${{ $deal->product_price }}</span><span class="discountPrice">${{ $deal->product_price_old }}</span>
                            {{--<p class="youSaveP">You save $0.02</p>--}}
                        </div>
                    </div>
                </a>
                @empty
                    <div class="recommended__Items col-md-6 col-sm-6 col-12">
                        <div class="recommended__content">
                            <div class="recommended__items__details">
                                <p>Oops... No Product Found</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    @empty

    @endforelse



    {{--<section class="container animate__animated animate__fadeIn">

        <div class="recommended__title">
            <h3>Popular Categories</h3>
        </div>
        <div class="">

            <div class="PopularCategoriesWrapper">

                <div class="wrappedPopularCategory wrappedPopularCategory1">
                    <div class="PopularCategoriesBackImgDiv">
                        <img src="" alt="cate-img">
                        <h3>lol</h3>
                    </div>
                    <div class="PopularCategoriesFrontDiv PopularCategory1">
                        <h3>lol</h3>
                        <ul>
                            <li><a href="#">lol2</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    {{--============ banner ======--}}

    @php
        $banners  = \App\Models\Banner::where('status',1)->latest()->skip(5)->take(2)->get();
    @endphp


    <section class="twobannerSection">
        <div class="container">
            <div class="twoBannersDiv">
                <div class="row">
                    @forelse($banners as $banner)
                    <a href="{{ route('banner_pro',$banner->id) }}" class="twobanner col-md-6 col-12">
                        <img src="{{ asset("Back/images/banner/".$banner->image) }}" alt="" class="simpleProductBannerImg">
                    </a>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </section>



    @php
        $contentf = \App\Models\Content::where('status',1)->skip(3)->take(1)->get();
    @endphp

    @forelse($contentf as $conf)
    <section class="container animate__animated animate__fadeIn">
        <div class="recommended__title">
            <h3>{{ $conf->title }}</h3>
            <a href="{{ route('content_product',$conf->id) }}">See All Items</a>
        </div>
        <div class="recommended__container">
            @php
                $productf = \App\Models\Product::where([['status',1],'content_id' => $conf->id])->latest()->limit(4)->get();
            @endphp
            <div class="row">
                @forelse($productf as $sell)
                <div class="recommended__Items col-md-3 col-sm-6 col-12">
                    <a href="{{ route('view',$sell->slug) }}"  class="recommended__content sponsoredItemSection">
                        <div class="recommendedImg sponsoredItemSection__img">
                            {{--<span class="percentOffText">28% OFF</span>--}}
                            <img src="{{ asset("Back/images/product/".$sell->product_img) }}" alt="">
                        </div>
                        <div class="recommended__items__details">
                            <p>{{ $sell->product_name }}</p>
                            <span>${{ $sell->product_price }}</span><span class="discountPrice">${{ $sell->product_price_old }}</span>
                            {{--<p class="youSaveP">You save $0.56</p>--}}
                        </div>
                    </a>
                </div>
                @empty
                    <div class="recommended__Items col-md-6 col-sm-6 col-12">
                        <div class="recommended__content">
                            <div class="recommended__items__details">
                                <p>Oops... No Product Found</p>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    @empty

    @endforelse

    {{-- categories--}}

    <section class="shopNowfitnessProductsSec">
        <div class="recommended__title">
            <h3>Popular Categories</h3>
        </div>
        <div class="container">
            <div class="shopNowfitnessProductsDiv">

                <div class="row">
                    @forelse($categoryFo as $catefo)
                        <div class="shopNowfitnessProduct col-md-3 col-sm-6 col-12">
                            <div class="shopNowfitnessDiv">
                                <img src="{{ asset("Back/images/category/".$catefo->category_img) }}" style="margin-top: 10px;" alt="">
                                <div class="shopNowfitDivContent">
                                    <h4>{{ $catefo->name }}</h4>
                                    {{--<p>Bear the heat, in seconds</p>--}}
                                    <a href="{{ route('cate_product',$catefo->id) }}">SHOP NOW <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
    </section>

    {{-- end categories--}}

    @php
        $contentfi = \App\Models\Content::where('status',1)->skip(4)->take(1)->get();
    @endphp

    @forelse($contentfi as $confi)

    <section class="container animate__animated animate__fadeIn">
        <div class="recommended__title">
            <h3>{{ $confi->title }}</h3>
            <a href="{{ route('content_product',$confi->id) }}">See All Items</a>
        </div>
        <div class="recommended__container">
            @php
                $productfi = \App\Models\Product::where([['status',1],'content_id' => $confi->id])->latest()->limit(4)->get();
            @endphp
            <div class="row">
                @forelse($productfi as $history)
                <div class="recommended__Items col-md-3 col-sm-6 col-12">
                    <a href="{{ route('view',$history->slug) }}" class="recommended__content sponsoredItemSection">
                        <div class="recommendedImg sponsoredItemSection__img">
                            {{--<span class="percentOffText">28% OFF</span>--}}
                            <img src="{{ asset("Back/images/product/".$history->product_img) }}" alt="">
                        </div>
                        <div class="recommended__items__details">
                            <p>{{ $history->product_name }}</p>
                            <span>$ {{ $history->product_price }}</span><span class="discountPrice">${{ $history->product_price_old }}</span>
                            {{--<p class="youSaveP">You save $0.56</p>--}}
                        </div>
                    </a>
                </div>
                @empty
                    <div class="recommended__Items col-md-6 col-sm-6 col-12">
                        <div class="recommended__content">
                            <div class="recommended__items__details">
                                <p>Oops... No Product Found</p>
                            </div>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
    @empty

    @endforelse

    {{-- partners --}}
    <section class="brandsImgSection">
        <div class="container">
            <div class="brandsImgWrapper">
                @php
                    $partner = \App\Models\Partner::where('status',1)->latest()->limit(12)->get();
                @endphp
                <div class="row brandsImgRow">
                    @forelse($partner as $part)
                        <div class="brandsImg col-md-2 col-sm-4 col-12">
                           {{-- <a href="{{ $part->link }}">--}}
                                <img src="{{ asset("Back/images/partner/".$part->image) }}" alt="">
                            {{--</a>--}}
                        </div>
                    @empty

                    @endforelse
                </div>

            </div>
        </div>
    </section>
    {{-- end partners --}}

    <div class="container">
        <div class="homepageDescription">
            @isset($siteInfo->description)

            <h3>{{ $siteInfo->title }}</h3>

            @endisset

            @isset($siteInfo->description)

            <p>
                {!! $siteInfo->description !!}
            </p>
                @endisset
        </div>
    </div>

    <div class="footerTop">
        <div class="container">
            <div class="footerTop__content__wrapper">
                <div class="row">
                    <div class="footerTop__content col-md-2 col-12">
                        <div class="footerTopContentFlex">
                            <i class="fas fa-envelope"></i>
                            <div class="emailContent">
                                <h4>EMAIL SUPPORT</h4>
                                @isset($siteInfo->email)

                                <p>{{ $siteInfo->email }}</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="footerTop__content col-md-3 col-12">
                        <div class="footerTopContentFlex">
                            <i class="fas fa-phone"></i>
                            <div class="emailContent">
                                <h4>PHONE SUPPORT</h4>
                                @isset($siteInfo->description)

                                <p>{{ $siteInfo->phone_number }}</p>
                                @endisset
                            </div>
                        </div>
                    </div>
                    <div class="footerTop__content col-md-3 col-12">
                        <h4>GET LATEST DEALS</h4>
                        <p>Our best promotions sent to your inbox.</p>
                    </div>
                    <div class="footerTop__content col-md-4 col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('news_store') }}" method="post" class="footerTopInput">
                            @csrf
                            <input type="email" name="email" placeholder="Email Address">
                            <button type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@endsection
