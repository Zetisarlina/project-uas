<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use PDF;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $suratKeluar = SuratKeluar::when($keyword, function ($query) use ($keyword) {
            return $query->where('nomor_surat', 'like', "%$keyword%")
                         ->orWhere('tujuan', 'like', "%$keyword%")
                         ->orWhere('perihal', 'like', "%$keyword%");
        })->latest()->paginate(10);

        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
        ]);

        SuratKeluar::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function cetak($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $pdf = PDF::loadView('surat-keluar.cetak', compact('surat'));
        return $pdf->stream('surat-keluar-'.$surat->id.'.pdf');
    }

    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('surat-keluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
        ]);

        $surat = SuratKeluar::findOrFail($id);
        $surat->update([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
        ]);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        SuratKeluar::destroy($id);
        return back()->with('success', 'Surat keluar berhasil dihapus.');
    }
}