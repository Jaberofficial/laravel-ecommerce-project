@extends('admin.master')

@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Edit Policy Data</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Policy Data</li>
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
                <div class="row g-4">
                    <!--begin::Col-->

                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-12">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">Input Policy Data</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form action="{{ url('/manage/website-policy/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="row">
                                        

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="privacy_policy" class="form-label">Privacy Policy</label>
                                            <textarea name="privacy_policy" id="summernote"
                                                class="form-control"> {{ $policyData->privacy_policy }}
                                                {{-- {{ old('privacy_policy')}} --}}
                                            </textarea>
                                            {{-- @error('privacy_policy')
                                                <span class="text-danger">{{$message}}</span>

                                            @enderror --}}
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="summernote_two" class="form-label">Terms & Conditions</label>
                                            <textarea name="terms_conditions" id="summernote_two"
                                                class="form-control">
                                                {{ $policyData->terms_conditions }}
                                                {{-- {{ old('terms_conditions')}} --}}
                                            </textarea>
                                            {{-- @error('terms_conditions')
                                                <span class="text-danger">{{$message}}</span>

                                            @enderror --}}
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="summernote_three" class="form-label">Refund Policy</label>
                                            <textarea name="refund_policy" id="summernote_three"
                                                class="form-control">
                                                  {{ $policyData->refund_policy }}
                                                {{-- {{ old('refund_policy')}} --}}
                                            </textarea>
                                            {{-- @error('refund_policy')
                                                <span class="text-danger">{{$message}}</span>

                                            @enderror --}}
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="summernote_four" class="form-label">Payment Policy</label>
                                            <textarea name="payment_policy" id="summernote_four"
                                                class="form-control">
                                                 {{ $policyData->payment_policy }}
                                                {{-- {{ old('payment_policy')}} --}}
                                            </textarea>
                                            {{-- @error('payment_policy')
                                                <span class="text-danger">{{$message}}</span>

                                            @enderror --}}
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="summernote_five" class="form-label">About Us</label>
                                            <textarea name="about_us" id="summernote_five"
                                                class="form-control">
                                                  {{ $policyData->about_us }}
                                                {{-- {{ old('about_us')}} --}}
                                            </textarea>
                                            {{-- @error('about_us')
                                                <span class="text-danger">{{$message}}</span>

                                            @enderror --}}
                                        </div>

                                    </div>

                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Quick Example-->

                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#summernote_two').summernote();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#summernote_three').summernote();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#summernote_four').summernote();
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#summernote_five').summernote();
        });
    </script>

    
@endpush