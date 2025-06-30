@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="search-results-title mb-4 text-center">Résultats de la recherche</h2>

    @if($events->count())
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($events as $event)
                <div class="col">
                    <div class="card h-100 shadow rounded">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Image de l'événement" class="card-img-top" style="object-fit: cover; height: 200px;">
                        @else
                            <img src="https://via.placeholder.com/350x200" alt="Image de l'événement" class="card-img-top">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>

                            <div class="d-flex justify-content-between align-items-center mb-3 mt-auto">
                                <span>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</span>
                                <span class="fw-bold text-success">{{ number_format($event->price, 2) }} €</span>
                            </div>

                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">Réserver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Aucun événement trouvé.</p>
    @endif
</div>
@endsection
