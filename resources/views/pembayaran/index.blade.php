
@extends('layouts.app')

@section('title', 'Pembayaran Service')
@section('page-title', 'Pembayaran Service')

@section('content')

<div class="customer-hero">
    <div>
        <span class="soft-label">MANAJEMEN DATA / PEMBAYARAN</span>
        <h1>Pembayaran Service</h1>
        <p>Kelola seluruh transaksi pembayaran service pelanggan MOTÉRA dengan mudah, rapi, dan terorganisir.</p>
    </div>

    <div class="customer-hero-icon">
        <i class="bi bi-wallet2"></i>
    </div>
</div>

<div class="stat-grid">

    <div class="stat-card">
        <div class="stat-icon" style="background:#E8F0E6;color:#607B65;">
            <i class="bi bi-receipt"></i>
        </div>
        <h3>{{ $pembayarans->total() }}</h3>
        <p>Total Transaksi</p>
    </div>

    <div class="stat-card">
        <div class="stat-icon" style="background:#ECE7F4;color:#81739B;">
            <i class="bi bi-cash-stack"></i>
        </div>
        <h3 style="font-size:20px;">
            Rp {{ number_format($totalPembayaran ?? 0, 0, ',', '.') }}
        </h3>
        <p>Total Pendapatan</p>
    </div>

</div>

<div class="panel">

    <div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap;margin-bottom:22px;">
        <div>
            <h3 style="margin:0;font-size:17px;">Daftar Pembayaran</h3>
            <p style="font-size:11px;color:#929B92;margin:6px 0 0;">
                Informasi transaksi pembayaran service pelanggan.
            </p>
        </div>

        <a href="{{ route('pembayaran.create') }}" class="btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Pembayaran
        </a>
    </div>

    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Service</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor Polisi</th>
                    <th>Biaya Service</th>
                    <th>Jenis Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pembayarans as $index => $pembayaran)
                    <tr>
                        <td>{{ $pembayarans->firstItem() + $index }}</td>

                        <td>
                            <strong>{{ $pembayaran->id_servis_pelanggan }}</strong>
                        </td>

                        <td>
                            {{ $pembayaran->daftarService->pelanggan->nama_lengkap ?? '-' }}
                        </td>

                        <td>
                            {{ $pembayaran->daftarService->kendaraan->no_plat_kendaraan ?? '-' }}
                        </td>

                        <td>
                            <strong style="color:#536F5B;">
                                Rp {{ number_format($pembayaran->jumlah_biaya_servis, 0, ',', '.') }}
                            </strong>
                        </td>

                        <td>
                            {{ $pembayaran->jenis_pembayaran ?? '-' }}
                        </td>

                        <td>
                            <div style="display:flex;gap:7px;">
                                <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                   title="Lihat Detail"
                                   style="background:#E8F0E6;color:#536F5B;padding:8px 10px;border-radius:9px;">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
                                   title="Edit"
                                   style="background:#ECE7F4;color:#81739B;padding:8px 10px;border-radius:9px;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Hapus"
                                            style="border:none;background:#F8E4E4;color:#A65D5D;padding:8px 10px;border-radius:9px;cursor:pointer;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty">
                                <i class="bi bi-wallet2" style="font-size:38px;"></i>
                                <h3 style="font-size:16px;color:#536F5B;">Belum Ada Pembayaran</h3>
                                <p>Data transaksi pembayaran service belum tersedia.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $pembayarans->links() }}
    </div>

</div>

@endsection
