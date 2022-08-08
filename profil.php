<?php
require_once("inc/init-inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) header("location:connexion.php");
// debug($_SESSION);
$contenu .='<div class="prof">';
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br><br>';
$contenu .="</div>";
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
                    echo '<a href="' . RACINE_SITE . 'admin/gestion-boutique.php">Gestion boutique</a>';
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
require_once("inc/bas-inc.php");
?>