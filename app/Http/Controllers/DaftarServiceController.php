<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])
        ->orderByDesc('tanggal_servis')
        ->paginate(10);

        return view('daftar-service.index', compact('daftarServices'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama_lengkap')->get();

        $kendaraans = Kendaraan::orderBy('nama_pemilik')->get();

        return view('daftar-service.create', compact(
            'pelanggans',
            'kendaraans'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'no_plat_kendaraan' => 'required|exists:kendaraan,no_plat_kendaraan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $nomor = 1;

        $ids = DaftarService::pluck('id_servis_pelanggan');

        foreach ($ids as $id) {
            if (preg_match('/^SRV(\d+)$/', $id, $matches)) {
                $nomor = max($nomor, (int) $matches[1] + 1);
            }
        }

        do {
            $idService = 'SRV' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
            $nomor++;
        } while (
            DaftarService::where(
                'id_servis_pelanggan',
                $idService
            )->exists()
        );

        $validated['id_servis_pelanggan'] = $idService;

        DaftarService::create($validated);

        return redirect()
            ->route('daftar-service.index')
            ->with('success', 'Pendaftaran service berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $daftarService = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService',
            'pembayaran'
        ])->findOrFail($id);

        return view('daftar-service.show', compact('daftarService'));
    }

    public function edit(string $id)
    {
        $daftarService = DaftarService::findOrFail($id);

        $pelanggans = Pelanggan::orderBy('nama_lengkap')->get();

        $kendaraans = Kendaraan::orderBy('nama_pemilik')->get();

        return view('daftar-service.edit', compact(
            'daftarService',
            'pelanggans',
            'kendaraans'
        ));
    }

    public function update(Request $request, string $id)
    {
        $daftarService = DaftarService::findOrFail($id);

        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'no_plat_kendaraan' => 'required|exists:kendaraan,no_plat_kendaraan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $daftarService->update($validated);

        return redirect()
            ->route('daftar-service.index')
            ->with('success', 'Data pendaftaran service berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $daftarService = DaftarService::findOrFail($id);

        if ($daftarService->dataService()->exists() ||
            $daftarService->pembayaran()->exists()) {
            return redirect()
                ->route('daftar-service.index')
                ->with('error', 'Pendaftaran tidak dapat dihapus karena sudah memiliki data pengerjaan atau pembayaran.');
        }

        $daftarService->delete();

        return redirect()
            ->route('daftar-service.index')
            ->with('success', 'Data pendaftaran service berhasil dihapus!');
    }
}
