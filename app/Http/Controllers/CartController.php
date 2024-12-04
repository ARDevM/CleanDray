<?php

// App/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['pembayaran', 'category'])->get();

        $summary = $carts->groupBy(function ($item) {
            return $item->category->nama;
        })->map(function ($items, $jenis) {
            $totalJumlah = $items->sum('jumlah');
            $harga = $items->first()->category->harga ?? 0;
            $totalHarga = $totalJumlah * $harga;

            return [
                'jenis' => $jenis,
                'total' => $totalJumlah,
                'harga' => $harga,
                'total_harga' => $totalHarga,
            ];
        });

        return view('pages.laundry.cart', compact('carts', 'summary'));
    }


    public function add()
    {
        $carts = Cart::with(["pembayaran", "category"])->get();
        foreach($carts as $cart) {
            if($cart->pembayaran){
                $cart->pembayaran->update(['status' => '0']);
            }
        }
        Cart::truncate();
        return redirect(route('pages.historylaundry', ['auth' => 'admin']));
    }

    public function destroy(int $id) {
        $data = Cart::where('id', $id)->delete();
        return redirect('/dashboard/customer/cart');
    }
}
