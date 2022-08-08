
<?php require_once("inc/init-inc.php"); ?>
<!Doctype html>
<html>
<head>
<title>Mon Site</title>
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="entypo.css">
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
<div class="formul" id="formul"> 
<form method="post" action="" onsubmit="return validateform()">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés :
    a-zA-Z0-9-_."><br><br>
    <label for="mdp">Password</label><br>
      <input type="password" name="mdp" id="mdp"><br><br>
    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" placeholder="votre nom"><br><br>
    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom"><br><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email"><br><br>
    <label for="civilite">Civilité</label><br>
    <input name="civilite" value="m" checked="" type="radio">Homme
    <input name="civilite" value="f" type="radio">Femme<br><br>
    <label for="ville">Ville</label><br>
        <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>
        <label for="cp">Code Postal</label><br>
        <input type="text" id="code_postal" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>
        <label for="adresse">Adresse</label><br>
        <textarea id="adresse" name="adresse" placeholder="votre dresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-
        _."></textarea><br><br>
        <button class="btn btn-primary" type="submit">S'inscrire</button>
        </form>
        </div>
        </div> 
        <?php require_once("inc/bas-inc.php"); 
        ?>
        <?php require_once("inc/init-inc.php");
        //--------------------------------- TRAITEMENTS PHP ---------------------------------//
        if($_POST)
        {
        debug($_POST);
        $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);
        if(!$verif_caractere && (strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20) ) //
        {
        $contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à
        9</div>";

        }
        else
        {
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
        if($membre->num_rows > 0)
        {
        $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";

        }
        else
        {
        // $_POST['mdp'] = md5($_POST['mdp']);
        foreach($_POST as $indice => $valeur){
            $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
            executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse) VALUES ('$_POST[pseudo]',
            '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
            $contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous
            connecter</u></a></div>";
            }
            }
            } //---------------------------------AFFICHAGE HTML---------------------------------//
            ?>
            