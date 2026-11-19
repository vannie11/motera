
@extends('layouts.app')

@section('title', 'Data Service')
@section('page-title', 'Data Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / SERVICE</span>
        <h1>Data Service</h1>
        <p>
            Kelola informasi pengerjaan service kendaraan pelanggan
            MOTÉRA secara terorganisir dan efisien.
        </p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-tools"></i>
    </div>
</div>

<div class="stat-grid">

    <div class="stat-card">
        <div class="stat-icon" style="background:#E8F0E6;color:#536F5B;">
            <i class="bi bi-tools"></i>
        </div>
        <h3>{{ $dataServices->total() }}</h3>
        <p>Total Data Service</p>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#ECE7F4;color:#81739B;">
            <i class="bi bi-person-gear"></i>
        </div>
        <h3>{{ $dataServices->unique('nama_mekanik')->count() }}</h3>
        <p>Mekanik pada Halaman Ini</p>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#F3E1E4;color:#A16F7A;">
            <i class="bi bi-clipboard-check"></i>
        </div>
        <h3>{{ $dataServices->count() }}</h3>
        <p>Data Ditampilkan</p>
    </div>

</div>

<div class="panel">

    <div style="display:flex;justify-content:space-between;
                align-items:center;gap:15px;flex-wrap:wrap;
                margin-bottom:24px;">

        <div>
            <span class="soft-label">SERVICE MANAGEMENT</span>
            <h3 style="margin:12px 0 5px;font-size:19px;">
                Daftar Pengerjaan Service
            </h3>
            <p style="font-size:12px;color:#929B92;margin:0;">
                Informasi pengerjaan service kendaraan pelanggan.
            </p>
        </div>

        <a href="{{ route('data-service.create') }}" class="btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Data Service
        </a>

    </div>

    <div style="overflow-x:auto;">

        <table class="table">

            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Service</th>
                    <th>Pelanggan</th>
                    <th>Nomor Polisi</th>
                    <th>Estimasi Biaya</th>
                    <th>Nama Mekanik</th>
                    <th>Sparepart</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($dataServices as $index => $data)

                    <tr>
                        <td>
                            {{ $dataServices->firstItem() + $index }}
                        </td>

                        <td>
                            <strong style="color:#536F5B;">
                                {{ $data->id_servis_pelanggan }}
                            </strong>
                        </td>

                        <td>
                            {{ $data->daftarService?->pelanggan?->nama_lengkap ?? '-' }}
                        </td>

                        <td>
                            <strong>
                                {{ $data->daftarService?->kendaraan?->no_plat_kendaraan ?? '-' }}
                            </strong>
                        </td>

                        <td>
                            Rp {{ number_format((float)$data->estimasi_service, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $data->nama_mekanik }}
                        </td>

                        <td>
                            {{ $data->sparepart_pengganti ?: 'Tidak ada' }}
                        </td>

                        <td>
                            <div style="display:flex;gap:6px;">

                                <a href="{{ route('data-service.show', $data->id) }}"
                                   title="Lihat Detail"
                                   style="background:#E8F0E6;color:#536F5B;
                                   padding:8px 10px;border-radius:9px;">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('data-service.edit', $data->id) }}"
                                   title="Edit"
                                   style="background:#ECE7F4;color:#81739B;
                                   padding:8px 10px;border-radius:9px;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('data-service.destroy', $data->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data service ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Hapus"
                                            style="background:#F8E4E4;color:#A45E65;
                                            border:none;padding:8px 10px;
                                            border-radius:9px;cursor:pointer;">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="empty">
                            <i class="bi bi-tools"
                               style="font-size:38px;color:#A8BFAE;"></i>

                            <h3 style="font-size:16px;color:#536F5B;">
                                Belum Ada Data Service
                            </h3>

                            <p>
                                Data pengerjaan service yang ditambahkan
                                akan muncul di halaman ini.
                            </p>

                            <a href="{{ route('data-service.create') }}"
                               class="btn-primary">
                                <i class="bi bi-plus-circle"></i>
                                Tambah Data Service
                            </a>
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div style="margin-top:22px;">
        {{ $dataServices->links() }}
    </div>

</div>

@endsection
