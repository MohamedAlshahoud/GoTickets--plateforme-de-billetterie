@extends('layouts.app')

@section('content')
<div class="container">
    <div class="main-header">
        <div class="container">
            <h1>Réservez vos billets pour les événements locaux en quelques clics</h1>
            <form method="GET" action="{{ route('search.events') }}" class="search-container">
                <input type="text" name="title" class="search-input" placeholder="Nom de l'événement" value="{{ request('title') }}">
                <input type="text" name="location" class="search-input" placeholder="Où ? (Location...)" value="{{ request('location') }}">
                <button type="submit" class="search-button">Rechercher</button>
            </form>


        </div>
    </div>
    <!-- Section de bienvenue -->
    <div class="text-center mb-5">
        <h1 class="display-4">Bienvenue sur <span class="text-primary">GoTickets</span> !</h1>
        <p class="lead">Trouvez, explorez et réservez les meilleurs événements près de chez vous.</p>
    </div>

    <!-- Titre des événements -->
    <h2 class="display-4 text-center mb-5"><span class="text-primary">Événements</span> à venir !</h2> <!-- Augmentation de l'espacement ici -->

    <!-- Liste des événements -->
    @if($events->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5"> <!-- Espacement supplémentaire entre la liste et la section mise en avant -->
            @foreach($events as $event)
                <div class="col">
                    <div class="card h-100 shadow-lg rounded-3 border-light">
                        <!-- Image de l'événement -->
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top" alt="Image de l'événement">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Image de l'événement">
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p> <!-- Limitation du texte -->
                            <p class="text-end"><strong>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</strong></p>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100 mt-3">Réserver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Aucun événement à venir.</p>
    @endif

    <!-- Section mise en avant -->
    <div class="row mb-5">
        <div class="col-md-4 text-center">
            <i class="bi bi-calendar-event fs-1 text-primary"></i>
            <h4 class="mt-3">Des événements pour tous</h4>
            <p>Concerts, ateliers, conférences, sports et plus encore. GoTickets vous connecte à tout ce qui se passe autour de vous.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="bi bi-ticket-perforated fs-1 text-success"></i>
            <h4 class="mt-3">Réservez en quelques clics</h4>
            <p>Réservation rapide et sécurisée. Recevez vos billets par email et gérez vos réservations facilement.</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="bi bi-geo-alt fs-1 text-danger"></i>
            <h4 class="mt-3">100% local</h4>
            <p>Nous mettons en avant les événements de votre région. Soutenez les initiatives locales en y participant.</p>
        </div>
    </div>
</div>
@endsection
