<?php
try{
    
    require_once '../inc/accesBDD.php';
    require_once 'classe_produit.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Appel de la BDD

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
    <title>Mettre à jour le produit sélectionné</title>
    <link href="../../css2reco/style.css" rel="stylesheet">
</head>
<body>

<?php 
    $recherche = (int) filter_input(INPUT_POST, 'adminUpdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$formUpdate = new Produit($recherche);
$formUpdate->generateForms();
//Appel du constructeur pour instancier un produit et de la fonction de la classe Produit dans classe_produit.php
?>

<p><a href="admin.php">Retour</a></p>

    
</body>
</html>