<?php

class paiementmodel {
    public $id, $candidature_id, $montant, $devise, $reference_transaction, $statut, $methode_paiement, $date_paiement, $con;

    public function __construct() {
        $this->con = Database::getInstance()->getConnection();
    }

    // Ajouter un nouveau paiement
    public function AjouterPaiement() {
        $req = $this->con->prepare("
            INSERT INTO paiements (candidature_id ,montant, devise, reference_transaction, statut, methode_paiement) 
            VALUES (:candidature_id, :montant, :devise, :reference_transaction, :statut, :methode_paiement)
        ");

        $req->bindParam(":montant", $this->montant);
        $req->bindParam(":candidature_id", $this->candidature_id);
        $req->bindParam(":devise", $this->devise);
        $req->bindParam(":reference_transaction", $this->reference_transaction);
        $req->bindParam(":statut", $this->statut);
        $req->bindParam(":methode_paiement", $this->methode_paiement);

        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors de l'ajout du paiement : " . $th->getMessage();
        }
    }

    // Modifier le statut du paiement via sa référence (utile pour les retours de banque)
    public function ModifierStatut() {
        $req = $this->con->prepare("
            UPDATE paiements 
            SET statut = :statut 
            WHERE reference_transaction = :ref
        ");

        $req->bindParam(":statut", $this->statut);
        $req->bindParam(":ref", $this->reference_transaction);

        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors de la mise à jour : " . $th->getMessage();
        }
    }

    // Lister tous les paiements (pour l'admin)
    public function ListeTousLesPaiements() {
        $req = $this->con->prepare("SELECT * FROM paiements ORDER BY date_paiement DESC");
        try {
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return "Erreur : " . $th->getMessage();
        }
    }

    // Récupérer un paiement par sa référence unique
    public function GetPaiementByRef() {
        $req = $this->con->prepare("SELECT * FROM paiements WHERE reference_transaction = :ref");
        $req->bindParam(":ref", $this->reference_transaction);

        try {
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            return "Erreur : " . $th->getMessage();
        }
    }

    // Supprimer un paiement
    public function SupprimerPaiement() {
        $req = $this->con->prepare("DELETE FROM paiements WHERE id = :id");
        $req->bindParam(":id", $this->id);

        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors de la suppression : " . $th->getMessage();
        }
    }
}