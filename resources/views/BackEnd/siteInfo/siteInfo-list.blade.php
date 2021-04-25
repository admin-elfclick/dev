@extends('BackEnd.master')

@section('title')
    SiteInfo | List
@endsection

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                {{-- display error message --}}
                @if(Session::has('sms'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- //display error message --}}
                <div class="widget-content widget-content-area br-6">
                    <div class="">
                        <a class="float-right mt-4 mr-4" href="{{ route('siteInfo.create') }}">
                            SiteInfo Add
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Logo</th>
                            <th>Phone Number</th>
                            <th>E-mail</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($siteInfo as $site)
                                <tr>

                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <img src="{{ asset("Back/images/logo/".$site->logo) }}" alt="site logo" width="120px">
                                    </td>
                                    <td>{{ $site->phone_number }}</td>
                                    <td>
                                        {{ $site->email }}
                                    </td>
                                    <td>
                                        <a class="btn" onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete?')){
                                            document.getElementById('info-delete-{{ $site->id }}').submit()
                                            }">
                                            <span class="fas fa-trash text-danger" title="Destroy"></span>
                                            <form method="post" action="{{ route('siteInfo.destroy',$site->id) }}" id="{{ 'info-delete-'.$site->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>

                                        <a data-toggle="modal" data-target="#siteInfo{{ $site->id }}" class="btn" {{--href="{{ route('siteInfo.edit',$site->id) }}"--}}>
                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                        </a>
                                    </td>



                                    <!-- Button trigger modal -->
                                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                        Launch static backdrop modal
                                    </button>--}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="siteInfo{{ $site->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Site Info Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('siteInfo.update',$site) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" value="{{ $site->id }}"/>
                                                                    <label for="name">Site Title</label>
                                                                    <input type="text" class="form-control" value="{{ $site->title }}" name="title">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">Phone Number</label>
                                                                    <input type="text" class="form-control " value="{{ $site->phone_number }}" name="phone_number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">E-mail </label>
                                                                    <input type="text" class="form-control " value="{{ $site->email }}" name="email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">Facebook Link</label>
                                                                    <input type="text" class="form-control" value="{{ $site->facebook_link }}" name="facebook_link">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">Twitter Link </label>
                                                                    <input type="text" class="form-control " value="{{ $site->twitter_link }}" name="twitter_link">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">Instagram Link</label>
                                                                    <input type="text" class="form-control" value="{{ $site->instagram_link }}" name="instagram_link">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">Youtube Link </label>
                                                                    <input type="text" class="form-control" value="{{ $site->youtube_link }}" name="youtube_link">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">Play Store Link</label>
                                                                    <input type="text" class="form-control" value="{{ $site->play_store_link }}" name="play_store_link">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="name">App Store Link </label>
                                                                    <input type="text" class="form-control " value="{{ $site->app_store_link }}" name="app_store_link">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Site Description</label>
                                                                    <textarea class="form-control" name="description">{{ $site->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Site Logo Preview</label>
                                                                    <img src="{{ asset('Back/images/logo/'.$site->logo) }}" width="120px"/>
                                                                    <br/>

                                                                    <input type="file" accept="image/*" class="form-control-file" value="" name="logo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Logo</th>
                            <th>Phone Number</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection

