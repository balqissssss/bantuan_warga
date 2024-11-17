<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bantuan;
use App\Models\Warga;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BantuanController extends Controller
{
    public function index(): View
    {
        $data = Bantuan::with('warga')->get();
        foreach ($data as $item) {
            $item->formatted_total_bantuan = 'Rp ' . number_format($item->total_bantuan, 0, ',', '.'); // Format: Rp 1.000.000
        }    
        return view('bantuan.table', [
            "title" => "bantuan",
            "data" => $data
        ]);
    }

    public function create(): View|RedirectResponse
    {
        // Mengambil semua data warga dengan penghasilan di bawah 500.000
        $warga = Warga::where('penghasilan', '<', 500000)->get();

        // Jika tidak ada warga yang memenuhi syarat, tampilkan pesan
        if ($warga->isEmpty()) {
            return redirect()->route('bantuan.index')->with('error', 'Tidak ada warga dengan penghasilan di bawah 500.000.');
        }
        
        return view('bantuan.index', [
            'title' => 'Tambah Data Bantuan',
            'warga' => $warga // Mengirim data warga ke view
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data
        $validasi = $request->validate([
            'id_warga' => 'required|exists:wargas,id', // Pastikan id_warga ada di tabel warga
            'total_bantuan' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // Simpan data bantuan
        bantuan::create($validasi);

        // Update status warga
        $warga = Warga::find($request->id_warga);
        if ($warga) {
            $warga->status = 'kurang mampu'; // Status selalu diatur sebagai 'kurang mampu'
        }

        return redirect()->route('bantuan.index')->with('success', 'Data bantuan berhasil disimpan');
    }

    public function edit($id): View
    {
        $bantuan = Bantuan::findOrFail($id);
        $wargas = Warga::all(); // Mengambil semua data warga untuk dropdown
        
        return view('bantuan.edit', [
            'bantuan' => $bantuan,
            'warga' => $wargas,
            'title' => 'Ubah Data Bantuan'
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'total_bantuan' => 'required|numeric',
        ]);

        $bantuan = bantuan::findOrFail($id);
        $bantuan->update($request->only('total_bantuan', 'tanggal'));

        // Mengubah status warga
        $warga = Warga::findOrFail($bantuan->id_warga);
        if ($warga->penghasilan < 500000) {
            $warga->status = 'kurang mampu';
        } else {
            $warga->status = 'mampu';
        }
       

        return redirect()->route('bantuan.index')->with('updated', 'Data bantuan berhasil diubah');
    }

    public function destroy($id): RedirectResponse
    {
        // Temukan data bantuan berdasarkan ID
        $bantuan = Bantuan::findOrFail($id);
        
        // Hapus data bantuan
        $bantuan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('bantuan.index')->with('success', 'Data bantuan berhasil dihapus');
    }
}
