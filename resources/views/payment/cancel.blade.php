@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2>Paiement annulé</h2>
    <p>Le paiement a été annulé. Vous pouvez réessayer ou revenir à l'accueil.</p>
    <a href="{{ route('checkout.payment', $order->id ?? 0) }}" class="btn btn-warning mt-3">Réessayer</a>
    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Accueil</a>
</div>
@endsection
