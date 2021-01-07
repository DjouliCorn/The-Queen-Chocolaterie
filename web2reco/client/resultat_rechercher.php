<?php

try{
    
    require_once '../inc/accesBDD.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$recherche = isset($_GET['chocolat']) ? $_GET['chocolat'] : '';
    $recherche = (string) filter_input(INPUT_GET, 'chocolat', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "SELECT nomProd, descriptionProd FROM chocolaterie.Produits WHERE (nomProd LIKE '%$recherche%') OR (descriptionProd LIKE '%$recherche%')";
    // Exécution de la requête de sélection
    $resultat = $dbh->query($sql);
    $les_chocoTrouves = $resultat->fetchAll(PDO::FETCH_ASSOC);

    $dbh = null;

} catch(Exception $e){

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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de la recherche</title>
    <link href="../../css2reco/style.css" rel="stylesheet">
</head>

<body>
    <h1>
        Résultat de la recherche des chocolats :       
    </h1>

    <ul>
        <?php

        if ($recherche == "") {
            echo 'Veuillez entrer une recherche';
        } 
        else{
            foreach ($les_chocoTrouves as $un_choco) {
                ?>
                    <li>
                    <?php
                    echo $un_choco['nomProd'] . " - ";
                    echo $un_choco['descriptionProd'];
                    echo '<br>';
                }
        }
            ?>
            </li>
    </ul>
   
    <p><a href="../index.php">Accueil</a></p>
    <p><a href="rechercher.php">Autre recherche</a></p>

</body>

</html>