
@extends('layouts.app')

@section('title', 'Detail Pembayaran')
@section('page-title', 'Detail Pembayaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PEMBAYARAN</span>
        <h1>Detail Pembayaran</h1>
        <p>Lihat informasi lengkap transaksi pembayaran service pelanggan MOTÉRA.</p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-wallet2"></i>
    </div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">

        <div class="side-icon">
            <i class="bi bi-receipt"></i>
        </div>

        <h3>Informasi Transaksi</h3>

        <p>
            Halaman ini menampilkan rincian pembayaran
            berdasarkan service kendaraan yang telah dikerjakan.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>ID Service</strong>
                <small>{{ $pembayaran->id_servis_pelanggan }}</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Nama Pelanggan</strong>
                <small>{{ $pembayaran->daftarService->pelanggan->nama_lengkap ?? '-' }}</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Metode Pembayaran</strong>
                <small>{{ $pembayaran->jenis_pembayaran ?? 'Belum ditentukan' }}</small>
            </div>
        </div>

        <i class="bi bi-cash-coin side-decoration"></i>

    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">PAYMENT DETAILS</span>
                <h2>Informasi Pembayaran</h2>
                <p>Rincian transaksi pembayaran service pelanggan.</p>
            </div>

            <i class="bi bi-wallet2"></i>
        </div>

        <div class="modern-form-grid">

            <div class="modern-field">
                <label>ID Service</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-clipboard-check"></i>
                    <input type="text"
                           value="{{ $pembayaran->id_servis_pelanggan }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Nama Pelanggan</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-person"></i>
                    <input type="text"
                           value="{{ $pembayaran->daftarService->pelanggan->nama_lengkap ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Nomor Polisi</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-motorcycle"></i>
                    <input type="text"
                           value="{{ $pembayaran->daftarService->kendaraan->no_plat_kendaraan ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Jenis Kendaraan</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-scooter"></i>
                    <input type="text"
                           value="{{ $pembayaran->daftarService->kendaraan->jenis_kendaraan ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Biaya Service</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-cash-stack"></i>
                    <input type="text"
                           value="Rp {{ number_format($pembayaran->jumlah_biaya_servis, 0, ',', '.') }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field">
                <label>Jenis Pembayaran</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-credit-card"></i>
                    <input type="text"
                           value="{{ $pembayaran->jenis_pembayaran ?? '-' }}"
                           readonly>
                </div>
            </div>

            <div class="modern-field full-field">
                <label>Keterangan</label>
                <div class="input-icon-wrapper textarea-wrapper">
                    <i class="bi bi-chat-left-text"></i>
                    <textarea readonly>{{ $pembayaran->keterangan ?? 'Tidak ada keterangan.' }}</textarea>
                </div>
            </div>

        </div>

        <div class="modern-form-footer">

            <a href="{{ route('pembayaran.index') }}"
               class="cancel-button">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

            <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
               class="save-customer-button"
               style="text-decoration:none;">
                <i class="bi bi-pencil-square"></i>
                Edit Pembayaran
            </a>

        </div>

    </div>

</div>

@endsection
