@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-4">Bienvenue sur <span class="text-primary">GoTickets</span> !</h1>
        <p class="lead">Trouvez, explorez et réservez les meilleurs événements près de chez vous.</p>
    </div>

    <h1 class="display-4 text-center"> <span class="text-primary">Événements</span> à venir !</h1>
    @if($events->count())
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($event->image_path)
                            <img src="{{ asset('storage/events/' . $event->image_path) }}" alt="{{ $event->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="text-end"><strong>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</strong></p>
                            <a href="#" class="btn btn-primary w-100 mt-3">Réserver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucun événement à venir.</p>
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
