<div class="container col-xl-6">
    <h2>Entrer la quantité</h2>
    <?php
    if (isset($_GET["error"])) {
        ?>
        <div class="alert alert-info" role="alert">
            Entrer une quantité inferieur a <?=$_GET["error"]?>
        </div>
        <?php
    }
    ?>
    <form action="<?= BASE_URL . '/commande/add' ?>" method="post">
        <input type="hidden" name="id_client" value="<?= $id_client ?>">
        <input type="hidden" name="id_produit" value="<?= $id_produit ?>">
        <div class="form-group">
            <input type="number" name="qte" class="form-control" required>
        </div>
        <input class="btn btn-primary btn-block" type="submit" value="Valider">
    </form>
</div>