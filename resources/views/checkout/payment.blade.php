@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Commande #{{ $order->id }} - Paiement</h2>

    <p>Merci pour votre réservation ! Voici un récapitulatif :</p>

    <ul class="list-group mb-3">
        @foreach ($order->orderItems as $item)
            <li class="list-group-item d-flex justify-content-between">
                <div>
                    <strong>{{ $item->event->title }}</strong><br>
                    Quantité : {{ $item->quantity }}<br>
                    Prix unitaire : {{ number_format($item->price, 2) }} €
                </div>
                <span>{{ number_format($item->price * $item->quantity, 2) }} €</span>
            </li>
        @endforeach
    </ul>

    <h4>Total à payer : {{ number_format($order->total_price, 2) }} €</h4>

    <form action="#" method="POST">
        @csrf
        {{-- Ici tu pourras intégrer un bouton de paiement réel plus tard --}}
        <button class="btn btn-primary">Payer maintenant</button>
    </form>
</div>
@endsection
