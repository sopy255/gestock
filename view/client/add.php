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
    <h1>Ajouter un utilisateur</h1>
    <div class="container col-xl-6" style="text-align: left">
        <form action="<?=BASE_URL."/client/"?><?=(isset($action))? $action : ''?>" method="post">
            <input type="hidden" value="<?=(isset($id))? $id : ''?>" name="id_client">
            <div class="form-group">
                <label for="exampleInputEmail1">*Nom :</label>
                <input value="<?=(isset($name))? $name : ''?>" type="text" class="form-control" name="nom" id="name" required>
            </div>
            <div class="form-group">
                <label for="surname">Prénom :</label>
                <input type="text" value="<?=(isset($surname))? $surname : ''?>" class="form-control" name="prenom" id="surname">
            </div>
            <div class="form-group">
                <label for="address">Addresse :</label>
                <input type="text" value="<?=(isset($address))? $address : ''?>" class="form-control" name="addresse" id="address">
            </div>
            <button type="submit" class="btn btn-primary"><?=(isset($button))? $button : ''?></button>
        </form>
    </div>
</body>
</html>