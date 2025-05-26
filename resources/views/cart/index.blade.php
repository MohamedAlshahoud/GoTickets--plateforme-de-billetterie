@extends('layouts.app')

@section('content')
    <h1>Mon panier</h1>

    @forelse ($items as $item)
        <div>
            <strong>{{ $item->event->title }}</strong><br>
            Quantité: 
            <form action="{{ route('cart.update', $item) }}" method="POST">
                @csrf
                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1">
                <button type="submit">Mettre à jour</button>
            </form>
            <form action="{{ route('cart.remove', $item) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Retirer</button>
            </form>
        </div>
    @empty
        <p>Votre panier est vide.</p>
    @endforelse
@endsection
