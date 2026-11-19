<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Kendaraan::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat_kendaraan' => 'required|string|max:20|unique:kendaraan,no_plat_kendaraan',
            'jenis_kendaraan' => 'required|string|max:30',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan_kendaraan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
        ]);

        $validated['no_plat_kendaraan'] = strtoupper($validated['no_plat_kendaraan']);
        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil ditambahkan',
            'data' => $kendaraan
        ], 201);
    }

    public function show(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return response()->json(['success' => true, 'data' => $kendaraan], 200);
    }

    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $validated = $request->validate([
            'jenis_kendaraan' => 'sometimes|required|string|max:30',
            'no_stnk' => 'sometimes|required|string|max:50',
            'tahun_pembuatan_kendaraan' => 'sometimes|required|digits:4|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'sometimes|required|string|max:255',
            'warna_kendaraan' => 'sometimes|required|string|max:255',
        ]);

        $kendaraan->update($validated);
        return response()->json(['success' => true, 'message' => 'Data kendaraan diperbarui', 'data' => $kendaraan], 200);
    }

    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();
        return response()->json(['success' => true, 'message' => 'Data kendaraan dihapus'], 200);
    }
}