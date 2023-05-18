<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $libro = Http::get('https://priceless-jemison.212-227-147-154.plesk.page/api/libros/' . $id)->json();

        if (!$libro) {
            abort(404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "title" => $libro['libro']['title'],
                "quantity" => 1,
                "price" => $libro['libro']['price'],
                "photo" => $libro['libro']['image'],
            ];
        }

        session()->put('cart', $cart);

        return redirect(route('store'));
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect(route('cart'));
    }

}
