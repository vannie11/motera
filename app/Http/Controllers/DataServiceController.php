<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ])->latest()->paginate(10);

        return view('data-service.index', compact('dataServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::with([
            'pelanggan',
            'kendaraan',
            'dataService'
        ])->whereDoesntHave('dataService')
          ->orderByDesc('tanggal_servis')
          ->get();

        return view('data-service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|exists:daftar_service,id_servis_pelanggan|unique:data_service,id_servis_pelanggan',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        DataService::create($validated);

        return redirect()
            ->route('data-service.index')
            ->with('success', 'Data service berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $dataService = DataService::with([
            'daftarService.pelanggan',
            'daftarService.kendaraan'
        ])->findOrFail($id);

        return view('data-service.show', compact('dataService'));
    }

    public function edit(string $id)
    {
        $dataService = DataService::findOrFail($id);

        return view('data-service.edit', compact('dataService'));
    }

    public function update(Request $request, string $id)
    {
        $dataService = DataService::findOrFail($id);

        $validated = $request->validate([
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($validated);

        return redirect()
            ->route('data-service.index')
            ->with('success', 'Data service berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $dataService = DataService::findOrFail($id);

        $dataService->delete();

        return redirect()
            ->route('data-service.index')
            ->with('success', 'Data service berhasil dihapus!');
    }
}
