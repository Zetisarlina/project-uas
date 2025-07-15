<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMasuk = SuratMasuk::count();
        $totalKeluar = SuratKeluar::count();

        return view('dashboard', compact('totalMasuk', 'totalKeluar'));
    }
}