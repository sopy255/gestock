<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter d'un produit</h1>
    <div class="container col-xl-6" style="text-align: left">
        <form action="<?=BASE_URL."/produit/"?><?=(isset($action))? $action : ''?>" method="post">
            <input type="hidden" value="<?=(isset($id))? $id : ''?>" name="id_produit">
            <div class="form-group">
                <label for="exampleInputEmail1">*Reference Produit :</label>
                <input value="<?=(isset($refP))? $refP : ''?>" type="text" class="form-control" name="refP" id="name" required>
            </div>
            <div class="form-group">
                <label for="libele">Libellé :</label>
                <input type="text" value="<?=(isset($libele))? $libele : ''?>" class="form-control" name="libele" id="libele" required>
            </div>
            <div class="form-group">
                <label for="prixU">Prix unitaire:</label>
                <input type="number" value="<?=(isset($prixU))? $prixU : ''?>" class="form-control" name="prixU" id="prixU" required>
            </div>
            <div class="form-group">
                <label for="prixU">Quantité :</label>
                <input type="number" value="<?=(isset($qte))? $qte: ''?>" class="form-control" name="qte" id="qte" required>
            </div>
            <button type="submit" class="btn btn-primary"><?=(isset($button))? $button : ''?></button>
        </form>
    </div>
</body>
</html>