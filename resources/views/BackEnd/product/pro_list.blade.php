@extends('BackEnd.master')

@section('title')
    Product | List
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
                        <a class="float-right mt-4 mr-4" href="{{ route('product.create') }}">
                           <i class="fas fa-plus-circle"></i> Product-Generate
                        </a>
                    </div>

                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                           {{-- <th>Slug</th>--}}
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($products as $pro)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $pro->product_name }}</td>

                                {{--<td>{{ $pro->slug }}</td>--}}
                                <td>{{ $pro->product_price }}</td>
                                <td>
                                    <img src="{{ asset("Back/images/Product/".$pro->product_img) }}" height="100" width="100" alt="pro-img">
                                </td>
                                <td>
                                    @isset($pro->category->name)
                                        {{ $pro->category->name }}
                                    @endisset
                                </td>
                                <td>
                                    @isset($pro->content->title)
                                        {{ $pro->content->title }}
                                    @endisset
                                </td>
                                <td>
                                    @isset( $pro->country->name)
                                        {{ $pro->country->name }}
                                    @endisset
                                </td>
                                <td>
                                    @if($pro->status == 1)
                                        <a class="btn text-success" href="{{ route('product_inactive',$pro->id) }}" title="Active">
                                            <i class="fas fa-arrow-up"></i>
                                        </a>
                                    @else
                                        <a class="btn text-primary" href="{{ route('product_active',$pro->id) }}" title="Inactive">
                                            <i class="fas fa-arrow-down"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn" onclick="event.preventDefault();
                                        if(confirm('Are you really want to delete?')){
                                        document.getElementById('pro-delete-{{ $pro->id }}').submit()
                                        }">
                                        <i class="fas fa-trash text-danger"></i>
                                        <form method="post" action="{{ route('product.destroy',$pro) }}" id="{{ 'pro-delete-'.$pro->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </a>
                                    <a href="{{ route('product.edit', $pro->id) }}" class="btn text-black">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            {{--<th>Slug</th>--}}
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Country</th>
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

