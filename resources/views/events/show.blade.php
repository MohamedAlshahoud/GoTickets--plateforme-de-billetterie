@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if($event->image_path)
                <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/600x400" class="img-fluid rounded">
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $event->title }}</h2>
            <p><strong>Lieu :</strong> {{ $event->location }}</p>
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</p>
            <p><strong>Prix :</strong> {{ number_format($event->price, 2) }} €</p>
            <p>{{ $event->description }}</p>

            <form method="POST" action="{{ route('cart.add', $event->id) }}">
                @csrf
                <button type="submit" class="btn btn-success mt-3">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>
@endsection
