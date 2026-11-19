@extends('layouts.app')

@section('title', 'Tambah Pendaftaran')
@section('page-title', 'Tambah Pendaftaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PENDAFTARAN SERVICE</span>
        <h1>Pendaftaran Service</h1>
        <p>Daftarkan kendaraan pelanggan untuk mendapatkan pelayanan service terbaik dari MOTÉRA.</p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-clipboard2-plus"></i>
    </div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">
        <div class="side-icon">
            <i class="bi bi-tools"></i>
        </div>

        <h3>Service Dimulai di Sini</h3>

        <p>
            Lengkapi informasi pelanggan, kendaraan, dan keluhan
            agar proses pelayanan service dapat dilakukan
            dengan lebih mudah dan terorganisir.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Pilih Pelanggan</strong>
                <small>Tentukan pelanggan terdaftar.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Pilih Kendaraan</strong>
                <small>Tentukan kendaraan yang akan diservis.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Isi Keluhan</strong>
                <small>Jelaskan masalah kendaraan.</small>
            </div>
        </div>

        <i class="bi bi-scooter side-decoration"></i>
    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">REGISTRATION FORM</span>
                <h2>Informasi Pendaftaran</h2>
                <p>Lengkapi seluruh informasi berikut.</p>
            </div>

            <i class="bi bi-clipboard-check"></i>
        </div>

        <form action="{{ route('daftar-service.store') }}" method="POST">
            @csrf

            <div class="modern-form-grid">

                <!-- DROPDOWN ID PELANGGAN -->
                <div class="modern-field">
                    <label>ID Pelanggan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-person-badge"></i>

                        <select name="id_pelanggan" id="select_id_pelanggan" required>
                            <option value="" data-nama="">-- Pilih ID Pelanggan --</option>

                            @foreach($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id_pelanggan }}"
                                        data-nama="{{ $pelanggan->nama_lengkap }}"
                                        {{ old('id_pelanggan') == $pelanggan->id_pelanggan ? 'selected' : '' }}>
                                    {{ $pelanggan->id_pelanggan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <small>Pilih ID pelanggan yang terdaftar.</small>
                </div>

                <!-- NAMA PELANGGAN OTOMATIS -->
                <div class="modern-field">
                    <label>Nama Pelanggan</label>

                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-person"></i>
                        <input type="text"
                               id="auto_nama_pelanggan"
                               placeholder="Muncul otomatis setelah ID dipilih"
                               readonly>
                    </div>
                    <small>Terisi otomatis berdasarkan ID pelanggan.</small>
                </div>

                <div class="modern-field full-field">
                    <label>Nomor Polisi Kendaraan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-motorcycle"></i>

                        <select name="no_plat_kendaraan" required>
                            <option value="">-- Pilih Kendaraan --</option>

                            @foreach($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->no_plat_kendaraan }}"
                                    {{ old('no_plat_kendaraan') == $kendaraan->no_plat_kendaraan ? 'selected' : '' }}>
                                    {{ $kendaraan->no_plat_kendaraan }}
                                    — {{ $kendaraan->jenis_kendaraan }}
                                    ({{ $kendaraan->nama_pemilik }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <small>Pilih kendaraan yang sudah terdaftar di database.</small>
                </div>

                <div class="modern-field full-field">
                    <label>Tanggal Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-calendar-event"></i>

                        <input type="date"
                               name="tanggal_servis"
                               value="{{ old('tanggal_servis', date('Y-m-d')) }}"
                               required>
                    </div>
                </div>

                <div class="modern-field full-field">
                    <label>Keluhan Kendaraan <span>*</span></label>

                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-chat-left-text"></i>

                        <textarea name="keluhan_kendaraan"
                                  placeholder="Jelaskan keluhan atau masalah kendaraan..."
                                  required>{{ old('keluhan_kendaraan') }}</textarea>
                    </div>

                    <small>Jelaskan keluhan kendaraan secara lengkap.</small>
                </div>

            </div>

            <div class="modern-form-footer">

                <a href="{{ route('daftar-service.index') }}"
                   class="cancel-button">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

                <button type="submit" class="save-customer-button">
                    <i class="bi bi-check2-circle"></i>
                    Simpan Pendaftaran
                </button>

            </div>

        </form>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectPelanggan = document.getElementById('select_id_pelanggan');
        const inputNama = document.getElementById('auto_nama_pelanggan');

        function updateNamaPelanggan() {
            const selectedOption = selectPelanggan.options[selectPelanggan.selectedIndex];
            inputNama.value = selectedOption ? (selectedOption.getAttribute('data-nama') || '') : '';
        }

        selectPelanggan.addEventListener('change', updateNamaPelanggan);
        updateNamaPelanggan();
    });
</script>

@endsection