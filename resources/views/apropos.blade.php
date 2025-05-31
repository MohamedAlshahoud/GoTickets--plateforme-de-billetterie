@extends('layouts.app')

@section('content')
<div class="container about-section">
    <div class="text-center mb-5">
        <h1 class="fw-bold">À propos de GoTickets</h1>
        <p class="text-muted">Découvrez, réservez et gérez vos billets d'événements locaux en toute simplicité.</p>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <h4 class="fw-semibold">Une plateforme locale</h4>
            <p>
                GoTickets facilite la découverte et la réservation d'événements autour de vous. Qu'il s'agisse de concerts, festivals, conférences ou autres, notre mission est de rendre chaque expérience accessible et agréable.
            </p>
        </div>
        <div class="col-md-6">
            <h4 class="fw-semibold">Réservation simple et rapide</h4>
            <p>
                En quelques clics, réservez vos billets en toute sécurité. Notre interface intuitive vous permet de gérer facilement vos achats et de consulter l’historique de vos commandes.
            </p>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <h4 class="fw-semibold">Espace personnel</h4>
            <p>
                Grâce à votre compte personnel, vous pouvez suivre vos réservations, accéder à vos billets et retrouver vos événements préférés en un seul endroit.
            </p>
        </div>
        <div class="col-md-6">
            <h4 class="fw-semibold">Sécurité & Confiance</h4>
            <p>
                GoTickets met un point d’honneur à la sécurité. Toutes les transactions sont protégées, et vos données sont traitées avec le plus grand soin.
            </p>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('events.index') }}" class="btn btn-primary px-4 py-2">Parcourir les événements</a>
    </div>
</div>
@endsection
