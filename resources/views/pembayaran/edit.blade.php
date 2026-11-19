@extends('layouts.app')

@section('title', 'Edit Pembayaran')
@section('page-title', 'Edit Pembayaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PEMBAYARAN</span>
        <h1>Edit Pembayaran</h1>
        <p>Perbarui informasi transaksi pembayaran service pelanggan MOTÉRA agar data tetap akurat dan terorganisir.</p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-wallet2"></i>
    </div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">

        <div class="side-icon">
            <i class="bi bi-receipt-cutoff"></i>
        </div>

        <h3>Perbarui Transaksi</h3>

        <p>
            Pastikan informasi pembayaran yang diperbarui
            sudah sesuai dengan transaksi service pelanggan.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Periksa ID Service</strong>
                <small>Pastikan transaksi sesuai.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Perbarui Pembayaran</strong>
                <small>Ubah biaya atau metode pembayaran.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Simpan Perubahan</strong>
                <small>Perubahan akan diperbarui sistem.</small>
            </div>
        </div>

        <i class="bi bi-cash-coin side-decoration"></i>

    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">EDIT PAYMENT</span>
                <h2>Informasi Pembayaran</h2>
                <p>Perbarui informasi transaksi berikut.</p>
            </div>

            <i class="bi bi-wallet2"></i>
        </div>

        <form action="{{ route('pembayaran.update', $pembayaran->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="modern-form-grid">

                {{-- ID SERVICE --}}
                <div class="modern-field full-field">
                    <label>ID Service</label>

                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-clipboard-check"></i>

                        <input type="text"
                               value="{{ $pembayaran->id_servis_pelanggan }}"
                               readonly>
                    </div>

                    <small>ID service tidak dapat diubah.</small>
                </div>

                {{-- NAMA PELANGGAN --}}
                <div class="modern-field">
                    <label>Nama Pelanggan</label>

                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-person"></i>

                        <input type="text"
                               value="{{ $pembayaran->daftarService->pelanggan->nama_lengkap ?? '-' }}"
                               readonly>
                    </div>
                </div>

                {{-- NOMOR POLISI --}}
                <div class="modern-field">
                    <label>Nomor Polisi</label>

                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-motorcycle"></i>

                        <input type="text"
                               value="{{ $pembayaran->daftarService->kendaraan->no_plat_kendaraan ?? '-' }}"
                               readonly>
                    </div>
                </div>

                {{-- BIAYA SERVICE --}}
                <div class="modern-field">
                    <label>Biaya Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-cash-stack"></i>

                        <input type="number"
                               name="jumlah_biaya_servis"
                               value="{{ old('jumlah_biaya_servis', $pembayaran->jumlah_biaya_servis) }}"
                               placeholder="Masukkan biaya service"
                               min="0"
                               step="0.01"
                               required>
                    </div>
                </div>

                {{-- JENIS PEMBAYARAN (RADIO BUTTON) --}}
                <div class="modern-field">
                    <label>Jenis Pembayaran</label>

                    <div style="display:flex; gap:15px; padding:12px 15px; background:#F8F9F5; border:1px solid #E8ECE4; border-radius:12px; flex-wrap:wrap;">
                        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
                            <input type="radio"
                                   name="jenis_pembayaran"
                                   value="Cash / Tunai"
                                   {{ old('jenis_pembayaran', $pembayaran->jenis_pembayaran) == 'Cash / Tunai' ? 'checked' : '' }}>
                            Cash / Tunai
                        </label>

                        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
                            <input type="radio"
                                   name="jenis_pembayaran"
                                   value="Non Tunai"
                                   {{ old('jenis_pembayaran', $pembayaran->jenis_pembayaran) == 'Non Tunai' ? 'checked' : '' }}>
                            Non Tunai
                        </label>
                    </div>
                </div>

                {{-- KETERANGAN --}}
                <div class="modern-field full-field">
                    <label>Keterangan</label>

                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-chat-left-text"></i>

                        <textarea name="keterangan"
                                  placeholder="Tambahkan keterangan pembayaran...">{{ old('keterangan', $pembayaran->keterangan) }}</textarea>
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
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection