<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Update team</title>
</head>

<body>
    <div style="left: 0; position: absolute;">
        <button class="btn btn-lg btn-info" onclick="location.href='index.php?controller=home&action=display'">BACK</button>
    </div>
    <h1 class="text-center mb-5">UPDATE TEAM</h1>

    <form class="mx-auto text-center" method="POST" action="index.php?controller=team&action=submitFormUpdateTeam&id=<?php echo ($team->getId()) ?>">
        <input type="text" name="name" placeholder="NAME" class="form-control mx-auto text-center w-50 mb-3" value="<?php echo ($team->getName()) ?>" />
        <input type="number" name="nbPoints" placeholder="NUMBER OF POINTS" class="form-control mx-auto text-center w-50 mb-3" value="<?php echo ($team->getNbPoints()) ?>" />
        <input type="number" name="nbButPris" placeholder="NUMBER OF GOALS TAKE" class="form-control mx-auto text-center w-50 mb-3" value="<?php echo ($team->getNbButPris()) ?>" />
        <input type="number" name="nbButInscrits" placeholder="NUMBER OF GOALS REGISTERED" class="form-control mx-auto text-center w-50 mb-3" value="<?php echo ($team->getNbButInscrits()) ?>" />
        <input type="submit" value="VALIDATE" class="btn btn-lg btn-success mx-auto text-center w-50 mb-3" />
        <?php if (isset($errors)) {
            foreach ($errors as $error) { ?>
                <div class="alert alert-danger w-50 text-center mx-auto">
                    <?php echo ($error) ?>
                </div>
        <?php }
        } ?>
    </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>