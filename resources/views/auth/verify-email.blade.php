@extends('layouts.app')

@section('content')
    <div class="mb-6 text-sm text-gray-700">
        Merci pour ton inscription ! <br>
        Avant de commencer, confirme ton adresse email en cliquant sur le lien que nous venons de t’envoyer.

        <br><br>
        Si tu n’as pas reçu l’email, clique sur le bouton ci-dessous pour en recevoir un nouveau.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            ✅ Un nouveau lien de vérification a été envoyé à ton adresse email.
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                Renvoyer l'email de vérification
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
                Se déconnecter
            </button>
        </form>
    </div>
@endsection
