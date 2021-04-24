@extends('BackEnd.master')

@section('title')
    Slider | Add
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
                        <h5>Slider Generate</h5>
                        <a class="float-right mb-3" href="{{ route('slider.index') }}">
                            Slider List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Slider Image<sup style="color:red;" title="Must fill out this">*</sup></label>
                        <input type="file" accept="image/*" value="{{ old('image') }}"
                               class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <div class="alert alert-default-danger">{{ $message }}</div>
                        @enderror
                    </div>

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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('style')
    {{--<style>
        .form-group-file{
            width: 300px;
            height: 200px;
            border: 2px dashed #000;
            margin-bottom: 10px;
        }
        .form-group-file p{
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 170px;
        }
    </style>--}}
@endsection

@section('script')

    {{--<script>

        function previewFile(input){
            let file = $("input[type=file]").get(0).files[0];
            if(file){
                let reader = new FileReader();
                reader.onload = function (){
                    $("#previewImg").attr('src',reader.result);
                    $("#prviewBox").css('display', 'block');
                }
                $(".form-group-file").css('display','none');
                reader.readAsDataURL(file);
            }
        }
        function previewRemove(input){
            $("#previewImg").attr('src',"");
            $("#prviewBox").css('display', 'none');
            $(".form-group-file").css('display','block');
        }
    </script>--}}
@endsection
