@extends('layouts.app')

@section('title', 'AfamiaShop | Panier')

@section('content')
<div class="main_content">
    <div class="section">
        <div class="container">
            @if(count($items) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>
                                                <img width="50" src="{{ asset('storage/' . $item['product']->imageUrls[0]) }}" alt="{{ $item['product']->name }}">
                                            </td>
                                            <td>{{ __($item['product']->name) }}</td>
                                            <td>€ {{ number_format($item['product']->price / 100, 2, '.', ',') }}</td>
                                            <td>
                                                <div class="quantity">
                                                    <a href="{{ route('cart.remove', [$item['product']->id, 1]) }}">
                                                        <input type="button" value="-" class="minus">
                                                    </a>
                                                    <input type="text" name="quantity" value="{{ $item['quantity'] }}" size="4" class="qty" readonly>
                                                    <a href="{{ route('cart.add', [$item['product']->id, 1]) }}">
                                                        <input type="button" value="+" class="plus">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>€ {{ number_format($item['sub_total'] / 100, 2, '.', ',') }}</td>
                                            <td>
                                                <a href="{{ route('cart.remove', [$item['product']->id, $item['quantity']]) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 offset-md-6">
                        <table class="table">
                            <tr>
                                <td>Sous-total HTVA</td>
                                <td>€ {{ number_format($sub_total_htva / 100, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td>TVA</td>
                                <td>€ {{ number_format($tva / 100, 2, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>€ {{ number_format($sub_total / 100, 2, '.', ',') }}</th>
                            </tr>
                        </table>
                        <div class="btns-group mt-3">
                            <a href="/" class="btn btn-outline-secondary">Continuer vos achats</a>
                            <a href="/order/create" class="btn btn-primary">Passer à la caisse</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h3>Votre panier est vide</h3>
                        <p>Découvrez nos produits</p>
                        <a href="/shop" class="btn btn-fill-out">Découvrir nos produits</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
