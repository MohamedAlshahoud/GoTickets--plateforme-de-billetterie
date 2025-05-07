@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h1 class="display-4">Bienvenue sur <span class="text-primary">GoTickets</span> !</h1>
        <p class="lead">Trouvez, explorez et réservez les meilleurs événements près de chez vous.</p>
        <a href="{{ url('/events') }}" class="btn btn-primary btn-lg mt-3">Voir les événements</a>
    </div>

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

    <!-- Événements populaires (Exemple statique ou dynamique plus tard) -->
    <h3 class="mb-4">Événements populaires</h3>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Concert Live - Lyon</h5>
                    <p class="card-text">Une soirée inoubliable avec les meilleurs artistes locaux.</p>
                    <a href="{{ url('/events') }}" class="btn btn-outline-primary">Réserver</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Conférence Tech</h5>
                    <p class="card-text">Les tendances technologiques du moment présentées par des experts.</p>
                    <a href="{{ url('/events') }}" class="btn btn-outline-primary">Réserver</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Festival Gastronomique</h5>
                    <p class="card-text">Venez goûter aux saveurs locales et rencontrer les chefs de la région.</p>
                    <a href="{{ url('/events') }}" class="btn btn-outline-primary">Réserver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection