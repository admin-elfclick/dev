@extends('BackEnd.master')

@section('title')
    Sub Category | List
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
                        <a class="float-right mt-4 mr-4" href="{{ route('category.create') }}">
                            Sub-Category
                        </a>
                    </div>

                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Section</th>
                            <th>Parent Category</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)



                        @foreach($cates as $cate)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cate->section->name }}</td>
                                @if(isset($cate->parent->name))
                                    <td>{{ $cate->parent->name }}</td>
                                @else
                                    <td>Root</td>
                                @endif
                                <td>{{ $cate->name }}</td>
                                <td>
                                    <img src="{{ asset("Back/images/category/".$cate->category_img) }}" height="80" width="80" alt="">
                                </td>
                                <td>
                                    @if($cate->status == '1')
                                        <li class="text-info" style="list-style: none">Active</li>
                                    @else
                                        <li class="text-danger" style="list-style: none">Inactive</li>
                                    @endif
                                </td>
                                <td>

                                    <a class="btn" onclick="event.preventDefault();
                                        if(confirm('Are you really want to delete?')){
                                        document.getElementById('cate-delete-{{ $cate->id }}').submit()
                                        }">
                                        <i class="fas fa-trash text-danger"></i>
                                        <form method="post" action="{{ route('category.destroy',$cate->id) }}" id="{{ 'cate-delete-'.$cate->id }}">
                                            @csrf

                                        </form>
                                    </a>

                                    @if($cate->status == 1)
                                        <a class="btn text-success" href="{{ route('category.inactive',$cate->id) }}">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a class="btn text-primary" href="{{ route('category.active',$cate->id) }}">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('category.edit', $cate->id) }}" class="btn text-black">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Section</th>
                            <th>Parent Category</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

