@extends('BackEnd.master')

@section('title')
    Partner | Add
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
                        <h5>Partner Generate</h5>
                        <a class="float-right mb-3" href="{{ route('partner.index') }}">
                            <i class="fas fa-list"></i> Partner List
                        </a>
                    </div>
                </div>
            </div>
            <div class="offset-1 col-xl-10 col-md-10 col-sm-10 col-10">

                <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Link</label>
                        <input type="text"  class="form-control" name="link">
                    </div>

                    <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" accept="image/*" class="form-control" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Store</button>
                </form>
            </div>
        </div>
    </div>
@endsection
