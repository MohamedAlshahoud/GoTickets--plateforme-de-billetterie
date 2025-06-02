<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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
                "price" => $event->price,    // <-- Ajout du prix ici
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Événement ajouté au panier !');
    }

    public function updateQuantity(Request $request)
    {
        $itemId = $request->input('item_id');
        $quantity = $request->input('quantity');

        // Ici, tu devrais récupérer le panier en session ou depuis la BDD selon ton implémentation
        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = max(1, (int) $quantity); // On s'assure que quantité >= 1
            session()->put('cart', $cart);

            return response()->json([
                'success' => true,
                'new_quantity' => $cart[$itemId]['quantity']
            ]);
        }

        return response()->json(['success' => false], 400);
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
