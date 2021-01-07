<?php
try{
    
    require_once '../inc/accesBDD.php';
    require_once 'classe_produit.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$recherche = isset($_GET['chocolat']) ? $_GET['chocolat'] : '';
    
    //$les_chocoUpdate = $_GET["idProd"];
    //$dbh = null;

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
    var_dump($recherche);

    //$sql = "SELECT idProd FROM Produits WHERE idProd = $recherche ";
    // Exécution de la requête de sélection
    //$resultat = $dbh->query($sql);
    //$les_chocoUpdate = $resultat->fetchAll(PDO::FETCH_ASSOC);

//$idUpdate = $les_chocoUpdate['idProd'];
//var_dump($idUpdate);
$formUpdate = new Produit($recherche);
$formUpdate->generateForms();

?>

<p><a href="admin.php">Retour</a></p>

    
</body>
</html>