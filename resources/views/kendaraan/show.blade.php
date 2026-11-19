
@extends('layouts.app')

@section('title', 'Detail Kendaraan')
@section('page-title', 'Detail Kendaraan')

@section('content')

<style>
    .vehicle-detail-page {
        width: 100%;
    }

    .vehicle-hero {
        background: linear-gradient(115deg, #E1EDE1, #EDE7F3, #F6E8E9);
        padding: 32px 38px;
        border-radius: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }

    .vehicle-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 29px;
        color: #34443A;
        margin: 13px 0 8px;
    }

    .vehicle-hero p {
        font-size: 13px;
        color: #718075;
        line-height: 1.8;
        margin: 0;
    }

    .vehicle-hero-icon {
        width: 80px;
        height: 80px;
        border-radius: 25px;
        background: rgba(255,255,255,.65);
        display: grid;
        place-items: center;
        font-size: 37px;
        color: #657D68;
        flex-shrink: 0;
    }

    .vehicle-detail-card {
        background: white;
        border: 1px solid #ECEDE7;
        border-radius: 22px;
        padding: 28px;
        box-shadow: 0 8px 28px rgba(67,85,68,.045);
    }

    .vehicle-identity {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 23px;
        border-radius: 18px;
        background: linear-gradient(120deg,#F1F5EF,#F3EFF8);
        margin-bottom: 27px;
    }

    .vehicle-identity-icon {
        width: 65px;
        height: 65px;
        background: #536F5B;
        color: white;
        border-radius: 19px;
        display: grid;
        place-items: center;
        font-size: 29px;
        flex-shrink: 0;
    }

    .vehicle-identity small {
        color: #819184;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1.4px;
    }

    .vehicle-identity h2 {
        font-size: 23px;
        color: #34443A;
        margin: 5px 0;
        font-weight: 800;
    }

    .vehicle-identity p {
        margin: 0;
        color: #819184;
        font-size: 12px;
    }

    .vehicle-section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 19px;
    }

    .vehicle-section-heading h3 {
        font-size: 16px;
        color: #34443A;
        margin: 0;
    }

    .vehicle-section-heading p {
        font-size: 11px;
        color: #929B92;
        margin: 6px 0 0;
    }

    .vehicle-status {
        background: #E5F0E5;
        color: #536F5B;
        padding: 8px 12px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .vehicle-info-grid {
        display: grid;
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 15px;
    }

    .vehicle-info-item {
        padding: 19px;
        border: 1px solid #ECEDE7;
        border-radius: 15px;
        background: #FAFBF8;
        transition: .2s;
    }

    .vehicle-info-item:hover {
        background: #F3F6F0;
        border-color: #D5E2D3;
        transform: translateY(-2px);
    }

    .vehicle-info-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #929B92;
        font-size: 11px;
        margin-bottom: 10px;
    }

    .vehicle-info-label i {
        color: #8CA38D;
        font-size: 14px;
    }

    .vehicle-info-value {
        color: #34443A;
        font-size: 14px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .vehicle-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #ECEDE7;
    }

    .vehicle-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: #F0EDF5;
        color: #81739B;
        padding: 12px 17px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 700;
        transition: .2s;
    }

    .vehicle-back:hover {
        background: #E6E0F0;
        color: #71618F;
    }

    .vehicle-edit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        background: #536F5B;
        color: white;
        padding: 12px 18px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 700;
        transition: .2s;
    }

    .vehicle-edit:hover {
        background: #405C48;
        color: white;
        transform: translateY(-2px);
    }

    @media(max-width:650px) {
        .vehicle-hero {
            padding: 24px;
        }

        .vehicle-hero-icon {
            display: none;
        }

        .vehicle-detail-card {
            padding: 18px;
        }

        .vehicle-info-grid {
            grid-template-columns: 1fr;
        }

        .vehicle-identity {
            padding: 17px;
        }

        .vehicle-identity h2 {
            font-size: 19px;
        }
    }
</style>

<div class="vehicle-detail-page">

    {{-- HERO --}}
    <div class="vehicle-hero">
        <div>
            <span class="soft-label">MANAJEMEN DATA / KENDARAAN / DETAIL</span>
            <h1>Detail Kendaraan</h1>
            <p>
                Informasi lengkap identitas dan spesifikasi kendaraan
                yang telah terdaftar di MOTÉRA.
            </p>
        </div>

        <div class="vehicle-hero-icon">
            <i class="bi bi-motorcycle"></i>
        </div>
    </div>

    {{-- DETAIL CARD --}}
    <div class="vehicle-detail-card">

        {{-- IDENTITY --}}
        <div class="vehicle-identity">

            <div class="vehicle-identity-icon">
                <i class="bi bi-motorcycle"></i>
            </div>

            <div>
                <small>KENDARAAN TERDAFTAR</small>

                <h2>{{ $kendaraan->no_plat_kendaraan }}</h2>

                <p>
                    <i class="bi bi-car-front"></i>
                    {{ $kendaraan->jenis_kendaraan }}
                </p>
            </div>

        </div>

        {{-- INFORMATION --}}
        <div class="vehicle-section-heading">
            <div>
                <h3>
                    <i class="bi bi-card-text" style="color:#819A83;"></i>
                    Informasi Kendaraan
                </h3>

                <p>Rincian data kendaraan yang tersimpan dalam sistem.</p>
            </div>

            <span class="vehicle-status">
                <i class="bi bi-check-circle-fill"></i>
                Terdaftar
            </span>
        </div>

        <div class="vehicle-info-grid">

            <div class="vehicle-info-item">
                <div class="vehicle-info-label">
                    <i class="bi bi-credit-card-2-front"></i>
                    Nomor Polisi
                </div>
                <div class="vehicle-info-value">
                    {{ $kendaraan->no_plat_kendaraan ?: '-' }}
                </div>
            </div>

            <div class="vehicle-info-item">
                <div class="vehicle-info-label">
                    <i class="bi bi-motorcycle"></i>
                    Jenis Kendaraan
                </div>
                <div class="vehicle-info-value">
                    {{ $kendaraan->jenis_kendaraan ?: '-' }}
                </div>
            </div>

            <div class="vehicle-info-item">
                <div class="vehicle-info-label">
                    <i class="bi bi-file-earmark-text"></i>
                    Nomor STNK
                </div>
                <div class="vehicle-info-value">
                    {{ $kendaraan->no_stnk ?: '-' }}
                </div>
            </div>

            <div class="vehicle-info-item">
                <div class="vehicle-info-label">
                    <i class="bi bi-calendar3"></i>
                    Tahun Pembuatan
                </div>
                <div class="vehicle-info-value">
                    {{ $kendaraan->tahun_pembuatan_kendaraan ?: '-' }}
                </div>
            </div>

            <div class="vehicle-info-item">
                <div class="vehicle-info-label">
                    <i class="bi bi-person"></i>
                    Nama Pemilik
                </div>
                <div class="vehicle-info-value">
                    {{ $kendaraan->nama_pemilik ?: '-' }}
                </div>
            </div>

            <div class="vehicle-info-item">
                <div class="vehicle-info-label">
                    <i class="bi bi-palette"></i>
                    Warna Kendaraan
                </div>
                <div class="vehicle-info-value">
                    {{ $kendaraan->warna_kendaraan ?: '-' }}
                </div>
            </div>

        </div>

        {{-- FOOTER --}}
        <div class="vehicle-footer">

            <a href="{{ route('kendaraan.index') }}" class="vehicle-back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Daftar
            </a>

            <a href="{{ route('kendaraan.edit', $kendaraan->no_plat_kendaraan) }}"
               class="vehicle-edit">
                <i class="bi bi-pencil-square"></i>
                Edit Kendaraan
            </a>

        </div>

    </div>

</div>

@endsection
