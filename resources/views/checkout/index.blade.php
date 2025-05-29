@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Confirmation de la commande</h2>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Événement</th>
                <th>Lieu</th>
                <th>Date</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cart as $item)
                @php
                    $total = $item['price'] * $item['quantity'];
                    $grandTotal += $total;
                @endphp
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['location'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($item['date'])->format('d/m/Y') }}</td>
                    <td>{{ number_format($item['price'], 2) }} €</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($total, 2) }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-end">Total à payer : {{ number_format($grandTotal, 2) }} €</h4>

    <form action="{{ route('checkout.confirm') }}" method="POST" class="mt-4 text-end">
        @csrf
        <button type="submit" class="btn btn-success">Valider la réservation</button>
    </form>
</div>
@endsection
