@extends('layouts.app')

@section('contenus')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Facture #{{ $facture->id }}</h1>
        </div>
        <div class="card-body">
            <p><strong>Date:</strong> {{ $facture->date_facture }}</p>
            <p><strong>Montant HT:</strong> {{ $facture->montant_ht }}</p>
            <p><strong>TVA:</strong> {{ $facture->tva }}%</p>
            <p><strong>Montant TTC:</strong> {{ $facture->montant_ttc }}</p>
            <p><strong>Mode de paiement:</strong> {{ $facture->mode_paiement }}</p>
            <p><strong>Statut de paiement:</strong> {{ $facture->statut_paiement }}</p>
            <p><strong>Date de paiement:</strong> {{ $facture->date_paiement }}</p>
            <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
