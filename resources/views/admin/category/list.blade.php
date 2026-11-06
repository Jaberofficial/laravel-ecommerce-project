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
                                <h3 class="card-title"><b>Category List</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL NO.</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th style="width: 140px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category )
                                                                                    <tr class="align-middle">
                                            <td>{{$loop->index+1}}</td>
                                            <td><img src="{{$category->image}}" height="100" width="100" alt="category image"></td>
                                            <td>
                                               {{ $category->name }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/manage/category-edit/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('/manage/category-delete/'.$category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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