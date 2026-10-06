<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login | NittyoHub</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green: #0a8f3c;
            --green-dark: #064e2b;
            --green-soft: #e8f6ee;
            --navy: #0b2a4a;
            --muted: #6b7a8c;
            --border: #d5deea;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: #eaf3fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: var(--navy);
        }

        a { text-decoration: none; }

        .login-wrapper {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 580px;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(11, 42, 74, 0.12);
        }

        /* ---------- Left panel ---------- */
        .login-left {
            flex: 1;
            position: relative;
            overflow: hidden;
            padding: 36px 34px;
            color: #fff;
            background: linear-gradient(160deg, #0b7a37 0%, #064e2b 55%, #03361d 100%);
        }
        .login-left::after {
            content: "";
            position: absolute;
            right: -90px;
            bottom: -110px;
            width: 330px;
            height: 330px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
        }

        /* Logo dark green, tai white card-er upor boshano */
        .brand {
            display: inline-block;
            background: #fff;
            border-radius: 12px;
            padding: 6px 14px;
            line-height: 0;
        }
        .brand img { height: 52px; width: auto; display: block; }

        .welcome { margin-top: 44px; }
        .welcome h2 { font-size: 36px; font-weight: 700; line-height: 1.15; color: #fff; }
        .welcome h2 span { color: #7ee2a0; }
        .welcome p { margin-top: 12px; font-size: 14px; line-height: 1.6; opacity: .9; max-width: 300px; }

        .features { list-style: none; margin-top: 30px; position: relative; z-index: 1; }
        .features li {
            display: flex; align-items: center; gap: 12px;
            font-size: 13px; margin-bottom: 16px;
        }
        .features i {
            width: 22px;
            text-align: center;
            font-size: 18px;
            color: #8be0a8;
        }

        .cart-art {
            position: absolute;
            right: 28px;
            bottom: 26px;
            font-size: 120px;
            color: rgba(255, 255, 255, 0.16);
            z-index: 0;
        }

        /* ---------- Right panel ---------- */
        .login-right {
            flex: 1;
            padding: 36px 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .user-badge {
            width: 58px; height: 58px;
            margin: 0 auto 12px;
            border-radius: 50%;
            background: var(--green-soft);
            color: var(--green);
            display: flex; align-items: center; justify-content: center;
            font-size: 24px;
        }
        .login-right h1 { text-align: center; font-size: 26px; font-weight: 700; color: var(--navy); }
        .subtitle {
            text-align: center;
            font-size: 13px;
            color: var(--muted);
            margin: 8px auto 22px;
            max-width: 280px;
            line-height: 1.5;
        }

        .login-alert {
            background: #fdecea;
            color: #b71c1c;
            border: 1px solid #f5c2c0;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 13px;
        }
        .login-alert p { margin: 0; }

        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; }

        .input-box { position: relative; }
        .input-box .icon-left {
            position: absolute; left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #7d8ea3; font-size: 14px;
        }
        .input-box input {
            width: 100%;
            height: 46px;
            padding: 0 42px 0 40px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font: 13px 'Poppins', Arial, sans-serif;
            color: var(--navy);
            background: #fff;
            transition: border-color .2s, box-shadow .2s;
        }
        .input-box input::placeholder { color: #9aa8b8; }
        .input-box input:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(10, 143, 60, 0.15);
        }
        .toggle-eye {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: 0; cursor: pointer;
            color: #7d8ea3; font-size: 14px;
        }
        .toggle-eye:focus-visible { outline: 2px solid var(--green); border-radius: 4px; }

        .forgot { text-align: right; margin: -6px 0 16px; }
        .forgot a { font-size: 12px; font-weight: 600; color: var(--green); }
        .forgot a:hover { text-decoration: underline; }

        .btn-login {
            width: 100%; height: 46px;
            border: 0; border-radius: 8px;
            background: linear-gradient(90deg, #0a8f3c, #067a32);
            color: #fff;
            font: 600 14px 'Poppins', Arial, sans-serif;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: filter .2s;
        }
        .btn-login:hover { filter: brightness(1.08); }

        .or-divider {
            display: flex; align-items: center; gap: 12px;
            margin: 14px 0;
            font-size: 11px; color: var(--muted);
        }
        .or-divider::before, .or-divider::after {
            content: ""; flex: 1; height: 1px; background: var(--border);
        }

        .btn-register {
            width: 100%; height: 46px;
            border: 1.5px solid var(--green);
            border-radius: 8px;
            color: var(--green);
            font-size: 14px; font-weight: 600;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            transition: background .2s, color .2s;
        }
        .btn-register:hover { background: var(--green); color: #fff; }

        .home-card {
            margin-top: 12px;
            display: flex; align-items: center; justify-content: space-between;
            padding: 10px 14px;
            border-radius: 8px;
            background: var(--green-soft);
            color: var(--green);
            transition: background .2s;
        }
        .home-card:hover { background: #d6efe1; }
        .home-card .left { display: flex; align-items: center; gap: 12px; }
        .home-card .left > i { font-size: 20px; }
        .home-card strong { display: block; font-size: 13px; color: var(--green-dark); }
        .home-card small { display: block; font-size: 11px; color: var(--muted); }

        /* ---------- Mobile ---------- */
        @media (max-width: 800px) {
            .login-wrapper { flex-direction: column; }
            .login-left { padding: 26px 24px; }
            .welcome { margin-top: 24px; }
            .welcome h2 { font-size: 28px; }
            .features, .cart-art { display: none; }
            .login-right { padding: 28px 22px; }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">

        {{-- Left: branding --}}
        <div class="login-left">
            <a href="{{ url('/') }}" class="brand">
                <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="NittyoHub">
            </a>

            <div class="welcome">
                <h2>Welcome <span>Back!</span></h2>
                <p>Sign in to your account and continue shopping your favorite products.</p>
            </div>

            <ul class="features">
                <li><i class="fas fa-shopping-basket"></i> Exclusive Offers</li>
                <li><i class="fas fa-shield-alt"></i> Secure Shopping</li>
                <li><i class="fas fa-truck"></i> Fast Delivery</li>
                <li><i class="fas fa-headset"></i> 24/7 Support</li>
            </ul>

            {{-- Chaile ekhane nijer banner image dite paro:
                 <img src="{{ asset('frontend/assets/images/login-banner.png') }}" alt="" class="cart-img"> --}}
            <i class="fas fa-shopping-cart cart-art"></i>
        </div>

        {{-- Right: form --}}
        <div class="login-right">
            <div class="user-badge"><i class="far fa-user"></i></div>
            <h1>Customer Login</h1>
            <p class="subtitle">Enter your email and password to login to your account.</p>

            @if ($errors->any())
                <div class="login-alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if (session('error'))
                <div class="login-alert">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ url('/customer/login/auth') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-box">
                        <i class="far fa-envelope icon-left"></i>
                        <input type="email" id="email" name="email" placeholder="Enter your email address"
                               value="{{ old('email') }}" autocomplete="email" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-box">
                        <i class="fas fa-lock icon-left"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                               autocomplete="current-password" required>
                        <button type="button" class="toggle-eye" id="togglePassword" aria-label="Show or hide password">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="forgot">
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login">Login <i class="fas fa-arrow-right"></i></button>

                <div class="or-divider">OR</div>

                <a href="{{ url('/customer/registration') }}" class="btn-register">
                    <i class="fas fa-user-plus"></i> Create New Account
                </a>

                <a href="{{ url('/') }}" class="home-card">
                    <span class="left">
                        <i class="fas fa-home"></i>
                        <span>
                            <strong>Home</strong>
                            <small>Continue shopping without logging in</small>
                        </span>
                    </span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </form>
        </div>

    </div>

    <script>
        // Password show / hide
        const pwd = document.getElementById('password');
        const eyeBtn = document.getElementById('togglePassword');
        eyeBtn.addEventListener('click', function () {
            const show = pwd.type === 'password';
            pwd.type = show ? 'text' : 'password';
            this.innerHTML = show ? '<i class="far fa-eye-slash"></i>' : '<i class="far fa-eye"></i>';
        });
    </script>
</body>
</html>