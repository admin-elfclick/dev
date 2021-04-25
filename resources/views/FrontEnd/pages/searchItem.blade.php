@extends('FrontEnd.master')

@section('title')
    {{ \request()->query('query') }}
@endsection

@section('content')

    <div class="container my-5">
        <div class="recommended__container">

            <div class="row">
                <div class="offset-1 col-10">
                    <h3 class="text-center">
                        You have searched, {{ \request()->query('query') }}. <strong style="color: #0b2e13; font-size: 28px">We found {{ $searchPro->count() }} item.</strong>
                    </h3>
                </div>

                @forelse($searchPro as $search)
                    <div class="recommended__Items col-lg-6 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('view',$search->id) }}" class="recommended__content">
                            <div class="recommendedImg">
                                <img src="{{ asset("Back/images/product/".$search->product_img) }}" alt="">
                            </div>
                            <div class="recommended__items__details">
                                <p>{{ $search->product_name }}</p>
                                <span>${{ $search->product_price }}</span><span class="discountPrice">${{ $search->product_price_old }}</span>
                                <p class="youSaveP">You save ${{ $search->product_price_old - $search->product_price }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="recommended__Items col-lg-6 col-md-6 col-sm-6 col-12">

                        <div class="recommended__items__details" style=" text-align: center;height: 200px; width: 200px; border-radius: 50%; background-color: #496fb5e0; margin: 10px;">
                            <p style="padding-top: 70px; color: white;">
                                Oops... <br/>No Product Found
                            </p>
                        </div>

                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
