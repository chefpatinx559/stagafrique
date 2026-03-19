<?php
// session_start();
require_once './models/Candidatures.php'; 

class candidatures {

    public $message = '';


    // * Gère la soumission du formulaire complet (Fiche d'inscription)

    function enregistrement() {
    if (isset($_POST['btn-soumettre-candidature'])) {
        $candidature = new CandidatureModel();

        // 1. Informations personnelles 
        $candidature->nom = htmlspecialchars($_POST['sai_nom']);
        $candidature->prenoms = htmlspecialchars($_POST['sai_prenoms']);
        $candidature->date_naissance = $_POST['sai_date_naiss'];
        $candidature->nationalite = htmlspecialchars($_POST['sai_nationalite']);
        $candidature->sexe = $_POST['sai_sexe'];
        $candidature->adresse_complete = htmlspecialchars($_POST['sai_adresse']);
        $candidature->telephone_whatsapp = htmlspecialchars($_POST['sai_whatsapp']);
        $candidature->email = htmlspecialchars($_POST['sai_email']);
        $candidature->contact_urgence = htmlspecialchars($_POST['sai_urgence']);

        // 2. Situation académique 
        $candidature->etablissement_enseignement = htmlspecialchars($_POST['sai_etablissement']);
        $candidature->pays_etablissement = htmlspecialchars($_POST['sai_pays']);
        $candidature->filiere_etudes = htmlspecialchars($_POST['sai_filiere']);
        $candidature->niveau_etudes = htmlspecialchars($_POST['sai_niveau']);
        $candidature->langues_parlees = htmlspecialchars($_POST['sai_langue']);

        // 3. Stage souhaité 
        $candidature->domaine_stage_souhaite = htmlspecialchars($_POST['domaine_stage_souhaite']);
        $candidature->objectifs_stage = htmlspecialchars($_POST['objectifs_stage']);
        $candidature->duree_souhaitee = htmlspecialchars($_POST['duree_souhaitee']);
        $candidature->preference_lieu = htmlspecialchars($_POST['preference_lieu']);
        // Gestion de la période (Si ton formulaire envoie des dates séparées, sinon vide par défaut)
        $candidature->date_arrivee_souhaitee = $_POST['date_arrivee_souhaitee'] ?? null; 
        $candidature->date_depart_souhaitee = $_POST['date_depart_souhaitee'] ?? null;
        $candidature->type_organisation_souhaitee = htmlspecialchars($_POST['type_organisation_souhaitee'] ?? '');

        // 4. Expériences et documents
        $candidature->experiences_passees = htmlspecialchars($_POST['experiences_passees']);
        $candidature->numero_passeport = htmlspecialchars($_POST['sai_numero_passeport']);
        $candidature->date_expiration_passeport = !empty($_POST['date_expiration_passeport']) ? $_POST['date_expiration_passeport'] : null;

        // --- GESTION DES FICHIERS (LONGBLOB) ---
        // Fichier 1 : CV (sai_cv)
        if (isset($_FILES['sai_cv']) && $_FILES['sai_cv']['error'] === UPLOAD_ERR_OK) {
            $candidature->doc = fopen($_FILES['sai_cv']['tmp_name'], 'rb');
            $candidature->type_doc = $_FILES['sai_cv']['type'];
        } else {
            $candidature->doc = '';
            $candidature->type_doc = '';
        }

        // Fichier 2 : Autres documents (sai_documents)
        if (isset($_FILES['sai_documents']) && $_FILES['sai_documents']['error'] === UPLOAD_ERR_OK) {
            $candidature->autre_doc = fopen($_FILES['sai_documents']['tmp_name'], 'rb');
            $candidature->autre_doc_type = $_FILES['sai_documents']['type'];
        } else {
            $candidature->autre_doc = '';
            $candidature->autre_doc_type = '';
        }

        // 5. Logistique & Besoins
        // Concaténation des checkboxes (Hébergement, Visa...)
     
        
        $candidature->besoin_accompagnement = htmlspecialchars($_POST['besoin_accompagnement']);
        $candidature->besoins_specifiques_medicaux = htmlspecialchars($_POST['besoins_specifiques_medicaux']);

        // 6. Statut final
        $candidature->statut_demande = 'soumis';

        // Variables de paiement
        $montant=$_POST['sai_programme'];
        $Lastname=$_POST['sai_prenoms'];
        $FirstName=$_POST['sai_nom'];
        $phone=$_POST['sai_whatsapp'];
        // --- EXÉCUTION ---
        $result = $candidature->AjouterCandidature();

        if ($result === true) {
            header("Location: http://localhost/stagafrique/paiements/finaliser?amount=" . $montant . "&firstname=" . $FirstName . "&lastname=" . $Lastname . "&phone=" . $phone);
            exit();
        } else {
            $this->message = "Erreur : " . $result;
        }
    }
    
    // Charger la vue avec le message s'il existe
    $message = $this->message;
    // include 'votre_vue.php';
}

    /**
     * Liste des candidatures pour l'administrateur
     */
    function liste() {
    $candidature = new CandidatureModel();

    // Paramètres GET pour recherche + pagination
    $search   = trim($_GET['search'] ?? '');
    $page     = max(1, (int)($_GET['page'] ?? 1));
    $perPage  = 12; // ← tu peux changer (12 → 3×4 grille xl)

    // Récupère les données paginées + total
    $result = $candidature->getPaginatedCandidatures($search, $page, $perPage);

    // Pour la vue complète (premier chargement)
    $listeC      = $result['data'];
    $total       = $result['total'];
    $totalPages  = max(1, ceil($total / $perPage));
    $currentPage = $page;

    // Si c'est une requête AJAX → on renvoie seulement le HTML de la grille + pagination
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        // On rend seulement la partie dynamique
        ob_start();
        include 'views/partials/_grid.php'; // ← on va créer ce fichier
        $html = ob_get_clean();
        header('Content-Type: application/json');
        echo json_encode([
            'html'       => $html,
            'page'       => $currentPage,
            'totalPages' => $totalPages
        ]);
        exit;
    }

    // Chargement normal de la page
    include 'views/admin/candidatures/listecandidatures.php';
}

    /**
     * Visualisation des détails d'un dossier [cite: 1]
     */
    function details() {
        if (isset($_GET['id'])) {
            $candidature = new CandidatureModel();
            $candidature->id = intval($_GET['id']);
            $infos = $candidature->InfosCandidature();
            
            include 'views/admin/candidatures/details.php';
        }
    }

    /**
     * Mise à jour du statut par l'administrateur
     */
    function modifier_statut() {
        if (isset($_POST['btn-update'])) {
            $candidature = new CandidatureModel();
            $candidature->id = $_POST['sai_id'];
            $candidature->statut_demande = $_POST['sai_statut'];
            
            if ($candidature->ModifierStatut()) {
                header('location:'.$_SERVER['HTTP_REFERER']);
            }
        }
    }
}