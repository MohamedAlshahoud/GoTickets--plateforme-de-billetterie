@extends('layouts.app')

@section('content')
<div class="verification-container">

    <h1 class="verification-title">📩 Vérification de l’adresse email</h1>

    <p class="verification-text">
        Merci pour ton inscription ! Avant de commencer, confirme ton adresse email en cliquant sur le lien que nous venons de t’envoyer.
    </p>

    <p class="verification-text">
        Si tu n’as pas reçu l’email, clique sur le bouton ci-dessous pour en recevoir un nouveau.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success verification-alert" role="alert">
            ✅ Un nouveau lien de vérification a été envoyé à ton adresse email.
        </div>
    @endif

    <div class="verification-button-container">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="verification-button">
                Renvoyer l'email de vérification
            </button>
        </form>
    </div>

</div>
@endsection
