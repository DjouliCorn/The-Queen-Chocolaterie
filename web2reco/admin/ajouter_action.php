<?php
try {

    require_once '../inc/accesBDD.php';

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $options_categories = "";

    //Récupération des saisies du formulaire "ajouter.php" grâce au super globale $_REQUEST
    $nomProd = $_REQUEST['nomProd'];
    $descriptionProd = $_REQUEST['description'];
    $prodEquitable = $_REQUEST['equitable'];
    $idCategorie = $_REQUEST['idCategorie'];
    $prix = $_REQUEST['prix'];
    $stock = $_REQUEST['stock'];
    $promotion = $_REQUEST['promotion'];

    //Insertion dans la Base de Données
    $sql = "INSERT INTO Produits (idProd, nomProd, descriptionProd, prodEquitable, idCategorie, 
    prix, stock, promotion) VALUES (idProd, '$nomProd', '$descriptionProd', '$prodEquitable', '$idCategorie', 
    '$prix', '$stock', '$promotion')";
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
    <title>Ajout réussi</title>
    <link href="../../css2reco/style.css" rel="stylesheet">
</head>
<body>

<h1>Ajout réussi</h1>

<?php 
//Résumé du nouveau produit
echo 'Produit ajouté : ' . $nomProd . " - " . $descriptionProd . " - ";
switch ($prodEquitable) {
    //Switch pour afficher la mention seulement si elle est vraie
    case 0:
        echo "";
        break;
    case 1:
        echo "produit équitable - ";
        break;
};
echo  $idCategorie . " - " . 
$prix . " - " . $stock; 
switch ($promotion) {
        //Switch pour afficher la mention seulement si elle est vraie
    case 0:
        echo "";
        break;
    case 1:
        echo " - en promotion";
        break;
};

?>

<ul>
<li><a href="ajouter.php">Ajouter un nouveau produit</a></li> 
<li><a href="admin.php">Retour à l'accueil administrateur</a></li> 
</ul>
</body>
</html>