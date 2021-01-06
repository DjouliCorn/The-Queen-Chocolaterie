<?php
try {

    require_once '../inc/accesBDD.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $options_categories = "";
    //$recherche = isset($_GET['chocolat']) ? $_GET['chocolat'] : '';

    $sql = "SELECT idCategorie, nomCategorie FROM Categories ORDER BY idCategorie ASC";
    $resultat = $dbh->query($sql);

    while ( ($une_categorie = $resultat->fetch(PDO::FETCH_ASSOC)) != FALSE) {
        // Traitement de chaque résultat qui est contenu dans la variable $un_continent
        $options_categories .= '<option value="' . $une_categorie['idCategorie'] . '">' . $une_categorie['nomCategorie'] . '</option>';
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
    <title>Document</title>
</head>
<body>
    <h1>Ajout de Produit</h1>
    <form method="post" action="ajouter_action.php"> 
    <label id="nomProd"> Nom du produit:</label><br/>
    <input type="text" name="nomProd"><br/>

<!--Voir pour la gestion des ' et " carac spéciaux-->
    <label id="description">Description : </label><br/>
    <textarea name="description" rows="4" cols="50"></textarea><br/>

    <label id="prodEquitable">Produit équitable</label><br>
                    <input type="radio" name="equitable" value="0" checked="checked"> Non
                    <input type="radio" name="equitable" value="1"> Oui
                    <br>
    <label id="categorie">Catégorie</label><br>

    <select name="idCategorie">
                <?php echo $options_categories; ?>
            </select><br>

    <label id="prix">Prix : </label><br/>
    <input type="number" step="0.01" min="0" name="prix"><br/>

    <label id="stock">Stock : </label><br/>
    <input type="number" step="1" min="0" name="stock"><br/>

    <label id="promotion">Promotion</label><br>
                    <input type="radio" name="promotion" value="0" checked="checked"> Non
                    <input type="radio" name="promotion" value="1"> Oui
                    <br>

    <button type="submit" name="save">Ajouter le produit</button>
    </form>
    
</body>
</html>