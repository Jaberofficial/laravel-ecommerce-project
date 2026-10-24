@extends('customer.master')
@section('content')
    <style>
        .profile-wrap {
            --pf-card: #ffffff;
            --pf-text: #212529;
            --pf-muted: #6c757d;
            --pf-field: #f8f9fa;
            --pf-border: #e9ecef;
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
        .avatar-box .icon-circle {
            width: 110px; height: 110px; border-radius: 50%; margin: 0 auto;
            display: flex; align-items: center; justify-content: center;
            border: 5px solid var(--pf-card); box-shadow: 0 8px 20px rgba(0,0,0,.25);
            background: linear-gradient(135deg, #198754, #20c997);
            color: #fff; font-size: 2.8rem;
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

        .btn-update {
            border: 0; border-radius: 14px; padding: 14px; font-weight: 700; letter-spacing: .5px;
            background: linear-gradient(135deg, #198754, #20c997); color: #fff;
            box-shadow: 0 8px 18px rgba(25,135,84,.3); transition: all .2s ease;
        }
        .btn-update:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgba(25,135,84,.38); color: #fff; }
    </style>

    <form action="{{ url('/customer/update-credentials') }}" method="POST">
        @csrf
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="profile-wrap">
                    <div class="card profile-card">

                        {{-- Cover --}}
                        <div class="profile-cover"></div>

                        {{-- Header --}}
                        <div class="avatar-box">
                            <div class="icon-circle">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <h4 class="fw-bold mt-3 mb-0">Account Credentials</h4>
                            <p class="pf-muted small mb-0">Update your email and password securely</p>
                        </div>

                        <div class="card-body p-4 pt-4">

                            {{-- Email --}}
                            <div class="field-box">
                                <i class="bi bi-envelope-fill field-icon"></i>
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       value="{{$authUser->email}}"
                                       placeholder="Your Email" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                            {{-- Old Password --}}
                            <div class="field-box">
                                <i class="bi bi-lock-fill field-icon"></i>
                                <label for="old_password">Old Password</label>
                                <input type="password" name="old_password" id="old_password" class="form-control"
                                       value=""
                                       placeholder="Your Old Password">
                            </div>

                            {{-- New Password --}}
                            <div class="field-box mb-4">
                                <i class="bi bi-key-fill field-icon"></i>
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       value=""
                                       placeholder="Your New Password">
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <input type="submit" name="submit" id="submit"
                                       class="btn btn-update btn-lg" value="Update">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection