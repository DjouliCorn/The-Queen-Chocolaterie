<?php
try {

    require_once '../inc/accesBDD.php';
    
    
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $options_listeProduits = "";

    $sql = "SELECT idProd, nomProd FROM Produits ORDER BY idProd ASC";
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

<?php 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour les produits</title>
</head>

<body>

    <h1>Mettre à jour les produits</h1>

    <form method="post" action="modifier_action.php">
        <label id="selection">Les produits de la chocolaterie :</label><br>

        <select name="adminUpdate">
            <?php echo $options_listeProduits; ?>
        </select>
        <br>

        <button type="submit" name="selectForUpdate">Sélectionner</button>
    </form>

    <?php 
    //var_dump($options_listeProduits['nomProd']);
    //var_dump($options_listeProduits['idProd']);
   
    
    //echo $options_listeProduits['idProd'];
    //echo $options_listeProduits['nomProd'];?>

<a href="admin.php">Retour à l'accueil administrateur</a>

</body>

</html>