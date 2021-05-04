@extends('BackEnd.master')

@section('title')
    Sub-Category | Edit
@endsection


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item text-dark">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">

            @if(Session::has('sms'))
                <div class="alert alert-default-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('sms') }}</strong> .
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h3 class="card-title btn-sm">Sub-Category Edit</h3>
            <a class="card-header-tabs float-right btn-sm" href="{{ route('category.index') }}">
                <i class="fas fa-list"></i> Sub-Category List
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="offset-2 col-lg-8 col-md-8 col-sm-8">
                <form action="{{ route('category-update',$cate->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="section_id">Category</label>
                        <select class="form-control select2" id="section_id" name="section_id">
                            <option>Select</option>
                            @foreach($sections as $sec)
                                <option value="{{ $sec->id }}" @if($sec->id == $cate->section_id) selected @endif>{{ $sec->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Sub-Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $cate->name }}">
                    </div>
                    <div id="appendCategoryLevels">
                        @include('BackEnd.category.cate-append')
                    </div>
                    <div class="form-group">
                        <label for="name">Previous Image</label>
                        <img src="{{ asset("Back/images/category/". $cate->category_img ) }}" height="60" width="60" alt="pro-img"><br/>
                        <label for="name">Category Image</label>
                        <input type="file" accept="image/*" class="form-control-file" name="category_img">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
