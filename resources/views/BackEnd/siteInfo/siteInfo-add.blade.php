@extends('BackEnd.master')

@section('title')
    SiteInfo | Add
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

                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('error') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- display success message--}}


                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h5>SiteInfo Generate</h5>
                        <a class="float-right mb-3" href="{{ route('siteInfo.index') }}">
                            SiteInfo List
                        </a>
                    </div>
                </div>
            </div>
            {{--<div class="widget-content widget-content-area">--}}
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <form action="{{ route('siteInfo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Site Title<sup style="color:red;" title="Must fill out this">*</sup></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}" name="title">
                                    @error('title')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Phone Number<sup style="color:red;" title="Must fill out this">*</sup></label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror " value="{{ old('phone_number') }}" name="phone_number">
                                    @error('phone_number')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">E-mail <sup style="color:red;" title="Must fill out this">*</sup></label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" name="email">
                                    @error('email')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Facebook Link <sup style="color:red;" title="You can skip that"> Optional</sup></label>
                                    <input type="text" class="form-control @error('facebook_link') is-invalid @enderror " value="{{ old('facebook_link') }}" name="facebook_link">
                                    @error('facebook_link')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Twitter Link <sup style="color:red;" title="You can skip that">Optional</sup></label>
                                    <input type="text" class="form-control @error('twitter_link') is-invalid @enderror " value="{{ old('twitter_link') }}" name="twitter_link">
                                    @error('twitter_link')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Instagram Link <sup style="color:red;" title="You can skip that"> Optional</sup></label>
                                    <input type="text" class="form-control @error('instagram_link') is-invalid @enderror " value="{{ old('instagram_link') }}" name="instagram_link">
                                    @error('instagram_link')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Youtube Link <sup style="color:red;" title="You can skip that">Optional</sup></label>
                                    <input type="text" class="form-control @error('youtube_link') is-invalid @enderror " value="{{ old('youtube_link') }}" name="youtube_link">
                                    @error('youtube_link')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">Play Store Link <sup style="color:red;" title="You can skip that">Optional</sup></label>
                                    <input type="text" class="form-control @error('play_store_link') is-invalid @enderror " value="{{ old('play_store_link') }}" name="play_store_link">
                                    @error('play_store_link')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="name">App Store Link <sup style="color:red;" title="You can skip that">Optional</sup></label>
                                    <input type="text" class="form-control @error('app_store_link') is-invalid @enderror " value="{{ old('app_store_link') }}" name="app_store_link">
                                    @error('app_store_link')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Site Description<sup style="color:red;" title="Must fill out this">*</sup></label>
                                    <textarea class="form-control" name="description"></textarea>
                                    @error('description')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Site Logo<sup style="color:red;" title="Must fill out this">*</sup></label>
                                    <input type="file" accept="image/*" class="form-control-file @error('logo') is-invalid @enderror " value="{{ old('logo') }}" name="logo">
                                    @error('logo')
                                    <div class="alert alert-default-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right" style="margin-top: -25px;">Submit</button>
                    </form>
                </div>
           {{-- </div>--}}
        </div>
    </div>

@endsection
