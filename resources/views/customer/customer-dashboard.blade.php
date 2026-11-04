@extends('customer.master')

@section('content')
    <div class="body flex-grow-1">
        <div class="container-lg px-4">

            <div class="row g-4 mb-4">

                {{-- All Orders --}}
                <div class="col-sm-6 col-xl-4">
                    <div class="card" style="background-color: #0d6efd; color: #ffffff;">
                        <div class="card-body pb-0">
                            <div class="fs-4 fw-semibold">{{ $allOrders}}</div>
                            <div>All Orders</div>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <a href="{{ url('/customer/orders/all') }}" class="text-white text-decoration-none small">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Pending Orders --}}
                <div class="col-sm-6 col-xl-4">
                    <div class="card" style="background-color: #ffc107; color: #000000;">
                        <div class="card-body pb-0">
                            <div class="fs-4 fw-semibold">{{ $pendingOrders}}</div>
                            <div>Pending Orders</div>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <a href="{{ url('/customer/orders/pending') }}" class="text-dark text-decoration-none small">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Confirmed Orders --}}
                <div class="col-sm-6 col-xl-4">
                    <div class="card" style="background-color: #0dcaf0; color: #000000;">
                        <div class="card-body pb-0">
                            <div class="fs-4 fw-semibold">{{ $confirmedOrders}}</div>
                            <div>Confirmed Orders</div>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <a href="{{ url('/customer/orders/confirmed') }}" class="text-dark text-decoration-none small">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Delivered Orders --}}
                <div class="col-sm-6 col-xl-4">
                    <div class="card" style="background-color: #198754; color: #ffffff;">
                        <div class="card-body pb-0">
                            <div class="fs-4 fw-semibold">{{ $deliveredOrders}}</div>
                            <div>Delivered Orders</div>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <a href="{{ url('/customer/orders/delivered') }}" class="text-white text-decoration-none small">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Cancelled Orders --}}
                <div class="col-sm-6 col-xl-4">
                    <div class="card" style="background-color: #dc3545; color: #ffffff;">
                        <div class="card-body pb-0">
                            <div class="fs-4 fw-semibold">{{ $cancelledOrders}}</div>
                            <div>Cancelled Orders</div>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <a href="{{ url('/customer/orders/cancelled') }}" class="text-white text-decoration-none small">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Returned Orders --}}
                <div class="col-sm-6 col-xl-4">
                    <div class="card" style="background-color: #6c757d; color: #ffffff;">
                        <div class="card-body pb-0">
                            <div class="fs-4 fw-semibold">{{ $returnedOrders}}</div>
                            <div>Returned Orders</div>
                        </div>
                        <div class="card-body pt-3 pb-3">
                            <a href="{{ url('/customer/orders/returned') }}" class="text-white text-decoration-none small">
                                View Orders
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
