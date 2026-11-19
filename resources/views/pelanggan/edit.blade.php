
@extends('layouts.app')

@section('title', 'Edit Pelanggan')
@section('page-title', 'Edit Pelanggan')

@section('content')

<style>
    .edit-hero {
        background: linear-gradient(115deg, #E1EDE1, #EDE7F3, #F6E8E9);
        padding: 30px 36px;
        border-radius: 23px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 23px;
    }

    .edit-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        margin: 12px 0 7px;
        color: #34443A;
    }

    .edit-hero p {
        font-size: 12px;
        color: #718075;
        margin: 0;
    }

    .edit-hero-icon {
        width: 75px;
        height: 75px;
        border-radius: 23px;
        background: rgba(255,255,255,.6);
        display: grid;
        place-items: center;
        font-size: 35px;
        color: #657D68;
    }

    .edit-layout {
        display: grid;
        grid-template-columns: 250px minmax(0,1fr);
        gap: 20px;
        align-items: stretch;
    }

    .edit-info {
        background: linear-gradient(150deg,#E8EDE4,#EDE8F3);
        border-radius: 21px;
        padding: 26px 22px;
        position: relative;
        overflow: hidden;
    }

    .edit-info-icon {
        width: 52px;
        height: 52px;
        background: rgba(255,255,255,.65);
        color: #607B65;
        display: grid;
        place-items: center;
        border-radius: 16px;
        font-size: 24px;
        margin-bottom: 22px;
    }

    .edit-info h3 {
        font-size: 17px;
        color: #46564A;
        margin-bottom: 10px;
    }

    .edit-info p {
        font-size: 11px;
        color: #778478;
        line-height: 1.9;
    }

    .edit-info small {
        display: block;
        margin-top: 22px;
        padding: 12px;
        border-radius: 12px;
        background: rgba(255,255,255,.55);
        color: #607B65;
        font-size: 10px;
        line-height: 1.8;
    }

    .edit-form-card {
        background: white;
        border: 1px solid #ECEDE7;
        border-radius: 21px;
        padding: 28px;
        box-shadow: 0 8px 28px rgba(67,85,68,.045);
        min-width: 0;
    }

    .edit-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #EEF0EA;
    }

    .edit-heading h3 {
        font-size: 17px;
        margin: 0 0 6px;
        color: #34443A;
    }

    .edit-heading p {
        font-size: 11px;
        color: #929B92;
        margin: 0;
    }

    .edit-id {
        background: #E8F0E6;
        color: #536F5B;
        padding: 8px 12px;
        border-radius: 9px;
        font-size: 10px;
        font-weight: 800;
        white-space: nowrap;
    }

    .edit-grid {
        display: grid;
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 19px;
    }

    .edit-field.full {
        grid-column: 1 / -1;
    }

    .edit-field label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        color: #48594C;
        margin-bottom: 9px;
    }

    .edit-field label span {
        color: #D58D9A;
    }

    .edit-input {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #F8F9F5;
        border: 1px solid #E8ECE4;
        border-radius: 12px;
        padding: 0 13px;
        transition: .2s;
    }

    .edit-input:focus-within {
        border-color: #9CB69F;
        background: white;
        box-shadow: 0 0 0 4px rgba(168,191,174,.15);
    }

    .edit-input i {
        color: #91A493;
        font-size: 16px;
        flex-shrink: 0;
    }

    .edit-input input,
    .edit-input textarea {
        border: none;
        outline: none;
        background: transparent;
        width: 100%;
        min-width: 0;
        padding: 14px 0;
        font-family: inherit;
        font-size: 12px;
        color: #46564A;
    }

    .edit-input textarea {
        resize: vertical;
        min-height: 105px;
    }

    .edit-input.textarea {
        align-items: flex-start;
    }

    .edit-input.textarea i {
        margin-top: 14px;
    }

    .edit-error {
        color: #B75F65;
        font-size: 10px;
        display: block;
        margin-top: 6px;
    }

    .edit-footer {
        display: flex;
        justify-content: flex-end;
        gap: 11px;
        flex-wrap: wrap;
        border-top: 1px solid #EEF0EA;
        padding-top: 22px;
        margin-top: 27px;
    }

    .edit-button {
        border: none;
        text-decoration: none;
        padding: 12px 17px;
        border-radius: 11px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .edit-cancel {
        background: #F0EDF5;
        color: #81739B;
    }

    .edit-save {
        background: #536F5B;
        color: white;
    }

    .edit-save:hover {
        background: #405C48;
    }

    @media(max-width:900px) {
        .edit-layout {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width:600px) {
        .edit-hero-icon {
            display: none;
        }

        .edit-grid {
            grid-template-columns: 1fr;
        }

        .edit-field.full {
            grid-column: auto;
        }

        .edit-form-card {
            padding: 19px;
        }
    }
</style>

<div class="edit-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PELANGGAN</span>
        <h1>Edit Pelanggan</h1>
        <p>Perbarui informasi pelanggan MOTÉRA dengan mudah.</p>
    </div>

    <div class="edit-hero-icon">
        <i class="bi bi-person-gear"></i>
    </div>
</div>

<div class="edit-layout">

    <div class="edit-info">

        <div class="edit-info-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <h3>Perbarui Data</h3>

        <p>
            Pastikan informasi pelanggan yang diperbarui
            sudah benar agar data dalam sistem MOTÉRA
            tetap akurat dan terorganisir.
        </p>

        <small>
            <i class="bi bi-info-circle"></i>
            ID pelanggan tidak dapat diubah karena merupakan
            identitas unik dalam sistem.
        </small>

    </div>

    <div class="edit-form-card">

        <div class="edit-heading">
            <div>
                <h3>Informasi Pelanggan</h3>
                <p>Periksa dan perbarui informasi berikut.</p>
            </div>

            <span class="edit-id">
                {{ $pelanggan->id_pelanggan }}
            </span>
        </div>

        <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="edit-grid">

                <div class="edit-field">
                    <label>ID Pelanggan</label>

                    <div class="edit-input">
                        <i class="bi bi-upc-scan"></i>
                        <input type="text"
                               value="{{ $pelanggan->id_pelanggan }}"
                               disabled>
                    </div>
                </div>

                <div class="edit-field">
                    <label>Nama Lengkap <span>*</span></label>

                    <div class="edit-input">
                        <i class="bi bi-person"></i>
                        <input type="text"
                               name="nama_lengkap"
                               value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}"
                               placeholder="Masukkan nama lengkap"
                               required>
                    </div>

                    @error('nama_lengkap')
                        <small class="edit-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="edit-field">
                    <label>Nomor HP <span>*</span></label>

                    <div class="edit-input">
                        <i class="bi bi-telephone"></i>
                        <input type="text"
                               name="no_hp"
                               value="{{ old('no_hp', $pelanggan->no_hp) }}"
                               placeholder="Masukkan nomor HP"
                               required>
                    </div>

                    @error('no_hp')
                        <small class="edit-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="edit-field">
                    <label>Pekerjaan <span>*</span></label>

                    <div class="edit-input">
                        <i class="bi bi-briefcase"></i>
                        <input type="text"
                               name="pekerjaan"
                               value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}"
                               placeholder="Masukkan pekerjaan"
                               required>
                    </div>

                    @error('pekerjaan')
                        <small class="edit-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="edit-field full">
                    <label>Alamat Pelanggan <span>*</span></label>

                    <div class="edit-input textarea">
                        <i class="bi bi-geo-alt"></i>
                        <textarea name="alamat_pelanggan"
                                  placeholder="Masukkan alamat lengkap"
                                  required>{{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}</textarea>
                    </div>

                    @error('alamat_pelanggan')
                        <small class="edit-error">{{ $message }}</small>
                    @enderror
                </div>

            </div>

            <div class="edit-footer">

                <a href="{{ route('pelanggan.index') }}"
                   class="edit-button edit-cancel">
                    <i class="bi bi-arrow-left"></i>
                    Batal
                </a>

                <button type="submit" class="edit-button edit-save">
                    <i class="bi bi-check2-circle"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
