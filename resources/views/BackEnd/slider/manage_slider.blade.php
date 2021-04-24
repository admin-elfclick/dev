@extends('BackEnd.master')

@section('title')
    Slider | List
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
                        <a class="float-right mt-4 mr-4" href="{{ route('slider.create') }}">
                            Slider Add
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="no-content">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($sliders as $slide)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <img src="{{ asset("Back/images/slider/".$slide->image) }}" height="80" width="80" alt="post image">
                                    </td>
                                    <td>{{ $slide->category->name }}</td>
                                    <td>
                                        @if($slide->status == 1)
                                            <li class="text-success">
                                               Public
                                            </li>
                                            @else
                                            <li class="text-danger">
                                                Hide
                                            </li>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" title="Delete" class="btn text-danger"
                                           onclick="event.preventDefault()
                                            if (confirm('Are you really want to delete this?')){
                                            document.getElementById('slide-del{{ $slide->id }}').submit();
                                            }">
                                            <i class="fas fa-trash nav-icon"></i>
                                            <form method="post" action="{{ route('slider.destroy',$slide->id) }}" id="{{ 'slide-del'.$slide->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>

                                        <a href="{{ route('slider.edit',$slide->id) }}" title="Change this" class="btn text-success">
                                            <i class="fas fa-edit nav-icon"></i>
                                        </a>

                                        @if($slide->status == 1)
                                            <a href="{{ route('slider_hide',$slide->id) }}" title="Click To Hide" class="btn text-info">
                                                <i class="fas fa-arrow-up nav-icon"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('slider_public',$slide->id) }}" title="Click To Public" class="btn text-dark">
                                                <i class="fas fa-arrow-down nav-icon"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
