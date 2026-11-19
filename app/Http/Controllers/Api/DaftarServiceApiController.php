<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DaftarServiceApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => DaftarService::with(['pelanggan', 'kendaraan'])->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|string|max:20|unique:daftar_service,id_servis_pelanggan',
            'id_pelanggan' => 'required|exists:pelanggan,id_pelanggan',
            'no_plat_kendaraan' => 'required|exists:kendaraan,no_plat_kendaraan',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $daftarService = DaftarService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran service berhasil ditambahkan',
            'data' => $daftarService->load(['pelanggan', 'kendaraan'])
        ], 201);
    }

    public function show(string $id)
    {
        $daftarService = DaftarService::with(['pelanggan', 'kendaraan'])->findOrFail($id);
        return response()->json(['success' => true, 'data' => $daftarService], 200);
    }

    public function update(Request $request, string $id)
    {
        $daftarService = DaftarService::findOrFail($id);
        $validated = $request->validate([
            'id_pelanggan' => 'sometimes|required|exists:pelanggan,id_pelanggan',
            'no_plat_kendaraan' => 'sometimes|required|exists:kendaraan,no_plat_kendaraan',
            'keluhan_kendaraan' => 'sometimes|required|string',
            'tanggal_servis' => 'sometimes|required|date',
        ]);

        $daftarService->update($validated);
        return response()->json(['success' => true, 'message' => 'Pendaftaran service diperbarui', 'data' => $daftarService], 200);
    }

    public function destroy(string $id)
    {
        $daftarService = DaftarService::findOrFail($id);
        $daftarService->delete();
        return response()->json(['success' => true, 'message' => 'Pendaftaran service dihapus'], 200);
    }
}