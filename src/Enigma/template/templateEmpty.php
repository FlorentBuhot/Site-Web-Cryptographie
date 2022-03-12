<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">

<head>
    <?php global $dir, $image; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font awesome (pour les icons)-->
    <script src="https://kit.fontawesome.com/5e859a4d38.js" crossorigin="anonymous"></script>

    <!-- CSS de la page -->
    <link rel="icon" type="image/icon" href="<?= $dir . $image['onglet'] ?>"/>

    <!-- Titre de la page-->
    <title><?= $t ?></title>
</head>

<?= $content ?>

</html>