<div class="alert alert-secondary container col-xl-4" role="alert">
    <h2>Facture par GestStock.1.0</h2>
    <hr>
    <table class="table facture" style="text-align: left">
        <tr>
            <td>Nom du client :</td>
            <td><?=(isset($client))? $client->nom. " " . $client->prenom : ''?></td>
        </tr>
        <tr>
            <td>Addresse du client :</td>
            <td><?=(isset($client))? $client->addresse : ''?></td>
        </tr>
        <tr>
            <td>Libele produit :</td>
            <td><?=(isset($produit))? $produit->libele : ''?></td>
        </tr>
        <tr>
            <td>prix unitaire :</td>
            <td><?=(isset($produit))? $produit->prixU . " FCFA" : ''?></td>
        </tr>
        <tr>
            <td>Quantité :</td>
            <td><?=(isset($cmd))? $cmd->qte : ''?></td>
        </tr>
        <tr>
            <td>Nette a payer :</td>
            <td><?=(isset($cmd) && (isset($produit)))? $cmd->qte * $produit->prixU . " FCFA" : ''?></td>
        </tr>
        <tr>
            <td>Date de la commande :</td>
            <td><?=(isset($cmd))? $cmd->dateCmt : ''?></td>
        </tr>
        <tr>
            <td>
                <button class="btn btn-lg btn-light disabled">Signtagure Client</button>
            </td>
            <td>
                <button class="btn btn-lg btn-light disabled">Signtagure Vendeur</button>
            </td>
        </tr>
    </table>
    <hr>
</div>

<div class="container col-xl-4">
    <button class="btn btn-block btn-primary" onclick="window.print()">Imprimer cette facture</button>
</div>
