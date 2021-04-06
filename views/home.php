<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <?php if (empty($_SESSION['username'])) { ?>
        <div style="right: 0; position: absolute;">
            <button class="btn btn-lg btn-success" onclick="location.href='index.php?controller=user&action=login'">SIGNIN</button>
        </div>
    <?php } ?>
    <?php if (!empty($_SESSION['username'])) { ?>
        <div style="right: 0; position: absolute;">
            <button class="btn btn-lg btn-danger" onclick="location.href='index.php?controller=user&action=logout'">LOGOUT</button>
        </div>
    <?php } ?>
    <h1 class="text-center">Home</h1>

    <?php if (!empty($_SESSION['username'])) { ?>
        <div class="text-center my-5">
            <button class="btn btn-lg btn-primary w-50" onclick="location.href='index.php?controller=team&action=addTeam'">ADD TEAM</button>
        </div>
    <?php } ?>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">nbPoints</th>
                <th scope="col">nbButPris</th>
                <th scope="col">$nbButInscrits</th>
                <?php if (!empty($_SESSION['username'])) { ?>
                    <th scope="col" class="w-25">Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($arrayTeams as $team) { ?>
                <tr>
                    <th scope="row"><?php echo ($team->getId()) ?></th>
                    <td><?php echo ($team->getName()) ?></td>
                    <td><?php echo ($team->getNbPoints()) ?></td>
                    <td><?php echo ($team->getNbButPris()) ?></td>
                    <td><?php echo ($team->getNbButInscrits()) ?></td>
                    <?php if (!empty($_SESSION['username'])) { ?>
                        <td>
                            <button class="btn btn-info" onclick="location.href='index.php?controller=team&action=updateTeam&id=<?php echo ($team->getId()) ?>'">UPDATE</button>
                            <button class="btn btn-danger" onclick="location.href='index.php?controller=team&action=deleteTeam&id=<?php echo ($team->getId()) ?>'">DELETE</button>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</html>