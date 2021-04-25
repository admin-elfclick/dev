@extends('BackEnd.master')

@section('title')
    Slider | Edit
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
                        <h5>Slider Edit</h5>
                        <a class="float-right mb-3" href="{{ route('slider.index') }}">
                            Slider List
                        </a>
                    </div>
                </div>
            </div>

            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                <form action="{{ route('slider.update',$slider) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Previous Image</label>
                        <img src="{{ asset("Back/images/slider/". $slider->image ) }}" height="60" width="60" alt="pro-img"><br/>
                        <label for="name">Slider Image</label>
                        <input type="file" accept="image/*" class="form-control " name="image">
                    </div>

                    <div class="form-group">
                        <label for="section_id">Category</label>
                        <select class="form-control select2" name="category_id">
                            <option>Select</option>
                            @foreach( $category as $section)
                                <optgroup label="{{ $section['name'] }}"></optgroup>
                                @foreach($section['categories'] as $cate)
                                    <option value="{{ $cate['id'] }}" @if($cate['id'] == $slider->category_id) selected @endif>
                                        &nbsp;&nbsp; == &nbsp; {{ $cate['name'] }}
                                    </option>
                                    @foreach($cate['sub_categories'] as $subCate)
                                        <option value="{{ $subCate['id'] }}" @if($subCate['id'] == $slider->category_id) selected @endif>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp;
                                            {{ $subCate['name'] }}
                                        </option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

