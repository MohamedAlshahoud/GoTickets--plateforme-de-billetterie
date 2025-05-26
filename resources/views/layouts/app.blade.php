<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <header>
        <div class="top-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">FR</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">|</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">EN</a></li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">Mon Profil</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">Se déconnecter</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Se connecter</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Créer un compte</a></li>
                        @endauth
                        <li class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="bi bi-cart-fill me-1"></i>
                                @auth
                                    @php
                                        $cartCount = \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity');
                                    @endphp
                                    @if($cartCount > 0)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ $cartCount }}
                                        </span>
                                    @endif
                                @endauth
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light main-nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">GoTickets</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Accueil</a></li>
                        <li class="nav-item">
                            @if(Auth::check() && Auth::user()->role === 'admin')
                                <a class="nav-link" href="{{ url('/dashboard') }}">Admin</a>
                            @endif
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/events') }}">Événements</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">A propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contactez-nous</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main class="flex-grow-1 container py-4">
        @yield('content')
    </main>

    <footer class="bg-dark text-white pt-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <h5 class="text-uppercase">À propos de GoTickets</h5>
                    <p class="small">GoTickets est une plateforme de réservation d'événements locaux, offrant une expérience fluide pour trouver et réserver des billets pour des événements près de chez vous.</p>
                </div>

                <div class="col-md-3 mb-3">
                    <h5 class="text-uppercase">Coordonnées</h5>
                    <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Quai de Rome 99 , 4000 Liège</p>
                    <p class="mb-0"><i class="bi bi-telephone-fill me-2"></i>+32 489 47 08 53</p>
                </div>

                <div class="col-md-3 mb-3">
                    <h5 class="text-uppercase">Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/contact') }}" class="text-white text-decoration-none">Contactez-nous</a></li>
                        <li><a href="{{ url('/terms') }}" class="text-white text-decoration-none">Mentions légales</a></li>
                        <li><a href="{{ url('/privacy-policy') }}" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb-3">
                    <h5 class="text-uppercase">Suivez-nous</h5>
                    <a href="#" class="text-white me-3 fs-4" title="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4" title="Twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-3 fs-4" title="Instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white fs-4" title="GitHub"><i class="bi bi-github"></i></a>
                </div>
            </div>

            <hr class="border-secondary">

            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} GoTickets. Tous droits réservés.</p>
                    <small><a href="{{ url('/privacy-policy') }}" class="text-white text-decoration-none">Politique de confidentialité</a></small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>