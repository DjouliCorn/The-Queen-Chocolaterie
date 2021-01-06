<?php
try {

    require_once '../inc/accesBDD.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $options_listeProduits = "";

    $sql = "SELECT idProd, nomProd FROM produits";
    $resultat = $dbh->query($sql);

    while (($une_optionProduit = $resultat->fetch(PDO::FETCH_ASSOC)) != FALSE) {
        // Traitement de chaque résultat qui est contenu dans la variable $un_continent
        $options_listeProduits .= '<option value="' . $une_optionProduit['idProd'] . '">' . $une_optionProduit['nomProd'] . '</option>';
    }
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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un produit</title>
</head>

<body>

    <h1>Suppression d'un produit</h1>

    <form method="post" action="supprimer_action.php">
        <label id="selection">Les produits disponibles :</label><br>

        <select name="adminSuppr">
            <?php echo $options_listeProduits; ?>
        </select>
        <br>

        <button type="submit" name="suppr">Supprimer le produit</button>
    </form>
</body>

</html>