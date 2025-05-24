@extends('layouts.app')

@section('contenus')
<div class="container">
    <h1>Notifications</h1>
    @if ($notifications->isEmpty())
        <p>Aucune notification.</p>
    @else
        @foreach ($notifications as $notification)
            <div class="alert alert-info">
                @php
                    $data = json_decode($notification->data);
                @endphp
                @if ($data && isset($data->message))
                    {{ $data->message }}
                @else
                    <p>Données de notification non disponibles.</p>
                @endif
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Marquer comme lu</button>
                </form>
            </div>
        @endforeach
    @endif
</div>
@endsection