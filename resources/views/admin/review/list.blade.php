@extends('admin.master')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title"><b>Review List</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width:20px">SL No.</th>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Customer Name</th>
                                            <th>Comments</th>
                                            <th>Rating</th>
                                            <th style="width: 140px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review )
                                        <tr class="align-middle">
                                            <td>{{$loop->index+1}}</td>
                                            <td>
                                               {{ $review->product->name }}
                                            </td>
                                            <td>
                                               @if ( $review->image != null)
                                                   <img src="{{ $review->image }}" height="50" width="50">
                                                @else
                                                  <img src="{{ asset('admin/review/avatar.svg') }}" height="50" width="50" alt="User">
                                               @endif
                                            </td>
                                               <td>
                                               {{ $review->customer_name}}
                                            </td>
                                               <td>
                                               {{ $review->comments}}
                                            </td>
                                               <td>
                                               {{ $review->rating}}
                                            </td>
                                            <td>
                                                <a href="{{ url('/manage/review-edit/'.$review->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('/manage/review-delete/'.$review->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@endsection