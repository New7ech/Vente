@extends('layouts.app')

@section('contenus')
<div class="container mt-5">
    <h1>Liste des articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Créer un nouvel article</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->name }}</td>
                <td>{{ $article->description }}</td>
                <td>{{ $article->prix }}</td>
                <td>{{ $article->quantite }}</td>
                <td>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
