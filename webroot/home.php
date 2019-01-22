<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestionaire</title>
    <link rel="stylesheet" href="<?=BASE_URL.'/'?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL.'/'?>css/style.css">
    <script src="<?=BASE_URL.'/'?>script/jquery.min.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">GesTock</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Visualiser
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href='<?=BASE_URL . "/commande/getAll"?>'>Commande</a>
                    <a class="dropdown-item" href="#">Bon de Livraison</a>
                    <a class="dropdown-item" href="#">Facture</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Client
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href=<?=BASE_URL."/client/getAll"?>>Lister</a>
                    <a class="dropdown-item" href="<?=BASE_URL."/client/add"?>">Ajouter</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Edition
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?=BASE_URL.'/commande/add'?>">Comande</a>
                    <a class="dropdown-item" href="<?=BASE_URL.'/facture/newF'?>">Facture</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Produits
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href=<?=BASE_URL."/produit/getAll"?>>Lister</a>
                    <a class="dropdown-item" href="<?=BASE_URL."/produit/add"?>">Ajouter</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Administration
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Modifier le compte</a>
                </div>
            </li>
        </ul>
        <a class="navbar-text" href="<?=BASE_URL?>/agent/disconnect">
            <button class="btn btn-sm btn-danger">Deconnection</button>
        </a>
    </div>
</nav>


<?php if (!empty($cont)) {
    ?>
    <div id="content" class="content">
        <?= $cont ?>
    </div>
    <?php
} else {
    ?>
    <div id="content" class="default">
        <div class="alert alert-info" role="alert">
            Veuiller vous servir des menu ci-dessus pour pourvoir controller le système.
        </div>
    </div>
    <?php
}
?>
<script src="<?=BASE_URL.'/'?>script/bootstrap.min.js"></script>
<script src="<?=BASE_URL.'/'?>script/script.js"></script>
</body>
</html>