@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Mon Panier</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart))
        <table class="table">
            <thead>
                <tr>
                    <th>Événement</th>
                    <th>Lieu</th>
                    <th>Date</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                @endphp
                @foreach($cart as $id => $item)
                    @php
                        $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['location'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['date'])->format('d/m/Y') }}</td>
                        <td>{{ number_format($item['price'], 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" style="width: 60px;">
                                <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
                            </form>
                        </td>
                        <td>{{ number_format($total, 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end">Total à payer : {{ number_format($grandTotal, 2) }} €</h4>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url('/') }}" class="btn btn-secondary">Continuer vos réservations</a>
            <a href="" class="btn btn-success">Passer la commande</a>
        </div>

    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection
