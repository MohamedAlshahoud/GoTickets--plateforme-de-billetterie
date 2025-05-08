@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-4 text-center">Créer un compte</h3>

                @if(session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Créer un compte</button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}">Déjà inscrit ? Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS de validation mot de passe -->
<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');

        if (password.value.length < 6) {
            alert('Le mot de passe doit contenir au moins 6 caractères.');
            password.focus();
            event.preventDefault();
        }

        if (password.value !== confirmPassword.value) {
            alert('Les mots de passe ne correspondent pas.');
            confirmPassword.focus();
            event.preventDefault();
        }
    });
</script>
@endsection
