<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan',
            'daftarService.dataService'
        ])->latest()->paginate(10);

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService'
        ])
        ->whereHas('dataService')
        ->whereDoesntHave('pembayaran')
        ->orderByDesc('tanggal_servis')
        ->get();

        return view('pembayaran.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|exists:data_service,id_servis_pelanggan|unique:pembayaran,id_servis_pelanggan',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
        ]);

        Pembayaran::create($validated);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran service berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $pembayaran = Pembayaran::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan',
            'daftarService.dataService'
        ])->findOrFail($id);

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit(string $id)
    {
        $pembayaran = Pembayaran::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ])->findOrFail($id);

        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $validated = $request->validate([
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($validated);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus!');
    }
}
