<?php

class CandidatureModel {
    public $id, $nom, $prenoms, $date_naissance, $nationalite, $sexe;
    public $adresse_complete, $telephone_whatsapp, $email, $contact_urgence;
    public $etablissement_enseignement, $pays_etablissement, $filiere_etudes, $niveau_etudes;
    public $langues_parlees, $domaine_stage_souhaite, $objectifs_stage, $duree_souhaitee;
    public $date_arrivee_souhaitee, $date_depart_souhaitee, $preference_lieu;
    public $type_organisation_souhaitee, $experiences_passees, $numero_passeport, $date_expiration_passeport;
    public $besoin_accompagnement, $besoins_specifiques_medicaux;
    public $statut_demande, $paiement_id, $date_creation;

    // Propriétés pour les fichiers (BLOB)
    public $doc, $type_doc;
    public $autre_doc, $autre_doc_type;
    
    private $con;

    public function __construct() {
        $this->con = Database::getInstance()->getConnection();
    }

    public function AjouterCandidature() {
        $sql = "INSERT INTO candidatures (
            nom, prenoms, date_naissance, nationalite, sexe, adresse_complete, 
            telephone_whatsapp, email, contact_urgence, etablissement_enseignement, 
            pays_etablissement, filiere_etudes, niveau_etudes, langues_parlees, 
            domaine_stage_souhaite, objectifs_stage, duree_souhaitee, date_arrivee_souhaitee, 
            date_depart_souhaitee, preference_lieu, type_organisation_souhaitee, 
            experiences_passees, numero_passeport, date_expiration_passeport, 
            besoin_accompagnement, besoins_specifiques_medicaux, 
            doc, type_doc, autre_doc, autre_doc_type, statut_demande, paiement_id
        ) VALUES (
            :nom, :prenoms, :date_naissance, :nationalite, :sexe, :adresse_complete, 
            :telephone_whatsapp, :email, :contact_urgence, :etablissement_enseignement, 
            :pays_etablissement, :filiere_etudes, :niveau_etudes, :langues_parlees, 
            :domaine_stage_souhaite, :objectifs_stage, :duree_souhaitee, :date_arrivee_souhaitee, 
            :date_depart_souhaitee, :preference_lieu, :type_organisation_souhaitee, 
            :experiences_passees, :numero_passeport, :date_expiration_passeport, 
            :besoin_accompagnement, :besoins_specifiques_medicaux, 
            :doc, :type_doc, :autre_doc, :autre_doc_type, :statut_demande, :paiement_id
        )";

        $req = $this->con->prepare($sql);

        // Liaison des paramètres textes et numériques
        $req->bindParam(":nom", $this->nom); 
        $req->bindParam(":prenoms", $this->prenoms); 
        $req->bindParam(":date_naissance", $this->date_naissance); 
        $req->bindParam(":nationalite", $this->nationalite); 
        $req->bindParam(":sexe", $this->sexe); 
        $req->bindParam(":adresse_complete", $this->adresse_complete); 
        $req->bindParam(":telephone_whatsapp", $this->telephone_whatsapp); 
        $req->bindParam(":email", $this->email); 
        $req->bindParam(":contact_urgence", $this->contact_urgence); 
        $req->bindParam(":etablissement_enseignement", $this->etablissement_enseignement); 
        $req->bindParam(":pays_etablissement", $this->pays_etablissement); 
        $req->bindParam(":filiere_etudes", $this->filiere_etudes); 
        $req->bindParam(":niveau_etudes", $this->niveau_etudes); 
        $req->bindParam(":langues_parlees", $this->langues_parlees); 
        $req->bindParam(":domaine_stage_souhaite", $this->domaine_stage_souhaite); 
        $req->bindParam(":objectifs_stage", $this->objectifs_stage); 
        $req->bindParam(":duree_souhaitee", $this->duree_souhaitee); 
        $req->bindParam(":date_arrivee_souhaitee", $this->date_arrivee_souhaitee); 
        $req->bindParam(":date_depart_souhaitee", $this->date_depart_souhaitee); 
        $req->bindParam(":preference_lieu", $this->preference_lieu); 
        $req->bindParam(":type_organisation_souhaitee", $this->type_organisation_souhaitee); 
        $req->bindParam(":experiences_passees", $this->experiences_passees); 
        $req->bindParam(":numero_passeport", $this->numero_passeport); 
        $req->bindParam(":date_expiration_passeport", $this->date_expiration_passeport); 
        $req->bindParam(":besoin_accompagnement", $this->besoin_accompagnement); 
        $req->bindParam(":besoins_specifiques_medicaux", $this->besoins_specifiques_medicaux); 
        $req->bindParam(":statut_demande", $this->statut_demande);
        $req->bindParam(":paiement_id", $this->paiement_id);

        // --- GESTION DES FICHIERS LONGBLOB ---
        $req->bindParam(":type_doc", $this->type_doc);
        $req->bindParam(":autre_doc_type", $this->autre_doc_type);

        // Pour les colonnes BLOB, on utilise bindParam avec PDO::PARAM_LOB
        // $this->doc et $this->autre_doc doivent contenir le flux du fichier (fopen)
        $req->bindParam(":doc", $this->doc, PDO::PARAM_LOB);
        $req->bindParam(":autre_doc", $this->autre_doc, PDO::PARAM_LOB);

        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors de l'ajout : " . $th->getMessage();
        }
    }

    public function InfosCandidature() {
        $req = $this->con->prepare("SELECT * FROM candidatures WHERE id = :id");
        $req->bindParam(":id", $this->id);
        try {
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return "Erreur lors de la récupération : " . $th->getMessage();
        }
    }

    // Mettre à jour le statut
    public function ModifierStatut() {
        $req = $this->con->prepare("UPDATE candidatures SET statut_demande = :statut WHERE id = :id");
        $req->bindParam(":statut", $this->statut_demande);
        $req->bindParam(":id", $this->id);
        return $req->execute();
    }

    // Liste des candidatures
    /**
 * Récupère les candidatures paginées avec recherche optionnelle
 * 
 * @param string $search    Terme de recherche (vide = tous)
 * @param int    $page      Numéro de page (1-based)
 * @param int    $perPage   Nombre d'éléments par page
 * @return array ['data' => array des lignes, 'total' => int total sans limite]
 */
public function getPaginatedCandidatures(string $search = '', int $page = 1, int $perPage = 12): array
{
    $offset = ($page - 1) * $perPage;

    // 1. Construction de la clause WHERE et des paramètres
    $where = "1 = 1";
    $params = [];

    if ($search !== '') {
        $like = '%' . $search . '%';
        // Utilisation de paramètres nommés pour éviter les conflits avec LIMIT/OFFSET
        $where .= " AND (
            nom LIKE :s1 OR 
            prenoms LIKE :s2 OR 
            email LIKE :s3 OR 
            telephone_whatsapp LIKE :s4 OR 
            filiere_etudes LIKE :s5 OR 
            domaine_stage_souhaite LIKE :s6
        )";
        $params = [
            ':s1' => $like, ':s2' => $like, ':s3' => $like,
            ':s4' => $like, ':s5' => $like, ':s6' => $like
        ];
    }

    // ────────────────────────────────────────────────
    // 2. Compter le total
    // ────────────────────────────────────────────────
    $countSql = "SELECT COUNT(*) FROM candidatures WHERE $where";
    $countStmt = $this->con->prepare($countSql);
    $countStmt->execute($params);
    $total = (int) $countStmt->fetchColumn();

    // ────────────────────────────────────────────────
    // 3. Récupérer les données paginées
    // ────────────────────────────────────────────────
    $dataSql = "
        SELECT 
            *
        FROM candidatures
        WHERE $where
        ORDER BY date_creation DESC
        LIMIT :limit OFFSET :offset
    ";

    $dataStmt = $this->con->prepare($dataSql);

    // Bind des paramètres de recherche
    foreach ($params as $key => $value) {
        $dataStmt->bindValue($key, $value, PDO::PARAM_STR);
    }

    // Bind de la pagination (impératif en PARAM_INT)
    $dataStmt->bindValue(':limit',  $perPage, PDO::PARAM_INT);
    $dataStmt->bindValue(':offset', $offset,  PDO::PARAM_INT);

    try {
        $dataStmt->execute();
        $data = $dataStmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $e) {
        error_log("Erreur getPaginatedCandidatures : " . $e->getMessage());
        $data = [];
    }

    return [
        'data'  => $data,
        'total' => $total
    ];
}
}