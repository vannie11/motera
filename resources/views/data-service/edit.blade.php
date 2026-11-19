
@extends('layouts.app')

@section('title', 'Edit Data Service')
@section('page-title', 'Edit Data Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / DATA SERVICE</span>
        <h1>Edit Informasi Service</h1>
        <p>Perbarui informasi pengerjaan service agar data pelayanan MOTÉRA tetap akurat dan terorganisir.</p>
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

        <h3>Perbarui Data</h3>

        <p>
            Pastikan informasi pengerjaan service sudah sesuai,
            mulai dari estimasi biaya hingga sparepart yang digunakan.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Periksa Pendaftaran</strong>
                <small>Pastikan identitas service sesuai.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Perbarui Pengerjaan</strong>
                <small>Sesuaikan informasi service.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Simpan Perubahan</strong>
                <small>Perubahan akan disimpan sistem.</small>
            </div>
        </div>

        <i class="bi bi-gear-wide-connected side-decoration"></i>

    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">EDIT FORM</span>
                <h2>Informasi Pengerjaan</h2>
                <p>Perbarui kolom informasi berikut.</p>
            </div>

            <i class="bi bi-wrench-adjustable"></i>
        </div>

        <form action="{{ route('data-service.update', $dataService->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="modern-form-grid">

                <div class="modern-field full-field">
                    <label>ID Pendaftaran Service</label>

                    <div class="input-icon-wrapper disabled-field">
                        <i class="bi bi-upc-scan"></i>

                        <input type="text"
                               value="{{ $dataService->id_servis_pelanggan }}"
                               readonly>
                    </div>

                    <small>ID pendaftaran tidak dapat diubah.</small>
                </div>

                <div class="modern-field full-field">
                    <label>Estimasi Biaya Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-cash-stack"></i>

                        <input type="number"
                               name="estimasi_service"
                               value="{{ old('estimasi_service', $dataService->estimasi_service) }}"
                               placeholder="Contoh: 150000"
                               min="0"
                               step="0.01"
                               required>
                    </div>

                    <small>Masukkan estimasi biaya pengerjaan service.</small>
                </div>

                <div class="modern-field full-field">
                    <label>Nama Mekanik <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-person-gear"></i>

                        <input type="text"
                               name="nama_mekanik"
                               value="{{ old('nama_mekanik', $dataService->nama_mekanik) }}"
                               placeholder="Masukkan nama mekanik"
                               required>
                    </div>
                </div>

                <div class="modern-field full-field">
                    <label>Sparepart Pengganti</label>

                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-box-seam"></i>

                        <textarea name="sparepart_pengganti"
                                  placeholder="Masukkan sparepart yang digunakan atau diganti...">{{ old('sparepart_pengganti', $dataService->sparepart_pengganti) }}</textarea>
                    </div>

                    <small>
                        Kosongkan jika tidak ada sparepart yang diganti.
                    </small>
                </div>

            </div>

            <div class="modern-form-footer">

                <a href="{{ route('data-service.index') }}"
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
