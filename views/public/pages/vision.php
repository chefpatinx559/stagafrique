<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notre Histoire - Stag'AFRIQUE</title>   <!-- ← À CHANGER pour chaque page -->
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <link rel="icon" type="image/png" href="assets/images/favicon.png">

  <!-- Copie ici TOUS tes <style> actuels (le bloc complet entre <style> et </style>) -->
  <!-- ... (colle ici les 600+ lignes de CSS que tu as déjà) ... -->

  <!-- Optionnel : un petit style supplémentaire juste pour ces pages "À propos" -->
<style>
      :root {
      --orange: #FF6B00;
      --orange-dark: #FF4500;
      --gris: #333;
      --gris-moyen: #666;
      --gris-clair: #f4f7f6;
      --blanc: #fff;
    }
    * {
  box-sizing: border-box;
}


    html, body { 
    margin: 0; 
    padding: 0; 
    overflow-x: hidden; 
    width: 100%;
    height: 100%;
    min-height: 100%;
    padding-top: 0 !important;
}
.reveal {
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.8s ease-out,
              transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
  will-change: opacity, transform;
}

.reveal.active {
  opacity: 1;
  transform: translate(0, 0);
}

.reveal.from-left  { transform: translateX(-60px); }
.reveal.from-right { transform: translateX(60px); }
.reveal.from-top   { transform: translateY(-60px); }

  
/* ── NAVBAR RECORRIGÉE (STABLE) ── */
.navbar {
    position: fixed !important;
    top: 20px !important; /* Décollée du haut pour l'effet flottant */
    left: 50% !important;
    transform: translateX(-50%) !important;
    width: 90% !important;
    max-width: 1400px !important;
    background: rgba(0, 0, 0, 0.6) !important; /* Plus sombre pour la lisibilité */
    backdrop-filter: blur(15px) !important;
    padding: 0.7rem 2rem !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    z-index: 1000 !important;
    border-radius: 50px !important;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3) !important;
    margin: 0 !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    height: 60px; /* Hauteur fixe ajoutée */
    box-sizing: border-box;
}
.logo {
      color: #ff6b00;  
      font-weight: bold;
      font-size: 1.5rem;
      text-decoration: none;
    }

    .nav-links a {
      margin-left: 0.5rem;
      padding: 0.6rem 1.2rem;
      text-decoration: none;
      color: #ffffff;
      font-weight: 500;
      font-size: 1.2rem;
      border-radius: 50px; 
      transition: all 0.3s ease;
      display: inline-block;
    }

    .nav-links a:hover {
      background: rgba(255, 255, 255, 0.1); 
      color: #FF6B00;
      transform: translateY(-2px);
    }

   .btn-orange {
    background: linear-gradient(135deg, #FF6B00 0%, #FF8533 100%); /* Dégradé subtil */
    color: white !important;
    padding: 12px 28px;
    border-radius: 100px; /* Pilule parfaite */
    font-weight: 600;
    text-decoration: none;
    box-shadow: 0 10px 20px rgba(255, 107, 0, 0.2);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    display: inline-block;
}

.btn-orange:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 30px rgba(255, 107, 0, 0.3);
}
    /* Gestion responsive navbar */
    .navbar {
      box-sizing: border-box;
      max-width: 95%;
      left: 50%;
      transform: translateX(-50%);
    }

    @media (max-width: 992px) {
      .navbar { padding: 0.5rem 1rem; border-radius: 25px; margin-top: 10px; }
      .logo { font-size: 1.2rem; }
      .nav-links a { padding: 0.5rem 0.8rem; font-size: 0.85rem; margin-left: 0.2rem; }
      .btn-orange { padding: 0.5rem 1rem; }
    }

    @media (max-width: 768px) {
      .nav-links { display: flex; overflow-x: auto; white-space: nowrap; gap: 5px; -webkit-overflow-scrolling: touch; }
      .nav-links::-webkit-scrollbar { display: none; }
      .nav-links a:not(.btn-orange) { display: none; }
      .navbar { justify-content: space-around; }
    }



/* QUOTE BOX : Effet sombre transparent fidèle à la capture */
.quote-box {
      position: relative;
      border-left: 4px solid var(--orange);
      padding: 25px 40px 25px 50px;
      margin: 40px 0;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(12px);
      border-radius: 12px;
      color: #ffffff;
      font-size: 1.2rem;
      font-style: italic;
      line-height: 1.5;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      animation: fadeInFocus 1.5s ease-out;
    }

.quote-box .quote-icon {
      color: var(--orange);
      font-size: 1.5rem;
      position: absolute;
      left: 15px;
      top: 22px;
    }

    @keyframes fadeInFocus {
      0% { opacity: 0; transform: scale(0.98); filter: blur(5px); }
      100% { opacity: 1; transform: scale(1); filter: blur(0); }
    }

 .hero {
    position: relative;
    height: 100vh;
    min-height: 100vh;
    width: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background: #000;
}

    
    .fade-slider { 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    
    .slide { 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
    }
    
    .slide.active { 
        opacity: 1;
    }
    
    .slide::before { 
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }

    .hero-content {
      position: absolute; 
      z-index: 10; 
      top: 50%;
      left: 8%; 
      transform: translateY(-50%);
      max-width: 650px; 
      color: white;
      margin-top: 30px; /* Décalage pour descendre sous la navbar */
    }
    
    .hero-content h1 { 
        font-size: 3.2rem; 
        line-height: 1.1; 
        margin-bottom: 1.5rem; 
        font-weight: 700; 
    }
    
    .highlight { 
        color: var(--orange); 
    }
    
    .hero-content .description { 
        font-size: 1rem; 
        margin-bottom: 2rem; 
        font-weight: 300; 
        color: rgba(255, 255, 255, 0.9); 
    }
    
    .hero .quote-box { 
        border-left: 3px solid var(--orange); 
        padding: 10px 20px; 
        margin: 20px 0; 
        background: rgba(255, 255, 255, 0.05); 
        font-style: italic; 
        font-size: 0.95rem; 
    }
    
    .hero-features { 
        display: flex; 
        gap: 20px; 
        font-size: 0.85rem; 
        margin-top: 30px; 
    }
    
    .hero-features span { 
        display: flex; 
        align-items: center; 
    }
    
    .hero-features i { 
        color: var(--orange); 
        margin-right: 8px; 
        font-size: 0.9rem; 
    }

    /* SECTIONS COMMUNES */
    section { padding: 80px 8%; }
    .section-title { font-size: 2.2rem; margin-bottom: 1rem; text-align: center; color: var(--gris); font-weight: 700; }
    .section-subtitle { text-align: center; color: var(--gris-moyen); margin-bottom: 3.5rem; max-width: 700px; margin-left: auto; margin-right: auto; }

    /* PROGRAMMES */
    .programs-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; }
    .program-card { background: var(--blanc); border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border: 1px solid #eee; position: relative; transition: 0.3s; }
    .program-card:hover { transform: translateY(-10px); }
    .program-card img { width: 100%; height: 250px; object-fit: cover; }
    .program-body { padding: 2rem; }
    .program-card h3 { font-size: 1.4rem; margin-bottom: 0.5rem; }
    .program-duration { color: var(--orange); font-weight: 700; font-size: 1.3rem; margin-bottom: 1rem; display: block; }
    .program-card p { font-size: 0.95rem; color: var(--gris-moyen); margin-bottom: 1.5rem; }
    .program-card ul { list-style: none; }
    .program-card ul li { margin-bottom: 0.5rem; font-size: 0.9rem; padding-left: 20px; position: relative; }
    .program-card ul li::before { content: '\f00c'; font-family: "Font Awesome 6 Free"; font-weight: 900; position: absolute; left: 0; color: var(--orange); }
    .popular-tag { background: var(--orange); color: white; font-size: 0.75rem; padding: 4px 12px; border-radius: 20px; position: absolute; top: 15px; left: 15px; z-index: 5; }

/* ── SECTION DESTINATIONS : LAYOUT MASONRY PROFESSIONNEL ── */
#destinations {
    background-color: #fbfbfb;
    padding: 100px 0;
}

.destinations-layout {
    display: flex; /* Utilise Flex pour séparer Carte et ONG */
    gap: 40px;
    max-width: 1700px;
    margin: 50px auto 0;
    padding: 0 30px;
    align-items: flex-start;
}

/* ── CARTE PREMIUM & OCCUPATION ESPACE ─────────────────────────────────────── */

/* Colonne : prend tout l'espace vertical disponible */
.map-colum {
    position: sticky;
    top: 110px;
    flex: 0 0 auto;                    /* grandit verticalement */
    min-width: 250px;
    max-width: 350px;
    z-index: 10;
    height: auto;
}

/* Wrapper : glassmorphism chic + arrondi premium */
.map-wrapper {
    background: rgba(255, 255, 255, 0.07);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);   /* compat Safari */
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 32px;
    box-shadow: 
        0 20px 60px rgba(0,0,0,0.15),
        inset 0 1px 0 rgba(255,255,255,0.12);
    padding: 14px;
    overflow: hidden;
    position: relative;
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    min-height: 500px;                 /* sécurité hauteur minimum */
}

/* Hover luxe */
.map-wrapper:hover {
    transform: translateY(-10px);
    box-shadow: 
        0 30px 80px rgba(0,0,0,0.22),
        0 10px 40px rgba(255,107,0,0.15);
}

/* Carte Leaflet : remplissage total + arrondi intérieur */
#map {
    border-radius: 24px;
    height: 100% !important;
    width: 100% !important;
    position: absolute;
    top: 0;
    left: 0;
    background: #0f172a;               /* fond fallback chic */
    filter: contrast(1.04) saturate(1.1);
}

/* Vignette subtile (optionnel mais premium) */
.map-wrapper::after {
    content: '';
    position: relative;
    inset: 0;
    border-radius: 32px;
    background: radial-gradient(circle at 50% 50%, transparent 70%, rgba(0,0,0,0.08) 100%);
    pointer-events: none;
    z-index: 1;
    opacity: 0.5;
}

/* Hauteur responsive & sécurité */
@media (min-width: 992px) {
    .map-wrapper {
        height: 780px;                 /* généreuse et équilibrée */
    }
}

@media (max-width: 991px) {
    .map-sidebar {
        position: relative;
        top: 0;
        flex: none;
        width: 100%;
        max-width: 100%;
    }
    .map-wrapper {
        height: 520px;
        border-radius: 28px;
    }
    #map {
        border-radius: 22px;
    }
}

@media (max-width: 600px) {
    .map-wrapper {
        height: 420px;
        padding: 10px;
        border-radius: 24px;
    }
}
/* --- GRILLE EN CASCADE (MASONRY) --- */
.ong-grid {
    flex: 1; /* Prend tout l'espace restant */
    display: block !important; /* Désactive le mode grid pour autoriser les colonnes */
    column-count: 3; /* 3 colonnes de cascade */
    column-gap: 25px;
}

/* --- CARTE ONG INDIVIDUELLE --- */
.ong-card {
    background: white;
    border: 1px solid #f0f0f0;
    border-radius: 20px;
    padding: 30px 20px;
    text-align: center;
    
    /* PROPRIÉTÉS MASONRY CRUCIALES */
    display: inline-block; 
    width: 100%;
    margin-bottom: 25px; 
    break-inside: avoid; /* Empêche la carte de se couper */
    
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    box-shadow: 0 4px 12px rgba(0,0,0,0.02);
}

.ong-card:hover {
    transform: translateY(-8px);
    border-color: var(--orange);
    box-shadow: 0 15px 35px rgba(255, 107, 0, 0.12);
}

.ong-logo {
    width: 85px;
    height: 85px;
    margin: 0 auto 20px;
    background: #fff9f5;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
}

.ong-logo img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.ong-card h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 10px;
}

.ong-card p {
    font-size: 0.9rem;
    color: #64748b;
    line-height: 1.5;
}

/* --- RESPONSIVE --- */
@media (max-width: 1400px) {
    .ong-grid { column-count: 2; }
}

@media (max-width: 1100px) {
    .destinations-layout { flex-direction: column; }
    .map-sidebar { width: 100%; flex: none; position: relative; top: 0; }
    #map { height: 400px; }
}

@media (max-width: 700px) {
    .ong-grid { column-count: 1; }
} /*Conteneur pour limiter la largeur et centrer le tableau */
.table-container { 
    max-width: 1200px; /* Largeur identique à votre footer-grid pour la cohérence */
    margin: 0 auto;
    padding: 0 20px;}

table { 
    width: 90%; 
    border-collapse: separate; 
    border-spacing: 0;
    background: white; 
    border-radius: 16px; /* Arrondi légèrement réduit pour la compacité */
    overflow: hidden; 
    box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
    border: 1px solid rgba(0,0,0,0.05);
    margin-left: auto;    /* 2. Centre horizontalement (gauche) */
    margin-right: auto;   /* 3. Centre horizontalement (droite) */
    
}

th { 
    background: #FF6B00; 
    color: white; 
    padding: 1rem 1.2rem; /* Réduit (était 1.5rem) */
    text-align: left; 
    font-weight: 600;
    font-size: 0.95rem; /* Taille de police légèrement réduite */
}

td { 
    padding: 0.8rem 1.2rem; /* Réduit (était 1.2rem 1.5rem) */
    border-bottom: 1px solid #f1f5f9; 
    color: #4a5568;
    font-size: 0.9rem; /* Plus fin */
}

/* Ligne de prix finale plus équilibrée */
.price-row { 
    background: #fff8f4; 
    font-weight: 800; 
    color: #FF6B00; 
}

.price-row td {
    border-bottom: none;
    padding: 1.2rem; /* Réduit (était 2rem) */
    font-size: 1.1rem; /* Plus lisible sans être massif */
}

/* Icônes centrées proprement */
.check-icon, .cross-icon { 
    text-align: center;
    width: 100px; /* Fixe une largeur pour les colonnes de coches */
}

.check-icon i { color: #38a169; }
.cross-icon i { color: #e53e3e; opacity: 0.4; }

    /* PROCESSUS */
    .process-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; text-align: center; margin-bottom: 5rem; }
    .process-step h4 { margin-top: 1rem; font-size: 1.1rem; }
    .process-step p { font-size: 0.85rem; color: var(--gris-moyen); margin-top: 5px; }
    .step-circle { width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; color: white; font-size: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }

    /* TEMOIGNAGES */
    .testimonials-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-top: 3rem; }
    .testimonial-item { text-align: center; background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .testimonial-item img { width: 70px; height: 70px; border-radius: 50%; margin-bottom: 15px; object-fit: cover; border: 3px solid var(--gris-clair); }
    .testimonial-item blockquote { font-style: italic; font-size: 0.9rem; color: var(--gris-moyen); position: relative; }
    .testimonial-item blockquote::before { content: "\f10d"; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--orange); opacity: 0.2; font-size: 1.5rem; display: block; margin-bottom: 5px; }
    .testimonial-item cite { display: block; margin-top: 15px; font-weight: 700; font-size: 0.85rem; font-style: normal; color: var(--orange); }

    /* CONTACT */
    .contact-container { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; }
    .form-group { margin-bottom: 1.5rem; }
    .form-group label { display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; color: var(--gris); }
    .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 0.9rem; border: 1px solid #dee2e6; border-radius: 8px; font-family: inherit; transition: 0.3s; background: #fff; }
    .form-group input:focus { border-color: var(--orange); outline: none; box-shadow: 0 0 0 3px rgba(255,107,0,0.1); }
    .upload-box { border: 2px dashed #cbd5e0; padding: 2.5rem; text-align: center; border-radius: 12px; margin-bottom: 1.5rem; cursor: pointer; background: #f8fafc; transition: 0.3s; }
    .upload-box:hover { border-color: var(--orange); background: #fff8f4; }
    .upload-box i { font-size: 1.8rem; color: #a0aec0; margin-bottom: 10px; display: block; }
    .btn-submit { background: var(--orange); color: white; border: none; padding: 1.1rem; border-radius: 8px; font-weight: 700; cursor: pointer; width: 100%; transition: 0.3s; font-size: 1rem; }
    .btn-submit:hover { background: var(--orange-dark); }
    
    .contact-info-box { background: white; padding: 2.5rem; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .info-item { display: flex; align-items: flex-start; margin-bottom: 2rem; }
    .info-circle { width: 45px; height: 45px; border-radius: 12px; background: #fff4ed; color: var(--orange); display: flex; align-items: center; justify-content: center; margin-right: 20px; flex-shrink: 0; font-size: 1.1rem; }
    .info-item strong { display: block; font-size: 0.95rem; margin-bottom: 2px; }
    .info-item p { font-size: 0.85rem; color: var(--gris-moyen); }

         footer {
    background: #111;
    color: white;
    padding: 80px 0 30px;
    margin-top: 100px;

    /* TECHNIQUE FULL-BLEED CORRIGÉE ET STABLE */
    width: 100vw;
    position: relative;
    left: 50%;
    transform: translateX(-50%);   /* Méthode la plus fiable et moderne */
}

/* Contenu interne centré (ne touche pas aux bords) */
.footer-inner {
    max-width: 1400px;           /* ou 1200px si tu préfères plus étroit */
    margin: 0 auto;
    padding: 0 5%;               /* marges latérales confortables */
}

/* Ta grille reste exactement la même */
.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 2rem;
    margin-bottom: 50px;
}

/* Le reste de tes styles footer (inchangé) */
.footer-col h5 {
    margin-bottom: 1.8rem;
    font-size: 1.1rem;
    color: #fff;
    font-weight: 600;
    position: relative;
}

.footer-col h5::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -8px;
    width: 30px;
    height: 2px;
    background: var(--orange);
}

.footer-col ul {
    list-style: none;
}

.footer-col ul li {
    margin-bottom: 0.9rem;
    font-size: 0.9rem;
    opacity: 0.6;
    cursor: pointer;
    transition: 0.3s;
}

.footer-col ul li:hover {
    opacity: 1;
    color: var(--orange);
    padding-left: 5px;
}

.footer-bottom {
    border-top: 1px solid #222;
    padding: 30px 5%;
    display: flex;
    justify-content: space-between;
    font-size: 0.8rem;
    opacity: 0.5;
    max-width: 1400px;
    margin: 0 auto;
}


    @media (max-width: 992px) {
      .destinations-container, .contact-container, .footer-grid { grid-template-columns: 1fr; }
      .process-grid { grid-template-columns: repeat(2, 1fr); }
      .testimonials-grid { grid-template-columns: 1fr; }
    }
    .features-section {
    padding: 80px 5%;
    background-color: #ffffff;
    text-align: center;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    max-width: 1200px;
    margin: 40px auto 0;
}

/* Style de la carte Pourquoi nous rejoindre */
.feature-card {
    background: #fcfcfc;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: left; /* Alignement à gauche comme sur la capture */
    border: 1px solid #f0f0f0;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    background: #ffffff;
}

/* Le petit cercle bleu pour l'icône */
.feature-icon-circle {
    width: 45px;
    height: 45px;
    background-color: #eef4ff; /* Bleu très pâle */
    border-radius: 12px; /* Carré arrondi comme sur l'image */
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
}

.feature-icon-circle i {
    color: #4480ff; /* Bleu de l'icône */
    font-size: 1.2rem;
}

.feature-card h3 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
}

.feature-card p {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.6;
}

/* Responsive */
@media (max-width: 992px) {
    .features-grid {
        grid-template-columns: 1fr;
    }
}
.upload-container {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-top: 10px;
}

.upload-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border: 2px dashed #d1d5db; /* Bordures en pointillés */
    border-radius: 12px;
    background-color: #ffffff;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
}

.upload-box:hover {
    border-color: #FF6B00; /* Orange au survol */
    background-color: #fff9f5;
}

.upload-box i {
    font-size: 1.5rem;
    color: #9ca3af;
    margin-bottom: 10px;
}

.upload-text {
    display: flex;
    flex-direction: column;
}

.highlight {
    color: #FF6B00; /* Couleur orange pour le texte principal */
    font-weight: 600;
    font-size: 0.95rem;
}

.highlight-orange {
    color: #e67e22;
    font-weight: 600;
}

.details {
    color: #6b7280;
    font-size: 0.8rem;
    margin-top: 4px;
}
/* --- AJOUTS POUR LA RESPONSIVITÉ GLOBALE --- */

@media (max-width: 1200px) {
    .hero-content h1 { font-size: 2.5rem; }
    .contact-container { gap: 2rem; }
}
@media (max-width: 992px) {
    .ong-grid { column-count: 2; }
}

@media (max-width: 700px) {
    .ong-grid { column-count: 1; }
}

@media (max-width: 992px) {
    /* Navigation */
    .navbar { width: 95%; padding: 0.5rem 1.5rem; }
    
    /* Hero Section */
    .hero-content { left: 5%; top: 55%; transform: translateY(-50%); width: 90%; }
    .hero-content h1 { font-size: 2.2rem; }
    
    /* Grilles (Programmes, ONG, Features, Processus) */
    .programs-grid, .features-grid, .process-grid, .testimonials-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 1.5rem;
    }
    
    /* Destinations & Contact */
    .destinations-container, .contact-container {
        grid-template-columns: 1fr !important;
    }
    
    .map-wrapper { position: relative; top: 0; margin-bottom: 2rem; }
    #map { height: 350px; }
}

@media (max-width: 768px) {
    section { padding: 50px 5%; }
    
    .hero-content h1 { font-size: 1.8rem; text-align: center; }
    .hero-content .description { text-align: center; }
    .hero-features { justify-content: center; flex-wrap: wrap; }
    
    /* On empile tout sur une seule colonne pour mobile */
    .programs-grid, .ong-grid, .features-grid, .process-grid, .testimonials-grid, .footer-grid {
        grid-template-columns: 1fr !important;
    }

    /* Menu de navigation mobile */
    .nav-links a:not(.btn-orange) { display: none; } /* On ne garde que le bouton d'inscription */
    .navbar { justify-content: space-between; }
    
    .process-grid { gap: 2rem; }
    
    /* Footer */
    .footer-bottom { flex-direction: column; text-align: center; gap: 10px; }
}

@media (max-width: 480px) {
    .hero-content h1 { font-size: 1.5rem; }
    .btn-orange, .btn-submit { width: 100%; text-align: center; }
    .quote-box { font-size: 0.85rem; padding: 15px; }
}
/* --- SYSTÈME D'ANIMATION UNIFIÉ --- */



/* 2. Animation d'entrée immédiate (Hero Section) */
.fade-in-up {
  opacity: 0;
  animation: fadeInUp 1.2s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* 3. Délais manuels (Optionnel) 
   Utile si vous ne voulez pas utiliser le script de cascade automatique sur certains éléments */
.delay-1 { transition-delay: 0.2s; }
.delay-2 { transition-delay: 0.4s; }
.delay-3 { transition-delay: 0.6s; }
 /* ── ANIMATIONS D'APPARITION (AJOUT UNIQUEMENT) ─────────────────────────────── */


/* Animation au chargement immédiat (hero, navbar, etc.) */
.fade-in {
  opacity: 0;
  animation: fadeIn 1.2s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.98); }
  to   { opacity: 1; transform: scale(1);    }
}

/* Délais en cascade (pour grilles / listes) */
.delay-1 { transition-delay: 0.15s; }
.delay-2 { transition-delay: 0.3s;  }
.delay-3 { transition-delay: 0.45s; }
.delay-4 { transition-delay: 0.6s;  }
.delay-5 { transition-delay: 0.75s; }
/* FIX NAVBAR DÉBORDANTE + ESPACE SOUS LA BARRE */

.navbar {
    position: fixed !important;
    top: 10px !important;               /* ← on enlève le margin-top bizarre */
    left: 50%;
    transform: translateX(-50%);
    width: 94% !important;              /* un peu plus large pour éviter débordement */
    max-width: 1400px;                  /* limite sur grand écran */
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(15px);
    padding: 0.8rem 4%;                 /* padding interne équilibré */
    border-radius: 50px;
    z-index: 1000 !important;           /* toujours au-dessus */
    box-shadow: 0 4px 20px rgba(0,0,0,0.25);
    margin: 0 !important;               /* supprime toute marge parasite */
}





/* Si le bouton S'inscrire est caché : force visibilité */
.btn-orange {
    z-index: 1001 !important;           /* au-dessus de tout */
    position: relative;
}
/* ── LÉGENDE EXACTE COMME SUR LA CAPTURE (PRODUIT JSON STYLE) ──────────────── */

/* Conteneur principal de la légende */
.map-legend-bottom {
    background: #ffffff !important;                    /* fond blanc propre */
    border-radius: 16px !important;
    border: 1px solid #e2e8f0 !important;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06) !important;
    padding: 24px 32px !important;
    margin: 20px auto 0 !important;
    max-width: 100% !important;
    text-align: center !important;
    transition: all 0.3s ease !important;
}

/* Titre "LÉGENDE" ou "LEGEND" */
.legend-header,
.map-legend-bottom > p:first-child,
.map-legend-bottom strong,
.map-legend-bottom h5,
.map-legend-bottom h4 {
    font-size: 1.05rem !important;
    font-weight: 700 !important;
    color: #1e293b !important;
    text-transform: uppercase !important;
    letter-spacing: 1.2px !important;
    margin: 0 0 18px 0 !important;
    padding-bottom: 10px !important;
    border-bottom: 2px solid var(--orange) !important;
    display: inline-block !important;
}

/* Sous-titre ou description (si présent) */
.map-legend-bottom p:not(.legend-header) {
    font-size: 0.95rem !important;
    color: #64748b !important;
    margin: 0 0 20px 0 !important;
}

/* Grille / flex des boutons */
.legend-grid {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    gap: 16px 20px !important;
}

/* Boutons de ville - style capture */
.city-btn {
    background: #f8fafc !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 12px !important;
    padding: 10px 20px !important;
    font-size: 0.96rem !important;
    font-weight: 600 !important;
    color: #334155 !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03) !important;
    transition: all 0.3s ease !important;
    cursor: pointer !important;
    white-space: nowrap !important;
}

/* Hover */
.city-btn:hover {
    background: #ffffff !important;
    border-color: var(--orange) !important;
    color: var(--orange) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(255, 107, 0, 0.12) !important;
}

/* Actif */
.city-btn.active {
    background: var(--orange) !important;
    color: white !important;
    border-color: var(--orange) !important;
    box-shadow: 0 6px 16px rgba(255, 107, 0, 0.25) !important;
}

/* Les points colorés (dots) - plus propres */
.dot {
    width: 10px !important;
    height: 10px !important;
    border-radius: 50% !important;
    flex-shrink: 0 !important;
}

/* Responsive : boutons plus petits et centrés sur mobile */
@media (max-width: 768px) {
    .map-legend-bottom {
        padding: 20px !important;
    }
    .legend-grid {
        gap: 12px !important;
        justify-content: center !important;
    }
    .city-btn {
        padding: 8px 16px !important;
        font-size: 0.92rem !important;
    }
}

  /* ── FIX HERO : IMAGE BIEN CENTRÉE, PAS DE CREUX EN HAUT ─────────────────────── */

/* Hero : pleine hauteur écran sans marge parasite */


/* Slider : image parfaitement centrée verticalement */
.slide {
    background-size: cover !important;
    background-position: center center !important;  /* centre vertical + horizontal */
    background-repeat: no-repeat !important;
}

/* Contenu hero : descend un peu pour éviter la navbar + centrage parfait */
.hero-content {
    top: 55% !important;                    /* descend un peu plus bas */
    transform: translateY(-50%) !important;

}

/* Sécurité : empêche l'image de se couper trop en bas */
.slide::before {
    background: rgba(0, 0, 0, 0.45) !important;  /* overlay plus sombre pour lisibilité texte */
}
/* Styles pour les messages d'erreur */
.error-message {
    color: #ff6b00;
    font-size: 0.8rem;
    margin-top: 5px;
    animation: fadeIn 0.3s ease;
}

/* Animation pour les messages d'erreur */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Style pour les champs invalides */
input:invalid:not(:focus):not(:placeholder-shown),
select:invalid:not(:focus),
textarea:invalid:not(:focus):not(:placeholder-shown) {
    border-color: #ff6b00 !important;
    background-color: rgba(255, 107, 0, 0.05);
}

/* Style pour le bouton de soumission au survol */
#submitBtn:hover {
    background-color: #e55a00 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(255, 107, 0, 0.3);
}

/* Style pour le bouton de soumission actif */
#submitBtn:active {
    transform: translateY(0) !important;
    box-shadow: 0 2px 6px rgba(255, 107, 0, 0.3);
}
/* 1. La Question (Style Stag'AFRIQUE) */
.faq-question {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 1rem 0;
    font-weight: 600;
    color: #333; /* Gris très foncé pour la question */
    transition: color 0.3s ease;
    user-select: none;
    border-bottom: 1px solid #eee;
}

/* Orange au survol */
.faq-question:hover {
    color: #ff7322; 
}

/* 2. La Flèche (Orange) */
.arrow-icon {
    margin-right: 12px;
    color: #ff7322; 
    font-size: 0.7rem;
    transition: transform 0.3s ease;
    display: inline-block;
}

/* 3. La Réponse (Noir et alignement) */
.faq-item .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.45s cubic-bezier(0.4, 0, 0.2, 1);
}

.faq-answer-content {
    padding-left: 25px; /* Aligné sous le texte de la question */
    padding-bottom: 1.2rem;
    color: #000000; /* RÉPONSE EN NOIR */
    line-height: 1.6;
    font-weight: 400; /* Poids normal pour contraster avec la question */
}

/* 4. États actifs */
.faq-item.open .arrow-icon {
    transform: rotate(90deg); /* La flèche tourne vers le bas */
}

.faq-item.open .faq-answer {
    max-height: 800px;
}

.faq-item.open .faq-question {
    color: #ff7322; /* La question passe en orange quand elle est ouverte */
}

/* ── DROPDOWN QUI SOMMES-NOUS ──────────────────────────────────────── */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-toggle {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 0.6rem 1.2rem;
    color: #ffffff;
    font-weight: 500;
    font-size: 1.2rem;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.dropdown-toggle:hover {
    background: rgba(255, 255, 255, 0.1);
    color: var(--orange);
    transform: translateY(-1px);
}

.dropdown-toggle i {
    font-size: 0.8rem;
    transition: transform 0.25s ease;
}

.dropdown:hover .dropdown-toggle i {
    transform: rotate(180deg);
}

/* Le menu qui descend */
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    min-width: 220px;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 12px 35px rgba(0,0,0,0.35);
    opacity: 0;
    visibility: hidden;
    transform: translateX(-50%) translateY(12px);
    transition: all 0.28s ease;
    padding: 8px 0;
    z-index: 999;
    margin-top: 8px;
}

.dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

/* Liens dans le dropdown */
.dropdown-menu a {
    display: block;
    padding: 12px 24px;
    color: white;
    text-decoration: none;
    font-size: 0.98rem;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.dropdown-menu a:hover {
    background: rgba(255, 107, 0, 0.18);
    color: var(--orange);
    padding-left: 32px;
}

/* Responsive - on désactive le hover sur mobile et on laisse le clic */
@media (max-width: 992px) {
    .dropdown-menu {
        position: static;
        transform: none;
        opacity: 1;
        visibility: visible;
        display: none;
        background: rgba(30, 30, 30, 0.95);
        box-shadow: none;
        border-radius: 8px;
        margin: 8px 0 8px 16px;
        width: auto;
    }
    
    .dropdown.active .dropdown-menu {
        display: block;
    }
    
    .dropdown-toggle {
        justify-content: space-between;
    }
    
    /* On cache la flèche sur mobile si tu veux */
    /* .dropdown-toggle i { display: none; } */
}

.about-hero {
      background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.75)), 
                  url('https://images.unsplash.com/photo-1522202176988-66273c2b033f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 180px 8% 100px;
      text-align: center;
    }
    
    .about-hero h1 {
      font-size: 3.8rem;
      margin-bottom: 1rem;
      font-family: 'Playfair Display', serif;
      font-weight: 700;
    }
    
    .about-content {
      max-width: 960px;
      margin: 0 auto;
      padding: 60px 8% 100px;
      line-height: 1.8;
      font-size: 1.1rem;
      color: #333;
    }
    
    .about-content h2 {
      color: var(--orange);
      font-size: 2.4rem;
      margin: 3rem 0 1.5rem;
      font-weight: 700;
      text-align: center;
    }
    
    .about-content .intro {
      font-size: 1.25rem;
      font-weight: 500;
      color: #444;
      margin-bottom: 2.5rem;
      text-align: center;
    }
    
    .about-content p {
      margin-bottom: 1.8rem;
    }
    
    .about-content .highlight {
      color: var(--orange);
      font-weight: 600;
    }

</style>
</head>
<body>

  <!-- ── NAVBAR IDENTIQUE À LA PAGE PRINCIPALE ─────────────────────────────── -->
  <nav class="navbar">
    <div class="logo">
      <a href="http://localhost/stagafrique" style="text-decoration:none; color:inherit;">Stag'AFRIQUE</a>
    </div>
    <div class="nav-links">
      <a href="http://localhost/stagafrique">Accueil</a>
      <a href="http://localhost/stagafrique#programmes">Programmes</a>
      <a href="http://localhost/stagafrique#processus">Processus</a>
      <a href="#missions">Missions</a>
      
      <!-- Le dropdown reste exactement le même -->
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


<!-- CONTENU SPÉCIFIQUE À "NOTRE VISION" -->
  <main class="about-content reveal">
    <h2>NOTRE VISION</h2>

    <p class="intro" style="font-style: italic; max-width: 820px; margin: 0 auto 3.5rem; line-height: 1.9; font-size: 1.15rem;">
      Nous croyons à une <strong>coopération internationale</strong> :<br>
      respectueuse des réalités locales,<br>
      basée sur l’utilité réelle des missions,<br>
      bénéfique à la fois pour les ONG d’accueil et pour les stagiaires.
    </p>

    <div class="quote-box" style="max-width: 760px; margin: 3rem auto; font-size: 1.25rem; line-height: 1.7;">
      <i class="fas fa-quote-left quote-icon"></i>
      Nous refusons toute forme de tourisme humanitaire.
    </div>

    <p style="font-size: 1.1rem; margin-bottom: 2.5rem;">
      Chaque stage proposé<br>
      <strong>répond à un besoin clairement identifié</strong><br>
      par l’ONG partenaire.
    </p>

    <p>
      Notre engagement est simple et intransigeant :<br>
      privilégier l’impact durable plutôt que l’image,<br>
      l’écoute plutôt que l’imposition,<br>
      le partenariat plutôt que l’assistanat.
    </p>

    <p>
      Nous voulons construire des ponts authentiques,<br>
      où chaque mission enrichit véritablement les deux parties :<br>
      les communautés locales qui accueillent,<br>
      et les jeunes qui s’engagent.
    </p>

    <div style="margin-top: 4rem; text-align: center; font-weight: 700; font-size: 1.3rem; color: var(--orange);">
      Une coopération juste. Utile. Humaine.
    </div>
  </main>

  <!-- ── FOOTER IDENTIQUE À LA PAGE PRINCIPALE ─────────────────────────────── -->
     <footer>
    <div class="footer-inner reveal">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="logo" style="color: var(--orange); margin-bottom: 1rem; font-size: 2rem;">Stag'AFRIQUE</div>
                <p>Votre passerelle vers l'Afrique solidaire</p>
                <div style="margin-top: 20px; font-size: 1.4rem;">
                    <i class="fab fa-facebook-f" style="margin-right: 15px; cursor: pointer;"></i>
                    <i class="fab fa-instagram" style="margin-right: 15px; cursor: pointer;"></i>
                    <i class="fab fa-linkedin-in" style="cursor: pointer;"></i>
                </div>
            </div>
            <div class="footer-col">
                <h5>Programmes</h5>
                <ul>
                    <li>Programme 3 mois</li>
                    <li>Programme 6 mois</li>
                    <li>Programme 12 mois</li>
                    <li>Programmes sur mesure</li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Destinations</h5>
                <ul>
                    <li>Abidjan</li>
                    <li>Bouaké</li>
                    <li>San-Pédro</li>
                    <li>Yamoussoukro</li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Informations</h5>
                <ul>
                    <li>À propos</li>
                    <li>Témoignages</li>
                    <li>FAQ</li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <span>© 2026 Stag'AFRIQUE. Tous droits réservés.</span>
            <div>Mentions légales | Politique de confidentialité | CGV</div>
        </div>
    </div>
</footer>

  <!-- Ton script existant (slider, reveal, dropdown mobile, etc.) -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ── 1. VARIABLES GLOBALES & INITIALISATION ──────────────────────────
    const slides = document.querySelectorAll('.slide');
    const mapElement = document.getElementById('map');
    const form = document.getElementById('multiStepForm');
    const steps = document.querySelectorAll(".form-step");
    const indicators = document.querySelectorAll(".step-indicator");
    const progressLine = document.getElementById("progress-line");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");
    
    let currentSlide = 0;
    let currentStep = 0;
    let map = null;

    // ── 2. SLIDER HERO ─────────────────────────────────────────────────
    if (slides.length > 0) {
        slides.forEach((s, i) => i === 0 ? s.classList.add('active') : s.classList.remove('active'));
        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 5000);
    }

    // ── 3. CARTE LEAFLET & FILTRAGE ONG ───────────────────────────────
    if (mapElement) {
        map = L.map('map', { scrollWheelZoom: false, zoomControl: false }).setView([7.5399, -5.5470], 7);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '©OpenStreetMap ©CartoDB'
        }).addTo(map);

        const positions = [
            {id: 1, city: "Abidjan", lat: 5.3600, lng: -4.0083, zone: "abidjan"},
            {id: 2, city: "Bouaké", lat: 7.6900, lng: -5.0300, zone: "bouake"},
            {id: 3, city: "San-Pédro", lat: 4.7500, lng: -6.6400, zone: "san-pedro"}
        ];

        function filterONGByZone(zoneName) {
            document.querySelectorAll('.ong-item').forEach(ong => {
                const isVisible = (zoneName === 'all' || !zoneName || ong.getAttribute('data-zone') === zoneName);
                ong.style.display = isVisible ? "flex" : "none";
                ong.style.opacity = isVisible ? "1" : "0";
            });
        }
        filterONGByZone('all');

        positions.forEach(pos => {
            const marker = L.marker([pos.lat, pos.lng]).addTo(map);
            marker.bindPopup(`<b>${pos.city}</b>`);
            marker.on('click', () => {
                map.flyTo([pos.lat, pos.lng], 12, { animate: true, duration: 1.5 });
                filterONGByZone(pos.zone);
                updateActiveCityButton(pos.id);
            });
        });

        function updateActiveCityButton(id) {
            document.querySelectorAll('.city-btn').forEach(b => {
                b.classList.toggle('active', parseInt(b.getAttribute('data-id')) === id);
            });
        }

        document.querySelectorAll('.city-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const cityData = positions.find(p => p.id === parseInt(this.getAttribute('data-id')));
                if (cityData) {
                    map.flyTo([cityData.lat, cityData.lng], 12, { animate: true, duration: 1.5 });
                    filterONGByZone(cityData.zone);
                    updateActiveCityButton(cityData.id);
                }
            });
        });

        // Optimisation InvalidateSize (évite le lag au scroll)
        const refreshMap = () => { if (map) map.invalidateSize(); };
        setTimeout(refreshMap, 500);
        setTimeout(refreshMap, 1500);
        window.addEventListener('resize', refreshMap);
    }

    // ── 4. FORMULAIRE MULTI-STEP & VALIDATION ─────────────────────────
    if (form && steps.length > 0) {
        function validateStep(stepIndex) {
            let stepValid = true;
            const fields = steps[stepIndex].querySelectorAll('[required]');
            fields.forEach(field => {
                const isInvalid = !field.value.trim() || (field.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value));
                if (isInvalid) {
                    stepValid = false;
                    field.style.borderColor = "var(--orange)";
                } else {
                    field.style.borderColor = "#dee2e6";
                }
            });
            return stepValid;
        }

        function updateForm() {
            steps.forEach((step, i) => step.style.display = (i === currentStep) ? "block" : "none");
            indicators.forEach((ind, i) => {
                ind.style.background = (i <= currentStep) ? "var(--orange)" : "white";
                ind.style.color = (i <= currentStep) ? "white" : "#333";
                ind.style.border = `2px solid ${i <= currentStep ? 'var(--orange)' : '#eee'}`;
            });
            if(progressLine) progressLine.style.width = (currentStep / (steps.length - 1)) * 100 + "%";
            
            prevBtn.style.display = (currentStep === 0) ? "none" : "block";
            nextBtn.style.display = (currentStep === steps.length - 1) ? "none" : "block";
            submitBtn.style.display = (currentStep === steps.length - 1) ? "block" : "none";
        }

        nextBtn.addEventListener("click", (e) => {
            e.preventDefault();
            if (validateStep(currentStep)) {
                currentStep++;
                updateForm();
                window.scrollTo({ top: form.offsetTop - 100, behavior: 'smooth' });
            }
        });

        prevBtn.addEventListener("click", () => {
            if (currentStep > 0) {
                currentStep--;
                updateForm();
            }
        });

        form.addEventListener('submit', (e) => {
            if (currentStep < steps.length - 1 || !validateStep(currentStep)) {
                e.preventDefault();
            } else {
                // Ici, laissez le formulaire s'envoyer ou gérez l'AJAX
                alert('Inscription enregistrée !');
            }
        });

        updateForm();
    }

    // ── 5. ANIMATIONS REVEAL (INTERSECTION OBSERVER) ──────────────────
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.reveal, .ong-item, .ong-card, section').forEach((el, index) => {
        if (!el.classList.contains('reveal')) el.classList.add('reveal');
        el.style.transitionDelay = (index % 3 * 0.1) + 's';
        revealObserver.observe(el);
    });

    // ── 6. FAQ & ACCORDION ───────────────────────────────────────────
    document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const currentItem = question.parentElement; // .faq-item

        // Ferme tous les autres
        document.querySelectorAll('.faq-item').forEach(item => {
            if (item !== currentItem) {
                item.classList.remove('open');
            }
        });

        // Toggle l'élément cliqué
        currentItem.classList.toggle('open');
    });
});
    // ── 7. PHONE CODE AUTO-SET ──────────────────────────────────────
    const natSelect = document.getElementById('natSelect');
    const phoneInput = document.getElementById('phoneInput');
    if (natSelect && phoneInput) {
        natSelect.addEventListener('change', function() {
            const code = this.options[this.selectedIndex].getAttribute('data-code');
            if (code) phoneInput.value = code + " ";
        });
    }
});

// Gestion dropdown mobile (clic au lieu de hover)
if (window.innerWidth <= 992) {
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            // Empêche le lien direct si on veut juste ouvrir/fermer
            // e.preventDefault();   ← décommente si tu ne veux PAS suivre le lien au clic
            
            const dropdown = this.parentElement;
            const wasActive = dropdown.classList.contains('active');
            
            // Ferme tous les autres dropdowns
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
            
            // Toggle celui cliqué
            if (!wasActive) {
                dropdown.classList.add('active');
            }
        });
    });
    
    // Ferme le menu si on clique ailleurs
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
        }
    });
}
</script>

</body>
</html>