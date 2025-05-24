@extends('layouts.app')

@section('contenus')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>{{ $article->name }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $article->description }}</p>
            <p><strong>Prix:</strong> {{ $article->prix }} €</p>
            <p><strong>Quantité:</strong> {{ $article->quantite }}</p>
            <p><strong>Catégorie:</strong> {{ $article->categorie->name }}</p>
            <p><strong>Fournisseur:</strong> {{ $article->fournisseur->name }}</p>
            <p><strong>Emplacement:</strong> {{ $article->emplacement->name }}</p>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
