<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::latest()->get();
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat-masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
        ]);

        SuratMasuk::create($request->all());

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('surat-masuk.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
        ]);

        $surat = SuratMasuk::findOrFail($id);
        $surat->update($request->all());

        return redirect()->route('surat-masuk.index')->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        SuratMasuk::destroy($id);
        return back()->with('success', 'Surat masuk berhasil dihapus.');
    }
}