<?php

require_once '../inc/accesBDD.php';   

    //Classe instanciée lors de l'accès à la page modifier_action.php
    class Produit{
        private $idProd;
        private $nomProd;
        private $descriptionProd;
        private $prodEquitable;
        private $idCategorie;
        private $prix;
        private $stock;
        private $promotion;
        //Toutes les variables d'un produit

        public function __construct($p_idProd){

            //Le constructeur prend en paramètre uniquement le idProd et fait la requête SQL ci-dessous pour générer ses autres variables
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $recherche = (int) filter_input(INPUT_POST, $p_idProd, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            
            $sql = "SELECT  idProd, nomProd, descriptionProd, prodEquitable, 
            idCategorie, prix, stock, promotion FROM chocolaterie.Produits WHERE idProd = $p_idProd ";
            $resultat = $dbh->query($sql);
            $produitTrouve = $resultat->fetchAll(PDO::FETCH_ASSOC);

            foreach($produitTrouve as $unProduit){
                //Définition des valeurs grâce aux résultats de la requête
                $this->idProd = $unProduit['idProd'];
                $this->nomProd = $unProduit['nomProd'];
                $this->nomProd = $unProduit['nomProd'];
                $this->descriptionProd = $unProduit['descriptionProd'];
                $this->prodEquitable = $unProduit['prodEquitable'];
                $this->idCategorie = $unProduit['idCategorie'];
                $this->prix = $unProduit['prix'];
                $this->stock = $unProduit['stock'];
                $this->promotion = $unProduit['promotion'];
            }
            
            

        }

        public function generateForms(){
            //fonction pour générer le formulaire d'édition d'un produit

            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $options_categories = "";

            //Requete pour afficher le menu déroulant des catégories
            $sql2 = "SELECT idCategorie, nomCategorie FROM Categories ORDER BY idCategorie ASC";
            $resultat2 = $dbh->query($sql2);

            while ( ($une_categorie = $resultat2->fetch(PDO::FETCH_ASSOC)) != FALSE) {
                $options_categories .= '<option value="' . $une_categorie['idCategorie'] . '">'. $une_categorie['nomCategorie'] . '</option>';
            }


            //Requete pour que le label des catégories affiche la valeur actuelle
            $sql3 = "SELECT nomCategorie FROM Produits as P, Categories as C WHERE C.idCategorie = P.idCategorie";
            $resultat3 = $dbh->query($sql3);
            $categories = $resultat3->fetchAll(PDO::FETCH_ASSOC);

            $displayCategorie = "";
            
            foreach($categories as $categorie){
                $displayCategorie = $categorie['nomCategorie'];
            }

            //Construction du formulaire avec les données existantes du produit

            echo'<form method="post" action="modifier_valide.php">';

            echo '<input type="hidden" name="idProd" value="'.$this->idProd.'"><br/>';

            echo '<label id="nomProd"> Nom du produit: </label><br/>';
            echo '<input type="text" name="nomProd" value="'.$this->nomProd.'"><br/>';

            echo '<label id="description">Description : </label><br/>';
            echo '<textarea name="description" rows="4" cols="50" >'.$this->descriptionProd.'</textarea><br/>';

            echo '<label id="prodEquitable">Produit équitable</label><br>';
            if($this->prodEquitable = 0){
                echo '<input type="radio" name="equitable" value="0"> Non';
                echo '<input type="radio" name="equitable" value="1"> Oui<br>';
            }
            else{
                echo '<input type="radio" name="equitable" value="0"> Non';
                echo '<input type="radio" name="equitable" value="1" checked> Oui<br>';
            }
                    
            echo '<label id="categorie">Catégorie : '.$displayCategorie.'</label><br>';
            echo '<select name="idCategorie" >'.$options_categories.'</select><br>';

            echo'<label id="prix">Prix : </label><br/>';
            echo '<input type="number" step="0.01" min="0" name="prix" value="'.$this->prix.'"><br/>';

            echo '<label id="stock">Stock : </label><br/>';
            echo '<input type="number" step="1" min="0" name="stock" value="'.$this->stock.'"><br/>';

            echo '<label id="promotion">Promotion</label><br>';
            if($this->promotion = 0){
                echo '<input type="radio" name="promotion" value="0" checked> Non';
                echo '<input type="radio" name="promotion" value="1"> Oui<br>';
            }
            else{
                echo '<input type="radio" name="promotion" value="0"> Non';
                echo '<input type="radio" name="promotion" value="1" checked> Oui<br>';
            }
               
            echo '<button type="submit" name="save">Modifier le produit</button></form>';
            //Bouton pour exécuter la requête
        }
    }

    $dbh = null;
?>