@extends('BackEnd.master')

@section('title')
    Banner | Add
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

                {{-- display error message--}}
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('error') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- display error message--}}

                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>Banner Generate</h5>
                        <a class="float-right mb-3" href="{{ route('banner.index') }}">
                            Banner List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
                <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="title"  placeholder="Banner title">
                        </div>
                        <div class="form-group">
                            <label for="name">Banner Image</label>
                            <input type="file" accept="image/*" class="form-control-file" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Store</button>
                    </form>
                </div>
           {{-- </div>--}}
        </div>
    </div>

@endsection
