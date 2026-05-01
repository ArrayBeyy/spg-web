<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password — SPG Best Denki</title>
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
            min-height: 520px;
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
            font-size: 2.2rem;
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

        .tip-box {
            margin-top: 1.6rem;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 10px;
            padding: 1rem 1.1rem;
        }

        .tip-box p {
            font-size: 12px;
            color: rgba(255,255,255,0.85);
            line-height: 1.6;
            font-weight: 300;
        }

        .tip-box strong {
            color: white;
            font-weight: 500;
            display: block;
            margin-bottom: 4px;
            font-size: 12px;
            letter-spacing: 0.04em;
        }

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

        /* Icon envelope */
        .icon-wrap {
            width: 56px; height: 56px;
            background: var(--red-light);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.4rem;
        }

        .icon-wrap svg { width: 26px; height: 26px; }

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
            line-height: 1.6;
        }

        .field { margin-bottom: 1.2rem; }

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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover { background: var(--red-dark); }
        .btn-submit:active { transform: scale(0.99); }

        .btn-submit svg { width: 16px; height: 16px; }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 1.3rem;
            font-size: 13px;
            color: var(--muted);
            font-weight: 300;
            text-decoration: none;
            transition: color .2s;
        }

        .back-link:hover { color: var(--red); }

        .back-link svg { width: 14px; height: 14px; }

        /* Success alert */
        .alert-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 1.2rem;
            font-size: 13px;
            color: #15803D;
            line-height: 1.5;
        }

        /* Error alert */
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
            <h1>Reset<br><em>Password</em><br>Kamu</h1>
            <p>Jangan khawatir, kami akan kirimkan link reset ke email kamu.</p>

            <div class="tip-box">
                <strong>Butuh bantuan?</strong>
                <p>Hubungi admin Best Denki melalui WhatsApp atau email HRD jika kamu tidak menerima email reset.</p>
            </div>
        </div>
    </div>

    {{-- ── Right form panel ── --}}
    <div class="panel-right">
        <div class="badge">SPG MEMBER</div>

        <div class="icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="#C8102E" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="4" width="20" height="16" rx="3"/>
                <path d="M2 7l10 7 10-7"/>
            </svg>
        </div>

        <div class="form-title">Lupa password?</div>
        <div class="form-sub">Masukkan email akun SPG kamu. Kami akan kirimkan link untuk membuat password baru.</div>

        {{-- Success status --}}
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

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

        <form method="POST" action="{{ route('password.email') }}">
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

            <button type="submit" class="btn-submit">
                <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 2L11 13"/>
                    <path d="M22 2L15 22 11 13 2 9l20-7z"/>
                </svg>
                Kirim Link Reset Password
            </button>
        </form>

        <a href="{{ route('login') }}" class="back-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 5l-7 7 7 7"/>
            </svg>
            Kembali ke halaman masuk
        </a>
    </div>

</div>

</body>
</html>