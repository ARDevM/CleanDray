<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\PembayaranWifi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardPenggunaController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->auth === 'admin') {
            return view('pages.dashboard-admin');
        }
    
        $id_customer = auth()->user()->id;
        $laundry = Pembayaran::where('id_customer', $id_customer)
            ->orderBy('tanggal_tagihan', 'desc')
            ->take(4)
            ->get();

    
        return view('pages.dashboard-pengguna', compact('laundry'));
    }
}