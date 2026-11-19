<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $kendaraans = Kendaraan::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('no_plat_kendaraan', 'like', "%{$keyword}%")
                      ->orWhere('nama_pemilik', 'like', "%{$keyword}%")
                      ->orWhere('jenis_kendaraan', 'like', "%{$keyword}%");
                });
            })
            ->orderBy('nama_pemilik')
            ->paginate(10)
            ->withQueryString();

        return view('kendaraan.index', compact(
            'kendaraans',
            'keyword'
        ));
    }

    public function create()
    {
        return view('kendaraan.create');
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

        $validated['no_plat_kendaraan'] = strtoupper(
            $validated['no_plat_kendaraan']
        );

        Kendaraan::create($validated);

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $kendaraan = Kendaraan::with('daftarServices.pelanggan')
            ->findOrFail($id);

        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'no_plat_kendaraan' => 'required|string|max:20|unique:kendaraan,no_plat_kendaraan,' . $id . ',no_plat_kendaraan',
            'jenis_kendaraan' => 'required|string|max:30',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan_kendaraan' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:255',
        ]);

        $validated['no_plat_kendaraan'] = strtoupper(
            $validated['no_plat_kendaraan']
        );

        $kendaraan->update($validated);

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        if ($kendaraan->daftarServices()->exists()) {
            return redirect()
                ->route('kendaraan.index')
                ->with('error', 'Kendaraan tidak dapat dihapus karena memiliki riwayat service.');
        }

        $kendaraan->delete();

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }
}
