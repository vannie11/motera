
@extends('layouts.app')

@section('title', 'Detail Pendaftaran')
@section('page-title', 'Detail Pendaftaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PENDAFTARAN SERVICE</span>
        <h1>Detail Pendaftaran</h1>
        <p>Lihat informasi lengkap pendaftaran service kendaraan pelanggan MOTÉRA.</p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-clipboard-data"></i>
    </div>
</div>

<div class="customer-form-card">

    <div class="form-card-heading">
        <div>
            <span class="soft-label">SERVICE REGISTRATION</span>
            <h2>Informasi Pendaftaran</h2>
            <p>Detail data pendaftaran service pelanggan.</p>
        </div>

        <i class="bi bi-clipboard-check"></i>
    </div>

    <div class="modern-form-grid">

        <div class="modern-field">
            <label>ID Pendaftaran</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-upc-scan"></i>
                <input type="text"
                       value="{{ $daftarService->id_servis_pelanggan }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>Tanggal Service</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-calendar-event"></i>
                <input type="text"
                       value="{{ \Carbon\Carbon::parse($daftarService->tanggal_servis)->format('d F Y') }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>Nama Pelanggan</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-person"></i>
                <input type="text"
                       value="{{ $daftarService->pelanggan->nama_lengkap ?? '-' }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>ID Pelanggan</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-person-badge"></i>
                <input type="text"
                       value="{{ $daftarService->id_pelanggan }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>Nomor Polisi</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-motorcycle"></i>
                <input type="text"
                       value="{{ $daftarService->no_plat_kendaraan }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>Jenis Kendaraan</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-scooter"></i>
                <input type="text"
                       value="{{ $daftarService->kendaraan->jenis_kendaraan ?? '-' }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>Nama Pemilik Kendaraan</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-person"></i>
                <input type="text"
                       value="{{ $daftarService->kendaraan->nama_pemilik ?? '-' }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field">
            <label>Warna Kendaraan</label>
            <div class="input-icon-wrapper disabled-field">
                <i class="bi bi-palette"></i>
                <input type="text"
                       value="{{ $daftarService->kendaraan->warna_kendaraan ?? '-' }}"
                       readonly>
            </div>
        </div>

        <div class="modern-field full-field">
            <label>Keluhan Kendaraan</label>
            <div class="input-icon-wrapper textarea-wrapper">
                <i class="bi bi-chat-left-text"></i>
                <textarea readonly>{{ $daftarService->keluhan_kendaraan }}</textarea>
            </div>
        </div>

    </div>

    <div class="modern-form-footer">

        <a href="{{ route('daftar-service.index') }}"
           class="cancel-button">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <a href="{{ route('daftar-service.edit', $daftarService->id_servis_pelanggan) }}"
           class="save-customer-button">
            <i class="bi bi-pencil-square"></i>
            Edit Pendaftaran
        </a>

    </div>

</div>

@endsection
