
@extends('layouts.app')

@section('title', 'Data Kendaraan')
@section('page-title', 'Data Kendaraan')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / KENDARAAN</span>
        <h1>Data Kendaraan</h1>
        <p>Kelola informasi kendaraan pelanggan MOTÉRA dengan mudah dan terorganisir.</p>
    </div>

   <div class="customer-hero-icon">
    <i class="bi bi-scooter"></i>
</div>
</div>

<div class="customer-form-card">

    <div class="form-card-heading">
        <div>
            <span class="soft-label">DATABASE KENDARAAN</span>
            <h2>Daftar Kendaraan</h2>
            <p>Informasi kendaraan yang terdaftar di MOTÉRA.</p>
        </div>

        <i class="bi bi-car-front"></i>
    </div>

    <div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:22px;">

        <span class="soft-label">
            {{ $kendaraans->total() }} Kendaraan Terdaftar
        </span>

        <a href="{{ route('kendaraan.create') }}" class="btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Kendaraan
        </a>
    </div>

    <form action="{{ route('kendaraan.index') }}" method="GET"
          style="display:flex;gap:10px;margin-bottom:25px;flex-wrap:wrap;">

        <div class="input-icon-wrapper" style="flex:1;min-width:200px;">
            <i class="bi bi-search"></i>
            <input type="text" name="keyword"
                   value="{{ $keyword }}"
                   placeholder="Cari plat nomor, pemilik, atau jenis kendaraan...">
        </div>

        <button type="submit" class="btn-primary">
            Cari Data
        </button>

        <a href="{{ route('kendaraan.index') }}" class="cancel-button">
            Reset
        </a>
    </form>

    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>NO. POLISI</th>
                    <th>JENIS KENDARAAN</th>
                    <th>NAMA PEMILIK</th>
                    <th>TAHUN</th>
                    <th>WARNA</th>
                    <th>AKSI</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kendaraans as $kendaraan)
                    <tr>
                        <td>
                            <strong style="color:#536F5B;">
                                {{ $kendaraan->no_plat_kendaraan }}
                            </strong>
                        </td>

                        <td>{{ $kendaraan->jenis_kendaraan }}</td>
                        <td>{{ $kendaraan->nama_pemilik }}</td>
                        <td>{{ $kendaraan->tahun_pembuatan_kendaraan }}</td>
                        <td>{{ $kendaraan->warna_kendaraan }}</td>

                        <td>
                            <div style="display:flex;gap:7px;flex-wrap:wrap;">

                                <a href="{{ route('kendaraan.show', $kendaraan->no_plat_kendaraan) }}"
                                   class="cancel-button">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('kendaraan.edit', $kendaraan->no_plat_kendaraan) }}"
                                   class="btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('kendaraan.destroy', $kendaraan->no_plat_kendaraan) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            style="border:0;background:#F5E3E3;color:#A65E65;padding:12px;border-radius:12px;cursor:pointer;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            <i class="bi bi-motorcycle" style="font-size:35px;display:block;margin-bottom:12px;"></i>
                            <strong>Belum ada kendaraan</strong>
                            <p>Tambahkan kendaraan pertama ke database MOTÉRA.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:25px;">
        {{ $kendaraans->links() }}
    </div>

</div>

@endsection
