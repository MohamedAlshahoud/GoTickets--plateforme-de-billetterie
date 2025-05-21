@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="search-results-title">Résultats de la recherche</h2>

    @if($events->count())
        <div class="search-results-container">
            @foreach($events as $event)
                <div class="event-card">
                    @if($event->image_path)
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="Image de l'événement" class="event-card-img">
                    @else
                        <img src="https://via.placeholder.com/350x200" alt="Image de l'événement" class="event-card-img">
                    @endif
                    <div class="card-body p-3">
                        <h5>{{ $event->title }}</h5>
                        <h6 class="text-muted">{{ $event->location }}</h6>
                        <p>{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                        <p class="text-end"><strong>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</strong></p>
                        <a href="#" class="btn btn-primary w-100 mt-auto">Réserver</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Aucun événement trouvé.</p>
    @endif
</div>
@endsection
