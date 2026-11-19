
@extends('layouts.app')

@section('title', 'Detail Data Service')
@section('page-title', 'Detail Data Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / DATA SERVICE</span>
        <h1>Detail Pengerjaan Service</h1>
        <p>
            Informasi lengkap mengenai pengerjaan service kendaraan
            pelanggan MOTÉRA.
        </p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-tools"></i>
    </div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">

        <div class="side-icon">
            <i class="bi bi-clipboard2-check"></i>
        </div>

        <h3>Informasi Service</h3>

        <p>
            Halaman ini menampilkan informasi pengerjaan,
            mekanik, estimasi biaya, serta sparepart yang
            digunakan selama proses service.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Data Pendaftaran</strong>
                <small>Identitas pelanggan dan kendaraan.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Pengerjaan</strong>
                <small>Informasi mekanik dan service.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Estimasi Biaya</strong>
                <small>Perkiraan biaya pengerjaan.</small>
            </div>
        </div>

        <i class="bi bi-wrench-adjustable side-decoration"></i>

    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">SERVICE DETAILS</span>
                <h2>Informasi Pengerjaan</h2>
                <p>Rincian data service kendaraan.</p>
            </div>

            <i class="bi bi-clipboard2-pulse"></i>
        </div>

        <div class="modern-form-grid">

            <div class="modern-field">
                <label>ID Service</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-upc-scan"></i>
                    <input type="text"
                           value="{{ $dataService->id_servis_pelanggan }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Nama Mekanik</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-person-gear"></i>
                    <input type="text"
                           value="{{ $dataService->nama_mekanik }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Nama Pelanggan</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-person"></i>
                    <input type="text"
                           value="{{ $dataService->daftarService->pelanggan->nama_lengkap ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Nomor Polisi</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-motorcycle"></i>
                    <input type="text"
                           value="{{ $dataService->daftarService->kendaraan->no_plat_kendaraan ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Jenis Kendaraan</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-car-front"></i>
                    <input type="text"
                           value="{{ $dataService->daftarService->kendaraan->jenis_kendaraan ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Tanggal Service</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-calendar-event"></i>
                    <input type="text"
                           value="{{ $dataService->daftarService->tanggal_servis ? \Carbon\Carbon::parse($dataService->daftarService->tanggal_servis)->format('d-m-Y') : '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field full-field">
                <label>Estimasi Biaya Service</label>
                <div class="input-icon-wrapper disabled-field">
                    <i class="bi bi-cash-stack"></i>
                    <input type="text"
                           value="Rp {{ number_format((float) $dataService->estimasi_service, 0, ',', '.') }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field full-field">
                <label>Sparepart Pengganti</label>
                <div class="input-icon-wrapper textarea-wrapper disabled-field">
                    <i class="bi bi-gear"></i>
                    <textarea readonly>{{ $dataService->sparepart_pengganti ?: 'Tidak ada sparepart pengganti.' }}</textarea>
                </div>
            </div>

            <div class="modern-field full-field">
                <label>Keluhan Kendaraan</label>
                <div class="input-icon-wrapper textarea-wrapper disabled-field">
                    <i class="bi bi-chat-left-text"></i>
                    <textarea readonly>{{ $dataService->daftarService->keluhan_kendaraan ?? '-' }}</textarea>
                </div>
            </div>

        </div>

        <div class="modern-form-footer">

            <a href="{{ route('data-service.index') }}"
               class="cancel-button">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <a href="{{ route('data-service.edit', $dataService->id) }}"
               class="save-customer-button">
                <i class="bi bi-pencil-square"></i>
                Edit Data
            </a>

        </div>

    </div>

</div>

@endsection
