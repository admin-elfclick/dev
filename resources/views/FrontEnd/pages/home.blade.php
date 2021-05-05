    @extends('FrontEnd.master')

    @section('title')
    ELF-CLICK-Home
    @endsection

    @section('content')
    <section class="nav__container row mt-5">
        <div class="animate__animated animate__fadeInLeft slider__container col-md-8 col-sm-8 col-xs-12">
            <div class="slider__wrapper">
                <ul id="sb-slider" class="sb-slider">
                    @forelse($sliders as $slide)
                    <li>
                        <a href="{{ route('cate_product',$slide->id) }}" target="_blank">
                            <img src="{{ asset("Back/images/slider/".$slide->image) }}" alt="image-img" />
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


        <div class="animate__animated animate__fadeInRight sliderLeft__container col-md-4 col-sm-4 col-xs-12">
            <div class="sliderLeft__content row">
                @forelse($banners as $ban)
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="{{ route('banner_pro',$ban->id) }}" class="sliderLeft__img">
                        <img src="{{ asset("Back/images/banner/".$ban->image) }}" alt="">
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
            $products = \App\Models\Product::where([['status',1],'content_id' => $con->id])->latest()->limit(9)->get();
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

                            <p class="youSaveP">You save ${{$pro->product_price_old - $pro->product_price}} </p>
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
      $auth = Auth::user();
    @endphp
    @if (!empty($auth))
      @php
         $activites = DB::table('activities')->where('user_id', Auth::id())->limit(6)->orderBy('id', 'desc')->get();
      @endphp
    <section class="container animate__animated animate__fadeInUp">
        <div class="recommended__title">
            <h3>Last browsed products</h3>
        </div>

        <div class="recommended__container">
            <div class="row">
              @forelse ($activites as $products)
                @php
                  $productDetails = DB::table('products')->where('id', $products->product_id)->first();
                @endphp
                <div class="recommended__Items col-md-4 col-sm-6 col-12">
                    <a href="{{ route('view',$productDetails->slug) }}" class="recommended__content">
                        <div class="recommendedImg">
                            <img src="{{ asset("Back/images/product/".$productDetails->product_img) }}" alt="">
                            {{-- {{ asset("Back/images/product/".$pro->product_img) }} --}}
                        </div>
                        <div class="recommended__items__details">
                            <p>{{ $productDetails->product_name }}</p>
                            <span>${{ $productDetails->product_price }}</span><span class="discountPrice">${{ $productDetails->product_price_old }}</span>

                            {{--<p class="youSaveP">You save $ </p>--}}
                        </div>
                    </a>
                </div>
              @empty
              <div class="recommended__Items col-md-4 col-sm-6 col-12">
                  <div class="recommended__content">
                      <div class="recommended__items__details">
                          <p>Oops... No products in history</p>
                      </div>
                  </div>
              </div>
              @endforelse
            </div>
        </div>
    </section>
  @endif


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
    $banner = \App\Models\Banner::where('status',1)->latest()->skip(4)->take(1)->get();
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


    {{--============ banner ======--}}

    @php
    $banners = \App\Models\Banner::where('status',1)->latest()->skip(5)->take(2)->get();
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
                    <a href="{{ route('view',$sell->slug) }}" class="recommended__content sponsoredItemSection">
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
    <section class="container animate__animated animate__fadeIn">
        <div class="recommended__title">
            <h3>Popular Categories</h3>
        </div>
        <div class="">
            <div class="PopularCategoriesWrapper">

                {{--<div class="wrappedPopularCategory wrappedPopularCategory1">
                    <div class="PopularCategoriesBackImgDiv">
                        <img src="https://firebasestorage.googleapis.com/v0/b/elfclicks-6f3b2.appspot.com/o/comp.jfif?alt=media&token=c4496fb8-47e7-4781-8c46-539a3a4b52e1" alt="">
                        <h3>Computer And Accessories</h3>
                    </div>
                    <div class="PopularCategoriesFrontDiv PopularCategory1">
                        <h3>Computer And Accessories</h3>
                        <ul>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Desktop And Monitors</a></li>
                            <li><a href="#">Computing Accessories</a></li>
                        </ul>
                    </div>
                </div>--}}

                @php
                    $sectionTwo = \App\Models\Section::sectionsTwo();
                     /*echo "<pre>"; print_r($sectionTwo); die();*/
                @endphp

                {{-- @if (empty($sectionTwo)) --}}
                @foreach($sectionTwo as $key => $sec)
                <div class="wrappedPopularCategory wrappedPopularCategory{{ ++$key }}">
                    <div class="PopularCategoriesBackImgDiv">

                        <img src="{{ asset("Back/images/section/".$sec['image']) }}" alt="category-img">

                        <h3>{{ $sec['name'] }}</h3>
                    </div>
                    <div class="PopularCategoriesFrontDiv PopularCategory{{ $key++ }}">
                        <h3>{{ $sec['name'] }}</h3>
                        <ul>
                            @foreach($sec['categories'] as $cate)
                            <li><a href="{{ route('cate_product',$cate['id']) }}">{{ $cate['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                {{-- @endif --}}

                {{--<div class="wrappedPopularCategory wrappedPopularCategory3">
                    <div class="PopularCategoriesBackImgDiv">
                        <img src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/v1611140408/v3_homepage/categories/subs/electronics.png" alt="">
                        <h3>Electronics</h3>
                    </div>
                    <div class="PopularCategoriesFrontDiv PopularCategory3">
                        <h3>Electronics</h3>
                        <ul>
                            <li><a href="#">Televisions</a></li>
                            <li><a href="#">DVD Players and recorders</a></li>
                            <li><a href="#">Cameras</a></li>
                        </ul>
                    </div>
                </div>

                <div class="wrappedPopularCategory wrappedPopularCategory4">
                    <div class="PopularCategoriesBackImgDiv">
                        <img src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/v1611140408/v3_homepage/categories/subs/fashion.png" alt="">
                        <h3>ELF-click Fashion</h3>
                    </div>
                    <div class="PopularCategoriesFrontDiv PopularCategory4">
                        <h3>ELF-click Fashion</h3>
                        <ul>
                            <li><a href="#">Women's Wear</a></li>
                            <li><a href="#">Women's Shoes</a></li>
                            <li><a href="#">Women's Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="wrappedPopularCategory wrappedPopularCategory5">
                    <div class="PopularCategoriesBackImgDiv">
                        <img src="https://www-konga-com-res.cloudinary.com/image/upload/w_auto,f_auto,fl_lossy,dpr_auto,q_auto/v1611140408/v3_homepage/categories/subs/home.png" alt="">
                        <h3>Home and Kitchen</h3>
                    </div>
                    <div class="PopularCategoriesFrontDiv PopularCategory5">
                        <h3>Home and Kitchen</h3>
                        <ul>
                            <li><a href="#">Large Appliances</a></li>
                            <li><a href="#">Small Appliances</a></li>
                            <li><a href="#">Home Furnishings</a></li>
                        </ul>
                    </div>
                </div>--}}



            </div>
        </div>
    </section>

    {{-- categories--}}

    <section class="shopNowfitnessProductsSec">
        <div class="container">
            <div class="shopNowfitnessProductsDiv">

                <div class="row">
                    @forelse($categoryFo as $catefo)
                    <div class="shopNowfitnessProduct col-md-3 col-sm-6 col-12">
                        <div class="shopNowfitnessDiv">
                            <img src="{{ asset("Back/images/category/".$catefo->category_img) }}" alt="">
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

            <h3>Online Shopping on elf-click.com – world’s Largest Online Mall</h3>

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
    @endsection
