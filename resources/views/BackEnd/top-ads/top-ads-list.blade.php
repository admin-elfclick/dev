@extends('BackEnd.master')

@section('title')
    Site-Ads | List
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
                        <a class="float-right mt-4 mr-4" href="{{ route('top_ads_create') }}">
                            Site-Ads Generate
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Logo</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($ads as $ad)
                            <tr>

                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ asset("Back/images/ads/".$ad->image) }}" alt="site top ads" width="120px">
                                </td>
                                <td>
                                    <a class="btn" onclick="event.preventDefault();
                                        if(confirm('Are you really want to delete?')){
                                        document.getElementById('ads-delete-{{ $ad->id }}').submit()
                                        }">
                                        <span class="fas fa-trash text-danger" title="Destroy"></span>
                                        <form method="post" action="{{ route('top_ads_del',$ad->id) }}" id="{{ 'ads-delete-'.$ad->id }}">
                                            @csrf
                                            @method('POST')
                                        </form>
                                    </a>

                                    <a data-toggle="modal" data-target="#siteInfo{{ $ad->id }}" class="btn">
                                        <i class="fas fa-pencil-alt" title="Edit"></i>
                                    </a>
                                </td>

                            <!-- Modal -->
                                <div class="modal fade" id="siteInfo{{ $ad->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Site Info Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('top_ads_update',$ad) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="name">Site Top Ads Preview</label>
                                                    <img src="{{ asset('Back/images/ads/'.$ad->image) }}" width="120px"/>
                                                    <br/>
                                                    <input type="file" accept="image/*" class="form-control-file" value="" name="image">
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
                            <th>Ads</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection

