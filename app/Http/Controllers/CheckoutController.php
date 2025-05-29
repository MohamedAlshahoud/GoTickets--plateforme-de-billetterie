<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function confirm(Request $request)
    {
        // Ici tu pourras enregistrer la commande dans la base si besoin

        session()->forget('cart'); // vider le panier

        return redirect()->route('events.index')->with('success', 'Réservation confirmée !');
    }
}
