<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaran;

class LaundryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('pages.laundry.category', compact('categories'));
    }

    public function tambah() {
        $attributes = request()->validate([
            'id_customer' => 'required|exists:users,id',
            'tanggal_tagihan' => 'required',
            'berat' => 'required',
            'jumlah' => 'required'
        ]);
        $attributes['jumlah'] = number_format($attributes['jumlah'], 0, ',', '.');
        $attributes['bukti'] = '';
        $attributes['status'] = 'belum lunas';
        Pembayaran::create($attributes);
        return redirect('/laundry/admin/');
    }

    public function upload(int $id) {
        request()->validate([
            'upload-bukti' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        if (request()->file()) {
            $fileName = time().'_'.Auth::user()->username.'.'.request()->file('upload-bukti')->extension();
            $filePath = request()->file('upload-bukti')->storeAs('bukti', $fileName, 'public');
            $data = Pembayaran::where('id', $id)->update([
                "bukti" => "bukti/" . $fileName,
                "status" => "lunas"
            ]);
            return redirect("/laundry/customer");
        }
    }
    public function cart() {
        return view('pages.laundry.cart');
    }

    public function inputDetail($category) {
        $customers = User::where('auth', 'customer')->get();
        return view('pages.laundry.input-detail', [
            'category' => $category,
            'customers' => $customers
        ]);
    }

    public function historyLaundry() {
        if (Auth::user()->auth == 'admin') {
            $pembayarans = Pembayaran::all();
        } else {
            $pembayarans = Pembayaran::where('id_customer', Auth::user()->id);
        }
        return view('pages.laundry.history-laundry', compact('$pembayarans'));
    }
}
