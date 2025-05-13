@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Événements à venir</h2>

    @if($events->count())
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="text-end"><strong>{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y') }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Aucun événement à venir.</p>
    @endif
</div>
@endsection
