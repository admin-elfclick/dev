@extends('BackEnd.master')

@section('title')
    SiteInfo | Edit
@endsection

@section('content')

    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <form action="{{ route('siteInfo.update',$siteInfo) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Site Title</label>
                <input type="text" class="form-control" value="{{ $siteInfo->title }}" name="title">

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Phone Number</label>
                <input type="text" class="form-control " value="{{ $siteInfo->phone_number }}" name="phone_number">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">E-mail </label>
                <input type="text" class="form-control " value="{{ $siteInfo->email }}" name="email">
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Facebook Link</label>
                <input type="text" class="form-control" value="{{ $siteInfo->facebook_link }}" name="facebook_link">
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Twitter Link </label>
                <input type="text" class="form-control " value="{{ $siteInfo->twitter_link }}" name="twitter_link">
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Instagram Link</label>
                <input type="text" class="form-control" value="{{ $siteInfo->instagram_link }}" name="instagram_link">
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Youtube Link </label>
                <input type="text" class="form-control" value="{{ $siteInfo->youtube_link }}" name="youtube_link">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">Play Store Link</label>
                <input type="text" class="form-control" value="{{ $siteInfo->play_store_link }}" name="play_store_link">
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
                <label for="name">App Store Link </label>
                <input type="text" class="form-control " value="{{ $siteInfo->app_store_link }}" name="app_store_link">

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="name">Site Description</label>
                <textarea class="form-control" name="description">{{ $siteInfo->description }}</textarea>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="name">Site Logo Preview</label>
                <img src="{{ asset('Back/images/logo/'.$siteInfo->logo) }}" width="120px"/>
                <label for="name">Site Logo</label>
                <input type="file" accept="image/*" class="form-control-file" value="" name="logo">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary float-right">Update</button>
</form>
    </div>
@endsection
