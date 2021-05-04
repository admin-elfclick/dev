@extends('FrontEnd.master')

@section('title')
    ELF-CLICK-Category-Wise-Product
@endsection

@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



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
    @php
      $categories = DB::table('categories')->get();
    @endphp
    <section class="all__category__Wrapper">
      <div class="container">
      <div class="row">
        <div class="selectCategorySidebar col-md-3 col-sm-4 col-12">
          <button class="accordion">Browse Categories</button>
            <div class="panel">
              @foreach ($categories as $info)
                <p><a href="{!! route('cate_product',$info->id) !!}">{{ $info->name }}</a></p>
              @endforeach
            </div>

          <button class="accordion">Price</button>
            <div class="panel">
                <div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#1" ).click(function() {
                              $( "#first_select" ).submit();
                          });
                      });
                      </script>
                        <input id="1" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="1">Under $20</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="first_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="0">
                          <input type="hidden"  name="l_price" value="20">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#2" ).click(function() {
                              $( "#sec_select" ).submit();
                          });
                      });
                      </script>
                        <input id="2" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="2">$20−$50</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="sec_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="20">
                          <input type="hidden"  name="l_price" value="50">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#3" ).click(function() {
                              $( "#t_select" ).submit();
                          });
                      });
                      </script>
                        <input id="3" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="3">$50−$100</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="t_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="50">
                          <input type="hidden"  name="l_price" value="100">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#4" ).click(function() {
                              $( "#forth_select" ).submit();
                          });
                      });
                      </script>
                        <input id="4" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="4">$100−$200</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="forth_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="100">
                          <input type="hidden"  name="l_price" value="200">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#5" ).click(function() {
                              $( "#fifth_select" ).submit();
                          });
                      });
                      </script>
                        <input id="5" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="5">$200−$500</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="fifth_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="200">
                          <input type="hidden"  name="l_price" value="500">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#6" ).click(function() {
                              $( "#sixth_select" ).submit();
                          });
                      });
                      </script>
                        <input id="6" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="6">$500−$1000</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="sixth_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="500">
                          <input type="hidden"  name="l_price" value="1000">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                    <div class="box">
                      <script type="text/javascript">
                      $(document).ready(function () {
                          $( "#7" ).click(function() {
                              $( "#seventh_select" ).submit();
                          });
                      });
                      </script>
                        <input id="7" type="radio" name="PriceRange">
                        <span class="check"></span>
                        <label for="7">Above $1000</label>
                        <form method="post" action="{!! route('rangeSelect') !!}" id="seventh_select">
                          @csrf
                          <input type="hidden"  name="f_price" value="1000">
                          <input type="hidden"  name="l_price" value="1000000">
                          <input type="hidden"  name="category_id" value="{{ $category->id }}">
                        </form>
                    </div>
                </div>
            </div>
         </div>


                 <div class="all__products__container col-md-9 col-sm-6 col-12">
                     <div class="row">
                         @forelse($products as $catePro)
                             <div class="all__products__Items col-md-3 col-sm-6 col-12">
                                 <a href="{{ route('view',$catePro->slug) }}" class="all__products__content">
                                     <div class="all__products__img">
                                         <img src="{{ asset("Back/images/product/".$catePro->product_img) }}" alt="">
                                     </div>
                                     <div class="all__products__items__details">
                                         <span>${{ $catePro->product_price }}</span><span class="discountPrice">${{ $catePro->product_price_old }}</span>
                                         <p class="youSaveP">You save ${{ $catePro->product_price_old - $catePro->product_price }}</p>
                                         <p>{{ $catePro->product_name }}</p>
                                     </div>
                                 </a>
                             </div>
                         @empty
                             <div class="recommended__Items col-md-9 col-sm-6 col-12">

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
    </div>
  </div>
</section>

@endsection
