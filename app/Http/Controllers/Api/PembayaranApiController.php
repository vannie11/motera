<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Pembayaran::with('daftarService')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|exists:data_service,id_servis_pelanggan|unique:pembayaran,id_servis_pelanggan',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran = Pembayaran::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil ditambahkan',
            'data' => $pembayaran->load('daftarService')
        ], 201);
    }

    public function show(string $id)
    {
        $pembayaran = Pembayaran::with('daftarService')->findOrFail($id);
        return response()->json(['success' => true, 'data' => $pembayaran], 200);
    }

    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $validated = $request->validate([
            'jumlah_biaya_servis' => 'sometimes|required|numeric|min:0',
            'jenis_pembayaran' => 'nullable|string|max:20',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaran->update($validated);
        return response()->json(['success' => true, 'message' => 'Pembayaran diperbarui', 'data' => $pembayaran], 200);
    }

    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return response()->json(['success' => true, 'message' => 'Pembayaran dihapus'], 200);
    }
}