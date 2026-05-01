<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — SPG Best Denki</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red: #C8102E;
            --red-dark: #8B0A1F;
            --red-light: #F5E6E9;
            --red-muted: #F9EEF0;
            --white: #FFFFFF;
            --off: #FAFAFA;
            --text: #1A0508;
            --muted: #7A3042;
            --border: #EDE0E3;
            --sidebar-w: 240px;
            --navbar-h: 60px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--off);
            color: var(--text);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: var(--navbar-h);
            background: var(--red);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem 0 0;
            z-index: 100;
            box-shadow: 0 2px 12px rgba(200,16,46,0.25);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0;
            width: var(--sidebar-w);
            padding: 0 1.5rem;
            border-right: 1px solid rgba(255,255,255,0.15);
            height: 100%;
        }

        .brand-icon {
            width: 34px; height: 34px;
            background: white;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 10px;
        }

        .brand-icon span {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-weight: 900;
            color: var(--red);
        }

        .brand-text {
            color: white;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.04em;
            line-height: 1.2;
        }

        .brand-text small {
            display: block;
            font-size: 9px;
            font-weight: 300;
            opacity: 0.7;
            letter-spacing: 0.1em;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-notif {
            width: 34px; height: 34px;
            border-radius: 8px;
            background: rgba(255,255,255,0.12);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            transition: background .2s;
        }

        .navbar-notif:hover { background: rgba(255,255,255,0.2); }

        .navbar-notif svg { width: 17px; height: 17px; }

        .notif-dot {
            position: absolute;
            top: 7px; right: 7px;
            width: 7px; height: 7px;
            background: #FFD700;
            border-radius: 50%;
            border: 1.5px solid var(--red);
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 8px;
            transition: background .2s;
            position: relative;
        }

        .navbar-user:hover { background: rgba(255,255,255,0.12); }

        .user-avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            border: 2px solid rgba(255,255,255,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 500;
            color: white;
            letter-spacing: 0.02em;
        }

        .user-info { line-height: 1.25; }

        .user-info .user-name {
            font-size: 13px;
            font-weight: 500;
            color: white;
        }

        .user-info .user-role {
            font-size: 10px;
            color: rgba(255,255,255,0.65);
            font-weight: 300;
            letter-spacing: 0.05em;
        }

        .user-chevron { color: rgba(255,255,255,0.65); }

        .user-chevron svg { width: 14px; height: 14px; }

        /* Dropdown */
        .user-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            min-width: 160px;
            overflow: hidden;
            z-index: 200;
        }

        .navbar-user:hover .user-dropdown { display: block; }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 10px 14px;
            font-size: 13px;
            color: var(--text);
            text-decoration: none;
            transition: background .15s;
        }

        .dropdown-item:hover { background: var(--red-muted); color: var(--red); }

        .dropdown-item svg { width: 15px; height: 15px; flex-shrink: 0; }

        .dropdown-divider { height: 1px; background: var(--border); margin: 4px 0; }

        .dropdown-item.danger { color: var(--red); }

        /* ── Sidebar ── */
        .sidebar {
            position: fixed;
            top: var(--navbar-h);
            left: 0;
            bottom: 0;
            width: var(--sidebar-w);
            background: white;
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 90;
        }

        .sidebar-section {
            padding: 1.4rem 1rem 0.4rem;
        }

        .sidebar-label {
            font-size: 9.5px;
            font-weight: 500;
            color: #BBAAB0;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0 0.6rem;
            margin-bottom: 0.4rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 400;
            color: var(--muted);
            text-decoration: none;
            transition: background .15s, color .15s;
            margin-bottom: 2px;
        }

        .sidebar-link svg { width: 17px; height: 17px; flex-shrink: 0; opacity: 0.7; }

        .sidebar-link:hover { background: var(--red-muted); color: var(--red); }
        .sidebar-link:hover svg { opacity: 1; }

        .sidebar-link.active {
            background: var(--red-light);
            color: var(--red);
            font-weight: 500;
        }

        .sidebar-link.active svg { opacity: 1; }

        .sidebar-badge {
            margin-left: auto;
            background: var(--red);
            color: white;
            font-size: 10px;
            font-weight: 500;
            padding: 1px 7px;
            border-radius: 99px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1rem;
            border-top: 1px solid var(--border);
        }

        .sidebar-version {
            font-size: 11px;
            color: #BBAAB0;
            text-align: center;
            font-weight: 300;
        }

        /* ── Main content ── */
        .main {
            margin-left: var(--sidebar-w);
            margin-top: var(--navbar-h);
            padding: 2rem;
            min-height: calc(100vh - var(--navbar-h));
        }

        /* ── Page header ── */
        .page-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 1.8rem;
        }

        .page-header-left h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 4px;
        }

        .page-header-left .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #BBAAB0;
        }
        .input {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--border);
    border-radius: 8px;
    font-size: 13px;
}
        /* ===== CARD ===== */
.card {
    background: white;
    border-radius: 12px;
    border: 1px solid var(--border);
    padding: 18px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}

/* ===== BUTTON ===== */
.btn-primary {
    background: var(--red);
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    text-decoration: none;
    transition: 0.2s;
}

.btn-primary:hover {
    background: var(--red-dark);
}

/* ===== TABLE ===== */
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}

.table thead {
    background: var(--red-muted);
}

.table th {
    text-align: left;
    padding: 12px;
    font-weight: 500;
    color: var(--muted);
}

.table td {
    padding: 12px;
    border-top: 1px solid var(--border);
}

.table tr:hover {
    background: #fafafa;
}

/* ===== ACTION BUTTON ===== */
.action-group {
    display: flex;
    gap: 6px;
}

.btn-edit {
    padding: 6px 10px;
    background: #EFF6FF;
    color: #2563EB;
    border-radius: 6px;
    font-size: 12px;
    text-decoration: none;
}

.btn-delete {
    padding: 6px 10px;
    background: #FEF2F2;
    color: #DC2626;
    border-radius: 6px;
    font-size: 12px;
    border: none;
    cursor: pointer;
}

/* ===== TEXT ===== */
.fw {
    font-weight: 500;
}

/* ===== EMPTY ===== */
.empty {
    text-align: center;
    color: #aaa;
    padding: 20px;
}

        .breadcrumb span { color: var(--muted); }

        .breadcrumb svg { width: 12px; height: 12px; }

        /* ── Alert flash ── */
        .alert {
            padding: 11px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .alert svg { width: 16px; height: 16px; flex-shrink: 0; }

        .alert-success { background: #F0FDF4; border: 1px solid #BBF7D0; color: #15803D; }
        .alert-error   { background: #FEF2F2; border: 1px solid #FECACA; color: #B91C1C; }
        .alert-info    { background: #EFF6FF; border: 1px solid #BFDBFE; color: #1D4ED8; }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main { margin-left: 0; }
            .navbar-brand { width: auto; border: none; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- ── Navbar ── --}}
<nav class="navbar">
    <div class="navbar-brand">
        <div class="brand-icon"><span>B</span></div>
        <div class="brand-text">
            Best Denki
            <small>SPG PORTAL</small>
        </div>
    </div>

    <div class="navbar-right">
        {{-- Notification bell --}}
        <button class="navbar-notif" title="Notifikasi">
            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
            <span class="notif-dot"></span>
        </button>

        {{-- User dropdown --}}
        <div class="navbar-user">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
            </div>
            <div class="user-info">
                <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                <div class="user-role">{{ ucfirst(auth()->user()->role ?? 'admin') }}</div>
            </div>
            <div class="user-chevron">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6"/>
                </svg>
            </div>

            <div class="user-dropdown">
                <a href="#" class="dropdown-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Profil Saya
                </a>
                <a href="#" class="dropdown-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                    </svg>
                    Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item danger" style="width:100%;border:none;background:none;cursor:pointer;font-family:inherit;text-align:left;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

{{-- ── Sidebar ── --}}
@include('layouts.sidebar')

{{-- ── Main content ── --}}
<main class="main">

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

@stack('scripts')
</body>
</html>