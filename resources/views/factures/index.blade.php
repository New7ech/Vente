@extends('layouts.app')

@section('contenus')
<div class="container mt-5">
    <h1>Liste des factures</h1>
    <form action="{{ route('factures.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Rechercher..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </form>
    <a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">Créer une nouvelle facture</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Date</th>
                <th>Montant HT</th>
                <th>Montant TTC</th>
                <th>Statut de paiement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
            <tr>
                <td>{{ $facture->id }}</td>
                <td>{{ $facture->date_facture }}</td>
                <td>{{ $facture->montant_ht }}</td>
                <td>{{ $facture->montant_ttc }}</td>
                <td>{{ $facture->statut_paiement }}</td>
                <td>
                    <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;">
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
