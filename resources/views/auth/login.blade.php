@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-4 text-center">Connexion</h3>

                {{-- Message de succès --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Erreurs globales --}}
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Adresse e-mail -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <!-- Se souvenir de moi -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                Mot de passe oublié ?
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('register') }}">Créer un compte</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
