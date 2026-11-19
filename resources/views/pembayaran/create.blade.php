@extends('layouts.app')

@section('title', 'Tambah Pembayaran')
@section('page-title', 'Tambah Pembayaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PEMBAYARAN</span>
        <h1>Tambah Pembayaran</h1>
        <p>Catat transaksi pembayaran service pelanggan MOTÉRA dengan mudah, aman, dan terorganisir.</p>
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

        <h3>Pembayaran Service</h3>

        <p>
            Lengkapi informasi pembayaran berdasarkan data service
            yang telah selesai dikerjakan agar transaksi tercatat
            dengan baik di sistem MOTÉRA.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Pilih ID Service</strong>
                <small>Pilih service yang akan dibayar.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Masukkan Biaya</strong>
                <small>Isi total biaya service pelanggan.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Catat Pembayaran</strong>
                <small>Simpan transaksi ke dalam sistem.</small>
            </div>
        </div>

        <i class="bi bi-cash-coin side-decoration"></i>

    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">PAYMENT FORM</span>
                <h2>Informasi Pembayaran</h2>
                <p>Lengkapi seluruh informasi transaksi berikut.</p>
            </div>

            <i class="bi bi-wallet2"></i>
        </div>

        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf

            <div class="modern-form-grid">

                {{-- ID SERVICE --}}
                <div class="modern-field full-field">
                    <label>ID Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-clipboard-check"></i>

                        <select name="id_servis_pelanggan" required>
                            <option value="">-- Pilih ID Service --</option>

                            @foreach($daftarServices as $service)
                                <option
                                    value="{{ $service->id_servis_pelanggan }}"
                                    {{ old('id_servis_pelanggan') == $service->id_servis_pelanggan ? 'selected' : '' }}>

                                    {{ $service->id_servis_pelanggan }}
                                    — {{ $service->pelanggan->nama_lengkap ?? 'Pelanggan' }}
                                    ({{ $service->kendaraan->no_plat_kendaraan ?? '-' }})

                                </option>
                            @endforeach
                        </select>
                    </div>

                    <small>Pilih service yang sudah memiliki data pengerjaan dan belum memiliki pembayaran.</small>
                </div>

                {{-- BIAYA SERVICE --}}
                <div class="modern-field">
                    <label>Biaya Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-cash-stack"></i>

                        <input
                            type="number"
                            name="jumlah_biaya_servis"
                            value="{{ old('jumlah_biaya_servis') }}"
                            placeholder="Contoh: 150000"
                            min="0"
                            step="0.01"
                            required>
                    </div>

                    <small>Masukkan total biaya service dalam rupiah.</small>
                </div>

                {{-- JENIS PEMBAYARAN (RADIO BUTTON) --}}
                <div class="modern-field">
                    <label>Jenis Pembayaran</label>

                    <div style="display:flex; gap:15px; padding:12px 15px; background:#F8F9F5; border:1px solid #E8ECE4; border-radius:12px; flex-wrap:wrap;">
                        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
                            <input type="radio"
                                   name="jenis_pembayaran"
                                   value="Cash / Tunai"
                                   {{ old('jenis_pembayaran') == 'Cash / Tunai' ? 'checked' : '' }}>
                            Cash / Tunai
                        </label>

                        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
                            <input type="radio"
                                   name="jenis_pembayaran"
                                   value="Non Tunai"
                                   {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }}>
                            Non Tunai
                        </label>
                    </div>

                    <small>Pilih metode pembayaran yang digunakan.</small>
                </div>

                {{-- KETERANGAN --}}
                <div class="modern-field full-field">
                    <label>Keterangan</label>

                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-chat-left-text"></i>

                        <textarea
                            name="keterangan"
                            placeholder="Tambahkan keterangan pembayaran jika diperlukan...">{{ old('keterangan') }}</textarea>
                    </div>

                    <small>Kolom ini bersifat opsional.</small>
                </div>

            </div>

            <div class="modern-form-footer">

                <a href="{{ route('pembayaran.index') }}"
                   class="cancel-button">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="save-customer-button">
                    <i class="bi bi-check2-circle"></i>
                    Simpan Pembayaran
                </button>

            </div>

        </form>

    </div>

</div>

@endsection