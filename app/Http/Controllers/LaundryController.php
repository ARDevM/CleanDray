<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('pages.laundry.category', compact('categories'));
    }

    public function tambah(Request $request) {
        $attributes = $request->validate([
            'id_customer' => 'required|exists:users,id',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'sometimes',
            'jumlah' => 'required'
        ]);
        $category = Category::where('nama', $request->category)->first();
        $jumlah = $request->jumlah * $category->harga;
        $attributes['jumlah'] = number_format($jumlah, 0, ',', '.');
        $attributes['bukti'] = '';
        $attributes['status'] = '0';
        // var_dump($attributes);
        Pembayaran::create($attributes);
        return redirect(route('dashboard', ['auth' => 'admin']));
        // return view('pages.laundry.cart');
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

    public function inputDetail($auth, $category) {
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
