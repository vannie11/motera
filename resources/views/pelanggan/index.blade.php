
@extends('layouts.app')

@section('title', 'Data Pelanggan')
@section('page-title', 'Data Pelanggan')

@section('content')

<style>
    .customer-page {
        width: 100%;
    }

    .customer-page-hero {
        background: linear-gradient(115deg, #E1EDE1, #EDE7F3, #F6E8E9);
        padding: 32px 38px;
        border-radius: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        overflow: hidden;
    }

    .customer-page-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: 29px;
        margin: 13px 0 8px;
        color: #34443A;
    }

    .customer-page-hero p {
        font-size: 13px;
        color: #718075;
        line-height: 1.8;
        margin: 0;
        max-width: 520px;
    }

    .customer-page-hero-icon {
        width: 85px;
        height: 85px;
        border-radius: 27px;
        background: rgba(255,255,255,.6);
        display: grid;
        place-items: center;
        font-size: 40px;
        color: #657D68;
        flex-shrink: 0;
    }

    .customer-summary {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 17px;
        margin-bottom: 23px;
    }

    .customer-summary-card {
        background: white;
        border: 1px solid #ECEDE7;
        border-radius: 19px;
        padding: 21px 24px;
        display: flex;
        align-items: center;
        gap: 17px;
        box-shadow: 0 8px 28px rgba(67,85,68,.04);
    }

    .customer-summary-icon {
        width: 49px;
        height: 49px;
        border-radius: 15px;
        display: grid;
        place-items: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .customer-summary-card h3 {
        font-size: 25px;
        margin: 0 0 4px;
        color: #34443A;
    }

    .customer-summary-card p {
        font-size: 11px;
        color: #929B92;
        margin: 0;
    }

    .customer-list-panel {
        background: white;
        border: 1px solid #ECEDE7;
        border-radius: 22px;
        padding: 26px;
        box-shadow: 0 8px 28px rgba(67,85,68,.045);
    }

    .customer-list-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .customer-list-heading h3 {
        font-size: 17px;
        margin: 0;
        color: #34443A;
    }

    .customer-list-heading p {
        font-size: 11px;
        color: #929B92;
        margin: 6px 0 0;
    }

    .customer-add-button {
        background: #536F5B;
        color: white;
        text-decoration: none;
        padding: 12px 17px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .2s;
    }

    .customer-add-button:hover {
        background: #405C48;
        color: white;
        transform: translateY(-2px);
    }

    .customer-search {
        display: flex;
        gap: 10px;
        margin-bottom: 23px;
        flex-wrap: wrap;
    }

    .customer-search-input {
        position: relative;
        flex: 1;
        min-width: 200px;
    }

    .customer-search-input i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #91A493;
        font-size: 15px;
    }

    .customer-search-input input {
        width: 100%;
        padding: 13px 15px 13px 42px;
        border: 1px solid #E8ECE4;
        border-radius: 12px;
        background: #F8F9F5;
        outline: none;
        font-family: inherit;
        font-size: 12px;
        color: #46564A;
    }

    .customer-search-input input:focus {
        border-color: #9CB69F;
        background: white;
        box-shadow: 0 0 0 4px rgba(168,191,174,.13);
    }

    .customer-search-button,
    .customer-reset-button {
        padding: 12px 17px;
        border-radius: 12px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        cursor: pointer;
        border: none;
    }

    .customer-search-button {
        background: #536F5B;
        color: white;
    }

    .customer-reset-button {
        background: #F0EDF5;
        color: #81739B;
    }

    .customer-table-wrapper {
        overflow-x: auto;
        border: 1px solid #EEF0EA;
        border-radius: 14px;
    }

    .customer-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
        font-size: 12px;
    }

    .customer-table thead {
        background: #F3F5EF;
    }

    .customer-table th {
        padding: 16px 15px;
        text-align: left;
        color: #718074;
        font-size: 10px;
        letter-spacing: .5px;
        white-space: nowrap;
    }

    .customer-table td {
        padding: 16px 15px;
        border-bottom: 1px solid #EEF0EA;
        color: #68776B;
        vertical-align: middle;
    }

    .customer-table tbody tr:last-child td {
        border-bottom: none;
    }

    .customer-table tbody tr:hover {
        background: #FAFBF8;
    }

    .customer-id {
        display: inline-block;
        padding: 7px 10px;
        border-radius: 8px;
        background: #EAF0E7;
        color: #536F5B;
        font-weight: 800;
        font-size: 10px;
    }

    .customer-name {
        color: #34443A;
        font-weight: 700;
    }

    .customer-address {
        max-width: 180px;
        line-height: 1.6;
    }

    .customer-actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .customer-action {
        width: 33px;
        height: 33px;
        border-radius: 9px;
        display: grid;
        place-items: center;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        transition: .2s;
    }

    .customer-action:hover {
        transform: translateY(-2px);
        filter: brightness(.96);
    }

    .action-detail {
        background: #E2EDF0;
        color: #648A96;
    }

    .action-edit {
        background: #ECE7F4;
        color: #81739B;
    }

    .action-delete {
        background: #F8E4E4;
        color: #A65D5D;
    }

    .customer-empty {
        text-align: center;
        padding: 55px 20px !important;
    }

    .customer-empty i {
        font-size: 42px;
        color: #A8BFAE;
    }

    .customer-empty h3 {
        font-size: 15px;
        color: #536F5B;
        margin: 14px 0 6px;
    }

    .customer-empty p {
        font-size: 11px;
        color: #929B92;
    }

    .customer-pagination {
        margin-top: 22px;
    }

    .customer-alert {
        padding: 14px 18px;
        border-radius: 12px;
        margin-bottom: 18px;
        font-size: 12px;
    }

    .customer-alert-success {
        background: #E4F1E5;
        color: #416448;
    }

    .customer-alert-error {
        background: #F8E4E4;
        color: #9A4D4D;
    }

    @media(max-width: 650px) {
        .customer-page-hero {
            padding: 24px;
        }

        .customer-page-hero-icon {
            display: none;
        }

        .customer-summary {
            grid-template-columns: 1fr;
        }

        .customer-list-panel {
            padding: 17px;
        }

        .customer-search {
            flex-direction: column;
        }

        .customer-search-input {
            width: 100%;
        }

        .customer-search-button,
        .customer-reset-button {
            width: 100%;
        }
    }
</style>

<div class="customer-page">

    {{-- HERO --}}
    <div class="customer-page-hero">
        <div>
            <span class="soft-label">MANAJEMEN DATA / PELANGGAN</span>
            <h1>Data Pelanggan</h1>
            <p>
                Kelola informasi pelanggan MOTÉRA dengan lebih mudah,
                terorganisir, dan praktis untuk mendukung pelayanan service.
            </p>
        </div>

        <div class="customer-page-hero-icon">
            <i class="bi bi-people-fill"></i>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="customer-alert customer-alert-success">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="customer-alert customer-alert-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- SUMMARY --}}
    <div class="customer-summary">

        <div class="customer-summary-card">
            <div class="customer-summary-icon"
                 style="background:#E3EDE0;color:#536F5B;">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>
                <h3>{{ $pelanggans->total() }}</h3>
                <p>Total Pelanggan Terdaftar</p>
            </div>
        </div>

        <div class="customer-summary-card">
            <div class="customer-summary-icon"
                 style="background:#ECE7F4;color:#81739B;">
                <i class="bi bi-person-check-fill"></i>
            </div>

            <div>
                <h3>{{ $pelanggans->count() }}</h3>
                <p>Pelanggan pada Halaman Ini</p>
            </div>
        </div>

    </div>

    {{-- CUSTOMER LIST --}}
    <div class="customer-list-panel">

        <div class="customer-list-heading">
            <div>
                <h3>
                    <i class="bi bi-card-list"
                       style="color:#819A83;"></i>
                    Daftar Pelanggan
                </h3>

                <p>Informasi pelanggan yang telah terdaftar di MOTÉRA.</p>
            </div>

            <a href="{{ route('pelanggan.create') }}"
               class="customer-add-button">
                <i class="bi bi-plus-circle"></i>
                Tambah Pelanggan
            </a>
        </div>

        {{-- SEARCH --}}
        <form action="{{ route('pelanggan.index') }}"
              method="GET"
              class="customer-search">

            <div class="customer-search-input">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="keyword"
                    value="{{ $keyword }}"
                    placeholder="Cari ID, nama, atau nomor HP pelanggan..."
                >
            </div>

            <button type="submit" class="customer-search-button">
                <i class="bi bi-search"></i>
                Cari
            </button>

            <a href="{{ route('pelanggan.index') }}"
               class="customer-reset-button">
                <i class="bi bi-arrow-counterclockwise"></i>
                Reset
            </a>

        </form>

        {{-- TABLE --}}
        <div class="customer-table-wrapper">

            <table class="customer-table">

                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>ID PELANGGAN</th>
                        <th>NAMA LENGKAP</th>
                        <th>NO. HP</th>
                        <th>ALAMAT</th>
                        <th>PEKERJAAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pelanggans as $index => $pelanggan)

                        <tr>

                            <td>
                                {{ $pelanggans->firstItem() + $index }}
                            </td>

                            <td>
                                <span class="customer-id">
                                    {{ $pelanggan->id_pelanggan }}
                                </span>
                            </td>

                            <td>
                                <strong class="customer-name">
                                    {{ $pelanggan->nama_lengkap }}
                                </strong>
                            </td>

                            <td>
                                <i class="bi bi-telephone"
                                   style="color:#91A493;"></i>
                                {{ $pelanggan->no_hp }}
                            </td>

                            <td>
                                <div class="customer-address">
                                    {{ $pelanggan->alamat_pelanggan }}
                                </div>
                            </td>

                            <td>
                                {{ $pelanggan->pekerjaan }}
                            </td>

                            <td>
                                <div class="customer-actions">

                                    <a href="{{ route('pelanggan.show', $pelanggan->id_pelanggan) }}"
                                       class="customer-action action-detail"
                                       title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                   </a>

                                    <a href="{{ route('pelanggan.edit', $pelanggan->id_pelanggan) }}"
                                       class="customer-action action-edit"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="customer-action action-delete"
                                                title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="customer-empty">

                                <i class="bi bi-people"></i>

                                <h3>Belum Ada Data Pelanggan</h3>

                                <p>
                                    Data pelanggan belum tersedia.
                                    Silakan tambahkan pelanggan terlebih dahulu.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="customer-pagination">
            {{ $pelanggans->appends(request()->query())->links() }}
        </div>

    </div>

</div>

@endsection
