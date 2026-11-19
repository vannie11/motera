
@extends('layouts.app')

@section('title', 'Tambah Pelanggan')
@section('page-title', 'Registrasi Pelanggan')

@section('content')

<div class="customer-hero">
    <div>
        <span class="eyebrow">CUSTOMER MANAGEMENT / NEW CUSTOMER</span>
        <h1>Let's welcome a new customer!</h1>
        <p>Lengkapi informasi pelanggan untuk memberikan pelayanan terbaik bersama MOTÉRA.</p>
    </div>
    <div class="customer-hero-icon">
        <i class="bi bi-person-heart"></i>
    </div>
</div>

<div class="customer-form-layout">

    <div class="customer-side-info">
        <div class="side-icon">
            <i class="bi bi-person-plus"></i>
        </div>

        <h3>Customer Profile</h3>
        <p>Informasi pelanggan akan tersimpan secara terintegrasi dengan data kendaraan dan layanan service.</p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Personal Information</strong>
                <small>Identitas dan kontak pelanggan</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Contact Details</strong>
                <small>Alamat dan pekerjaan</small>
            </div>
        </div>

        <div class="side-decoration">
            <i class="bi bi-flower1"></i>
        </div>
    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">NEW REGISTRATION</span>
                <h2>Informasi Pelanggan</h2>
                <p>Isi seluruh kolom yang bertanda bintang (*)</p>
            </div>
            <i class="bi bi-card-checklist"></i>
        </div>

        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <div class="modern-form-grid">

                <div class="modern-field">
                    <label>ID Pelanggan</label>
                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-fingerprint"></i>
                        <input type="text" value="Dibuat otomatis oleh sistem" disabled>
                    </div>
                    <small>ID unik akan diberikan setelah data disimpan.</small>
                </div>

                <div class="modern-field">
                    <label>Nama Lengkap <span>*</span></label>
                    <div class="input-icon-wrapper">
                        <i class="bi bi-person"></i>
                        <input type="text" name="nama_lengkap"
                            value="{{ old('nama_lengkap') }}"
                            placeholder="Contoh: Vannie Zaffira Aranda" required>
                    </div>
                    @error('nama_lengkap') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="modern-field">
                    <label>Nomor Handphone <span>*</span></label>
                    <div class="input-icon-wrapper">
                        <i class="bi bi-telephone"></i>
                        <input type="text" name="no_hp"
                            value="{{ old('no_hp') }}"
                            placeholder="08xxxxxxxxxx" required>
                    </div>
                    @error('no_hp') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="modern-field">
                    <label>Pekerjaan <span>*</span></label>
                    <div class="input-icon-wrapper">
                        <i class="bi bi-briefcase"></i>
                        <input type="text" name="pekerjaan"
                            value="{{ old('pekerjaan') }}"
                            placeholder="Contoh: Mahasiswa" required>
                    </div>
                    @error('pekerjaan') <small class="error">{{ $message }}</small> @enderror
                </div>

                <div class="modern-field full-field">
                    <label>Alamat Lengkap <span>*</span></label>
                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-geo-alt"></i>
                        <textarea name="alamat_pelanggan" rows="4"
                            placeholder="Masukkan alamat lengkap pelanggan..." required>{{ old('alamat_pelanggan') }}</textarea>
                    </div>
                    @error('alamat_pelanggan') <small class="error">{{ $message }}</small> @enderror
                </div>

            </div>

            <div class="modern-form-footer">
                <a href="{{ route('pelanggan.index') }}" class="cancel-button">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

                <button type="submit" class="save-customer-button">
                    <i class="bi bi-check-circle"></i>
                    Simpan Pelanggan
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
