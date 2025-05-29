<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function confirm(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        // Calcul du total
        $grandTotal = 0;
        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        // Création de la commande
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $grandTotal,
        ]);

        // Création des items de commande
        foreach ($cart as $eventId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'event_id' => $eventId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Vider le panier
        session()->forget('cart');

        return redirect()->route('checkout.payment', ['order' => $order->id]);
    }


    public function payment(Order $order)
    {
        return view('checkout.payment', compact('order'));
    }

}
