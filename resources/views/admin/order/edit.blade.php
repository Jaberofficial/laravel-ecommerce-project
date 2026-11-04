
@extends('admin.master')

@section('content')
    <main class="app-main">

        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Order Details</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline mb-4">

                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-edit me-2"></i> Edit Order Information
                                </h5>
                            </div>

                            <form action="{{ url('/manage/orders-update/' . $order->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row g-4">

                                        <!-- Customer Information -->
                                        <div class="col-md-6">

                                            <div class="card h-100 border">
                                                <div class="card-header bg-light">
                                                    <h5 class="card-title mb-0">
                                                        <i class="fas fa-user me-2 text-primary"></i>
                                                        Customer Info
                                                    </h5>
                                                </div>

                                                <div class="card-body">

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Invoice Number*
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $order->invoice_number }}" name="invoice_number"
                                                            id="invoice_number" readonly />
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label fw-semibold">
                                                                Customer Name*
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $order->name }}" name="name"
                                                                id="name" required />
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label class="form-label fw-semibold">
                                                                Customer Phone*
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $order->phone }}" name="phone"
                                                                id="phone" required />
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Delivery Charge*
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><b>Tk</b></span>
                                                            <input type="number" class="form-control"
                                                                value="{{ $order->charge }}" name="charge"
                                                                id="charge" required />
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Address*
                                                        </label>
                                                        <textarea class="form-control" name="address"
                                                            id="address" rows="3" required>{{ $order->address }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Courier*
                                                        </label>
                                                        <select name="courier_name"
                                                            class="form-select" id="courier_name">
                                                            <option value="">Select Courier</option>
                                                            <option value="steadfast" @if ($order->courier_name == 'steadfast')
                                                                selected
                                                            @endif>Steadfast</option>
                                                            <option value="pathao" @if ($order->courier_name == 'pathao')
                                                                selected
                                                            @endif>Pathao</option>
                                                            <option value="others"@if ($order->courier_name == 'others')
                                                                selected
                                                            @endif>Others</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <!-- Product Information -->
                                        <div class="col-md-6">

                                            <div class="card h-100 border">
                                                <div class="card-header bg-light">
                                                    <h5 class="card-title mb-0">
                                                        <i class="fas fa-box me-2 text-primary"></i>
                                                        Product Info
                                                    </h5>
                                                </div>

                                                <div class="card-body">

                                                    @foreach ($order->orderDetails as $detail)

                                                        <div class="border rounded p-3 mb-4" id="subform" data-id="{{ $detail->id }}">
                                                            <div class="row g-3">

                                                                <div class="col-md-4 text-center">
                                                                    <img src="{{ $detail->product->image }}"
                                                                        height="100" width="100"
                                                                        class="img-thumbnail mb-2">
                                                                    <h6 class="mb-0">{{ $detail->product->name }}</h6>
                                                                </div>

                                                                <div class="col-md-8">

                                                                    <div class="mb-2">
                                                                        <label class="form-label fw-semibold">
                                                                            Unit Price:
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><b>Tk</b></span>
                                                                            <input type="number"
                                                                                class="form-control"
                                                                                name="" value="{{ $detail->price }}" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2">
                                                                        <label class="form-label fw-semibold">
                                                                            Quantity:
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control"
                                                                            name="qty" value="{{ $detail->qty }}" required>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-6 mb-2">
                                                                            <label class="form-label fw-semibold">
                                                                                Color:
                                                                            </label>
                                                                            <input type="text" class="form-control" name="color" value="{{ $detail->color }}">
                                                                        </div>

                                                                        <div class="col-6 mb-2">
                                                                            <label class="form-label fw-semibold">
                                                                                Size:
                                                                            </label>
                                                                            <input type="text"
                                                                                class="form-control"
                                                                                name="size" value="{{ $detail->size }}">
                                                                        </div>
                                                                    </div>

                                                                    <input type="button" onclick="submitForm({{$detail->id}})"
                                                                        class="btn btn-success btn-sm w-100 mt-2"
                                                                        value="Update">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">
                                                            Total Price:
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><b>Tk</b></span>
                                                            <input type="number"
                                                                class="form-control fw-semibold"
                                                                name="price" value="{{ $order->price }}" required>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-1"></i> Update Order
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection

@push('script')
    <script>
        function submitForm(id)
        {
            let subform = document.querySelector('#subform[data-id="'+id+'"]');

            let formData = new FormData();

            formData.append('_token', '{{csrf_token()}}');
            formData.append('qty', subform.querySelector('[name="qty"]').value);
            formData.append('color', subform.querySelector('[name="color"]').value);
            formData.append('size', subform.querySelector('[name="size"]').value);

            fetch('/manage/orders-details/update/'+id,
                {
                    method: 'POST',
                    body: formData
                }
            ).then(res => res.json()).then(data => {
                alert("Updated Successfully");
            })

        }
    </script>
@endpush
