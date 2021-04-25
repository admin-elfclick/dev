@extends('FrontEnd.master')

@section('title')
    ELF-CLICK-Banner-Product
@endsection

@section('content')

    <div class="container my-5">
        <section class="container animate__animated animate__fadeIn my-5">
            <div class="recommended__title">
                <h3>{{ $banner->title }}</h3>
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
                                        {{--<p class="youSaveP">You save ${{ $contentPro->product_price_old - $contentPro->product_price }}</p>--}}
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
