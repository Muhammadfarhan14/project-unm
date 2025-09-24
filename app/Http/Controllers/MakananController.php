<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::latest()->paginate(10);
        return view('makanan', compact('makanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMakanan'  => 'required|string|max:255',
            'hargaMakanan' => 'required|integer|min:0',
            'stokMakanan'  => 'required|integer|min:0',
            'fotoMakanan'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['namaMakanan', 'hargaMakanan', 'stokMakanan']);

        if ($request->hasFile('fotoMakanan')) {
            $data['fotoMakanan'] = $request->file('fotoMakanan')->store('makanan', 'public');
        }

        Makanan::create($data);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'namaMakanan'  => 'required|string|max:255',
            'hargaMakanan' => 'required|integer|min:0',
            'stokMakanan'  => 'required|integer|min:0',
            'fotoMakanan'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['namaMakanan', 'hargaMakanan', 'stokMakanan']);

        if ($request->hasFile('fotoMakanan')) {
            if ($makanan->fotoMakanan) {
                Storage::disk('public')->delete($makanan->fotoMakanan);
            }
            $data['fotoMakanan'] = $request->file('fotoMakanan')->store('makanan', 'public');
        }

        $makanan->update($data);

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diupdate!');
    }

    public function destroy(Makanan $makanan)
    {
        if ($makanan->fotoMakanan) {
            Storage::disk('public')->delete($makanan->fotoMakanan);
        }
        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus!');
    }
}
