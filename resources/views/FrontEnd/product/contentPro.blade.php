@extends('FrontEnd.master')

@section('title')
    ELF-CLICK-Content-Wise-Product
@endsection

@section('content')

    {{--<div class="container my-5">

        <div class="card mt-5">
            <div class="row">
                <div class="card-body">
                    <div class="col-lg-8 col-md-8">
                        <h3>{{ $product->product_name }}</h3>
                        <strong style="font-size: 18px">${{ $product->product_price }}</strong><span class="discountPrice">${{ $product->product_price_old }}</span>
                        <hr/>
                        <h4>{{ $product->product_meta_description }}</h4><br/>
                        <span style="font-size: 13px;">{!! $product->product_description !!}</span>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card-img-top">
                            <img src="{{ asset("Back/images/product/".$product->product_img) }}" width="300px"  alt="">
                        </div>
                        <div class="card-footer">
                            <a href="{{ $product->product_link }}" class="btn-lg btn-block btn-primary text-lg-center">See Deals</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="container my-5">
        <section class="container animate__animated animate__fadeIn my-5">
            <div class="recommended__title">
                <h3>{{ $content->title }}</h3>
            </div>
                <div class="recommended__container">
                    <div class="row">
                        @forelse($products as $contentPro)
                            <div class="recommended__Items col-md-4 col-sm-6 col-12">
                                <a href="{{ route('view',$contentPro->slug) }}" class="recommended__content">
                                    <div class="recommendedImg">
                                        <img src="{{ asset("Back/images/product/".$contentPro->product_img) }}" alt="">
                                    </div>
                                    <div class="recommended__items__details">
                                        <p>{{ $contentPro->product_name }}</p>
                                        <span>${{ $contentPro->product_price }}</span><span class="discountPrice">${{ $contentPro->product_price_old }}</span>
                                        {{-- <p class="youSaveP">You save ${{ $contentPro->product_price_old - $contentPro->product_price }}</p> --}}
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="recommended__Items col-md-4 col-sm-6 col-12">

                                <div class="recommended__items__details" style=" text-align: center;height: 200px; width: 200px; border-radius: 50%; background-color: #496fb5e0; margin: 10px;">
                                    <p style="padding-top: 70px; color: white;">
                                        Oops... <br/>No Product Found
                                    </p>
                                </div>

                            </div>
                        @endforelse
                    </div>
                </div>

        </section>
    </div>

@endsection
