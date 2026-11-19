<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => DataService::with('daftarService')->get()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|exists:daftar_service,id_servis_pelanggan|unique:data_service,id_servis_pelanggan',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService = DataService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditambahkan',
            'data' => $dataService->load('daftarService')
        ], 201);
    }

    public function show(string $id)
    {
        $dataService = DataService::with('daftarService')->findOrFail($id);
        return response()->json(['success' => true, 'data' => $dataService], 200);
    }

    public function update(Request $request, string $id)
    {
        $dataService = DataService::findOrFail($id);
        $validated = $request->validate([
            'estimasi_service' => 'sometimes|required|numeric|min:0',
            'nama_mekanik' => 'sometimes|required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($validated);
        return response()->json(['success' => true, 'message' => 'Data service diperbarui', 'data' => $dataService], 200);
    }

    public function destroy(string $id)
    {
        $dataService = DataService::findOrFail($id);
        $dataService->delete();
        return response()->json(['success' => true, 'message' => 'Data service dihapus'], 200);
    }
}