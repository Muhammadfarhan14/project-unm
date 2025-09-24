<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MinumanController extends Controller
{

    public function index()
    {
        $minumans = Minuman::paginate(10);
        return view('minuman', compact('minumans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMinuman' => 'required|string|max:255',
            'hargaMinuman' => 'required|numeric',
            'stokMinuman' => 'required|integer|min:0',
            'fotoMinuman' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $data = $request->only(['namaMinuman', 'hargaMinuman', 'stokMinuman']);

            if ($request->hasFile('fotoMinuman')) {
                $data['fotoMinuman'] = $request->file('fotoMinuman')->store('minuman', 'public');
            }

            Minuman::create($data);

            return redirect()->route('minuman.index')->with('success', 'Minuman berhasil ditambahkan!');
        } catch (\Throwable $e) {
            Log::error('Gagal menambahkan minuman: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Minuman $minuman)
    {
        $request->validate([
            'namaMinuman' => 'required|string|max:255',
            'hargaMinuman' => 'required|numeric',
            'stokMinuman' => 'required|integer|min:0',
            'fotoMinuman' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['namaMinuman', 'hargaMinuman', 'stokMinuman']);

        if ($request->hasFile('fotoMinuman')) {
            if ($minuman->fotoMinuman) {
                Storage::disk('public')->delete($minuman->fotoMinuman);
            }
            $data['fotoMinuman'] = $request->file('fotoMinuman')->store('minuman', 'public');
        }

        $minuman->update($data);

        return redirect()->route('minuman.index')->with('success', 'Minuman berhasil diperbarui!');
    }

    public function destroy(Minuman $minuman)
    {
        if ($minuman->fotoMinuman) {
            Storage::disk('public')->delete($minuman->fotoMinuman);
        }
        $minuman->delete();

        return redirect()->route('minuman.index')->with('success', 'Minuman berhasil dihapus!');
    }
}
