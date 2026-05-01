<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — SPG Best Denki</title>
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

        .step-list {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-num {
            width: 22px; height: 22px;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 500;
            color: white;
            flex-shrink: 0;
        }

        .step-label {
            font-size: 12px;
            color: rgba(255,255,255,0.75);
            font-weight: 300;
        }

        /* ── Right panel ── */
        .panel-right {
            flex: 1;
            background: white;
            padding: 2.2rem 2.8rem;
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
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 0.3rem;
        }

        .form-sub {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 1.5rem;
            font-weight: 300;
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .field { margin-bottom: 1rem; }

        .field label {
            display: block;
            font-size: 11px;
            font-weight: 500;
            color: var(--muted);
            margin-bottom: 5px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }

        .field input, .field select {
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
            appearance: none;
        }

        .field input:focus, .field select:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 3px rgba(200,16,46,0.08);
            background: white;
        }

        .field input::placeholder { color: #C9A8B2; font-weight: 300; }

        .checkbox-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 1.1rem;
        }

        .checkbox-row input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: var(--red);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .checkbox-row span {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.55;
            font-weight: 300;
        }

        .checkbox-row a {
            color: var(--red);
            font-weight: 500;
            text-decoration: none;
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

        .form-note {
            font-size: 13px;
            color: var(--muted);
            text-align: center;
            margin-top: 1rem;
            font-weight: 300;
        }

        .form-note a {
            color: var(--red);
            font-weight: 500;
            text-decoration: none;
        }

        /* Alert errors */
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
            .field-row { grid-template-columns: 1fr; }
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
            <h1>Bergabung<br>Bersama <em>Tim</em><br>Terbaik</h1>
            <p>Daftarkan diri kamu dan mulai perjalanan karier sebagai SPG Best Denki.</p>

            <div class="step-list">
                <div class="step-item">
                    <div class="step-num">1</div>
                    <div class="step-label">Isi data diri kamu</div>
                </div>
                <div class="step-item">
                    <div class="step-num">2</div>
                    <div class="step-label">Verifikasi email</div>
                </div>
                <div class="step-item">
                    <div class="step-num">3</div>
                    <div class="step-label">Mulai akses portal</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Right form panel ── --}}
    <div class="panel-right">
        <div class="badge">SPG MEMBER</div>

        <div class="form-title">Buat akun baru</div>
        <div class="form-sub">Daftarkan diri sebagai SPG Best Denki</div>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field-row">
                <div class="field">
                    <label for="first_name">Nama Depan</label>
                    <input
                        id="first_name"
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="Rina"
                        required
                        autofocus
                    >
                </div>
                <div class="field">
                    <label for="last_name">Nama Belakang</label>
                    <input
                        id="last_name"
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="Kusuma"
                        required
                    >
                </div>
            </div>

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
                >
            </div>

            <div class="field">
                <label for="phone">No. HP / WhatsApp</label>
                <input
                    id="phone"
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="08xx-xxxx-xxxx"
                    required
                >
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Min. 8 karakter"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div class="field">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required
                    autocomplete="new-password"
                >
            </div>

            <div class="checkbox-row">
                <input type="checkbox" name="terms" id="terms" required>
                <span>
                    Saya setuju dengan
                    <a href="#">Syarat & Ketentuan</a>
                    dan
                    <a href="#">Kebijakan Privasi</a>
                    Best Denki
                </span>
            </div>

            <button type="submit" class="btn-submit">Daftar Sekarang</button>
        </form>

        <div class="form-note">
            Sudah punya akun?
            <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>

</div>

</body>
</html>