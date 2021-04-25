@extends('BackEnd.master')

@section('title')
    Country | Add
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
                        <h5>Country Generate</h5>
                        <a class="float-right mb-3" href="{{ route('country.index') }}">
                            Country List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
                <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">
                    <form action="{{ route('country.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name"  placeholder="Country name">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
           {{-- </div>--}}
        </div>
    </div>

@endsection
