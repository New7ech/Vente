<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        color: #333;
        font-size: 14px;
        margin: 40px;
    }

    .facture-header {
        border-bottom: 2px solid #444;
        margin-bottom: 30px;
        padding-bottom: 10px;
    }

    .facture-header h1 {
        font-size: 24px;
        margin: 0;
        color: #007BFF;
    }

    .facture-header p {
        margin: 5px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    table thead {
        background-color: #f1f1f1;
    }

    table th, table td {
        padding: 8px 12px;
        border: 1px solid #ccc;
        text-align: left;
    }

    table th {
        background-color: #f8f8f8;
    }

    .facture-total {
        width: 300px;
        float: right;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 6px;
        background-color: #f9f9f9;
    }

    .facture-total h3 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 18px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .facture-total p {
        margin: 5px 0;
    }

    .facture-total p strong {
        color: #28a745;
        font-size: 16px;
    }
</style>

<div class="facture-header">
    <h1>Facture n° {{ $facture->numero }}</h1>
    <p>Date d’émission : {{ $facture->date_facture->format('d/m/Y') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Prix unitaire (FCFA)</th>
            <th>Montant HT (FCFA)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($details as $detail)
            <tr>
                <td>{{ $detail['article']->name }}</td>
                <td>{{ $detail['quantity'] }}</td>
                <td>{{ number_format($detail['prix_unitaire'], 0, ',', ' ') }}</td>
                <td>{{ number_format($detail['montant_ht'], 0, ',', ' ') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="facture-total">
    <h3>Résumé</h3>
    <p>Montant HT : {{ number_format($facture->montant_ht, 0, ',', ' ') }} FCFA</p>
    <p>TVA ({{ $facture->tva }}%) :
        {{ number_format($facture->montant_ht * $facture->tva / 100, 0, ',', ' ') }} FCFA</p>
    <p><strong>Montant TTC :
        {{ number_format($facture->montant_ttc, 0, ',', ' ') }} FCFA</strong></p>
</div>
