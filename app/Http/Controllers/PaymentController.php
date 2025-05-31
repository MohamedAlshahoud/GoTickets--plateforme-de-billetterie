<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Order $order)
    {
        return view('payment.checkout', compact('order'));
    }

    public function createCheckoutSession(Request $request, Order $order)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $lineItems = [];

        foreach ($order->orderItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item->event->title,
                    ],
                    'unit_amount' => intval($item->price * 100), // en centimes
                ],
                'quantity' => $item->quantity,
            ];
        }

        $checkoutSession = StripeSession::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
            'metadata' => [
                'order_id' => $order->id,
            ]
        ]);

        return redirect($checkoutSession->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));

        $orderId = $session->metadata->order_id;
        $order = \App\Models\Order::findOrFail($orderId);

        // 🔍 Debug avant mise à jour
        \Log::info('Paiement réussi reçu', [
            'session_id' => $session->id,
            'order_id' => $orderId,
            'ancien_statut' => $order->status,
        ]);

        $order->update(['status' => 'paid']);

        // 🔍 Debug après mise à jour
        \Log::info('Statut après update', [
            'nouveau_statut' => $order->fresh()->status
        ]);

        session()->forget('cart');

        return view('payment.success', compact('order'));
    }


    public function cancel()
    {
        return view('payment.cancel');
    }
}
