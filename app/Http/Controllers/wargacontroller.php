<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\warga; // Model dengan huruf kecil
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class wargacontroller extends Controller
{
    public function index(): View
    {
        return view('warga.tabel', [
            'title' => 'warga',
            'data' => warga::all()
        ]);
    }

    public function create(): View
    {
        return view('warga.tambah', ['title' => 'Tambah Data Warga']);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'status' => 'nullable',
            'pekerjaan' => 'required',
            'tempat_tinggal' => 'required',
            'penghasilan' => 'required',
        ]);

        warga::create($request->all());
        return redirect()->route('warga.index')->with('success', 'Data Warga berhasil ditambahkan');
    }

    public function edit(warga $warga): View
    {
        return view('warga.edit', ['warga' => $warga, 'title' => 'Ubah Data Warga']);
    }

    public function update(Request $request, warga $warga): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'status' => 'nullable',
            'pekerjaan' => 'required',
            'tempat_tinggal' => 'required',
            'penghasilan' => 'required',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')->with('updated', 'Data Warga berhasil diubah');
    }

    public function show(warga $warga): View
    {
        return view('warga.tampil', ['warga' => $warga, 'title' => 'Data Warga']);
    }
    public function destroy($id):RedirectResponse
    {
        warga::where('id',$id)->delete();
        return redirect()->route('warga.index')->with('deleted','Data warga Berhasil Dihapus');
    }
}
