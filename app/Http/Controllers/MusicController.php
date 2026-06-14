<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Models\Music; // Pastikan model Music diimpor
use Illuminate\Http\Request;

class MusicController extends Controller
{
    // Menampilkan daftar semua musik
    public function index()
    {
        $music = Music::all(); // Mengambil semua data musik
        return view('music.index', compact('music')); // Mengembalikan view dengan data musik
    }

  // Mengekspor Sewa Music ke PDF
public function exportPdf() 
{
    $music = Music::all();
    $pdf = FacadePdf::loadView('export.pdf', compact('music'));
    return $pdf->download('report_Sewa.pdf');
}

    // Menampilkan form untuk menambahkan musik baru
    public function create()
    {
        return view('music.create'); // Mengembalikan view untuk membuat musik baru
    }

    // Menyimpan data musik baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_penyewa' => 'required',
            'nama_alat_musik' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'harga_sewa' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        // Membuat entri musik baru
        Music::create($request->all());
        return redirect()->route('music.index')->with('success', 'Music created successfully.'); // Redirect ke daftar musik dengan pesan sukses
    }

    // Menampilkan detail musik tertentu
    public function show(Music $music)
    {
        return view('music.show', compact('music')); // Mengembalikan view dengan data musik tertentu
    }

    // Menampilkan form untuk mengedit musik tertentu
    public function edit(Music $music)
    {
        return view('music.edit', compact('music')); // Mengembalikan view untuk mengedit musik
    }

    // Memperbarui data musik tertentu
    public function update(Request $request, Music $music)
    {
        // Validasi input
        $request->validate([
            'nama_penyewa' => 'required',
            'nama_alat_musik' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'harga_sewa' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        // Memperbarui entri musik
        $music->update($request->all());
        return redirect()->route('music.index')->with('success', 'Music updated successfully.'); // Redirect ke daftar musik dengan pesan sukses
    }

    // Menghapus musik tertentu
    public function destroy($id)
{
    // cari data berdasarkan ID
    $music = Music::find($id);

    // cek apakah data ada atau tidak
    if (!$music) {
        return redirect()->route('music.index')
            ->with('error', 'Data tidak ditemukan atau sudah dihapus');
    }

    // kalau ada, baru hapus
    $music->delete();

    return redirect()->route('music.index')
        ->with('success', 'Data berhasil dihapus');
}

    public function search(Request $request)
{
    // ambil kata yang diketik user
    $keyword = $request->keyword;

    // cari data di database
    $music = Music::where('nama_penyewa', 'like', "%{$keyword}%")
                ->orWhere('nama_alat_musik', 'like', "%{$keyword}%")
                ->get();

    // kirim hasil ke halaman index
    return view('music.index', compact('music'));
}
}