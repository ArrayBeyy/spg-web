<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — SPG Best Denki</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red: #C8102E;
            --red-dark: #8B0A1F;
            --red-light: #F5E6E9;
            --white: #FFFFFF;
            --off: #FDF8F8;
            --text: #1A0508;
            --muted: #7A3042;
            --border: #EADDE0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--off);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .card {
            display: flex;
            width: 100%;
            max-width: 900px;
            min-height: 560px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(200,16,46,0.12), 0 4px 16px rgba(0,0,0,0.06);
        }

        /* ── Left panel ── */
        .panel-left {
            width: 42%;
            background: var(--red);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2.5rem;
            overflow: hidden;
        }

        .panel-left::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 320px; height: 320px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }

        .panel-left::after {
            content: '';
            position: absolute;
            bottom: -60px; left: -60px;
            width: 240px; height: 240px;
            border-radius: 50%;
            background: rgba(0,0,0,0.12);
        }

        .logo-area {
            position: absolute;
            top: 2rem; left: 2.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            width: 40px; height: 40px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon span {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 900;
            color: var(--red);
        }

        .logo-text {
            color: white;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.05em;
            line-height: 1.2;
        }

        .logo-text small {
            display: block;
            opacity: 0.7;
            font-size: 10px;
            font-weight: 300;
            letter-spacing: 0.12em;
        }

        .deco-dots {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            opacity: 0.08;
        }

        .dot { width: 6px; height: 6px; background: white; border-radius: 50%; }

        .panel-hero { position: relative; z-index: 2; }

        .panel-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            color: white;
            font-weight: 900;
            line-height: 1.15;
            margin-bottom: 0.8rem;
        }

        .panel-hero h1 em { font-style: italic; color: rgba(255,255,255,0.72); }

        .panel-hero p {
            font-size: 13px;
            color: rgba(255,255,255,0.72);
            line-height: 1.65;
            font-weight: 300;
        }

        .stripe { display: flex; gap: 6px; margin-top: 1.6rem; }
        .stripe span { height: 3px; border-radius: 99px; background: white; }
        .stripe span:nth-child(1) { width: 40px; opacity: 1; }
        .stripe span:nth-child(2) { width: 20px; opacity: 0.4; }
        .stripe span:nth-child(3) { width: 10px; opacity: 0.2; }

        /* ── Right panel ── */
        .panel-right {
            flex: 1;
            background: white;
            padding: 2.8rem 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .badge {
            position: absolute;
            top: 1.5rem; right: 2rem;
            background: var(--red-light);
            border: 1px solid #F0C0CB;
            border-radius: 99px;
            padding: 4px 14px;
            font-size: 10px;
            font-weight: 500;
            color: var(--red);
            letter-spacing: 0.08em;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 0.3rem;
        }

        .form-sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 1.8rem;
            font-weight: 300;
        }

        .field { margin-bottom: 1.1rem; }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            color: var(--muted);
            margin-bottom: 5px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .field input {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            outline: none;
            background: var(--off);
            transition: border-color .2s, box-shadow .2s;
        }

        .field input:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(200,16,46,0.08);
            background: white;
        }

        .field input::placeholder { color: #C9A8B2; font-weight: 300; }

        .forgot {
            text-align: right;
            margin-top: -0.5rem;
            margin-bottom: 1rem;
        }

        .forgot a {
            font-size: 12px;
            color: var(--red);
            text-decoration: none;
            font-weight: 500;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: var(--red);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            letter-spacing: 0.03em;
            transition: background .2s, transform .1s;
        }

        .btn-submit:hover { background: var(--red-dark); }
        .btn-submit:active { transform: scale(0.99); }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 1.1rem 0;
            font-size: 12px;
            color: #C9A8B2;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .btn-google {
            width: 100%;
            padding: 10px;
            background: white;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: border-color .2s, background .2s;
        }

        .btn-google:hover { border-color: var(--red); background: var(--off); }

        .btn-google img { width: 18px; height: 18px; }

        .form-note {
            font-size: 13px;
            color: var(--muted);
            text-align: center;
            margin-top: 1.3rem;
            font-weight: 300;
        }

        .form-note a {
            color: var(--red);
            font-weight: 500;
            text-decoration: none;
        }

        /* Alert errors (Laravel) */
        .alert-error {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1rem;
            font-size: 13px;
            color: #B91C1C;
        }

        .alert-error ul { padding-left: 1rem; margin: 0; }

        /* Responsive */
        @media (max-width: 640px) {
            .panel-left { display: none; }
            .panel-right { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body>

<div class="card">

    {{-- ── Left decorative panel ── --}}
    <div class="panel-left">
        <div class="logo-area">
            <div class="logo-icon"><span>B</span></div>
            <div class="logo-text">
                Best Denki
                <small>SPG PORTAL</small>
            </div>
        </div>

        <div class="deco-dots">
            @for ($i = 0; $i < 25; $i++)
                <div class="dot"></div>
            @endfor
        </div>

        <div class="panel-hero">
            <h1>Portal <em>Sales</em><br>SPG Best<br>Denki</h1>
            <p>Kelola performa penjualan, jadwal, dan laporan harian kamu dalam satu platform.</p>
            <div class="stripe">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>

    {{-- ── Right form panel ── --}}
    <div class="panel-right">
        <div class="badge">SPG MEMBER</div>

        <div class="form-title">Selamat datang</div>
        <div class="form-sub">Masuk dengan akun SPG kamu</div>

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@bestdenki.co.id"
                    required
                    autocomplete="email"
                    autofocus
                >
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >
            </div>

            <div class="forgot">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>

            <button type="submit" class="btn-submit">Masuk Sekarang</button>
        </form>

        <div class="divider">atau</div>

        <div class="form-note">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>

</div>

</body>
</html>