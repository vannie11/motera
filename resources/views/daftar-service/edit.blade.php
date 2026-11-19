
@extends('layouts.app')

@section('title', 'Edit Pendaftaran')
@section('page-title', 'Edit Pendaftaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PENDAFTARAN SERVICE</span>
        <h1>Edit Pendaftaran Service</h1>
        <p>Perbarui informasi pendaftaran service agar data pelanggan dan kendaraan tetap akurat.</p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-clipboard2-check"></i>
    </div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">
        <div class="side-icon">
            <i class="bi bi-tools"></i>
        </div>

        <h3>Perbarui Pendaftaran</h3>

        <p>
            Pastikan seluruh informasi pendaftaran sudah sesuai
            sebelum menyimpan perubahan.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Periksa Pelanggan</strong>
                <small>Pastikan identitas pelanggan benar.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Periksa Kendaraan</strong>
                <small>Pastikan kendaraan sesuai.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Simpan Perubahan</strong>
                <small>Perbarui data pendaftaran.</small>
            </div>
        </div>

        <i class="bi bi-scooter side-decoration"></i>
    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">EDIT FORM</span>
                <h2>Informasi Pendaftaran</h2>
                <p>Perbarui informasi berikut.</p>
            </div>

            <i class="bi bi-clipboard-check"></i>
        </div>

        <form action="{{ route('daftar-service.update', $daftarService->id_servis_pelanggan) }}"
              method="POST">

            @csrf
            @method('PUT')

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
                    <label>Tanggal Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-calendar-event"></i>
                        <input type="date"
                               name="tanggal_servis"
                               value="{{ old('tanggal_servis', \Carbon\Carbon::parse($daftarService->tanggal_servis)->format('Y-m-d')) }}"
                               required>
                    </div>
                </div>

                <div class="modern-field full-field">
                    <label>Nama Pelanggan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-person"></i>

                        <select name="id_pelanggan" required>
                            <option value="">-- Pilih Pelanggan --</option>

                            @foreach($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id_pelanggan }}"
                                    {{ old('id_pelanggan', $daftarService->id_pelanggan) == $pelanggan->id_pelanggan ? 'selected' : '' }}>
                                    {{ $pelanggan->nama_lengkap }}
                                    ({{ $pelanggan->id_pelanggan }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modern-field full-field">
                    <label>Nomor Polisi Kendaraan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-motorcycle"></i>

                        <select name="no_plat_kendaraan" required>
                            <option value="">-- Pilih Kendaraan --</option>

                            @foreach($kendaraans as $kendaraan)
                                <option value="{{ $kendaraan->no_plat_kendaraan }}"
                                    {{ old('no_plat_kendaraan', $daftarService->no_plat_kendaraan) == $kendaraan->no_plat_kendaraan ? 'selected' : '' }}>
                                    {{ $kendaraan->no_plat_kendaraan }}
                                    — {{ $kendaraan->jenis_kendaraan }}
                                    ({{ $kendaraan->nama_pemilik }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modern-field full-field">
                    <label>Keluhan Kendaraan <span>*</span></label>

                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-chat-left-text"></i>

                        <textarea name="keluhan_kendaraan"
                                  placeholder="Jelaskan keluhan kendaraan..."
                                  required>{{ old('keluhan_kendaraan', $daftarService->keluhan_kendaraan) }}</textarea>
                    </div>
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
                    Simpan Perubahan
                </button>

            </div>

        </form>
    </div>

</div>

@endsection
