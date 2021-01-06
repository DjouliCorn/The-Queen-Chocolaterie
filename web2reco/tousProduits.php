<?php
try {

    require_once 'inc/accesBDD.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$recherche = isset($_GET['chocolat']) ? $_GET['chocolat'] : '';
    $recherche = (string) filter_input(INPUT_GET, 'chocolat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "SELECT * FROM chocolaterie.Produits, chocolaterie.Categories WHERE Produits.idCategorie = Categories.idCategorie";
    // Exécution de la requête de sélection
    $resultat = $dbh->query($sql);
    $tous_les_chocos = $resultat->fetchAll(PDO::FETCH_ASSOC);

    $dbh = null;
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
    <title>Tous les produits disponibles</title>
</head>

<body>

    <h1>Tous les produits disponibles à la chocolaterie</h1>

    <ul>

        <?php
        foreach ($tous_les_chocos as $un_choco) {
        ?>
            <li>
                <?php
                echo $un_choco['nomProd'] . " - ";
                echo $un_choco['descriptionProd'] . " - ";
                switch ($un_choco['prodEquitable']) {
                    case 0:
                        echo "";
                        break;
                    case 1:
                        echo "équitable - ";
                        break;
                }
                echo $un_choco['prix'] . "€ - ";
                echo $un_choco['stock'] . " - ";
                switch ($un_choco['promotion']) {
                    case 0:
                        echo "";
                        break;
                    case 1:
                        echo "en promotion - ";
                        break;
                }
                echo $un_choco['nomCategorie'];
                echo '<br>';
                ?>
            </li>
        <?php
        }
        ?>

    </ul>

</body>

</html>