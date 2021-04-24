@extends('BackEnd.master')

@section('title')
    Product | Add
@endsection

@section('content')

    <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                {{-- display success message--}}
                @if(Session::has('sms'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- display success message--}}
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Create Product</h5>
                        <a class="float-right mb-3" href="{{ route('product.index') }}">
                            <i class="fas fa-list"></i> Product List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Product Title<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <input type="text" class="form-control @error('product_name') is-invalid @enderror " value="{{ old('product_name') }}" id="name" name="product_name">
                        @error('product_name')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{--<div class="form-group">
                        <label for="name">Product Qty</label>
                        <input type="text" class="form-control" id="name" name="product_quantity">
                    </div>--}}
                    <div class="form-group">
                        <label for="name">Product Price<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <input type="text" class="form-control @error('product_price') is-invalid @enderror" value="{{ old('product_price') }}" id="name" name="product_price">
                        @error('product_price')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Product Old Price</label>
                        <input type="text" class="form-control @error('product_price_old') is-invalid @enderror" value="{{ old('product_price_old') }}" id="name" name="product_price_old">
                        @error('product_price_old')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Affiliate Link<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <input type="text" class="form-control @error('product_link') is-invalid @enderror" value="{{ old('product_link') }}" id="name" name="product_link">
                        @error('product_link')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Product Image<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <input type="file" accept="image/*" value="{{ old('product_image') }}" class="form-control-file @error('product_image') is-invalid @enderror" id="name" name="product_img">
                        @error('product_image')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{--<div class="form-group">
                        <label for="name">Product Multiple Image<sup style="color:red;">Optional</sup></label>
                        <input type="file" accept="image/*" class="form-control @error('product_multiple_img') is-invalid @enderror" id="name" name="product_multiple_img[]"
                               value="{{ old('product_multiple_img') }}" multiple>
                        @error('product_multiple_img')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>--}}

                    {{--<div class="form-group">
                        <label for="name">Product Size</label>
                        <input type="file" accept="image/*" class="form-control" id="name" name="product_size">
                    </div>

                    <div class="form-group">
                        <label for="name">Product Color</label>
                        <input type="file" accept="image/*" class="form-control" id="name" name="product_color">
                    </div>--}}
                    <div class="form-group">
                        <label for="section_id">Category<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <select class="form-control select2" name="category_id">
                            <option>Select</option>
                            @foreach( $category as $section)
                                <optgroup label="{{ $section['name'] }}"></optgroup>
                                @foreach($section['categories'] as $cate)
                                    <option value="{{ $cate['id'] }}">
                                        &nbsp;&nbsp; == &nbsp; {{ $cate['name'] }}
                                    </option>
                                    @foreach($cate['sub_categories'] as $subCate)
                                        <option value="{{ $subCate['id'] }}">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;
                                            {{ $subCate['name'] }}
                                        </option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="section_id">Content <sup style="color:red;" title="You can skip this"> optional</sup></label>
                        <select class="form-control select2" name="content_id" >
                            <option value="">Select</option>
                            @foreach($content as $con)
                                <option value="{{ $con->id }}">
                                    {{ $con->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="section_id">Banner <sup style="color:red;" title="You can skip this"> optional</sup></label>
                        <select class="form-control select2" name="banner_id" >
                            <option value="">Select</option>
                            @foreach($banner as $ban)
                                <option value="{{ $ban->id }}">
                                    {{ $ban->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="section_id">Country<sup style="color:red;" title="Must fill out this"> Optional</sup></label>
                        <select class="form-control select2" name="country_id" >
                            <option value="">Select</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-control-plaintext">Product Keyword</label>
                        <input type="text" name="keyword[]" data-role="tagsinput" class="form-control" placeholder="type keyword | separated by comma">
                        {{--<input type="text" id="" name="keyword"  class="form-control" placeholder=" enter key word separated by comma  ">--}}
                    </div>

                    <div class="form-group">
                        <label  class="form-control-plaintext">Product Meta Description<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <input type="text" name="product_meta_description" value="{{ old('product_meta_description') }}"
                               class="form-control @error('product_meta_description') is-invalid @enderror" id="product_meta_description">
                        @error('product_meta_description')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label  class="form-control-plaintext">Product Description<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <textarea rows="5" id="div_editor1" name="product_description"></textarea>
                        @error('product_description')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary ">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <!--Rich text editor-->
    <link rel="stylesheet" href="{{ asset('/Back') }}/richtexteditor/rte_theme_default.css" />
    <style>
        .bootstrap-tagsinput{
            margin: 0;
            width: 100%;
            padding: 0.5rem 0.75rem 0;
            font-size: 1rem;
            line-height: 1.25;
            transition: border-color 0.15s ease-in-out;
        }
        .bootstrap-tagsinput .label-info{
            display: inline-block;
            background-color: #375091;
            padding: 0 0.4em 0.15em;
            border-radius: 0.25rem;
            margin-bottom: 0.4em;
            color: #fff;
        }

        .bootstrap-tagsinput input{
            margin-bottom: 0.5em;
            background: no-repeat bottom, 50% calc(100% - 1px);
            background-image: none,none;
            background-size: auto auto;
            width: 70%;
            border: 0;
            height: 36px;
            transition: background 0s ease-out;
            padding-left: 0;
            padding-right: 0;
            border-radius: 0;
            font-size: 14px;

        }
    </style>
@endsection

@section('script')

    {{--========= bootstrap tagsignput script--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input[name="keyword"]').tagsinput({
                trimValue: true,
                confirmKeys: [44],
                focusClass: ""
            });
        });
    </script>

    {{--========= rich text editor script--}}
    <script type="text/javascript" src="{{ asset('/Back') }}/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='{{ asset('/Back') }}/richtexteditor/plugins/all_plugins.js'></script>
    <script>
        var editor1 = new RichTextEditor("#div_editor1");
        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
    </script>
@endsection
