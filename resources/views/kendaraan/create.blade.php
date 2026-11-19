
@extends('layouts.app')

@section('title', 'Tambah Kendaraan')
@section('page-title', 'Tambah Kendaraan')

@section('content')

<!-- HEADER -->
<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / KENDARAAN</span>
        <h1>Tambah Kendaraan</h1>
        <p>
            Daftarkan kendaraan pelanggan untuk memudahkan
            pengelolaan dan pelayanan service MOTÉRA.
        </p>
    </div>

    <div class="customer-hero-icon">
    <i class="bi bi-scooter"></i>
</div>
</div>

<!-- FORM LAYOUT -->
<div class="customer-form-layout">

    <!-- PANEL INFORMASI -->
    <div class="customer-side-info">

        <div class="side-icon">
            <i class="bi bi-car-front-fill"></i>
        </div>

        <h3>Informasi Kendaraan</h3>

        <p>
            Lengkapi identitas kendaraan dengan benar
            agar data dapat tersimpan dan digunakan
            untuk proses pendaftaran service.
        </p>

        <div class="form-step">
            <span><i class="bi bi-1-circle"></i></span>
            <div>
                <strong>Identitas Kendaraan</strong>
                <small>Nomor polisi dan jenis kendaraan</small>
            </div>
        </div>

        <div class="form-step">
            <span><i class="bi bi-2-circle"></i></span>
            <div>
                <strong>Informasi STNK</strong>
                <small>Nomor STNK dan tahun pembuatan</small>
            </div>
        </div>

        <div class="form-step">
            <span><i class="bi bi-3-circle"></i></span>
            <div>
                <strong>Informasi Pemilik</strong>
                <small>Nama pemilik dan warna kendaraan</small>
            </div>
        </div>

        <i class="bi bi-bicycle side-decoration"></i>

    </div>


    <!-- FORM UTAMA -->
    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">FORM 02</span>
                <h2>Detail Kendaraan</h2>
                <p>Masukkan informasi kendaraan berikut.</p>
            </div>

            <i class="bi bi-clipboard2-check"></i>
        </div>


        <form action="{{ route('kendaraan.store') }}" method="POST">
            @csrf

            <div class="modern-form-grid">

                <!-- NOMOR PLAT -->
                <div class="modern-field">
                    <label>Nomor Polisi <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-credit-card-2-front"></i>
                        <input
                            type="text"
                            name="no_plat_kendaraan"
                            value="{{ old('no_plat_kendaraan') }}"
                            placeholder="Contoh: BL 1234 AB"
                            style="text-transform: uppercase;"
                            required
                        >
                    </div>

                    <small>Masukkan nomor polisi kendaraan.</small>

                    @error('no_plat_kendaraan')
                        <small style="color:#C45F69;">{{ $message }}</small>
                    @enderror
                </div>


                <!-- JENIS KENDARAAN (RADIO BUTTON) -->
<div class="modern-field">
    <label>Jenis Kendaraan <span>*</span></label>

    <div style="display:flex; gap:15px; padding:12px 15px; background:#F8F9F5; border:1px solid #E8ECE4; border-radius:12px;">
        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
            <input type="radio"
                   name="jenis_kendaraan"
                   value="Matic"
                   {{ old('jenis_kendaraan') == 'Matic' ? 'checked' : '' }}
                   required>
            Matic
        </label>

        <label style="display:flex; align-items:center; gap:8px; margin:0; cursor:pointer; font-weight:600; color:#46564A;">
            <input type="radio"
                   name="jenis_kendaraan"
                   value="Manual Transmisi"
                   {{ old('jenis_kendaraan') == 'Manual Transmisi' ? 'checked' : '' }}
                   required>
            Manual Transmisi
        </label>
    </div>

    <small>Pilih jenis transmisi kendaraan.</small>

    @error('jenis_kendaraan')
        <small style="color:#C45F69;">{{ $message }}</small>
    @enderror
</div>


                <!-- NOMOR STNK -->
                <div class="modern-field">
                    <label>Nomor STNK <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-file-earmark-text"></i>

                        <input
                            type="text"
                            name="no_stnk"
                            value="{{ old('no_stnk') }}"
                            placeholder="Masukkan nomor STNK"
                            required
                        >
                    </div>

                    @error('no_stnk')
                        <small style="color:#C45F69;">{{ $message }}</small>
                    @enderror
                </div>


                <!-- TAHUN PEMBUATAN -->
                <div class="modern-field">
                    <label>Tahun Pembuatan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-calendar-event"></i>

                        <input
                            type="number"
                            name="tahun_pembuatan_kendaraan"
                            value="{{ old('tahun_pembuatan_kendaraan') }}"
                            placeholder="Contoh: 2022"
                            min="1900"
                            max="2100"
                            required
                        >
                    </div>

                    @error('tahun_pembuatan_kendaraan')
                        <small style="color:#C45F69;">{{ $message }}</small>
                    @enderror
                </div>


                <!-- NAMA PEMILIK -->
                <div class="modern-field">
                    <label>Nama Pemilik <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-person"></i>

                        <input
                            type="text"
                            name="nama_pemilik"
                            value="{{ old('nama_pemilik') }}"
                            placeholder="Masukkan nama pemilik"
                            required
                        >
                    </div>

                    @error('nama_pemilik')
                        <small style="color:#C45F69;">{{ $message }}</small>
                    @enderror
                </div>


                <!-- WARNA KENDARAAN -->
                <div class="modern-field">
                    <label>Warna Kendaraan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-palette"></i>

                        <input
                            type="text"
                            name="warna_kendaraan"
                            value="{{ old('warna_kendaraan') }}"
                            placeholder="Contoh: Hitam"
                            required
                        >
                    </div>

                    @error('warna_kendaraan')
                        <small style="color:#C45F69;">{{ $message }}</small>
                    @enderror
                </div>

            </div>


            <!-- TOMBOL -->
            <div class="modern-form-footer">

                <a href="{{ route('kendaraan.index') }}"
                   class="cancel-button">
                    <i class="bi bi-arrow-left"></i>
                    Batal
                </a>

                <button type="submit" class="save-customer-button">
                    <i class="bi bi-check-circle"></i>
                    Simpan Kendaraan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
