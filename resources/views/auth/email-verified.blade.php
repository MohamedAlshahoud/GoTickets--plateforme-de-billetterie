@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-xl rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold mb-4 text-green-600">✅ Adresse e-mail vérifiée</h2>
        <p class="text-gray-700 mb-6">
            Ton adresse e-mail a bien été vérifiée. Tu peux maintenant te connecter à ton compte.
        </p>

        <a href="{{ route('login') }}"
           class="inline-block bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
            👉 Se connecter
        </a>
    </div>
</div>
@endsection
