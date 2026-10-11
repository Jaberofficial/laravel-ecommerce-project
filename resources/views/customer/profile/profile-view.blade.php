@extends('customer.master')
@section('content')
    <style>
        .profile-wrap {
            --pf-card: #ffffff;
            --pf-text: #212529;
            --pf-muted: #6c757d;
            --pf-field: #f8f9fa;
            --pf-border: #e9ecef;
            --pf-upload: #f3fbf7;
            --pf-upload-hover: #e9f8f0;
            --pf-upload-border: #b6e2cc;
            --pf-accent: #198754;
            max-width: 720px; margin: 30px auto 70px;
        }

        /* Dark mode values */
        [data-bs-theme="dark"] .profile-wrap,
        [data-coreui-theme="dark"] .profile-wrap,
        .dark-mode .profile-wrap,
        body.dark .profile-wrap {
            --pf-card: #212631;
            --pf-text: #e9ecef;
            --pf-muted: #a8b0ba;
            --pf-field: #2b303b;
            --pf-border: #3b4250;
            --pf-upload: #1f2b26;
            --pf-upload-hover: #25352e;
            --pf-upload-border: #2f5d46;
            --pf-accent: #3ddc97;
        }

        .profile-card {
            border: 0; border-radius: 24px; overflow: hidden;
            background: var(--pf-card); color: var(--pf-text);
            box-shadow: 0 15px 40px rgba(25, 135, 84, .18);
        }
        .pf-muted { color: var(--pf-muted); }

        .profile-cover {
            height: 110px;
            background: linear-gradient(135deg, #198754 0%, #20c997 50%, #0dcaf0 100%);
            position: relative;
        }
        .profile-cover::after {
            content: ""; position: absolute; inset: 0;
            background: radial-gradient(circle at 20% 30%, rgba(255,255,255,.25), transparent 40%),
                        radial-gradient(circle at 85% 70%, rgba(255,255,255,.18), transparent 35%);
        }

        .avatar-box { margin-top: -55px; text-align: center; position: relative; z-index: 2; }
        .avatar-box img {
            width: 110px; height: 110px; object-fit: cover; border-radius: 50%;
            border: 5px solid var(--pf-card); box-shadow: 0 8px 20px rgba(0,0,0,.25);
            background: var(--pf-card);
        }
        .avatar-box h4 { color: var(--pf-text); }

        .field-box { position: relative; margin-bottom: 16px; }
        .field-box .field-icon {
            position: absolute; left: 16px; top: 50%; transform: translateY(-50%);
            color: var(--pf-accent); font-size: 1.1rem; z-index: 3;
        }
        .field-box .form-control {
            border-radius: 14px; border: 2px solid var(--pf-border);
            background: var(--pf-field); color: var(--pf-text);
            padding: 22px 16px 8px 46px; height: 60px; transition: all .2s ease;
        }
        .field-box .form-control::placeholder { color: var(--pf-muted); opacity: .6; }
        .field-box .form-control:focus {
            border-color: var(--pf-accent); background: var(--pf-field); color: var(--pf-text);
            box-shadow: 0 0 0 4px rgba(25,135,84,.2);
        }
        .field-box label {
            position: absolute; left: 46px; top: 8px; font-size: .72rem; font-weight: 600;
            letter-spacing: .5px; text-transform: uppercase; color: var(--pf-muted);
            z-index: 3; margin: 0;
        }

        .upload-box {
            border: 2px dashed var(--pf-upload-border); border-radius: 14px;
            background: var(--pf-upload); padding: 16px; text-align: center;
            transition: all .2s ease;
        }
        .upload-box:hover { border-color: var(--pf-accent); background: var(--pf-upload-hover); }
        .upload-box i { font-size: 1.8rem; color: var(--pf-accent); }
        .upload-box .form-control {
            background: var(--pf-field); color: var(--pf-text); border-color: var(--pf-border);
        }

        .btn-update {
            border: 0; border-radius: 14px; padding: 14px; font-weight: 700; letter-spacing: .5px;
            background: linear-gradient(135deg, #198754, #20c997); color: #fff;
            box-shadow: 0 8px 18px rgba(25,135,84,.3); transition: all .2s ease;
        }
        .btn-update:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(25,135,84,.38); color: #fff; }
    </style>

    <form action="{{ url('/customer/profile-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="profile-wrap">
                    <div class="card profile-card">

                        {{-- Cover --}}
                        <div class="profile-cover"></div>

                        {{-- Avatar --}}
                        <div class="avatar-box">
                            @if ($authUser->image != null)
                                <img src="{{$authUser->image}}" alt="Profile Picture">
                            @else
                                <img src="{{asset('customer/user/user-avatar.webp')}}" alt="Profile Picture">
                            @endif
                            <h4 class="fw-bold mt-3 mb-0">My Profile</h4>
                            <p class="pf-muted small mb-0">Keep your personal information up to date</p>
                        </div>

                        <div class="card-body p-4 pt-4">

                            {{-- Name --}}
                            <div class="field-box">
                                <i class="bi bi-person-fill field-icon"></i>
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       value="{{$authUser->name}}"
                                       placeholder="Your Name*" required>
                            </div>

                            {{-- Phone --}}
                            <div class="field-box">
                                <i class="bi bi-telephone-fill field-icon"></i>
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{$authUser->phone}}"
                                       placeholder="Your Phone Number">
                            </div>

                            {{-- Image --}}
                            <div class="upload-box mb-4">
                                <i class="bi bi-cloud-arrow-up-fill"></i>
                                <div class="fw-semibold mt-1">Change Profile Picture</div>
                                <div class="pf-muted small mb-2">JPG, PNG or WEBP</div>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <input type="submit" name="submit" id="submit"
                                       class="btn btn-update btn-lg" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection