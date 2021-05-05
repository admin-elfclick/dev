@extends('FrontEnd.master')

@section('title')
{{ $product->product_name }}
@endsection

@section('content')

<div class="viewProduct__wrapper">
    <div class="container">
        <div class="viewProduct__row">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="Product__img">
                        <img id="zoom_01" src='{{ asset("Back/images/product/".$product->product_img) }}' data-zoom-image='{{ asset("Back/images/product/".$product->product_img) }}' width="300px" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-12">
                    <div class="view__product__Content__div">
                        <h1 class="Product__title__name">{{ $product->product_name }}</h1>
                        <span style="color: #9b9b9b;">Product Code: <strong style="color: #000; font-weight:900">{{$product->id}}</strong></span>
                    </div>
                    <div class="view__product__Content__div view__product__price__div">
                        <strong>${{ $product->product_price }}</strong>
                        <span class="view__content__price1">${{ $product->product_price_old }}</span>
                        <span class="view__content__price2">You save ${{$product->product_price_old - $product->product_price}}</span>
                    </div>
                    <div class="view__product__Content__div view__product__btn__div">
                        <button class="DealBtn">
                            <a href="{{ url($product->product_link) }}" target="_blank">See Deals</a>
                        </button>
                        <button class="saveforlater__btn">
                            <i class="fab fa-gratipay"></i> Save For Later
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="productDescription">
            <div class="descriptionName">
                <h3>Description</h3>
            </div>
            <div class="productDescription__content">
                <h4>Meta Tags: <span>{{ $product->product_meta_description }}</span></h4>
                <span style="font-size: 13px;">{!! $product->product_description !!}</span>
            </div>
        </div>
    </div>
</div>

<section class="container animate__animated animate__fadeIn my-5">
    <div class="recommended__title">
        <h3>Related Product</h3>
    </div>
    <div class="recommended__container">
        <div class="row">

            @forelse($relatedProduct as $related)
            <div class="recommended__Items col-md-4 col-sm-6 col-12">
                <a href="{{ route('view',$related->slug) }}" class="recommended__content">
                    <div class="recommendedImg">
                        <img src="{{ asset("Back/images/product/".$related->product_img) }}" alt="">
                    </div>
                    <div class="recommended__items__details">
                        <p>{{ $related->product_name }}</p>
                        <span>${{ $related->product_price }}</span><span class="discountPrice">${{ $related->product_price_old }}</span>
                        <p class="youSaveP">You save ${{ $related->product_price_old - $related->product_price }}</p>
                    </div>
                </a>
            </div>
            @empty
            <div class="recommended__Items col-md-4 col-sm-6 col-12">

                <div class="recommended__items__details" style=" text-align: center;height: 200px; width: 200px; border-radius: 50%; background-color: #496fb5e0; margin: 10px;">
                    <p style="padding-top: 70px; color: white;">
                        Oops... <br />No Product Found
                    </p>
                </div>

            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection