@extends('layouts.app')

@section('content')
<div class="main_content my-5">
    <div class="container">
        <div class="row">
            <!-- Menu latéral -->
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="">
                                <i class="fas fa-user"></i> Détails du compte
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bi bi-cart-check-fill"></i> Vos commandes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="bi bi-geo-alt-fill"></i> Vos adresses
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Détails du profil -->
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="account-detail">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Profil de {{ Auth::user()->name }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <strong>Nom d'utilisateur :</strong>
                                    </div>
                                    <div class="col-md-6">
                                        {{ Auth::user()->name }}
                                    </div>

                                    <div class="col-md-6">
                                        <strong>Email :</strong>
                                    </div>
                                    <div class="col-md-6">
                                        {{ Auth::user()->email }}
                                    </div>

                                    <div class="col-md-6">
                                        <strong>Créé le :</strong>
                                    </div>
                                    <div class="col-md-6">
                                        {{ Auth::user()->created_at->format('d/m/Y') }}
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2">
                                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Modifier mon profil</a>
                                    <a href="{{ route('password.request') }}" class="btn btn-secondary">Modifier mon mot de passe</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end tab -->
                </div> <!-- end tab-content -->
            </div>
        </div>
    </div>
</div>
@endsection
