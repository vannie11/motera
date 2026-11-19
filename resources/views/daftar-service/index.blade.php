
@extends('layouts.app')

@section('title', 'Daftar Service')
@section('page-title', 'Daftar Pendaftaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / SERVICE</span>
        <h1>Daftar Pendaftaran Service</h1>
        <p>
            Pantau seluruh pendaftaran service kendaraan pelanggan
            MOTÉRA dengan mudah dan terorganisir.
        </p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-clipboard2-check"></i>
    </div>
</div>

{{-- RINGKASAN --}}

<div class="service-summary">

    <div class="service-summary-card">
        <div class="service-summary-icon">
            <i class="bi bi-clipboard-data"></i>
        </div>
        <div>
            <h3>{{ $daftarServices->total() }}</h3>
            <p>Total Pendaftaran</p>
        </div>
    </div>

    <div class="service-summary-card">
        <div class="service-summary-icon purple">
            <i class="bi bi-calendar-check"></i>
        </div>
        <div>
            <h3>{{ $daftarServices->count() }}</h3>
            <p>Data Halaman Ini</p>
        </div>
    </div>

</div>

{{-- PESAN SUKSES --}}

@if(session('success'))
    <div class="service-alert">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="service-alert error">
        <i class="bi bi-exclamation-circle-fill"></i>
        {{ session('error') }}
    </div>
@endif

{{-- DAFTAR PENDAFTARAN --}}

<div class="service-list-card">

    <div class="service-list-heading">
        <div>
            <span class="soft-label">SERVICE MANAGEMENT</span>
            <h2>Riwayat Pendaftaran</h2>
            <p>Informasi kendaraan dan keluhan pelanggan.</p>
        </div>

        <a href="{{ route('daftar-service.create') }}"
           class="service-add-button">
            <i class="bi bi-plus-lg"></i>
            Tambah Pendaftaran
        </a>
    </div>

    <div class="service-table-wrapper">

        <table class="service-table">
            <thead>
                <tr>
                    <th>ID SERVICE</th>
                    <th>PELANGGAN</th>
                    <th>KENDARAAN</th>
                    <th>TANGGAL SERVICE</th>
                    <th>KELUHAN</th>
                    <th>AKSI</th>
                </tr>
            </thead>

            <tbody>

                @forelse($daftarServices as $service)

                    <tr>
                        <td>
                            <span class="service-id">
                                {{ $service->id_servis_pelanggan }}
                            </span>
                        </td>

                        <td>
                            <div class="service-customer">
                                <div class="service-avatar">
                                    <i class="bi bi-person"></i>
                                </div>

                                <div>
                                    <strong>
                                        {{ $service->pelanggan->nama_lengkap ?? 'Pelanggan tidak ditemukan' }}
                                    </strong>
                                    <small>
                                        {{ $service->id_pelanggan }}
                                    </small>
                                </div>
                            </div>
                        </td>

                        <td>
                            <strong>
                                {{ $service->no_plat_kendaraan }}
                            </strong>
                            <small class="service-subtext">
                                {{ $service->kendaraan->jenis_kendaraan ?? '-' }}
                            </small>
                        </td>

                        <td>
                            <span class="service-date">
                                <i class="bi bi-calendar-event"></i>
                                {{ \Carbon\Carbon::parse($service->tanggal_servis)->format('d/m/Y') }}
                            </span>
                        </td>

                        <td>
                            <span class="service-complaint">
                                {{ \Illuminate\Support\Str::limit($service->keluhan_kendaraan, 45) }}
                            </span>
                        </td>

                        <td>
                            <div class="service-actions">

                                <a href="{{ route('daftar-service.show', $service->id_servis_pelanggan) }}"
                                   class="service-action view"
                                   title="Lihat Detail">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('daftar-service.edit', $service->id_servis_pelanggan) }}"
                                   class="service-action edit"
                                   title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('daftar-service.destroy', $service->id_servis_pelanggan) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pendaftaran ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="service-action delete"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6">
                            <div class="service-empty">
                                <i class="bi bi-clipboard-x"></i>
                                <h3>Belum Ada Pendaftaran</h3>
                                <p>
                                    Belum ada data pendaftaran service.
                                    Tambahkan pendaftaran pertama untuk memulai.
                                </p>

                                <a href="{{ route('daftar-service.create') }}"
                                   class="service-add-button">
                                    <i class="bi bi-plus-lg"></i>
                                    Tambah Pendaftaran
                                </a>
                            </div>
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>

    </div>

    <div class="service-pagination">
        {{ $daftarServices->links() }}
    </div>

</div>

@endsection
