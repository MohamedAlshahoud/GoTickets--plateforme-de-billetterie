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
                @php $grandTotal = 0; @endphp
                @foreach($cart as $id => $item)
                    @php
                        $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total;
                    @endphp
                    <tr data-id="{{ $id }}">
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['location'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['date'])->format('d/m/Y') }}</td>
                        <td class="unit-price">{{ number_format($item['price'], 2) }} €</td>
                        <td>
                            <div class="input-group quantity-control" data-id="{{ $id }}">
                                <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control quantity-input" style="width: 60px; text-align:center;">
                                <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                            </div>
                        </td>

                        <td class="total-price">{{ number_format($total, 2) }} €</td>
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

        <h4 class="text-end">Total à payer : <span id="grandTotal">{{ number_format($grandTotal, 2) }}</span> €</h4>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ url('/') }}" class="btn btn-secondary">Continuer vos réservations</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-success">Passer la commande</a>
        </div>

    @else
        <p>Votre panier est vide.</p>
    @endif
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.quantity-control').forEach(control => {
        const input = control.querySelector('.quantity-input');
        const id = control.getAttribute('data-id');

        control.querySelector('.btn-increase').addEventListener('click', () => {
            input.value = parseInt(input.value) + 1;
            updateQuantity(id, input.value);
        });

        control.querySelector('.btn-decrease').addEventListener('click', () => {
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateQuantity(id, input.value);
            }
        });

        input.addEventListener('change', () => {
            let val = parseInt(input.value);
            if (isNaN(val) || val < 1) {
                val = 1;
                input.value = val;
            }
            updateQuantity(id, val);
        });
    });

    function updateQuantity(id, quantity) {
        fetch(`{{ route('cart.updateQuantity') }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ item_id: id, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                const row = document.querySelector(`tr[data-id="${id}"]`);
                const priceText = row.querySelector('.unit-price').innerText.replace('€', '').replace(',', '.');
                const price = parseFloat(priceText);
                const total = (price * quantity).toFixed(2).replace('.', ',');

                row.querySelector('.total-price').innerText = total + ' €';
                updateGrandTotal();
            } else {
                alert('Erreur lors de la mise à jour du panier.');
            }
        })
        .catch(() => alert('Erreur réseau.'));
    }

    function updateGrandTotal() {
        let total = 0;
        document.querySelectorAll('.total-price').forEach(cell => {
            const value = parseFloat(cell.innerText.replace('€', '').replace(',', '.'));
            total += value;
        });

        document.getElementById('grandTotal').innerText = total.toFixed(2).replace('.', ',');
    }
});
</script>
@endsection
