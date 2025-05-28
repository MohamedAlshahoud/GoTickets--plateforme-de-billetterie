<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }


    public function add(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $cart = session()->get('cart', []);

        if (isset($cart[$eventId])) {
            $cart[$eventId]['quantity']++;
        } else {
            $cart[$eventId] = [
                "title" => $event->title,
                "date" => $event->date,
                "location" => $event->location,
                "image" => $event->image_path,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Événement ajouté au panier !');
    }


    public function update(Request $request, $itemId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Quantité mise à jour.');
    }


    public function remove($itemId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Événement supprimé du panier.');
    }

}

