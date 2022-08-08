<?php
require_once("inc/init-inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AFFICHAGE DES CATEGORIES ---//

$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produits");
$contenu .= '<section class="gallery">';
$contenu .= '<h1 class="heading">';
$contenu .= '<span>Galeries</span>';
$contenu .= "</h1>";
$contenu .= '<ul class="controls">';
while($cat = $categories_des_produits->fetch_assoc())
{
$contenu .= "<li class=\"btn\"><a href='?categorie=".$cat['categorie']."'>".$cat['categorie'] ."</a></li>";
}
$contenu .= "</ul>";
//--- AFFICHAGE DES PRODUITS ---//*
if(isset($_GET['categorie']))
{
   $contenu .= '<div class="card-deck" id="cont">';
$donnees = executeRequete("select id_produit,reference,titre,photo,prix from produits where categorie='$_GET[categorie]'");
while($produit = $donnees->fetch_assoc())
 {
    $contenu .='<div class="card" id="card">';
    $contenu .= "<img src=\"$produit[photo]\" class='card-img-top'>";
    $contenu .='<div class="card-body">';
    $contenu .= '<h5 class="card-title">';
    $contenu.=$produit['titre'];
    $contenu.="</h5>";
    $contenu .= '<p class="card-text">';
    $contenu .= '<strong class="price">';
    $contenu .= $produit['prix']. "FCFA";
    $contenu .= "</strong>";
    $contenu .= "</p>";
    $contenu .= "</div>";
    $contenu .= '<div class="card-footer">';
    $contenu.='<small class="text-muted">';
    $contenu .= '<a id="lien" href="produit.php?id_produit=' . $produit['id_produit'] . '">Voir la fiche</a>';
    $contenu .= "</small>";
    $contenu .= "</div>";
    $contenu .= "</div>";
 }
 $contenu .= "</div>";
}else{
   $contenu .= "<div class='card'>Veuillez cliquer sur une categorie pour derouler les articles</div>";
}
$contenu .= "</section>";
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("inc/haut-inc.php");
echo $contenu;
require_once("inc/bas-inc.php"); 
?>