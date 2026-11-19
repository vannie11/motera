<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $pelanggans = Pelanggan::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('id_pelanggan', 'like', "%{$keyword}%")
                      ->orWhere('nama_lengkap', 'like', "%{$keyword}%")
                      ->orWhere('no_hp', 'like', "%{$keyword}%");
                });
            })
            ->orderBy('nama_lengkap')
            ->paginate(10)
            ->withQueryString();

        return view('pelanggan.index', compact('pelanggans', 'keyword'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $nomor = 1;

        foreach (Pelanggan::pluck('id_pelanggan') as $id) {
            if (preg_match('/^PLG(\d+)$/', $id, $matches)) {
                $nomor = max($nomor, (int) $matches[1] + 1);
            }
        }

        do {
            $idPelanggan = 'PLG' . str_pad($nomor, 3, '0', STR_PAD_LEFT);
            $nomor++;
        } while (Pelanggan::where('id_pelanggan', $idPelanggan)->exists());

        $validated['id_pelanggan'] = $idPelanggan;

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $pelanggan = Pelanggan::with('daftarServices')->findOrFail($id);

        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat_pelanggan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
        ]);

        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        if ($pelanggan->daftarServices()->exists()) {
            return redirect()->route('pelanggan.index')
                ->with('error', 'Pelanggan tidak dapat dihapus karena sudah memiliki riwayat service.');
        }

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
