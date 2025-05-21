@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Résultats de la recherche</h2>

    @if($events->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            @foreach($events as $event)
                <div class="col">
                    <div class="card h-100 shadow-lg rounded-3 border-light">
                        @if($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top" alt="Image de l'événement">
                        @else
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Image de l'événement">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                            <p class="text-end"><strong>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</strong></p>
                            <a href="#" class="btn btn-primary w-100 mt-3">Réserver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Aucun événement trouvé.</p>
    @endif
</div>
@endsection
