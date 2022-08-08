<?php require_once("inc/init-inc.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
{
session_destroy();
}
if(internauteEstConnecte())
{
    header("location:profil.php");
}
if($_POST)
{
// $contenu .= "pseudo : " . $_POST['pseudo'] . "<br>mdp : " . $_POST['mdp'] . "";
$résultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
if($résultat->num_rows != 0)
{
// $contenu .= '<div style="background:green">pseudo connu!</div>';
$membre = $résultat->fetch_assoc();
if($membre['mdp'] == $_POST['mdp'])
{
//$contenu .= '<div class="validation">mdp connu!</div>';
foreach($membre as $indice => $element)
{
if($indice != 'mdp')
{
$_SESSION['membre'][$indice] = $element;
}
}
header("location:profil.php");
}else
{
$contenu .= '<div class="erreur">Erreur de MDP</div>';
}
}
else
{
$contenu .= '<div class="erreur">Erreur de pseudo</div>';
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
?>
<div class="connect">
<h4>Dejà un compte? Connectez vous</h4>
<?php echo $contenu; ?>
<form method="post" action="" class="forms">
<label for="pseudo">Pseudo</label><br>
<input type="text" id="pseu" name="pseudo"><br> <br>
<label for="mdp">Mot de passe</label><br>
<input type="text" id="mdp" name="mdp"><br><br>
<div class="envoi">
<input class="check" type="checkbox" value="Remember me">Me souvenir
<h5><a href="">Mot de passe oublié?</a></h5>
</div>
<input type="submit"  id="sub" value="Se connecter">
</form>
<div class="inform">
    <h1>Que pouvez vous faire etant connecté?</h1>
    <p>Notre site vous permet de creer votre compte afin d'y acceder quand vous voulez <br>Etant connecté, vous pouvez valider une commande, visiter votre espace membre, voir votre panier et vos produits en attente de commande. <br>Vous avez dejà un compte? Connectez-vous</p>
    <p>Vous n'arriver pas a vous connecter? Un problème? Contacter-nous c- bas</p>
</div>
</div>

<?php require_once("inc/bas-inc.php"); ?>