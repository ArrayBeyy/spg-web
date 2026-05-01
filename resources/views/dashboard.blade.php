@extends('layouts.app')

@section('content')


    <div class="flex">

        {{-- CONTENT --}}
        <div class="flex-1 p-6" style="background:#F8F9FF; min-height:100vh; font-family:'DM Sans',sans-serif;">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&family=Playfair+Display:wght@700;900&display=swap');

            :root {
                --red: #C8102E;
                --red-dark: #8B0A1F;
                --red-light: #F5E6E9;
                --text: #0F0A0B;
                --muted: #6B7280;
                --border: #E5E7EB;
                --surface: #FFFFFF;
            }

            .dash-banner {
                background: linear-gradient(135deg, var(--red) 0%, var(--red-dark) 100%);
                border-radius: 16px;
                padding: 1.6rem 2rem;
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1.5rem;
                position: relative;
                overflow: hidden;
            }

            .dash-banner::before {
                content: '';
                position: absolute;
                right: -60px; top: -60px;
                width: 220px; height: 220px;
                border-radius: 50%;
                background: rgba(255,255,255,0.06);
            }

            .dash-banner::after {
                content: '';
                position: absolute;
                right: 80px; bottom: -50px;
                width: 130px; height: 130px;
                border-radius: 50%;
                background: rgba(0,0,0,0.1);
            }

            .banner-grid {
                position: absolute;
                inset: 0;
                background-image:
                    repeating-linear-gradient(0deg, transparent, transparent 28px, rgba(255,255,255,0.03) 28px, rgba(255,255,255,0.03) 29px),
                    repeating-linear-gradient(90deg, transparent, transparent 28px, rgba(255,255,255,0.03) 28px, rgba(255,255,255,0.03) 29px);
            }

            .banner-left { position: relative; z-index: 2; }

            .banner-greeting {
                font-size: 10.5px;
                font-weight: 400;
                color: rgba(255,255,255,0.6);
                letter-spacing: 0.12em;
                text-transform: uppercase;
                margin-bottom: 6px;
            }

            .banner-name {
                font-family: 'Playfair Display', serif;
                font-size: 1.7rem;
                font-weight: 700;
                color: white;
                margin-bottom: 8px;
                line-height: 1.2;
            }

            .banner-role {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                background: rgba(255,255,255,0.15);
                border: 1px solid rgba(255,255,255,0.25);
                border-radius: 99px;
                padding: 3px 12px;
                font-size: 11px;
                font-weight: 500;
                color: white;
                letter-spacing: 0.07em;
            }

            .banner-right {
                position: relative;
                z-index: 2;
                text-align: right;
            }

            .banner-date-label {
                font-size: 10px;
                color: rgba(255,255,255,0.55);
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 4px;
            }

            .banner-date {
                font-size: 1rem;
                font-weight: 400;
                color: rgba(255,255,255,0.85);
                margin-bottom: 4px;
            }

            .banner-time {
                font-size: 2rem;
                font-weight: 700;
                color: white;
                letter-spacing: 0.06em;
                line-height: 1;
                font-variant-numeric: tabular-nums;
            }

            /* Stat grid */
            .stat-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-card {
                background: var(--surface);
                border: 1px solid var(--border);
                border-radius: 14px;
                padding: 1.3rem 1.4rem;
                position: relative;
                overflow: hidden;
                transition: transform .2s, box-shadow .2s;
            }

            .stat-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 28px rgba(200,16,46,0.1);
            }

            .stat-card::after {
                content: '';
                position: absolute;
                bottom: 0; left: 0; right: 0;
                height: 3px;
                background: linear-gradient(90deg, var(--red), transparent);
                border-radius: 0 0 14px 14px;
            }

            .stat-icon {
                width: 42px; height: 42px;
                border-radius: 10px;
                background: var(--red-light);
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
            }

            .stat-icon svg { width: 20px; height: 20px; stroke: var(--red); }

            .stat-label {
                font-size: 10.5px;
                color: var(--muted);
                letter-spacing: 0.07em;
                margin-bottom: 4px;
            }

            .stat-value {
                font-family: 'Playfair Display', serif;
                font-size: 2rem;
                font-weight: 700;
                color: var(--text);
                line-height: 1;
                margin-bottom: 7px;
            }

            .stat-tag {
                display: inline-flex;
                align-items: center;
                gap: 4px;
                font-size: 11px;
                color: #16A34A;
                background: #F0FDF4;
                border-radius: 99px;
                padding: 2px 9px;
            }

            .stat-tag svg { width: 11px; height: 11px; }

            /* Section row */
            .section-row {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 1rem;
                margin-bottom: 1rem;
            }

            .dash-card {
                background: var(--surface);
                border: 1px solid var(--border);
                border-radius: 14px;
                overflow: hidden;
                margin-bottom: 1rem;
            }

            .dash-card-header {
                padding: 1.1rem 1.4rem;
                border-bottom: 1px solid var(--border);
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .dash-card-header h3 {
                font-size: 13.5px;
                font-weight: 500;
                color: var(--text);
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .dash-card-header h3 svg { width: 15px; height: 15px; stroke: var(--red); }

            .dash-card-header a {
                font-size: 11.5px;
                color: var(--red);
                text-decoration: none;
            }

            .dash-card-body { padding: 1.2rem 1.4rem; }

            /* Bar chart */
            .chart-bars {
                display: flex;
                align-items: flex-end;
                gap: 6px;
                height: 130px;
            }

            .bar-col {
                flex: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 5px;
                height: 100%;
                justify-content: flex-end;
            }

            .bar-inner {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-end;
                flex: 1;
            }

            .bar {
                width: 55%;
                border-radius: 5px 5px 0 0;
                background: var(--red-light);
                border: 1.5px solid var(--red);
                border-bottom: none;
                transition: background .2s, width .2s;
                cursor: pointer;
            }

            .bar:hover { background: var(--red); width: 72%; }

            .bar-label {
                font-size: 9.5px;
                color: #9CA3AF;
                white-space: nowrap;
            }

            /* Top SPG */
            .spg-row {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 9px 0;
                border-bottom: 1px solid var(--border);
            }

            .spg-row:last-child { border-bottom: none; }

            .spg-rank {
                width: 22px; height: 22px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 10px;
                font-weight: 500;
                flex-shrink: 0;
            }

            .rank-gold   { background: #FEF3C7; color: #92400E; }
            .rank-silver { background: #F1F5F9; color: #475569; }
            .rank-bronze { background: #FEF0E8; color: #9A5B13; }
            .rank-rest   { background: var(--red-light); color: var(--red); }

            .spg-avatar {
                width: 30px; height: 30px;
                border-radius: 50%;
                background: var(--red-light);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 11px;
                font-weight: 500;
                color: var(--red);
                flex-shrink: 0;
            }

            .spg-name { font-size: 13px; color: var(--text); flex: 1; }
            .spg-count { font-size: 13px; font-weight: 500; color: var(--red); }

            /* Activity */
            .activity-row {
                display: flex;
                gap: 12px;
                padding: 11px 0;
                border-bottom: 1px solid var(--border);
                align-items: flex-start;
            }

            .activity-row:last-child { border-bottom: none; }

            .activity-dot {
                width: 8px; height: 8px;
                border-radius: 50%;
                margin-top: 5px;
                flex-shrink: 0;
            }

            .dot-red   { background: var(--red); }
            .dot-green { background: #16A34A; }
            .dot-amber { background: #D97706; }

            .activity-text { font-size: 12.5px; color: var(--text); line-height: 1.55; }
            .activity-time { font-size: 11px; color: #9CA3AF; margin-top: 2px; }

            .empty-state {
                text-align: center;
                padding: 2rem 0;
                font-size: 13px;
                color: #9CA3AF;
            }

            @media (max-width: 1100px) {
                .stat-grid { grid-template-columns: repeat(2, 1fr); }
                .section-row { grid-template-columns: 1fr; }
            }
        </style>

        {{-- Welcome Banner --}}
        <div class="dash-banner">
            <div class="banner-grid"></div>
            <div class="banner-left">
                <div class="banner-greeting">Selamat datang kembali</div>
                <div class="banner-name">{{ auth()->user()->name }}</div>
                <div class="banner-role">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    {{ strtoupper(auth()->user()->role) }}
                </div>
            </div>
            <div class="banner-right">
                <div class="banner-date-label">Hari ini</div>
                <div class="banner-date">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
                <div class="banner-time" id="live-clock">--:--:--</div>
            </div>
        </div>

        {{-- Stat Cards --}}
        <div class="stat-grid">

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <div class="stat-label">TOTAL SPG USERS</div>
                <div class="stat-value">{{ \App\Models\User::where('role', 'spg')->count() }}</div>
                <div class="stat-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                    Aktif
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <div class="stat-label">TOTAL BRANCHES</div>
                <div class="stat-value">{{ \App\Models\Branch::count() }}</div>
                <div class="stat-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                    Cabang aktif
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <path d="M16 10a4 4 0 0 1-8 0"/>
                    </svg>
                </div>
                <div class="stat-label">TOTAL PRODUCTS</div>
                <div class="stat-value">{{ \App\Models\Product::count() }}</div>
                <div class="stat-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                    Terdaftar
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="20" x2="12" y2="10"/>
                        <line x1="18" y1="20" x2="18" y2="4"/>
                        <line x1="6" y1="20" x2="6" y2="16"/>
                    </svg>
                </div>
                <div class="stat-label">TOTAL SALES</div>
                <div class="stat-value">{{ \App\Models\Sale::count() }}</div>
                <div class="stat-tag">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                    Transaksi
                </div>
            </div>

        </div>

        {{-- Chart + Top SPG --}}
        <div class="section-row">

            <div class="dash-card">
                <div class="dash-card-header">
                    <h3>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                        </svg>
                        Sales per Bulan
                    </h3>
                    <a href="{{ route('sales.index') }}">Lihat semua →</a>
                </div>
                <div class="dash-card-body">
                    @php
                        $months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'];
                        $salesData = \App\Models\Sale::selectRaw('MONTH(created_at) as m, COUNT(*) as total')
                            ->whereYear('created_at', now()->year)
                            ->groupBy('m')->pluck('total','m')->toArray();
                        $maxVal = max(array_values($salesData) ?: [1]);
                    @endphp
                    <div class="chart-bars">
                        @foreach($months as $i => $lbl)
                            @php $val = $salesData[$i+1] ?? 0; $h = max(($val/$maxVal)*100, 5); @endphp
                            <div class="bar-col">
                                <div class="bar-inner">
                                    <div class="bar" style="height:{{ $h }}%" title="{{ $val }} sales"></div>
                                </div>
                                <div class="bar-label">{{ $lbl }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="dash-card">
                <div class="dash-card-header">
                    <h3>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                        </svg>
                        Top SPG Bulan Ini
                    </h3>
                    <a href="{{ route('users.index') }}">Lihat semua →</a>
                </div>
                <div class="dash-card-body">
                    @php
                        $topSpg = \App\Models\Sale::selectRaw('user_id, COUNT(*) as total')
                            ->whereMonth('created_at', now()->month)
                            ->groupBy('user_id')->orderByDesc('total')
                            ->with('user')->limit(5)->get();
                    @endphp
                    @if($topSpg->count())
                        @foreach($topSpg as $i => $s)
                            <div class="spg-row">
                                <div class="spg-rank {{ $i===0?'rank-gold':($i===1?'rank-silver':($i===2?'rank-bronze':'rank-rest')) }}">{{ $i+1 }}</div>
                                <div class="spg-avatar">{{ strtoupper(substr($s->user->name??'S',0,2)) }}</div>
                                <div class="spg-name">{{ $s->user->name ?? '-' }}</div>
                                <div class="spg-count">{{ $s->total }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="empty-state">Belum ada data bulan ini.</div>
                    @endif
                </div>
            </div>

        </div>

        {{-- Recent Activity --}}
        <div class="dash-card">
            <div class="dash-card-header">
                <h3>
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Aktivitas Penjualan Terbaru
                </h3>
                <a href="{{ route('sales.index') }}">Lihat semua →</a>
            </div>
            <div class="dash-card-body">
                @php $recent = \App\Models\Sale::with(['user','product'])->latest()->limit(7)->get(); @endphp
                @if($recent->count())
                    @foreach($recent as $sale)
                        <div class="activity-row">
                            <div class="activity-dot {{ $loop->index%3===0?'dot-red':($loop->index%3===1?'dot-green':'dot-amber') }}"></div>
                            <div>
                                <div class="activity-text">
                                    <strong>{{ $sale->user->name ?? 'SPG' }}</strong>
                                    menjual <strong>{{ $sale->product->name ?? 'produk' }}</strong>
                                    @isset($sale->qty) sebanyak <strong>{{ $sale->qty }} unit</strong> @endisset
                                </div>
                                <div class="activity-time">{{ $sale->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">Belum ada aktivitas terbaru.</div>
                @endif
            </div>
        </div>

    </div>

    <script>
        function tick() {
            const n = new Date();
            const pad = v => String(v).padStart(2,'0');
            const el = document.getElementById('live-clock');
            if (el) el.textContent = pad(n.getHours())+':'+pad(n.getMinutes())+':'+pad(n.getSeconds());
        }
        tick(); setInterval(tick, 1000);
    </script>
@endsection