<?php
require_once 'config/app.php';
$pageTitle = "Accueil";
include 'views/partials/header.php';
?>

  <section class="hero" id="accueil">
    <div class="fade-slider">
      <div class="slide active" style="background-image:url('https://upload.wikimedia.org/wikipedia/en/0/02/Notre_dame_de_la_paix_yamoussoukro_by_felix_krohn.jpg');"></div>
      <div class="slide" style="background-image:url('https://www.cafonline.com/media/i1jgzrhv/b24bkss2335.jpg');"></div>
      <div class="slide" style="background-image:url('https://i.pinimg.com/1200x/5b/24/f4/5b24f4e0850d7c3b38caa5e7499023dc.jpg');"></div>
    </div>

 <div class="hero-content fade-in-up">
  <h1>Ne fais pas qu'un stage.<br>Dépasse tes <span class="highlight">frontières.</span></h1>
  <p class="description">Rejoins une mission solidaire en Côte d'Ivoire et transforme tes compétences en impact réel.</p>
  
  <div class="quote-box">
    <i class="fas fa-quote-left"></i>
    "C'est en se perdant dans le service aux autres qu'on finit par se trouver soi-même."
  </div>

  <div class="hero-features">
    <span><i class="fas fa-heart"></i> Impact social</span>
    <span><i class="fas fa-globe-africa"></i> Immersion</span>
    <span><i class="fas fa-rocket"></i> Carrière</span>
  </div>
</div>
  </section>

  <section id="programmes"  class="reveal" style="background-color: var(--gris-clair);">
    <h2 class="section-title">Nos Programmes de Volontariat</h2>
    <div class="programs-grid">
      <div class="program-card reveal">
        <img src="https://salesianmissions.org/wp-content/uploads/2018/02/ivory-coast-feature.jpg" alt="Découverte">
        <div class="program-body">
          <h3>Programme Découverte</h3>
          <span class="program-duration">3 mois</span>
          <p>Idéal pour une première expérience de volontariat.</p>
          <ul><li>Hébergement en famille d'accueil</li><li>Formation interculturelle</li><li>Suivi personnalisé</li></ul>
        </div>
      </div>
      <div class="program-card reveal" style="border: 2px solid var(--orange);">
        <span class="popular-tag">Le plus populaire</span>
        <img src="https://africanimpact.com/wp-content/uploads/2024/08/public-healthcarehero-600x403.jpg" alt="Immersion">
        <div class="program-body">
          <h3>Programme Immersion</h3>
          <span class="program-duration">6 mois</span>
          <p>L'équilibre parfait entre découverte et impact réel.</p>
          <ul><li>Logement indépendant</li><li>Cours de français local</li><li>Excursions culturelles</li></ul>
        </div>
      </div>
      <div class="program-card reveal">
        <img src="https://africanconservation.org/wp-content/uploads/2023/06/tree-planting-reforestation_IMG_1378.jpg" alt="Expert">
        <div class="program-body">
          <h3>Programme Expert</h3>
          <span class="program-duration">12 mois</span>
          <p>Pour les plus engagés souhaitant mener des projets d'envergure.</p>
          <ul><li>Appartement meublé</li><li>Certification professionnelle</li><li>Réseau professionnel local</li></ul>
        </div>
      </div>
    </div>
  </section>
<section id="ong-partenaires" class="reveal">
  <div class="container">
    <h2 class="section-title">ZONES D'INTERVENTIONS</h2>
    <p class="section-subtitle">
    Explorer nos zones d'intervention
    </p>
    <div class="destinations-container">
    <div class="destinations-container">
    <div class="map-column reveal">
        <div class="map-wrapper">
            <div id="map"></div>
        </div>
        
        <div class="map-legend-bottom">
    <p class="legend-header">ZONE D'INTERVENTIONS</p>
    <div class="legend-grid">
        <button class="city-btn active" data-id="1">
            <span class="dot red"></span> Abidjan
        </button>
        <button class="city-btn" data-id="2">
            <span class="dot dark"></span> Bouaké
        </button>
        <button class="city-btn" data-id="3">
            <span class="dot orange"></span> San-Pédro
        </button>
        <button class="city-btn" data-id="4">
            <span class="dot purple"></span> Yamoussoukro
        </button>
        <button class="city-btn" data-id="5">
            <span class="dot green"></span> Daloa
        </button>
        <button class="city-btn" data-id="6">
            <span class="dot blue"></span> Korhogo
        </button>
        <button class="city-btn" data-id="7">
            <span class="dot teal"></span> Man
        </button>
        <button class="city-btn" data-id="8">
            <span class="dot pink"></span> Gagnoa
        </button>
        <button class="city-btn" data-id="9">
            <span class="dot brown"></span> Abengourou
        </button>
        <button class="city-btn" data-id="10">
            <span class="dot gray"></span> Bondoukou
        </button>
    </div>
</div>
        <h2 class="section-title" id="partenaires">NOS ONG PARTENAIRES</h2>
        <p class="section-subtitle">
      Nos collaborations avec des organisations locales engagées dans différents domaines d'action pour le développement durable.
    </p>
    </div>
    <div class="ong-grid">
      <!-- 1 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-remci.png" alt="ONG REMCI">
        </div>
        <h3>ONG REMCI</h3>
        <p>Réseau des Éducateurs aux Maladies Chroniques de Côte d'Ivoire</p>
      </div>

      <!-- 2 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-csas.png" alt="ONG CSAS">
        </div>
        <h3>ONG CSAS</h3>
        <p>Centre de Santé et d'Animation Sociale</p>
      </div>

      <!-- 3 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-aidscom.png" alt="ONG AIDSCOM">
        </div>
        <h3>ONG AIDSCOM</h3>
        <p>Action Internationale pour le Développement Social</p>
      </div>

      <!-- 4 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-aip.png" alt="ONG AIP">
        </div>
        <h3>ONG AIP</h3>
        <p>Association Ivoirienne pour la Promotion</p>
      </div>

      <!-- 5 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-rsb.png" alt="ONG RSB">
        </div>
        <h3>ONG RSB</h3>
        <p>Réseau Social Binkadi</p>
      </div>

      <!-- 6 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-fee.png" alt="ONG FEE">
        </div>
        <h3>ONG FEE</h3>
        <p>Femme Environnement Éducation</p>
      </div>

      <!-- 7 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-EOUIKA.png" alt="ONG EOUKA">
        </div>
        <h3>ONG EOUKA EOUNONG IDEAL INTER</h3>
        <p>Développement communautaire et éducation</p>
      </div>

      <!-- 8 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-victoire.png" alt="ONG VICTOIRE">
        </div>
        <h3>ONG VICTOIRE BOUNDIALI</h3>
        <p>Développement social et économique local</p>
      </div>

      <!-- 9 -->
      <div class="ong-card reveal">
        <div class="ong-logo">
          <img src="assets/images/public/logo-savcom.png" alt="ONG SAVANE COMMUNICATION">
        </div>
        <h3>ONG SAVANE COMMUNICATION</h3>
        <p>Communication et sensibilisation communautaire</p>
      </div>
    </div>
  </div>
</section>

<section id="tarifs" class="reveal" style="background-color: var(--gris-clair);">
    <h2 class="section-title">Tarifs & Prestations</h2>
    <p class="section-subtitle">Des formules tout inclus pour une expérience sereine et enrichissante.</p>
    
    <div class="table-container">
      </div>
</section>
      <table>
        <thead>
          <tr><th>Prestations incluses</th><th>3 mois</th><th>6 mois</th><th>12 mois</th></tr>
        </thead>
        <tbody>
          <tr><td>Hébergement</td><td class="check-icon"><i class="fas fa-check-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td></tr>
          <tr><td>Formation interculturelle</td><td class="check-icon"><i class="fas fa-check-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td></tr>
          <tr><td>Excursions culturelles</td><td class="cross-icon"><i class="fas fa-times-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td></tr>
          <tr><td>Certification terrain</td><td class="cross-icon"><i class="fas fa-times-circle"></i></td><td class="cross-icon"><i class="fas fa-times-circle"></i></td><td class="check-icon"><i class="fas fa-check-circle"></i></td></tr>
          <tr class="price-row"><td>Prix total</td><td>1 600 €</td><td>3 000 €</td><td>5 500 €</td></tr>
        </tbody>
      </table>
    </div>
  </section>
  <section class="features-section" id="why-join" style="background-color: var(--gris-clair);">
    <div class="container">
        <h2 class="section-title">Pourquoi nous rejoindre ?</h2>
        <p class="section-subtitle">Notre programme offre une expérience unique combinant engagement humanitaire, découverte culturelle et développement personnel.</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon-circle">
                    <i class="far fa-heart"></i>
                </div>
                <h3>Impact réel</h3>
                <p>Contribuez directement au développement des communautés locales à travers des projets concrets et durables.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon-circle">
                    <i class="fas fa-globe-africa"></i>
                </div>
                <h3>Échange culturel</h3>
                <p>Immergez-vous dans la culture ivoirienne et partagez la vôtre dans un environnement d'apprentissage mutuel.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon-circle">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3>Développement personnel</h3>
                <p>Acquérez de nouvelles compétences, gagnez en confiance et élargissez vos horizons personnels et professionnels.</p>
            </div>
        </div>
    </div>
</section>

  <section id="processus">
    <h2 class="section-title">Processus d'Inscription</h2>
    <p class="section-subtitle">Quatre étapes simples pour commencer votre aventure.</p>
    <div class="process-grid">
      <div class="process-step">
        <div class="step-circle" style="background: #e74c3c;"><i class="fas fa-search"></i></div>
        <h4>1. Choisir</h4>
        <p>Sélectionnez le programme qui vous correspond.</p>
      </div>
      <div class="process-step">
        <div class="step-circle" style="background: #27ae60;"><i class="fas fa-file-signature"></i></div>
        <h4>2. S'inscrire</h4>
        <p>Remplissez le formulaire en ligne.</p>
      </div>
      <div class="process-step">
        <div class="step-circle" style="background: #f39c12;"><i class="fas fa-credit-card"></i></div>
        <h4>3. Payer</h4>
        <p>Effectuez le paiement sécurisé.</p>
      </div>
      <div class="process-step">
        <div class="step-circle" style="background: #3498db;"><i class="fas fa-plane-departure"></i></div>
        <h4>4. Partir</h4>
        <p>Préparez votre départ avec notre guide.</p>
      </div>
    </div>

      </div>
  </section>

 <section id="contact" style="background-color: var(--gris-clair);">
    <h2 class="section-title">Contactez-nous</h2>
    <div class="contact-container">
    <form id="multiStepForm" action="<?= BASE_URL ?>candidatures/enregistrement" method="POST" enctype="multipart/form-data">
  
  <div style="display: flex; justify-content: space-between; margin-bottom: 30px; position: relative;">
    <div style="position: absolute; top: 15px; left: 0; height: 2px; background: #eee; width: 100%; z-index: 1;"></div>
    <div id="progress-line" style="position: absolute; top: 15px; left: 0; height: 2px; background: #ff6b00; width: 0%; z-index: 2; transition: 0.3s;"></div>
    <div class="step-indicator active-ind" style="z-index: 3; background: #ff6b00; color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold;">1</div>
    <div class="step-indicator" style="z-index: 3; background: white; border: 2px solid #eee; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold;">2</div>
    <div class="step-indicator" style="z-index: 3; background: white; border: 2px solid #eee; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold;">3</div>
    <div class="step-indicator" style="z-index: 3; background: white; border: 2px solid #eee; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold;">4</div>
    <div class="step-indicator" style="z-index: 3; background: white; border: 2px solid #eee; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; font-weight: bold;">5</div>
  </div>

  <div class="form-step active-step">
    <h4 style="margin-bottom: 20px; color: #ff6b00;">1. Informations personnelles</h4>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
      <div class="form-group">
        <label>Nom</label>
        <input type="text" name="sai_nom" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Votre nom">
      </div>
      <div class="form-group">
        <label>Prénom(s)</label>
        <input type="text" name="sai_prenoms" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Vos prénoms">
      </div>
    </div>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
      <div class="form-group">
        <label>Date et lieu de naissance</label>
        <input type="text" name="sai_date_naiss" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="JJ/MM/AAAA à Ville">
      </div>
      <div class="form-group">
        <label>Sexe</label>
        <select name="sai_sexe" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; background: white;">
          <option value="" disabled selected>Sélectionnez</option>
          <option value="masculin">Masculin</option>
          <option value="feminin">Féminin</option>
        </select>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
      <div class="form-group">
        <label>Nationalité</label>
        <input name="sai_nationalite" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; background: white;"/>
           
      </div>
      <div class="form-group">
        <label>Téléphone (WhatsApp)</label>
        <input type="tel" name="sai_whatsapp" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="+33...">
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="sai_email" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="email@exemple.com">
        </div>
        <div class="form-group">
            <label>Adresse complète</label>
            <input type="text" name="sai_adresse" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        </div>
    </div>

    <div class="form-group" style="margin-top:15px;">
        <label>Contact d'urgence (Nom - Lien - Tel)</label>
        <input type="text" name="sai_urgence" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
    </div>
  </div>

  <div class="form-step" style="display: none;">
    <h4 style="margin-bottom: 20px; color: #ff6b00;">2. Situation académique</h4>
    <div class="form-group">
        <label>Établissement d'enseignement</label>
        <input type="text" name="sai_etablissement" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
    </div>
    <div class="form-group">
        <label>Pays de l'Etablissement</label>
        <input type="text" name="sai_pays" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
    </div>
    <div class="form-group">
        <label>Filière / Domaine d'études</label>
        <input type="text" name="sai_filiere" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
      <div class="form-group">
        <label>Niveau d'études</label>
        <input type="text" name="sai_niveau" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
      </div>
      <div class="form-group">
        <label>Langues parlées</label>
        <input type="text" name="sai_langue" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
      </div>
    </div>
  </div>

  <div class="form-step" style="display: none;">
    <h4 style="margin-bottom: 20px; color: #ff6b00;">3. Projet de stage</h4>
    <div class="form-group">
      <label>Domaine de stage souhaité</label>
      <select name="domaine_stage_souhaite" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; background: white;">
        <option value="Santé / Médical">Santé / Médical</option>
        <option value="Éducation / Enseignement">Éducation / Enseignement</option>
        <option value="Informatique / Technologie">Informatique / Technologie</option>
        <option value="Autre">Autre</option>
      </select>
    </div>
    <div class="form-group">
        <label>Objectifs du stage</label>
        <textarea name="objectifs_stage" rows="3" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;"></textarea>
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
        <div class="form-group">
            <label>Durée souhaitée</label>
            <input type="text" name="duree_souhaitee" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Ex: 3 mois">
        </div>
        <div class="form-group">
            <label>Préférence de lieu</label>
            <input type="text" name="preference_lieu" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Ex: Abidjan">
        </div>
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top:15px;">
        <div class="form-group">
            <label>Date d'arrivée souhaitée</label>
            <input type="date" name="date_arrivee_souhaitee" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        </div>
        <div class="form-group">
            <label>Date de départ souhaitée</label>
            <input type="date" name="date_depart_souhaitee" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        </div>
    </div>
    <div class="form-group" style="margin-top:15px;">
        <label>Type d'organisation souhaitée et programme</label>
        <input type="text" name="type_organisation_souhaitee" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Ex: ONG, Entreprise privée, Hôpital..."> <br> <br>
        <select name="sai_programme">
            <option selected>Selectionner un programme</option>
            <option value="1600">Programme Découverte 3 mois</option>
            <option value="3000">Programme Immersion 6 mois</option>
            <option value="5500">Programme Expert 12 mois</option>
        </select>
    </div>
    
  </div>

  <div class="form-step" style="display: none;">
    <h4 style="margin-bottom: 20px; color: #ff6b00;">4. Expériences & Documents</h4>
    <div class="form-group">
        <label>Expériences passées / Stages déjà effectués</label>
        <textarea name="experiences_passees" rows="2" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;"></textarea>
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
        <div class="form-group">
            <label>Numéro de passeport</label>
            <input type="text" name="sai_numero_passeport" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        </div>
        <div class="form-group">
            <label>Date d'expiration passeport</label>
            <input type="date" name="date_expiration_passeport" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
        </div>
    </div>
    
    <div class="upload-container" style="margin-top: 20px;">
      <label for="cvInput" class="upload-box" style="cursor: pointer; border: 2px dashed #ddd; border-radius: 8px; padding: 25px; text-align: center; transition: all 0.3s;"
             onmouseover="this.style.borderColor='#ff6b00'; this.style.backgroundColor='rgba(255,107,0,0.05)'"
             onmouseout="this.style.borderColor='#ddd'; this.style.backgroundColor='transparent'">
        <input type="file" id="cvInput" name="sai_cv" hidden accept=".pdf,.doc,.docx">
        <div class="upload-text">
            <span style="color: #ff6b00; font-weight: 600; font-size: 1rem;">📄 Cliquez pour télécharger votre CV</span><br>
            <small style="color: #666; font-size: 0.85rem;">Formats acceptés : PDF, DOC, DOCX (Max 5MB)</small>
        </div>
      </label>
      <label for="docsInput" class="upload-box" style="cursor: pointer; border: 2px dashed #ddd; border-radius: 8px; padding: 25px; text-align: center; transition: all 0.3s; margin-top: 15px;"
             onmouseover="this.style.borderColor='#ff6b00'; this.style.backgroundColor='rgba(255,107,0,0.05)'"
             onmouseout="this.style.borderColor='#ddd'; this.style.backgroundColor='transparent'">
        <input type="file" id="docsInput" name="sai_documents" hidden multiple accept=".pdf,.doc,.docx,.jpg,.png">
        <div class="upload-text">
            <span style="color: #ff6b00; font-weight: 600; font-size: 1rem;">📎 Autres documents (Lettre de motivation, diplômes...)</span><br>
            <small style="color: #666; font-size: 0.85rem;">Vous pouvez sélectionner plusieurs fichiers</small>
        </div>
      </label>
    </div>
  </div>

  <div class="form-step" style="display: none;">
    <h4 style="margin-bottom: 20px; color: #ff6b00;">5. Logistique & Besoins</h4>
    <div class="form-group">
        <label>Précisez vos besoins d'accompagnement (Hébergement, Visa, etc.) :</label>
        <textarea name="besoin_accompagnement" rows="3" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Décrivez ici si vous avez besoin d'aide pour le logement, le visa..."></textarea>
    </div>
    <div class="form-group" style="margin-top:20px;">
        <label>Besoins spécifiques ou médicaux</label>
        <textarea name="besoins_specifiques_medicaux" rows="3" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;" placeholder="Allergies, conditions médicales..."></textarea>
    </div>
    
    <div style="font-size: 0.9rem; margin-top: 25px; padding: 20px; background: rgba(255,107,0,0.05); border-radius: 8px; display: flex; gap: 15px;">
      <input type="checkbox" id="consent" required style="width: 20px; height: 20px;"> 
      <label for="consent">Je certifie l'exactitude des informations fournies...</label>
    </div>
  </div>

  <div style="display: flex; gap: 15px; margin-top: 30px;">
    <button type="button" id="prevBtn" style="background: #ccc; display: none; padding: 12px 25px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600;">Précédent</button>
    <button type="button" id="nextBtn" style="background: #ff6b00; color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; flex: 1; font-weight: 600;">Suivant</button>
    <button type="submit" name="btn-soumettre-candidature" id="submitBtn" style="background: #ff6b00; color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; flex: 1; display: none; font-weight: 600;">Envoyer l'inscription</button>
  </div>
</form>

      <div class="contact-info-box">
    <h3>Informations de contact</h3>
    <p style="font-size: 0.9rem; color: #888; margin-bottom: 2rem;">Notre équipe vous répond sous 24h ouvrées.</p>
    
    <div class="info-item">
      <div class="info-circle"><i class="fas fa-map-marker-alt"></i></div>
      <div><strong>Adresse</strong><p>45 Boulevard Lagunaire, Cocody, Abidjan</p></div>
    </div>
    <div class="info-item">
      <div class="info-circle"><i class="fas fa-phone-alt"></i></div>
      <div><strong>Téléphone</strong><p>+225 07 48 48 26 17</p></div>
    </div>
    <div class="info-item">
      <div class="info-circle"><i class="fas fa-envelope"></i></div>
      <div><strong>Email</strong><p>contact@stagafrique.org</p></div>
    </div>
    <h5 style="margin-top: 2.5rem; margin-bottom: 1rem; font-size: 1.1rem; color: #333;">
    FAQ Rapide</h5>

<div class="faq-container" style="font-size: 0.95rem; color: #555; line-height: 1.8;">
    
    <div class="faq-item">
        <div class="faq-question" style="cursor: pointer; display: flex; align-items: center; padding: 10px 0;">
            <span class="arrow-icon" style="margin-right: 10px; transition: transform 0.3s;">▶</span>
            <span class="font-bold">Ai-je besoin d'un visa ?</span>
        </div> <div class="faq-answer">
            <div class="faq-answer-content" style="padding: 10px 25px; color: #777;">
                Non, pour un séjour touristique de moins de 90 jours, les ressortissants français n'ont pas besoin de visa pour la plupart des destinations. Vérifie toujours sur le site officiel...
            </div>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" style="cursor: pointer; display: flex; align-items: center; padding: 10px 0;">
            <span class="arrow-icon" style="margin-right: 10px; transition: transform 0.3s;">▶</span>
            <span class="font-bold">Quels vaccins sont nécessaires ?</span>
        </div>
        
        <div class="faq-answer">
            <div class="faq-answer-content" style="padding: 10px 25px; color: #777;">
                Vaccins universels à jour (DTP, etc.) + hépatite A fortement recommandée. Fièvre jaune obligatoire si tu viens d'un pays à risque.
            </div>
        </div>
    </div>
</div>
</div>
</section>

<?php include 'views/partials/footer.php'; ?>