
@extends('layouts.app')

@section('title', 'Detail Pelanggan')
@section('page-title', 'Detail Pelanggan')

@section('content')

<style>
    .detail-hero {
        background: linear-gradient(115deg, #E1EDE1, #EDE7F3, #F6E8E9);
        padding: 30px 36px;
        border-radius: 23px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 23px;
    }

    .detail-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        margin: 12px 0 7px;
        color: #34443A;
    }

    .detail-hero p {
        font-size: 12px;
        color: #718075;
        margin: 0;
    }

    .detail-hero-icon {
        width: 75px;
        height: 75px;
        border-radius: 23px;
        background: rgba(255,255,255,.6);
        display: grid;
        place-items: center;
        font-size: 35px;
        color: #657D68;
    }

    .detail-card {
        background: white;
        border: 1px solid #ECEDE7;
        border-radius: 22px;
        padding: 28px;
        box-shadow: 0 8px 28px rgba(67,85,68,.045);
    }

    .detail-profile {
        display: flex;
        align-items: center;
        gap: 18px;
        padding-bottom: 25px;
        border-bottom: 1px solid #EEF0EA;
        margin-bottom: 25px;
    }

    .detail-avatar {
        width: 65px;
        height: 65px;
        border-radius: 20px;
        background: #E3EDE0;
        color: #536F5B;
        display: grid;
        place-items: center;
        font-size: 29px;
    }

    .detail-profile h2 {
        font-size: 20px;
        margin: 0 0 7px;
        color: #34443A;
    }

    .detail-profile p {
        font-size: 11px;
        color: #929B92;
        margin: 0;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 17px;
    }

    .detail-item {
        background: #F8F9F5;
        padding: 19px;
        border-radius: 14px;
        min-width: 0;
    }

    .detail-item.full {
        grid-column: 1 / -1;
    }

    .detail-item label {
        display: block;
        color: #929B92;
        font-size: 10px;
        font-weight: 700;
        margin-bottom: 9px;
        letter-spacing: .5px;
    }

    .detail-item p {
        font-size: 13px;
        color: #46564A;
        font-weight: 700;
        margin: 0;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .detail-item i {
        color: #91A493;
        margin-right: 7px;
    }

    .detail-footer {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 27px;
        padding-top: 22px;
        border-top: 1px solid #EEF0EA;
    }

    .detail-button {
        text-decoration: none;
        padding: 12px 17px;
        border-radius: 11px;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .detail-back {
        background: #F0EDF5;
        color: #81739B;
    }

    .detail-edit {
        background: #536F5B;
        color: white;
    }

    .detail-edit:hover {
        background: #405C48;
        color: white;
    }

    @media(max-width:600px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-item.full {
            grid-column: auto;
        }

        .detail-card {
            padding: 19px;
        }

        .detail-hero-icon {
            display: none;
        }
    }
</style>

<div class="detail-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PELANGGAN</span>
        <h1>Detail Pelanggan</h1>
        <p>Informasi lengkap pelanggan yang terdaftar di MOTÉRA.</p>
    </div>

    <div class="detail-hero-icon">
        <i class="bi bi-person-vcard"></i>
    </div>
</div>

<div class="detail-card">

    <div class="detail-profile">
        <div class="detail-avatar">
            <i class="bi bi-person-fill"></i>
        </div>

        <div>
            <h2>{{ $pelanggan->nama_lengkap }}</h2>
            <p>ID Pelanggan: {{ $pelanggan->id_pelanggan }}</p>
        </div>
    </div>

    <div class="detail-grid">

        <div class="detail-item">
            <label>ID PELANGGAN</label>
            <p>
                <i class="bi bi-upc-scan"></i>
                {{ $pelanggan->id_pelanggan }}
            </p>
        </div>

        <div class="detail-item">
            <label>NAMA LENGKAP</label>
            <p>
                <i class="bi bi-person"></i>
                {{ $pelanggan->nama_lengkap }}
            </p>
        </div>

        <div class="detail-item">
            <label>NOMOR HANDPHONE</label>
            <p>
                <i class="bi bi-telephone"></i>
                {{ $pelanggan->no_hp }}
            </p>
        </div>

        <div class="detail-item">
            <label>PEKERJAAN</label>
            <p>
                <i class="bi bi-briefcase"></i>
                {{ $pelanggan->pekerjaan }}
            </p>
        </div>

        <div class="detail-item full">
            <label>ALAMAT PELANGGAN</label>
            <p>
                <i class="bi bi-geo-alt"></i>
                {{ $pelanggan->alamat_pelanggan }}
            </p>
        </div>

    </div>

    <div class="detail-footer">

        <a href="{{ route('pelanggan.index') }}"
           class="detail-button detail-back">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

        <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}"
           class="detail-button detail-edit">
            <i class="bi bi-pencil-square"></i>
            Edit Pelanggan
        </a>

    </div>

</div>

@endsection
