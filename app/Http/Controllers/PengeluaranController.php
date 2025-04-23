<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran; // Pastikan model Pengeluaran di-import
use App\Models\Product;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // Menampilkan daftar pengeluaran
    public function index()
    {
        $products = Product::paginate(10); // 10 = jumlah item per halaman
        return view('Pengeluaran.index', compact('products'));
    }
    
    
    
    

    // Menampilkan form untuk membuat pengeluaran baru
    public function create()
    {
        return view('pengeluaran.create'); // Menampilkan form untuk input data pengeluaran
    }

    // Menyimpan pengeluaran yang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Validasi nama
            'jumlah' => 'required|numeric',      // Validasi jumlah
            'tanggal' => 'required|date',        // Validasi tanggal
        ]);

        Pengeluaran::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dibuat!');
    }

    // Menampilkan detail pengeluaran
    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Mencari pengeluaran berdasarkan ID
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    // Menampilkan form untuk mengedit pengeluaran
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Mencari pengeluaran berdasarkan ID
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    // Memperbarui pengeluaran yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id); // Cari pengeluaran berdasarkan ID
        $pengeluaran->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui!');
    }

    // Menghapus pengeluaran
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Cari pengeluaran berdasarkan ID
        $pengeluaran->delete(); // Hapus pengeluaran

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
