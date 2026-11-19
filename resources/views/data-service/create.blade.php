@extends('layouts.app')

@section('title', 'Tambah Data Service')
@section('page-title', 'Tambah Data Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / DATA SERVICE</span>
        <h1>Catat Pengerjaan Service</h1>
        <p>
            Masukkan informasi pengerjaan kendaraan pelanggan
            agar proses service MOTÉRA tercatat dengan rapi.
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

        <h3>Informasi Pengerjaan</h3>

        <p>
            Lengkapi informasi pengerjaan kendaraan untuk
            membantu pencatatan biaya, mekanik, dan sparepart.
        </p>

        <div class="form-step">
            <span>01</span>
            <div>
                <strong>Pilih Pendaftaran</strong>
                <small>Pilih ID pendaftaran pelanggan.</small>
            </div>
        </div>

        <div class="form-step">
            <span>02</span>
            <div>
                <strong>Isi Estimasi Biaya</strong>
                <small>Masukkan estimasi biaya service.</small>
            </div>
        </div>

        <div class="form-step">
            <span>03</span>
            <div>
                <strong>Catat Pengerjaan</strong>
                <small>Masukkan mekanik dan sparepart.</small>
            </div>
        </div>

        <i class="bi bi-wrench-adjustable side-decoration"></i>

    </div>

    <div class="customer-form-card">

        <div class="form-card-heading">
            <div>
                <span class="soft-label">SERVICE FORM</span>
                <h2>Detail Pengerjaan</h2>
                <p>Lengkapi seluruh informasi yang diperlukan.</p>
            </div>

            <i class="bi bi-gear-wide-connected"></i>
        </div>

        <form action="{{ route('data-service.store') }}" method="POST">

            @csrf

            <div class="modern-form-grid">

                <div class="modern-field full-field">
                    <label>ID Servis Pelanggan <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-clipboard-data"></i>

                        <select name="id_servis_pelanggan" id="select_id_servis" required>
                            <option value="" data-keluhan="">-- Pilih ID Servis Pelanggan --</option>

                            @foreach($daftarServices as $item)
                                <option
                                    value="{{ $item->id_servis_pelanggan }}"
                                    data-keluhan="{{ $item->keluhan_kendaraan }}"
                                    {{ old('id_servis_pelanggan') == $item->id_servis_pelanggan ? 'selected' : '' }}>

                                    {{ $item->id_servis_pelanggan }}
                                    — {{ $item->pelanggan->nama_lengkap ?? 'Pelanggan' }}
                                    — {{ $item->kendaraan->no_plat_kendaraan ?? '-' }}

                                </option>
                            @endforeach
                        </select>
                    </div>

                    <small>
                        Hanya pendaftaran yang belum memiliki data pengerjaan
                        yang ditampilkan.
                    </small>
                </div>

                <div class="modern-field full-field">
                    <label>Keluhan Kendaraan</label>

                    <div class="input-icon-wrapper textarea-wrapper disabled-field">
                        <i class="bi bi-chat-left-text"></i>

                        <textarea
                            id="auto_keluhan_kendaraan"
                            placeholder="Keluhan kendaraan muncul otomatis setelah ID servis dipilih..."
                            readonly></textarea>
                    </div>

                    <small>
                        Muncul otomatis berdasarkan ID servis pelanggan yang dipilih.
                    </small>
                </div>

                <div class="modern-field">
                    <label>Estimasi Biaya Service <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-cash-coin"></i>

                        <input
                            type="number"
                            name="estimasi_service"
                            value="{{ old('estimasi_service') }}"
                            placeholder="Contoh: 150000"
                            min="0"
                            step="0.01"
                            required>
                    </div>

                    <small>Masukkan estimasi biaya dalam rupiah.</small>
                </div>

                <div class="modern-field">
                    <label>Nama Mekanik <span>*</span></label>

                    <div class="input-icon-wrapper">
                        <i class="bi bi-person-gear"></i>

                        <input
                            type="text"
                            name="nama_mekanik"
                            value="{{ old('nama_mekanik') }}"
                            placeholder="Masukkan nama mekanik"
                            required>
                    </div>
                </div>

                <div class="modern-field full-field">
                    <label>Sparepart Pengganti</label>

                    <div class="input-icon-wrapper textarea-wrapper">
                        <i class="bi bi-box-seam"></i>

                        <textarea
                            name="sparepart_pengganti"
                            placeholder="Tuliskan sparepart yang diganti (jika ada)...">{{ old('sparepart_pengganti') }}</textarea>
                    </div>

                    <small>
                        Kosongkan apabila tidak ada sparepart yang diganti.
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
                    Simpan Data Service
                </button>

            </div>

        </form>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectServis = document.getElementById('select_id_servis');
        const textareaKeluhan = document.getElementById('auto_keluhan_kendaraan');

        function updateKeluhan() {
            const selectedOption = selectServis.options[selectServis.selectedIndex];
            textareaKeluhan.value = selectedOption ? (selectedOption.getAttribute('data-keluhan') || '') : '';
        }

        selectServis.addEventListener('change', updateKeluhan);
        updateKeluhan();
    });
</script>

@endsection