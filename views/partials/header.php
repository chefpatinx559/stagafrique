<?php
$pageTitle = isset($pageTitle) ? $pageTitle . " - Stag'AFRIQUE" : "Stag'AFRIQUE - Missions Humanitaires et Stages en Afrique";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  
  <!-- Critical CSS -->
  <link rel="stylesheet" href="assets/css/app.css">
  <link rel="stylesheet" href="assets/css/custom.css">

</head>
<body>

  <nav class="navbar">
    <button class="menu-toggle" aria-label="Ouvrir le menu">
      <i class="fas fa-bars"></i>
    </button>
    <div class="logo">
      <a href="http://localhost/stagafrique/utilisateurs/connexion" style="text-decoration:none; color:inherit;">Stag'AFRIQUE</a>
    </div>
    <div class="nav-links">
      <a href="http://localhost/stagafrique">Accueil</a>
      <a href="#programmes">Programmes</a>
      <a href="#processus">Processus</a>
      <div class="dropdown">
        <a href="http://localhost/stagafrique/propos/missions" class="dropdown-toggle">Missions <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-menu">
          <a href="http://localhost/stagafrique/#tarifs">Combien ça coûte ?</a>
          <a href="http://localhost/stagafrique/#partenaires">Nos partenaires</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="http://localhost/stagafrique/propos/nous" class="dropdown-toggle">Qui sommes nous ? <i class="fas fa-chevron-down"></i></a>
        <div class="dropdown-menu">
          <a href="http://localhost/stagafrique/propos/histoire">Notre histoire</a>
          <a href="http://localhost/stagafrique/propos/vision">Notre vision</a>
          <a href="http://localhost/stagafrique/propos/approche">Notre approche</a>
          <a href="http://localhost/stagafrique/propos/public">À qui s'adresse notre plateforme ?</a>
          <a href="http://localhost/stagafrique/propos/confiance">Pourquoi nous faire confiance ?</a>
          <a href="http://localhost/stagafrique/propos/ethique">Notre approche éthique</a>
        </div>
      </div>
    </div>
    <a href="#contact" class="btn-orange">S'inscrire maintenant</a>
  </nav>
