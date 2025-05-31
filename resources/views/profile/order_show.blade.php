@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Détails de la commande #{{ $order->id }}</h2>

    <ul class="list-group mb-3">
        @foreach ($order->orderItems as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $item->event->title }}</strong><br>
                Quantité : {{ $item->quantity }}<br>
                Prix unitaire : {{ number_format($item->price, 2) }} €
            </div>
            <span>{{ number_format($item->price * $item->quantity, 2) }} €</span>
        </li>
        @endforeach
    </ul>

    <h4>Total : {{ number_format($order->total_price, 2) }} €</h4>

    <a href="{{ route('profile.orders') }}" class="btn btn-secondary mt-3">Retour aux commandes</a>
</div>
@endsection
