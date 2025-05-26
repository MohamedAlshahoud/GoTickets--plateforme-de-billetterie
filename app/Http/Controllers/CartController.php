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
        $items = CartItem::with('event')->where('user_id', auth()->id())->get();
        return view('cart.index', compact('items'));
    }

    public function add(Request $request, Event $event)
    {
        $item = CartItem::where('user_id', auth()->id())
            ->where('event_id', $event->id)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Événement ajouté au panier.');
    }

    public function update(Request $request, CartItem $item)
    {
        $item->update([
            'quantity' => $request->input('quantity'),
        ]);

        return back()->with('success', 'Quantité mise à jour.');
    }

    public function remove(CartItem $item)
    {
        $item->delete();
        return back()->with('success', 'Événement supprimé du panier.');
    }
}

