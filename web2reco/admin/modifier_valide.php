<?php
try {

    require_once '../inc/accesBDD.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$options_listeProduits = "";

    $idProd = $_REQUEST['idProd'];
    $nomProd = $_REQUEST['nomProd'];
    $descriptionProd = $_REQUEST['description'];
    $prodEquitable = $_REQUEST['equitable'];
    $idCategorie = $_REQUEST['idCategorie'];
    $prix = $_REQUEST['prix'];
    $stock = $_REQUEST['stock'];
    $promotion = $_REQUEST['promotion'];


    $sql = "UPDATE Produits SET nomProd = '$nomProd', descriptionProd = '$descriptionProd', idCategorie = '$idCategorie',
    prodEquitable = '$prodEquitable', prix = '$prix', stock = '$stock', promotion = '$promotion' WHERE $idProd = idProd ";
    $resultat = $dbh->query($sql);

    var_dump($descriptionProd);

    $resultat = $dbh->query($sql);

} catch (Exception $e) {

    echo '<!DOCTYPE html>';
    echo '<html lang="fr"><head>';
    echo '<meta charset="utf-8">';
    echo '<title>Problème rencontré</title>';
    echo '</head><body>';

    echo '<p>' . mb_convert_encoding($e->getMessage(), 'UTF-8', 'Windows-1252') . '</p>';

    if (isset($dbh) && $dbh->errorInfo()[0] == "42000") {
        echo '<p>Erreur de syntaxe dans la requête SQL :</p>';
        echo '<pre>' . $sql . '</pre>';
    }

    echo '</body></html>';

    // Arrêt de l'exécution du script
    die;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour</title>
</head>

<body>

    <h1>Mise à jour réussie</h1>

    <?php
    echo $nomProd;
    ?>

    <li><a href="supprimer.php">Mettre à jour un autre produit</a></li>
    <li><a href="admin.php">Retour à l'accueil administrateur</a></li>

</body>

</html>