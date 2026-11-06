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
                    {{-- <div class="col-md-12">
                        <form action="{{url('/manage/orders/'.$status)}}" method="GET">
                            @csrf
                            <div class="row mb-3">
                            <div  class="col-md-9">
                                <input type="text" name="search" class="form-control" placeholder="Search By Phone or Invoice Number" required>
                            </div>
                            <div  class="col-md-3">
                                 <button type="submit" class="btn btn-primary"> Search</button>
                                 <a href="{{url('/manage/orders/'.$status)}}" class="btn btn-danger"> Clear</a>
                            </div>

                            </div>
                        </form>

                    </div> --}}
                    <div class="col-md-12">
                        <form action="{{ url('/manage/orders-print-bulk') }}" method="POST">
                            @csrf
                            <div class="card mb-4">
                                <div class="card-header">
                                    <div class="row align-items-center w-100">

                                        {{-- Left: Order List --}}
                                        <div class="col">
                                            <h3 class="card-title mb-0"><b>Order List</b></h3>
                                        </div>

                                        {{-- Middle: Search Bar --}}
                                        <div class="col-md-4">
                                            <div class="input-group input-group-sm">
                                                <input type="text" id="orderSearch" class="form-control"
                                                    placeholder="Search By Phone or Invoice Number"
                                                    value="{{ request('search') }}" style="box-shadow: none; outline: none;"
                                                    onfocus="this.style.boxShadow='none';">

                                                <button type="button" class="btn btn-primary" onclick="searchOrder()">
                                                    <i class="fas fa-search"></i>
                                                </button>

                                                <a href="{{ url('/manage/orders/' . $status) }}"
                                                    class="btn btn-danger {{ request('search') ? '' : 'd-none' }}"
                                                    title="Clear Search">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        {{-- Right: Invoice Print --}}
                                        <div class="col-auto" style="margin-right: 15px;">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-print"></i> Invoice Print
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" id="selectAll">
                                                </th>
                                                <th style="width: 10px">Sl No.</th>
                                                <th>Order Date</th>
                                                <th>Invoice</th>
                                                <th>Customer Info</th>
                                                <th style="width: 125px">Product(s)</th>
                                                <th>Delivery Charge</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Courier</th>
                                                <th style="width: 140px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($orders as $order)
                                                <tr class="align-middle">
                                                    <td>
                                                        @if ($order->is_printed == 0)
                                                            <input type="checkbox" name="order_id[]"
                                                                value="{{ $order->id }}" class="orderCheck">
                                                        @else
                                                            <span
                                                                title="Invoice Already Printed"style="background: #f0eaff; color: #6f42c1; padding: 5px 7px; border-radius: 5px;"><i
                                                                    class="fas fa-print"></i></span>
                                                        @endif

                                                    </td>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>{{ $order->invoice_number }}</td>
                                                    <td>
                                                        <p style="color:blue">IP: {{ $order->ip_address }}</p>
                                                        <p><b>Name: {{ $order->name }} </b></p>
                                                        <p><b>Phone: {{ $order->phone }}</b></p>
                                                        <p><b>Address: {{ $order->address }}</b></p>
                                                    </td>
                                                    <td>
                                                        @foreach ($order->orderDetails as $details)
                                                            <img src="{{ $details->product->image }}" height="100"
                                                                width="100">
                                                            {{ $details->product->name }} X 1 <br>
                                                        @endforeach

                                                    </td>
                                                    <td>{{ $order->charge }}</td>
                                                    <td>{{ $order->price }}</td>
                                                    <td style="padding-left: 0px;">
                                                        @php
                                                            $badgeColor =
                                                                [
                                                                    'pending' => 'text-warning',
                                                                    'confirmed' => 'text-info',
                                                                    'processing' => 'text-primary',
                                                                    'shipped' => 'text-info',
                                                                    'delivered' => 'text-success',
                                                                    'cancelled' => 'text-danger',
                                                                    'returned' => 'text-secondary',
                                                                ][$order->status] ?? 'text-secondary';
                                                        @endphp

                                                        <form
                                                            action="{{ url('/manage/orders-status-update/' . $order->id) }}"
                                                            method="POST" style="margin: 0;">
                                                            @csrf

                                                            <select name="status"
                                                                class="badge {{ $badgeColor }} status-select"
                                                                onchange="this.form.submit()">

                                                                <option value="pending"
                                                                    {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                                    Pending</option>
                                                                <option value="confirmed"
                                                                    {{ $order->status == 'confirmed' ? 'selected' : '' }}>
                                                                    Confirmed</option>
                                                                <option value="processing"
                                                                    {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                                    Processing</option>
                                                                <option value="shipped"
                                                                    {{ $order->status == 'shipped' ? 'selected' : '' }}>
                                                                    Shipped</option>
                                                                <option value="delivered"
                                                                    {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                                                    Delivered</option>
                                                                <option value="cancelled"
                                                                    {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                                    Cancelled</option>
                                                                <option value="returned"
                                                                    {{ $order->status == 'returned' ? 'selected' : '' }}>
                                                                    Returned</option>

                                                            </select>
                                                        </form>
                                                    </td>
                                                    <td class="align-middle position-relative courier-column">

                                                        <span class="courier-name">
                                                            {{ $order->courier_name ?? 'N/A' }}
                                                        </span>

                                                        @if ($order->courier_name != null && $order->tracking_code == null)
                                                            <a href="{{ url('/manage/orders-courier-entry/' . $order->id) }}"
                                                                class="btn btn-outline-success courier-btn">
                                                                <i class="fa-solid fa-paper-plane"></i> Send
                                                            </a>
                                                        @elseif ($order->tracking_code != null)
                                                            <a href="{{ $order->tracking_code }}" target="_blank"
                                                                class="btn btn-outline-primary courier-btn">
                                                                <i class="fa-solid fa-location-dot"></i> Track
                                                            </a>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/manage/orders-details/' . $order->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{ url('/manage/orders-delete/' . $order->id) }}"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table> <br>
                                    {{ $orders->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            <!-- /.card -->
                        </form>

                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

@push('script')
    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkBoxes = document.querySelectorAll('.orderCheck');
            checkBoxes.forEach(checkBox => checkBox.checked = this.checked);

        });
    </script>

    <script>
        function searchOrder() {
            let search = document.getElementById('orderSearch').value.trim();

            if (search !== '') {
                window.location.href = "{{ url('/manage/orders/' . $status) }}?search=" + encodeURIComponent(search);
            }
        }

        document.getElementById('orderSearch').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchOrder();
            }
        });
    </script>
@endpush
