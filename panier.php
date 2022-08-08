<?php
require_once("inc/init-inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AJOUT PANIER ---//
if(isset($_POST['ajout_panier']))
{ // debug($_POST);
$résultat = executeRequete("SELECT * FROM produits WHERE id_produit='$_POST[id_produit]'");
$produit = $résultat->fetch_assoc();
ajouterProduitDansPanier($produit['titre'],$_POST['id_produit'],$_POST['quantite'],$produit['prix']);
} //--- VIDER PANIER ---//
if(isset($_GET['action']) && $_GET['action'] == "vider")
{
unset($_SESSION['panier']);
} //--- PAIEMENT ---//
if(isset($_POST['payer']))
{
for($i=0 ;$i < count($_SESSION['panier']['id_produit']) ; $i++)
{
$résultat = executeRequete("SELECT * FROM produits WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i]);
$produit = $résultat->fetch_assoc();
if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
{
$contenu .= '<hr><div class="erreur">Stock Restant: ' . $produit['stock'] . '</div>';
$contenu .= '<div class="erreur">Quantité demandée: ' . $_SESSION['panier']['quantite'][$i] . '</div>';
if($produit['stock'] > 0)
{
$contenu .= '<div class="erreur">la quantité de l\'produit ' . $_SESSION['panier']['id_produit'][$i] . ' à été réduite car notre stock était
insuffisant, veuillez vérifier vos achats.</div>';
$_SESSION['panier']['quantite'][$i] = $produit['stock'];
}
else
{
$contenu .= '<div class="erreur">l\'produit ' . $_SESSION['panier']['id_produit'][$i] . ' à été retiré de votre panier car nous sommes en rupture
de stock, veuillez vérifier vos achats.</div>';
retirerProduitDuPanier($_SESSION['panier']['id_produit'][$i]);
$i--;
}
$erreur = true;
}
}
if(!isset($erreur))
{
executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES (" . $_SESSION['membre']['id_membre'] . "," .
montantTotal() . ", NOW())");
$id_commande = $mysqli->insert_id;
for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
{
executeRequete("INSERT INTO details_commande (id_commande, id_produit, quantite, prix) VALUES ($id_commande, " .
$_SESSION['panier']['id_produit'][$i] . "," . $_SESSION['panier']['quantite'][$i] . "," . $_SESSION['panier']['prix'][$i] . ")");
}
unset($_SESSION['panier']);
$contenu .= "<div class='validation'>Merci pour votre commande. votre n° de suivi est le $id_commande</div>";
}
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
?>
<!Doctype html>
<html>
<head>
<title>Mon Site</title>
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<header>
<div class="header-1">
    <a href="#" class="logo"><i class="fas fa-shopping-bag"></i>E-BOUTIQUE</a>
    <div class="form-container">
        <form action="">
            <input type="search" placeholder="Chercher un produit"/>
            <label for="search" class="fas fa-search"></label>
        </form>
    </div>
</div>
    <div class="header-2">
    <div id="menu" class="fas fa-bars">
      
    </div>
        <nav class="navbar">
            <ul>
                <li>
                <?php 
                  if(internauteEstConnecte()){
                    echo '<a href="' . RACINE_SITE . 'profil.php">Voir votre profil</a>';
                  }else{
                    echo '<a href="' . RACINE_SITE . 'inscription.php">Inscription</a>';
                  }
                ?> 
                </li>
                <li>
                <?php 
                  if(internauteEstConnecteEtEstAdmin()){
                    echo '<a href="' . RACINE_SITE . 'admin/gestion-boutique.php">Gestion de la boutique</a>';
                  }
                  if(internauteEstConnecte()){
                    echo '<a href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';
                  }else{
                    echo '<a href="' . RACINE_SITE . 'connexion.php">connexion</a>';
                  }
                ?> 
                </li>
                <li>
                <?php 
                  if(internauteEstConnecte()){
                    echo '<a href="' . RACINE_SITE . 'boutique.php">Acces a la boutique</a>';
                  }else{
                    echo '<a href="' . RACINE_SITE . 'boutique.php">Accès à la boutique</a>';
                  }
                ?> 
                </li>
                <li>
                <?php 
                  if(internauteEstConnecte()){
                    echo '<a href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Se déconnecter</a>';
                  }else{
                    echo '<a href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';
                  }
                ?> 
                </li>
            </ul>
        </nav>
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <a href="connexion.php" class="fas fa-user"></a>
        </div>
    </div>
</div>
<div class="slidershow middle">
  <div class="slides">
    <input type="radio" name="r" id="r1" checked>
    <input type="radio" name="r" id="r2">
    <input type="radio" name="r" id="r3">
    <input type="radio" name="r" id="r4">
    <div class="item i">
      <img src="img/bout1.png" alt="">
      <div class="content">
         <h3>Faites vos achats n'importe ou et n'importe quand</h3>
         <p>Avec votre compte sur E-BOUTIQUE vous etes gaté!</p>
         <a href="#">
           <button class="btn">Discover</button>
         </a>
      </div>
    </div>
    <div class="item">
      <h2>Nouveaux</h2>
      <img src="img/bout2.jpg" alt="">
    </div>
    <div class="item">
    <h2>E-commerce</h2>
      <img src="img/bout3.jpg" alt="">
    </div>
    <div class="item">
    <h2>Achats securisés</h2>
      <img src="img/bout4.jpg" alt="">
    </div>
  </div>
</div>
<div class="navigation">
  <label for="r1" class="bar"></label>
  <label for="r2" class="bar"></label>
  <label for="r3" class="bar"></label>
  <label for="r4" class="bar"></label>
</div>
<?php
echo $contenu;
echo "<h6>BIENVENUE VEUILLEZ CONSULTER VOTRE PANIER</h6>";
echo "<div class='compte'>";
echo "<div class='etat'>";
echo "<h1>Votre panier</h1>";
echo "<table border='1' style='border-collapse: collapse' cellpadding='7' class='panier'>";
echo "<tr><td colspan='5'>Panier</td></tr>";
echo "<tr><th>Titre</th><th>Produit</th><th>Quantité</th><th>Prix Unitaire</th></tr>";
if(empty($_SESSION['panier']['id_produit'])) // panier vide
{
echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
}
else
{
for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
{
echo "<tr>";
echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
echo "</tr>";
}
echo "<tr><th colspan='3'>Total</th><td colspan='2'>" . montantTotal() . " FCFA</td></tr>";
if(internauteEstConnecte())
{
echo '<form method="post" action="">';
echo '<tr><td colspan="5"><input type="submit" name="payer" value="Valider et déclarer le paiement"></td></tr>';
echo '</form>';
}
else
{
echo '<tr><td colspan="3">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir
payer</td></tr>';
}
echo "<tr><td colspan='5'><a href='?action=vider'>Vider mon panier</a></td></tr>";
}
echo "</table><br>";
echo "<i class='paie'>Réglement par Carte Bancaire</i><br>";
echo "</div>";
echo "<div class='informations'>";
echo "<img class='profile' src='img/profile.png'>";
echo "<h4>Votre profile: BIENVENUE</h4>"."</br>"."</br>";
echo "<img class='ac-img' src='img/shopping-cart.png'>";
echo "</div>";
echo "</div>";
// echo "<hr>session panier:<br>"; debug($_SESSION);
include("inc/bas-inc.php");
?>