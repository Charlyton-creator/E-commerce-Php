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
<section class="arrival">
<h1 class="heading"><span>Nouveautés</span></h1>
<div class="container">
  <div class="row">
    <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/ht.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Chaussures talons</h5>
      <p class="card-text"><strong class="price">25000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
  </div>
    <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/chaussure2.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Chaussures1</h5>
      <p class="card-text"><strong class="price">20000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
  </div>
  <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/apple.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"> Appareil Apple</h5>
      <p class="card-text"><strong class="price">80000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
  </div>
  <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/BG-W_sa6.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Sac a main</h5>
      <p class="card-text"><strong class="price">5000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
  </div>
    <!-- Force next columns to break to new line -->
    <div class="w-100"></div>

    <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/costume1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Nouveaux costumes</h5>
      <p class="card-text"><strong class="price">20000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
    </div>
    <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/montre1.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Montre1</h5>
      <p class="card-text"><strong class="price">15000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
  </div>
  <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/vestRouge.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Veste Rouge</h5>
      <p class="card-text"><strong class="price">35000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
  </div> 
  </div>
    <div class="col-6 col-sm-3">
    <div class="card" id="ca">
    <img src="img/por3.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Galaxy portables</h5>
      <p class="card-text"><strong class="price">20000FCFA</strong></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">
      <div class="stars">
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
         <i class="fas fa-star"></i>
      </div>
      </small>
    </div>
    </div>
  </div> 
    </div>
</div>
</section>
<script src="inc/js/main.js"></script>
</header>