
@extends('layouts.app')

@section('title', 'Edit Kendaraan')
@section('page-title', 'Edit Data Kendaraan')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / KENDARAAN</span>
        <h1>Edit Informasi Kendaraan</h1>
        <p>Perbarui informasi kendaraan yang telah terdaftar di MOTÉRA agar data tetap akurat dan terorganisir.</p>
    </div>

  <div class="customer-hero-icon">
    <i class="bi bi-motorcycle"></i>
</div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">
       <div class="side-icon">
    <i class="bi bi-clipboard2-check"></i>
</div>

        <h3>Perbarui Data</h3>

        <p>
            Pastikan informasi kendaraan yang diperbarui sudah benar.
            Data ini digunakan untuk mendukung proses pendaftaran dan
            pelayanan service.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Periksa Informasi</strong>
                <small>Pastikan data kendaraan sesuai.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Perbarui Data</strong>
                <small>Ubah informasi yang diperlukan.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Simpan Perubahan</strong>
                <small>Data akan diperbarui oleh sistem.</small>
            </div>
        </div>

        <i class="bi bi-scooter side-decoration"></i>
    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">EDIT FORM</span>
                <h2>Informasi Kendaraan</h2>
                <p>Perbarui kolom informasi berikut.</p>
            </div>

            <i class="bi bi-car-front"></i>
        </div>

        <form action="{{ route('kendaraan.update', $kendaraan->no_plat_kendaraan) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="modern-form-grid">

                <div class="modern-field">
                    <label>Nomor Polisi <span>*</span></label>

                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-card-text"></i>
                        <input type="text"
       name="no_plat_kendaraan"
       value="{{ $kendaraan->no_plat_kendaraan }}"
       readonly>
                    </div>

                    <small>Nomor polisi menjadi identitas utama kendaraan.</small>
                </div>

                <div class="modern-field">
    <label>Jenis Kendaraan <span>*</span></label>

    <div style="display:flex; gap:15px; padding:12px 15px; background:#F8F9F5; border:1px solid #E8ECE4; border-radius:12px;">
        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
            <input type="radio"
                   name="jenis_kendaraan"
                   value="Matic"
                   {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Matic' ? 'checked' : '' }}
                   required>
            Matic
        </label>

        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
            <input type="radio"
                   name="jenis_kendaraan"
                   value="Manual Transmisi"
                   {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Manual Transmisi' ? 'checked' : '' }}
                   required>
            Manual Transmisi
        </label>
    </div>
</div>

                <div class="modern-field">
                    <label>Nomor STNK <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-file-earmark-text"></i>
                        <input type="text"
                               name="no_stnk"
                               value="{{ old('no_stnk', $kendaraan->no_stnk) }}"
                               placeholder="Masukkan nomor STNK"
                               required>
                    </div>
                </div>

                <div class="modern-field">
                    <label>Tahun Pembuatan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-calendar-event"></i>
                        <input type="number"
                               name="tahun_pembuatan_kendaraan"
                               value="{{ old('tahun_pembuatan_kendaraan', $kendaraan->tahun_pembuatan_kendaraan) }}"
                               placeholder="Contoh: 2022"
                               min="1900"
                               max="{{ date('Y') + 1 }}"
                               required>
                    </div>
                </div>

                <div class="modern-field">
                    <label>Nama Pemilik <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-person"></i>
                        <input type="text"
                               name="nama_pemilik"
                               value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}"
                               placeholder="Masukkan nama pemilik"
                               required>
                    </div>
                </div>

                <div class="modern-field">
                    <label>Warna Kendaraan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-palette"></i>
                        <input type="text"
                               name="warna_kendaraan"
                               value="{{ old('warna_kendaraan', $kendaraan->warna_kendaraan) }}"
                               placeholder="Contoh: Hitam"
                               required>
                    </div>
                </div>

            </div>

            <div class="modern-form-footer">

                <a href="{{ route('kendaraan.index') }}"
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
