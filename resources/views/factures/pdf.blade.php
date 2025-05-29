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

<div class="container">
    <div class="facture-header">
        <h1>Facture n° {{ $facture->numero }}</h1>
        <p>Date d’émission : {{ $facture->date_facture ? \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') : 'N/A' }}</p>
    </div>

    <div class="header-info" style="display: flex; justify-content: space-between; margin-bottom: 30px;">
        <div class="company-info" style="width: 48%;">
            <h3>Votre Entreprise</h3>
            <p>Nom de l'entreprise XYZ</p>
            <p>123 Rue de l'Exemple, Ville</p>
            <p>Téléphone: +221 XX XXX XX XX</p>
            <p>Email: contact@xyz.com</p>
        </div>
        <div class="client-info" style="width: 48%;">
            <h3>Client</h3>
            <p><strong>Nom:</strong> {{ $facture->client_nom ?? 'N/A' }} {{ $facture->client_prenom ?? '' }}</p>
            <p><strong>Adresse:</strong> {{ $facture->client_adresse ?? 'N/A' }}</p>
            <p><strong>Téléphone:</strong> {{ $facture->client_telephone ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $facture->client_email ?? 'N/A' }}</p>
        </div>
    </div>

    <hr style="margin-bottom: 20px;">

    <p><strong>Numéro de Facture:</strong> {{ $facture->numero ?? $facture->id }}</p>
    <p><strong>Statut de Paiement:</strong> {{ ucfirst($facture->statut_paiement ?? 'N/A') }}</p>
    @if($facture->mode_paiement)
    <p><strong>Mode de Paiement:</strong> {{ $facture->mode_paiement }}</p>
    @endif

    <h2 style="text-align: center; color: #333; margin-top: 30px; margin-bottom:15px;">Détails de la Facture</h2>
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
        @forelse($details as $detail)
            <tr>
                <td>{{ $detail['article']->name ?? 'N/A' }}</td>
                <td>{{ $detail['quantity'] }}</td>
                <td>{{ number_format($detail['prix_unitaire'], 0, ',', ' ') }} FCFA</td>
                <td>{{ number_format($detail['montant_ht'], 0, ',', ' ') }} FCFA</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align: center;">Aucun article sur cette facture.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="total-section text-right" style="margin-top: 30px; text-align:right;">
    <table style="width: auto; float: right; margin-left: auto;">
        <tr>
            <td style="border: none; padding: 5px 0;"><strong>Montant HT Total:</strong></td>
            <td style="border: none; padding: 5px 10px;">{{ number_format($facture->montant_ht, 0, ',', ' ') }} FCFA</td>
        </tr>
        <tr>
            <td style="border: none; padding: 5px 0;"><strong>TVA ({{ $facture->tva }}%):</strong></td>
            <td style="border: none; padding: 5px 10px;">{{ number_format(($facture->montant_ttc - $facture->montant_ht), 0, ',', ' ') }} FCFA</td>
        </tr>
        <tr>
            <td style="border: none; padding: 5px 0;"><strong>Montant TTC Total:</strong></td>
            <td style="border: none; padding: 5px 10px;"><strong>{{ number_format($facture->montant_ttc, 0, ',', ' ') }} FCFA</strong></td>
        </tr>
    </table>
</div>
<div style="clear:both;"></div>

<div class="footer" style="text-align: center; margin-top: 50px; font-size: 0.9em; color: #777;">
    <p>Merci de votre confiance.</p>
</div>

</div>
