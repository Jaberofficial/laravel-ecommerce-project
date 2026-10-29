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
                        <h3 class="mb-0">Product List</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                                <h3 class="card-title">Product List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>SubCategory </th>
                                            <th>Buying Price</th>
                                            <th>Regular Price</th>
                                            <th>Discount Price</th>
                                            <th>Quantity</th>
                                            <th style="width: 140px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="align-middle">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><img src="{{$product->image}}" height="100" width="100"
                                                        alt="category image"></td>
                                                <td>
                                                    {{$product->name}}
                                                </td>
                                                <td>
                                                    {{$product->product_type}}
                                                </td>
                                                <td>
                                                    {{$product->categoty->name}}
                                                </td>
                                                <td>
                                                    {{$product->subcategory->name}}
                                                </td>
                                                <td>
                                                    {{$product->buying_price}}
                                                </td>
                                                <td>
                                                    {{$product->regular_price}}
                                                </td>
                                                <td>
                                                    {{$product->discount_price}}
                                                </td>
                                                <td>
                                                    {{$product->qty}}
                                                </td>

                                                <td>

                                                    <!-- Active / Inactive Button -->
                                                    @if($product->status == 'active')
                                                        <a href="{{ url('/manage/product-status/'.$product->id) }}" class="btn btn-success btn-sm me-1" title="Active">
                                                            <i class="bi bi-toggle-on"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ url('/manage/product-status/'.$product->id) }}" class="btn btn-secondary btn-sm me-1" title="Inactive">
                                                            <i class="bi bi-toggle-off"></i>
                                                        </a>
                                                    @endif
                                                    {{-- Edit /Delete Button --}}

                                                    <a href="#" class="btn btn-primary btn-sm me-1" title="Edit"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm me-1"
                                                        onclick="return confirm('Are you sure you want to delete this?')"
                                                        title="Delete"><i class="bi bi-trash"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{  $products->links('pagination::bootstrap-5') }}
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