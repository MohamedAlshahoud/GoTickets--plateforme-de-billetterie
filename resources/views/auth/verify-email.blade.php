@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="shadow-sm p-5 bg-light rounded border">

                <h1 class="text-center mb-4">📩 Vérification de l’adresse email</h1>

                <p class="text-muted mb-4">
                    Merci pour ton inscription ! Avant de commencer, confirme ton adresse email en cliquant sur le lien que nous venons de t’envoyer.
                </p>

                <p class="text-muted">
                    Si tu n’as pas reçu l’email, clique sur le bouton ci-dessous pour en recevoir un nouveau.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success mt-4" role="alert">
                        ✅ Un nouveau lien de vérification a été envoyé à ton adresse email.
                    </div>
                @endif

                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary px-4">
                            Renvoyer l'email de vérification
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
