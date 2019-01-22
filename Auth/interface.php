<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connection</title>
    <link rel="stylesheet" href="<?= BASE_URL . '/' ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL . '/' ?>css/style.css">
</head>
<body>
<div class="container col-xl-6 col-md-8 col-sm-10">
    <h2 style="text-align: center">Connection</h2>
    <form action="Auth.php" method="post">
        <div class="form-group">
            <label for="name">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="name_auth" id="name" placeholder="Entrer votre nom :">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password"
                   placeholder="Entrer le mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Connection</button>
    </form>
    <?php
    if (isset($error)) {
        ?>
        <div class="mt-4 alert alert-danger" role="alert">
            login ou mot de passe incorect
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>