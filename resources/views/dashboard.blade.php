
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')

@php
    $totalStatus = max($totalService, 1);

    $persenBelum = round(($serviceBelumDikerjakan / $totalStatus) * 100);
    $persenMenunggu = round(($serviceMenungguPembayaran / $totalStatus) * 100);
    $persenSelesai = round(($serviceSelesai / $totalStatus) * 100);
@endphp

<style>
    .dashboard-page {
        color: #34443A;
    }

    /* HERO */

    .dashboard-hero {
        position: relative;
        overflow: hidden;
        padding: 34px;
        border-radius: 24px;
        background: linear-gradient(115deg, #DCEBDD, #E9E3F1, #F5E6E8);
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        min-height: 190px;
    }

    .dashboard-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 31px;
        margin: 13px 0 9px;
        color: #34443A;
    }

    .dashboard-hero p {
        font-size: 13px;
        color: #718075;
        line-height: 1.8;
        max-width: 480px;
        margin: 0;
    }

    .dashboard-hero-decoration {
        position: absolute;
        right: 125px;
        bottom: -45px;
        font-size: 180px;
        color: rgba(83,111,91,.08);
        transform: rotate(-12deg);
    }

    .dashboard-hero-icon {
        width: 90px;
        height: 90px;
        border-radius: 27px;
        background: rgba(255,255,255,.55);
        display: grid;
        place-items: center;
        font-size: 43px;
        color: #536F5B;
        z-index: 1;
        flex-shrink: 0;
    }

    .dashboard-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 13px;
        background: rgba(255,255,255,.55);
        border-radius: 10px;
        color: #657D68;
        font-size: 11px;
        font-weight: 700;
        margin-top: 17px;
    }

    /* SECTION */

    .dashboard-section {
        margin-bottom: 25px;
    }

    .dashboard-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
        gap: 12px;
        flex-wrap: wrap;
    }

    .dashboard-section-heading h3 {
        font-size: 16px;
        color: #34443A;
        margin: 0;
        font-weight: 700;
    }

    .dashboard-section-heading p {
        font-size: 11px;
        color: #929B92;
        margin: 5px 0 0;
    }

    /* STATISTICS */

    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0,1fr));
        gap: 15px;
    }

    .dashboard-stat {
        background: white;
        border: 1px solid #ECEDE7;
        padding: 21px;
        border-radius: 19px;
        box-shadow: 0 7px 25px rgba(67,85,68,.035);
        transition: .2s;
    }

    .dashboard-stat:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(67,85,68,.08);
    }

    .dashboard-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 19px;
    }

    .dashboard-stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        font-size: 20px;
    }

    .dashboard-stat-number {
        font-size: 28px;
        font-weight: 800;
        color: #34443A;
        margin: 0 0 5px;
    }

    .dashboard-stat-label {
        font-size: 11px;
        color: #929B92;
        margin: 0;
    }

    .dashboard-stat-footer {
        border-top: 1px solid #F0F1EC;
        padding-top: 12px;
        margin-top: 16px;
        font-size: 10px;
        color: #879489;
    }

    /* REVENUE */

    .dashboard-revenue {
        background: linear-gradient(115deg,#536F5B,#718B76);
        border-radius: 21px;
        padding: 25px 28px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 9px 25px rgba(83,111,91,.12);
    }

    .dashboard-revenue small {
        font-size: 11px;
        color: rgba(255,255,255,.75);
    }

    .dashboard-revenue h2 {
        font-size: 28px;
        font-weight: 800;
        margin: 10px 0 6px;
        color: white;
    }

    .dashboard-revenue p {
        font-size: 11px;
        color: rgba(255,255,255,.75);
        margin: 0;
    }

    .revenue-icon {
        width: 65px;
        height: 65px;
        border-radius: 20px;
        background: rgba(255,255,255,.16);
        display: grid;
        place-items: center;
        font-size: 30px;
    }

    /* PANELS */

    .dashboard-panel {
        background: white;
        border: 1px solid #ECEDE7;
        border-radius: 21px;
        padding: 24px;
        box-shadow: 0 7px 25px rgba(67,85,68,.035);
    }

    .dashboard-two-columns {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
        margin-bottom: 25px;
    }

    /* SERVICE OVERVIEW */

    .service-status-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-top: 23px;
    }

    .service-status-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 9px;
        font-size: 12px;
    }

    .service-status-heading span:first-child {
        color: #718075;
        font-weight: 600;
    }

    .service-status-heading strong {
        color: #34443A;
    }

    .service-progress {
        height: 9px;
        background: #F0F1ED;
        border-radius: 20px;
        overflow: hidden;
    }

    .service-progress-bar {
        height: 100%;
        border-radius: 20px;
    }

    /* QUICK ACCESS */

    .quick-access-grid {
        display: grid;
        grid-template-columns: repeat(3,minmax(0,1fr));
        gap: 13px;
    }

    .quick-access-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 17px;
        background: #FAFBF8;
        border: 1px solid #EEF0EA;
        border-radius: 15px;
        text-decoration: none;
        transition: .2s;
        min-width: 0;
    }

    .quick-access-card:hover {
        background: #F0F5EF;
        border-color: #C8D8C8;
        transform: translateY(-3px);
    }

    .quick-access-icon {
        width: 43px;
        height: 43px;
        border-radius: 13px;
        display: grid;
        place-items: center;
        font-size: 19px;
        flex-shrink: 0;
    }

    .quick-access-card strong {
        display: block;
        font-size: 11px;
        color: #34443A;
        margin-bottom: 5px;
    }

    .quick-access-card small {
        font-size: 9px;
        color: #929B92;
    }

    .quick-arrow {
        margin-left: auto;
        color: #A5B0A5;
        font-size: 13px;
    }

    /* RECENT SERVICE */

    .recent-table-wrapper {
        overflow-x: auto;
        margin-top: 20px;
    }

    .recent-table {
        width: 100%;
        min-width: 650px;
        border-collapse: collapse;
        font-size: 11px;
    }

    .recent-table thead {
        background: #F5F7F2;
    }

    .recent-table th {
        text-align: left;
        padding: 14px;
        font-size: 9px;
        color: #829083;
        letter-spacing: .5px;
        white-space: nowrap;
    }

    .recent-table td {
        padding: 15px 14px;
        border-bottom: 1px solid #F0F1EC;
        color: #718075;
    }

    .recent-table tbody tr:last-child td {
        border-bottom: none;
    }

    .recent-id {
        color: #536F5B;
        font-weight: 800;
    }

    .recent-name {
        font-weight: 700;
        color: #34443A;
    }

    .recent-status {
        display: inline-block;
        padding: 6px 9px;
        border-radius: 8px;
        font-size: 9px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-pending {
        background: #F5EBD6;
        color: #A38A53;
    }

    .status-waiting {
        background: #E2EDF0;
        color: #648A96;
    }

    .status-complete {
        background: #E3EDE0;
        color: #536F5B;
    }

    .recent-empty {
        text-align: center;
        padding: 40px !important;
        color: #929B92 !important;
    }

    /* SYSTEM INFO */

    .dashboard-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 17px 20px;
        border-radius: 15px;
        background: #F3F5EF;
        font-size: 10px;
        color: #819083;
    }

    .dashboard-info span {
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }

    @media(max-width: 1000px) {
        .dashboard-stats {
            grid-template-columns: repeat(2,minmax(0,1fr));
        }

        .quick-access-grid {
            grid-template-columns: repeat(2,minmax(0,1fr));
        }
    }

    @media(max-width: 650px) {
        .dashboard-hero {
            padding: 24px;
        }

        .dashboard-hero h1 {
            font-size: 24px;
        }

        .dashboard-hero-icon {
            display: none;
        }

        .dashboard-hero-decoration {
            right: 10px;
        }

        .dashboard-stats {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .dashboard-stat {
            padding: 15px;
        }

        .dashboard-stat-number {
            font-size: 23px;
        }

        .dashboard-two-columns {
            grid-template-columns: 1fr;
        }

        .quick-access-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-panel {
            padding: 17px;
        }

        .dashboard-revenue {
            padding: 21px;
        }

        .dashboard-revenue h2 {
            font-size: 22px;
        }
    }
</style>

<div class="dashboard-page">

    {{-- WELCOME HERO --}}

    <section class="dashboard-hero">

        <i class="bi bi-gear-wide-connected dashboard-hero-decoration"></i>

        <div style="z-index:1;">
            <span class="soft-label">
                MOTORCYCLE SERVICE MANAGEMENT
            </span>

            <h1>Welcome to MOTÉRA! 🌿</h1>

            <p>
                Selamat datang di pusat pengelolaan MOTÉRA.
                Pantau seluruh aktivitas service kendaraan,
                pelanggan, dan transaksi dalam satu tempat.
            </p>

            <div class="dashboard-date">
                <i class="bi bi-calendar3"></i>
                {{ now()->translatedFormat('l, d F Y') }}
            </div>
        </div>

        <div class="dashboard-hero-icon">
            <i class="bi bi-scooter"></i>
        </div>

    </section>


    {{-- STATISTIK UTAMA --}}

    <section class="dashboard-section">

        <div class="dashboard-section-heading">
            <div>
                <h3><i class="bi bi-bar-chart-line" style="color:#819A83;"></i> Ringkasan Data</h3>
                <p>Gambaran umum seluruh data MOTÉRA.</p>
            </div>

            <span class="soft-label">OVERVIEW</span>
        </div>

        <div class="dashboard-stats">

            <div class="dashboard-stat">
                <div class="dashboard-stat-top">
                    <div class="dashboard-stat-icon"
                         style="background:#E3EDE0;color:#536F5B;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <i class="bi bi-arrow-up-right" style="color:#A8BFAE;"></i>
                </div>

                <h2 class="dashboard-stat-number">{{ $totalPelanggan }}</h2>
                <p class="dashboard-stat-label">Total Pelanggan</p>

                <div class="dashboard-stat-footer">
                    <i class="bi bi-person-check"></i>
                    Pelanggan terdaftar
                </div>
            </div>


            <div class="dashboard-stat">
                <div class="dashboard-stat-top">
                    <div class="dashboard-stat-icon"
                         style="background:#ECE7F4;color:#81739B;">
                        <i class="bi bi-car-front-fill"></i>
                    </div>
                    <i class="bi bi-arrow-up-right" style="color:#A8BFAE;"></i>
                </div>

                <h2 class="dashboard-stat-number">{{ $totalKendaraan }}</h2>
                <p class="dashboard-stat-label">Total Kendaraan</p>

                <div class="dashboard-stat-footer">
                    <i class="bi bi-car-front"></i>
                    Kendaraan terdaftar
                </div>
            </div>


            <div class="dashboard-stat">
                <div class="dashboard-stat-top">
                    <div class="dashboard-stat-icon"
                         style="background:#F0DDE0;color:#A66F7B;">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <i class="bi bi-arrow-up-right" style="color:#A8BFAE;"></i>
                </div>

                <h2 class="dashboard-stat-number">{{ $totalService }}</h2>
                <p class="dashboard-stat-label">Pendaftaran Service</p>

                <div class="dashboard-stat-footer">
                    <i class="bi bi-clipboard-data"></i>
                    Seluruh pendaftaran
                </div>
            </div>


            <div class="dashboard-stat">
                <div class="dashboard-stat-top">
                    <div class="dashboard-stat-icon"
                         style="background:#F5EBD6;color:#A38A53;">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <i class="bi bi-arrow-up-right" style="color:#A8BFAE;"></i>
                </div>

                <h2 class="dashboard-stat-number">{{ $totalPembayaran }}</h2>
                <p class="dashboard-stat-label">Total Pembayaran</p>

                <div class="dashboard-stat-footer">
                    <i class="bi bi-receipt"></i>
                    Transaksi tercatat
                </div>
            </div>

        </div>

    </section>


    {{-- TOTAL PENDAPATAN --}}

    <section class="dashboard-section">

        <div class="dashboard-revenue">

            <div>
                <small>
                    <i class="bi bi-cash-stack"></i>
                    TOTAL PENDAPATAN TERCATAT
                </small>

                <h2>
                    Rp {{ number_format((float)$totalPendapatan, 0, ',', '.') }}
                </h2>

                <p>
                    Akumulasi seluruh transaksi pembayaran service MOTÉRA.
                </p>
            </div>

            <div class="revenue-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>

        </div>

    </section>


    {{-- SERVICE OVERVIEW --}}

    <div class="dashboard-two-columns">

        <section class="dashboard-panel">

            <div class="dashboard-section-heading">
                <div>
                    <h3><i class="bi bi-activity" style="color:#819A83;"></i> Service Overview</h3>
                    <p>Ringkasan status pengerjaan service.</p>
                </div>
            </div>

            <div class="service-status-list">

                <div>
                    <div class="service-status-heading">
                        <span>
                            <i class="bi bi-clock" style="color:#A38A53;"></i>
                            Belum Dikerjakan
                        </span>
                        <strong>{{ $serviceBelumDikerjakan }}</strong>
                    </div>

                    <div class="service-progress">
                        <div class="service-progress-bar"
                             style="width:{{ $persenBelum }}%;background:#D6BD84;">
                        </div>
                    </div>
                </div>


                <div>
                    <div class="service-status-heading">
                        <span>
                            <i class="bi bi-tools" style="color:#648A96;"></i>
                            Menunggu Pembayaran
                        </span>
                        <strong>{{ $serviceMenungguPembayaran }}</strong>
                    </div>

                    <div class="service-progress">
                        <div class="service-progress-bar"
                             style="width:{{ $persenMenunggu }}%;background:#91B6C0;">
                        </div>
                    </div>
                </div>


                <div>
                    <div class="service-status-heading">
                        <span>
                            <i class="bi bi-check-circle" style="color:#536F5B;"></i>
                            Selesai
                        </span>
                        <strong>{{ $serviceSelesai }}</strong>
                    </div>

                    <div class="service-progress">
                        <div class="service-progress-bar"
                             style="width:{{ $persenSelesai }}%;background:#91B99A;">
                        </div>
                    </div>
                </div>

            </div>

        </section>


        {{-- INFORMASI SISTEM --}}

        <section class="dashboard-panel">

            <div class="dashboard-section-heading">
                <div>
                    <h3><i class="bi bi-info-circle" style="color:#819A83;"></i> Informasi Sistem</h3>
                    <p>Ringkasan pengelolaan MOTÉRA.</p>
                </div>
            </div>

            <div style="display:flex;align-items:center;gap:15px;margin:25px 0;">
                <div style="width:52px;height:52px;border-radius:16px;background:#E3EDE0;color:#536F5B;display:grid;place-items:center;font-size:24px;">
                    <i class="bi bi-gear-fill"></i>
                </div>

                <div>
                    <strong style="font-size:15px;color:#34443A;">MOTÉRA</strong>
                    <p style="font-size:10px;color:#929B92;margin:5px 0 0;">
                        Motorcycle Service Management
                    </p>
                </div>
            </div>

            <div style="border-top:1px solid #EEF0EA;padding-top:17px;">

                <div style="display:flex;justify-content:space-between;margin-bottom:14px;font-size:11px;">
                    <span style="color:#929B92;">Data Pengerjaan</span>
                    <strong style="color:#536F5B;">{{ $totalDataService }} Data</strong>
                </div>

                <div style="display:flex;justify-content:space-between;margin-bottom:14px;font-size:11px;">
                    <span style="color:#929B92;">Transaksi Pembayaran</span>
                    <strong style="color:#536F5B;">{{ $totalPembayaran }} Transaksi</strong>
                </div>

                <div style="display:flex;justify-content:space-between;font-size:11px;">
                    <span style="color:#929B92;">Status Sistem</span>
                    <span style="color:#536F5B;font-weight:700;">
                        <i class="bi bi-circle-fill" style="font-size:7px;"></i>
                        Aktif
                    </span>
                </div>

            </div>

        </section>

    </div>


    {{-- QUICK ACCESS --}}

    <section class="dashboard-panel dashboard-section">

        <div class="dashboard-section-heading">
            <div>
                <h3><i class="bi bi-grid-fill" style="color:#819A83;"></i> Quick Access</h3>
                <p>Akses cepat ke seluruh halaman pengelolaan MOTÉRA.</p>
            </div>

            <span class="soft-label">5 MENU</span>
        </div>

        <div class="quick-access-grid">

            <a href="{{ route('pelanggan.index') }}" class="quick-access-card">
                <div class="quick-access-icon" style="background:#E3EDE0;color:#536F5B;">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <strong>Data Pelanggan</strong>
                    <small>Kelola informasi pelanggan</small>
                </div>
                <i class="bi bi-arrow-up-right quick-arrow"></i>
            </a>


            <a href="{{ route('kendaraan.index') }}" class="quick-access-card">
                <div class="quick-access-icon" style="background:#ECE7F4;color:#81739B;">
                    <i class="bi bi-car-front-fill"></i>
                </div>
                <div>
                    <strong>Data Kendaraan</strong>
                    <small>Kelola kendaraan</small>
                </div>
                <i class="bi bi-arrow-up-right quick-arrow"></i>
            </a>


            <a href="{{ route('daftar-service.index') }}" class="quick-access-card">
                <div class="quick-access-icon" style="background:#F0DDE0;color:#A66F7B;">
                    <i class="bi bi-clipboard2-check"></i>
                </div>
                <div>
                    <strong>Daftar Service</strong>
                    <small>Kelola pendaftaran</small>
                </div>
                <i class="bi bi-arrow-up-right quick-arrow"></i>
            </a>


            <a href="{{ route('data-service.index') }}" class="quick-access-card">
                <div class="quick-access-icon" style="background:#E2EDF0;color:#648A96;">
                    <i class="bi bi-tools"></i>
                </div>
                <div>
                    <strong>Data Service</strong>
                    <small>Kelola pengerjaan</small>
                </div>
                <i class="bi bi-arrow-up-right quick-arrow"></i>
            </a>


            <a href="{{ route('pembayaran.index') }}" class="quick-access-card">
                <div class="quick-access-icon" style="background:#F5EBD6;color:#A38A53;">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div>
                    <strong>Pembayaran Service</strong>
                    <small>Kelola transaksi</small>
                </div>
                <i class="bi bi-arrow-up-right quick-arrow"></i>
            </a>

        </div>

    </section>


    {{-- RECENT ACTIVITY --}}

    <section class="dashboard-panel dashboard-section">

        <div class="dashboard-section-heading">
            <div>
                <h3><i class="bi bi-clock-history" style="color:#819A83;"></i> Aktivitas Terbaru</h3>
                <p>Lima pendaftaran service terakhir yang tercatat.</p>
            </div>

            <a href="{{ route('daftar-service.index') }}"
               style="font-size:11px;color:#536F5B;text-decoration:none;font-weight:700;">
                Lihat Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>


        <div class="recent-table-wrapper">

            <table class="recent-table">

                <thead>
                    <tr>
                        <th>ID SERVICE</th>
                        <th>PELANGGAN</th>
                        <th>KENDARAAN</th>
                        <th>TANGGAL SERVICE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentServices as $service)

                        <tr>

                            <td>
                                <span class="recent-id">
                                    {{ $service->id_servis_pelanggan }}
                                </span>
                            </td>

                            <td>
                                <span class="recent-name">
                                    {{ $service->pelanggan->nama_lengkap ?? 'Pelanggan tidak ditemukan' }}
                                </span>
                            </td>

                            <td>
                                {{ $service->kendaraan->no_plat_kendaraan ?? '-' }}
                            </td>

                            <td>
                                {{ $service->tanggal_servis
                                    ? $service->tanggal_servis->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>

                                @if($service->pembayaran)
                                    <span class="recent-status status-complete">
                                        <i class="bi bi-check-circle"></i>
                                        Selesai
                                    </span>

                                @elseif($service->dataService)
                                    <span class="recent-status status-waiting">
                                        <i class="bi bi-clock"></i>
                                        Menunggu Pembayaran
                                    </span>

                                @else
                                    <span class="recent-status status-pending">
                                        <i class="bi bi-hourglass-split"></i>
                                        Belum Dikerjakan
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="recent-empty">
                                <i class="bi bi-inbox" style="font-size:28px;"></i>
                                <p>Belum ada aktivitas service yang tercatat.</p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>


    {{-- FOOTER INFORMATION --}}

    <div class="dashboard-info">

        <span>
            <i class="bi bi-shield-check"></i>
            MOTÉRA Management System
        </span>

        <span>
            <i class="bi bi-database-check"></i>
            Data terintegrasi dengan database
        </span>

        <span>
            <i class="bi bi-heart-fill" style="color:#C98E98;"></i>
            Designed for better service management
        </span>

    </div>

</div>

@endsection
