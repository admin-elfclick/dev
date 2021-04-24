@extends('FrontEnd.master')

@section('title')
    ELF-CLICK-Categories
@endsection

@section('content')

    <div class="container my-5">
        <section class="shopNowfitnessProductsSec">

            <div class="container">
                <div class="shopNowfitnessProductsDiv">
                    <div class="row">
                        @forelse($category as $cate)
                            <div class="shopNowfitnessProduct col-md-3 col-sm-6 col-12 mt-3">
                                <div class="shopNowfitnessDiv">
                                    {{--<img src="{{ asset("Back/images/category/".$cate->category_img) }}" style="margin-top: 10px;" alt="">--}}
                                    <div class="shopNowfitDivContent">
                                        <h4>{{ $cate->name }}</h4>
                                        {{--<p>Bear the heat, in seconds</p>--}}
                                        <a href="{{ route('cate_product',$cate->id) }}">SHOP NOW <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="shopNowfitnessProduct col-md-3 col-sm-6 col-12">
                                <div class="shopNowfitnessDiv">
                                    <p style="padding-top: 70px; color: white;">
                                        Oops... <br/>No Category Found
                                    </p>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>


        </section>
    </div>

@endsection
