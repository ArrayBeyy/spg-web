<aside class="sidebar">

    {{-- ── BRAND HEADER ── --}}
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                 stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                <polyline points="9,22 9,12 15,12 15,22"/>
            </svg>
        </div>
    </div>

    {{-- 🔥 SWITCH BRANCH (ADMIN ONLY) --}}
    @if(auth()->user()->role == 'admin')
    <div class="sidebar-section">
        <div class="sidebar-label">Branch Aktif</div>

        <form action="{{ route('switch.branch') }}" method="POST">
            @csrf
            <select name="branch_id" onchange="this.form.submit()"
                style="width: 100%; padding: 6px; border-radius: 6px; border: none;">
                @foreach(\App\Models\Branch::all() as $branch)
                    <option value="{{ $branch->id }}"
                        {{ session('branch_id') == $branch->id ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>
    @endif

    {{-- ── UTAMA ── --}}
    <div class="sidebar-section">
        <div class="sidebar-label">Utama</div>

        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg class="sidebar-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7"/>
                <rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/>
                <rect x="3" y="14" width="7" height="7"/>
            </svg>
            Dashboard
        </a>
    </div>

    {{-- 🔥 ADMIN ONLY --}}
    @if(auth()->user()->role == 'admin')
    <div class="sidebar-divider"></div>
    <div class="sidebar-section">
        <div class="sidebar-label">Manajemen</div>

        <a href="{{ route('branches.index') }}"
           class="sidebar-link {{ request()->routeIs('branches.*') ? 'active' : '' }}">
            <svg class="sidebar-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                <polyline points="9,22 9,12 15,12 15,22"/>
            </svg>
            Branches
        </a>

        <a href="{{ route('products.index') }}"
           class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <svg class="sidebar-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                <line x1="3" y1="6" x2="21" y2="6"/>
                <path d="M16 10a4 4 0 01-8 0"/>
            </svg>
            Products
        </a>

        <a href="{{ route('users.index') }}"
           class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <svg class="sidebar-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                <path d="M16 3.13a4 4 0 010 7.75"/>
            </svg>
            SPG Users
        </a>
    </div>
    @endif

    {{-- 🔥 BRANCH ADMIN --}}
    @if(auth()->user()->role == 'branch_admin')
    <div class="sidebar-divider"></div>
    <div class="sidebar-section">
        <div class="sidebar-label">Manajemen</div>

        <a href="{{ route('users.index') }}"
           class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <svg class="sidebar-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87"/>
                <path d="M16 3.13a4 4 0 010 7.75"/>
            </svg>
            SPG Users
        </a>
    </div>
    @endif

    {{-- 🔥 SALES (SEMUA ROLE) --}}
    <div class="sidebar-divider"></div>
    <div class="sidebar-section">
        <div class="sidebar-label">Laporan</div>

        <a href="{{ route('sales.index') }}"
           class="sidebar-link {{ request()->routeIs('sales.*') ? 'active' : '' }}">
            <svg class="sidebar-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="20" x2="12" y2="10"/>
                <line x1="18" y1="20" x2="18" y2="4"/>
                <line x1="6" y1="20" x2="6" y2="16"/>
            </svg>
            Sales
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="sidebar-version">
            <span class="sidebar-dot"></span>
            SPG Portal v1.0 &mdash; Best Denki
        </div>
    </div>

</aside>