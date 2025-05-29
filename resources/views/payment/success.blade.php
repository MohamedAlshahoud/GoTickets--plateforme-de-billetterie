@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2>Paiement réussi !</h2>
    <p>Merci pour votre commande #{{ $order->id }}.</p>
    <a href="{{ url('/') }}" class="btn btn-success mt-3">Retour à l'accueil</a>
</div>
@endsection
