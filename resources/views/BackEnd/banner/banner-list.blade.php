@extends('BackEnd.master')

@section('title')
    Banner | List
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
                        <a class="float-right mt-4 mr-4" href="{{ route('banner.create') }}">
                            Banner Add
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($banners as $ban)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        {{ $ban->title }}
                                    </td>
                                    <td>
                                        <img src="{{ asset("Back/images/banner/".$ban->image) }}" width="120">
                                    </td>
                                    <td>
                                        @if($ban->status == 1)
                                            <a class="text-success" href="{{ route('banner_hide',$ban->id) }}" title="Active">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a class="text-danger" href="{{ route('banner_public',$ban->id) }}" title="Inactive">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete?')){
                                            document.getElementById('ban-delete-{{ $ban->id }}').submit()
                                            }">
                                            <span class="fas fa-trash text-danger" title="Destroy"></span>
                                            <form method="post" action="{{ route('banner.destroy',$ban->id) }}" id="{{ 'ban-delete-'.$ban->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>

                                        <a class="btn" data-toggle="modal" data-target="#bannerEdit{{ $ban->id }}">
                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                        </a>
                                    </td>
                                    {{-- modal --}}

                                    <div class="modal fade" id="bannerEdit{{ $ban->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Banner Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('banner.update',$ban) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group mb-3">
                                                            <input type="text" class="form-control" name="title"  value="{{ $ban->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Previous Image</label>
                                                            <img src="{{ asset("Back/images/banner/".$ban->image) }}" width="120">
                                                            <label for="name">Banner Image</label>
                                                            <input type="file" accept="image/*" class="form-control-file" name="image">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--// modal --}}

                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

    </div>

@endsection

