<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
    <h1 class="text-center">Login</h1>
    <form class="mx-auto text-center" method="POST" action="index.php?controller=user&action=submitLogin">
        <input type="text" name="username" placeholder="YOUR USERNAME" class="form-control mx-auto text-center w-50 mb-3" />
        <input type="password" name="password" placeholder="YOUR PASSWORD" class="form-control mx-auto text-center w-50 mb-3" />
        <input type="submit" value="VALIDATE" class="btn btn-lg btn-success mx-auto text-center w-50 mb-3" />
        <?php if (isset($errors)) {
            foreach ($errors as $error) { ?>
        <?php
                var_dump($error);
            }
        } ?>
    </form>
    <div class="mx-auto text-center">
        <button class="btn btn-lg btn-info w-50 my-3" onclick="location.href='index.php?controller=user&action=register'">REGISTER</button>
        <button class="btn btn-lg btn-warning w-50 my-3" onclick="location.href='index.php?controller=home&action=display'">CONTINUE OFFLINE</button>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>