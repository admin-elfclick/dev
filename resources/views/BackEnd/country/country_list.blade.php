@extends('BackEnd.master')

@section('title')
    Country | List
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
                        <a class="float-right mt-4 mr-4" href="{{ route('country.create') }}">
                            Country Add
                        </a>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">

                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th class="no-content">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($countries as $country)
                                <tr>

                                    <td>{{ $i++ }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>
                                        @if($country->status == '1')
                                            <ul class="form-inline">
                                                <li class="text-success"></li>
                                                Visible
                                            </ul>
                                        @else
                                            <ul class="form-inline">
                                                <li class="text-danger"></li>
                                                Hide
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" onclick="event.preventDefault();
                                            if(confirm('Are you really want to delete?')){
                                            document.getElementById('country-delete-{{ $country->id }}').submit()
                                            }">
                                            <span class="fas fa-trash text-danger" title="Destroy"></span>
                                            <form method="post" action="{{ route('country.destroy',$country->id) }}" id="{{ 'country-delete-'.$country->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>

                                        @if($country->status == 1)
                                            <a class="text-success" href="{{ route('country_inactive',$country->id) }}">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a class="text-danger" href="{{ route('country_active',$country->id) }}">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        @endif
                                        <a class="btn" data-toggle="modal" data-target="#countryEdit{{ $country->id }}">
                                            <i class="fas fa-pencil-alt" title="Edit"></i>
                                        </a>
                                    </td>
                                    {{-- modal --}}

                                    <div class="modal fade" id="countryEdit{{ $country->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Country Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('country.update',$country) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="hidden" name="id" value="{{ $country->id }}">
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $country->name }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-sm btn-primary float-right">Update</button>
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
                            <th>Name</th>
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

