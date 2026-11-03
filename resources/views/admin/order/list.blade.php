@extends('admin.master')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Order List</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order List</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
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
                                <h3 class="card-title">Category List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Order Date</th>
                                            <th>Invoice</th>
                                            <th>Customer Info</th>
                                            <th style="width: 125px">Product(s)</th>
                                            <th>Delivery Charge</th>
                                            <th>Total Price</th>
                                            <th>Courier</th>
                                            <th>Status</th>
                                            <th style="width: 140px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($orders as $order)
                                            <tr class="align-middle">
                                                <td>1</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->invoice_number }}</td>
                                                <td>
                                                    <p style="color:blue">IP: {{$order->ip_address }}</p>
                                                    <p><b>Name: {{$order->name }} </b></p>
                                                    <p><b>Phone: {{$order->phone }}</b></p>
                                                    <p><b>Address: {{$order->address }}</b></p>
                                                </td>
                                                <td>
                                                    @foreach ($order->orderDetails as $details)
                                                        <img src="{{ $details->product->image }}" height="100" width="100">
                                                        {{ $details->product->name }} X 1 <br>
                                                    @endforeach

                                                </td>
                                                <td>{{ $order->charge}}</td>
                                                <td>{{ $order->price}}</td>
                                                <td>{{ $order->courier_name ?? 'N/A'}}</td>
                                                <td style="padding-left: 0px;">
                                                    @php
                                                        $badgeColor = [
                                                            'pending' => 'text-warning',
                                                            'confirmed' => 'text-info',
                                                            'processing' => 'text-primary',
                                                            'shipped' => 'text-info',
                                                            'delivered' => 'text-success',
                                                            'cancelled' => 'text-danger',
                                                            'returned' => 'text-secondary',
                                                        ][$order->status] ?? 'text-secondary';
                                                    @endphp

                                                    <span class="badge {{ $badgeColor }}">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table> <br>
                                {{  $orders->links('pagination::bootstrap-5') }}
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