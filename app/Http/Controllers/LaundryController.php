<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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
        $total = $request->jumlah * $category->harga;
        $attributes['total'] = number_format($total, 0, ',', '.');
        $attributes['bukti'] = '';
        $attributes['status'] = '-1';

        $pembayaran = Pembayaran::create($attributes);

        Cart::create([
            "id_customer" => $request->id_customer,
            "id_pembayaran" => $pembayaran->id,
            "id_category" => $category->id,
            "jumlah" => $request->jumlah
        ]);
        return redirect()->route('pages.cartlaundry', ['auth' => 'admin']);
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

    public function edit(Request $req)
    {
        $attributes = $req->validate([
            'id_customer' => 'required|exists:users,id',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'sometimes',
            'jumlah' => 'required'
        ]);
        $cart = Cart::where('id_pembayaran', $req->id_pembayaran)->first();
        $total = $req->jumlah * $cart->category->harga;
        $attributes['total'] = number_format($total, 0, ',', '.');
        Pembayaran::where('id', $req->id_pembayaran)->update($attributes);
        return redirect()->route('pages.cartlaundry', ['auth' => 'admin']);
    }

    public function cart() {
        $carts = Cart::get();
        return view('pages.laundry.cart', compact($carts));
    }

    public function inputDetail($auth, $category) {
        $customers = User::where('auth', 'customer')->get();
        return view('pages.laundry.input-detail', [
            'category' => $category,
            'customers' => $customers
        ]);
    }

    public function editInputDetail($auth, $id) {
        $cart = Cart::where('id_pembayaran', $id)->first();
        $pembayaran = $cart->pembayaran;
        $category = $cart->category->nama;
        $customers = User::where('auth', 'customer')->get();
        return view('pages.laundry.edit-detail', compact('pembayaran', 'customers', 'category'));
    }

    public function deleteInputDetail($auth, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pages.cartlaundry', ['auth' => 'admin'])
                ->with('success', 'Data pembayaran dan cart terkait berhasil dihapus.');
    }

    public function historyLaundry() {
        if (Auth::user()->auth == 'admin') {
            $pembayarans = Pembayaran::all();
        } else {
            $pembayarans = Pembayaran::where('id_customer', Auth::user()->id);
        }
        return view('pages.laundry.history-laundry', compact('pembayarans'));
    }
}
