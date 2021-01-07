<?php

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    class Produit{
        private $idProd;
        private $nomProd;
        private $descriptionProd;
        private $prodEquitable;
        private $idCategorie;
        private $prix;
        private $stock;
        private $promotion;

        public function __construct($p_idProd){
            $this->idProd = $p_idProd;
            $sql = "SELECT nomProd, descriptionProd FROM chocolaterie.Produits WHERE idCategorie = $recherche";
            $resultat = $dbh->query($sql);
            $produitTrouve = $resultat->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
            
            $this->nomProd = $produitTrouve['nomProd'];
            $this->descriptionProd = $produitTrouve['descriptionProd'];
            $this->prodEquitable = $produitTrouve['prodEquitable'];
            $this->idCategorie = $produitTrouve['idCategorie'];
            $this->prix = $produitTrouve['prix'];
            $this->stock = $produitTrouve['stock'];
            $this->promotion = $produitTrouve['promotion'];
        }

        public function generateForms(){
            echo'<form method="post" action="ajouter_action.php">';
            echo '<label id="nomProd"> Nom du produit: </label><br/>';
            echo '<input type="text" name="nomProd" value="'.$nomProd.'"><br/>';
            echo '<label id="description">Description : </label><br/>';
            echo '<textarea name="description" rows="4" cols="50"></textarea><br/>';

            echo '<label id="prodEquitable">Produit équitable</label><br>';
                    echo '<input type="radio" name="equitable" value="0" checked="checked"> Non';
                    echo '<input type="radio" name="equitable" value="1"> Oui<br>';
            echo '<label id="categorie">Catégorie</label><br>';

            echo '<select name="idCategorie"><?php echo $options_categories; ?></select><br>';

            echo'<label id="prix">Prix : </label><br/>';
            echo '<input type="number" step="0.01" min="0" name="prix"><br/>';

            echo '<label id="stock">Stock : </label><br/>';
            echo '<input type="number" step="1" min="0" name="stock"><br/>';

            echo '<label id="promotion">Promotion</label><br>';
                    echo '<input type="radio" name="promotion" value="0" checked="checked"> Non';
                    echo '<input type="radio" name="promotion" value="1"> Oui<br>';

            echo '<button type="submit" name="save">Ajouter le produit</button></form>';
        }
    }
?>