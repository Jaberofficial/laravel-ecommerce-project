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
                                <h3 class="card-title"><b>Message List</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th style="width: 90px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message )
                                           <tr class="align-middle">
                                            <td>{{$loop->index+1}}</td>
                                            <td>
                                               {{ $message->name }}
                                            </td>
                                            <td>
                                               {{ $message->phone }}
                                            </td>
                                            <td>
                                               {{ $message->email }}
                                            </td>
                                            <td>
                                               {{ $message->subject }}
                                            </td>
                                            <td>
                                               {{ $message->message }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/delete/contact-messages/'.$message->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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