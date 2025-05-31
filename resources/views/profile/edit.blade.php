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
                            <a class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user"></i> Détails du compte
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile.orders') || request()->routeIs('profile.order.show') ? 'active' : '' }}" href="{{ route('profile.orders') }}">
                                <i class="bi bi-cart-check-fill"></i> Vos commandes
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Contenu dynamique selon la route -->
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">

                    @if(request()->routeIs('profile.edit'))
                        <div class="tab-pane fade show active" id="account-detail">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="card shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="mb-0">Modifier votre profil</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('PATCH')

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nom d'utilisateur</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}">
                                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Adresse email</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Créé le</label>
                                            <input type="text" class="form-control" value="{{ Auth::user()->created_at->format('d/m/Y') }}" disabled>
                                        </div>

                                        <div class="mt-4 d-flex gap-2">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                            <a href="{{ route('password.request') }}" class="btn btn-secondary">Modifier le mot de passe</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif(request()->routeIs('profile.orders'))
                        <div class="tab-pane fade show active" id="orders-detail">
                            <h2>Mes commandes</h2>

                            @if($orders->isEmpty())
                                <p>Vous n'avez aucune commande pour le moment.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Numéro de commande</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Articles</th>
                                            <th>Total (€)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                @if($order->status === 'paid')
                                                    <span class="badge bg-success">Payé</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach($order->orderItems as $item)
                                                        <li>{{ $item->quantity }} x {{ $item->event->title }} ({{ number_format($item->price, 2) }} €)</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                {{ number_format($order->orderItems->sum(fn($item) => $item->price * $item->quantity), 2) }} €
                                            </td>
                                            <td>
                                                <a href="{{ route('profile.order.show', $order) }}" class="btn btn-sm btn-primary">Voir</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
