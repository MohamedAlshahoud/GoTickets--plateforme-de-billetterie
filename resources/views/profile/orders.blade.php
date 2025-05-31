@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2>Mes commandes</h2>

    @if($orders->isEmpty())
        <p>Vous n'avez aucune commande pour le moment.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Numéro de commande</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Articles</th>
                    <th>Total (€)</th>
                    <th>Actions</th> <!-- Colonne pour le bouton -->
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($order->status === 'paid')
                            <span class="badge bg-success">Payé</span>
                        @else
                            <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <ul>
                            @foreach($order->orderItems as $item)
                                <li>{{ $item->quantity }} x {{ $item->event->title }} ({{ number_format($item->price, 2) }} €)</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ number_format($order->orderItems->sum(fn($item) => $item->price * $item->quantity), 2) }} €
                    </td>
                    <td>
                        <a href="{{ route('profile.orders.show', $order->id) }}" class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
