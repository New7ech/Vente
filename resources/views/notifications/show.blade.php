@extends('layouts.app')

@section('contenus')
<div class="container">
    <h1>Détails de la Notification</h1>

    @if ($notification)
        <div class="alert alert-info">
            <p>{{ json_decode($notification->data)->message }}</p>
            <p>Status : {{ $notification->read_at ? 'Lu' : 'Non lu' }}</p>

            @if ($notification->read_at)
                <span class="btn btn-secondary disabled">Déjà lu</span>
            @else
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Marquer comme lu</button>
                </form>
            @endif
        </div>
    @else
        <p>Aucune notification trouvée.</p>
    @endif
</div>
@endsection