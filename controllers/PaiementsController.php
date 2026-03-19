<?php
// session_start();
require_once './models/paiements.php'; 

class paiements {

    public $message = '';

    /**
     * Enregistre une tentative de paiement (Visa/Mastercard)
     */
    function finaliser() {
        if (isset($_POST['btn-payer'])) {
            $paiement = new PaiementModel();
            
            // Récupération des données du formulaire
            $paiement->montant = htmlspecialchars($_POST['sai_montant']);
            $paiement->devise = htmlspecialchars($_POST['sai_devise'] ?? 'USD');
            $paiement->methode_paiement = htmlspecialchars($_POST['sai_methode']); // Visa ou Mastercard
            
            // Génération d'une référence unique pour la transaction
            $paiement->reference_transaction = "REF-" . strtoupper(uniqid());
            $paiement->statut = 'en_attente';

            $result = $paiement->AjouterPaiement();

            if ($result === true) {
                // Redirection vers la vue de confirmation ou la passerelle
                header('location:http://localhost/stagafrique/paiements/attente?ref=' . $paiement->reference_transaction);
                exit();
            } else {
                $this->message = "Erreur lors de l'enregistrement du paiement.";
            }
        }
        
        include 'views/public/paiements/payement.php';
    }

    /**
     * Met à jour le statut après confirmation de la banque/passerelle
     */
    function mise_a_jour_statut() {
        if (isset($_POST['btn-update-statut'])) {
            $paiement = new PaiementModel();
            $paiement->reference_transaction = htmlspecialchars($_POST['sai_ref']);
            $paiement->statut = $_POST['sai_statut']; // 'reussi' ou 'echoue'

            $result = $paiement->ModifierStatut();

            if ($result === true) {
                // Retour à la page précédente avec le nouveau statut
                header('location:'.$_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $this->message = "Impossible de mettre à jour le statut.";
            }
        }
    }

    /**
     * Liste tous les paiements pour l'administration
     */
    function historique() {
        $paiement = new PaiementModel();
        $listeP = $paiement->ListeTousLesPaiements();
        
        include 'views/admin/paiements/historiques.php';
    }

    /**
     * Affiche les détails d'un paiement spécifique via sa référence
     */
    function details() {
        if (isset($_GET['ref'])) {
            $paiement = new PaiementModel();
            $paiement->reference_transaction = htmlspecialchars($_GET['ref']);
            $infos = $paiement->GetPaiementByRef();
            
            include 'views/public/paiements/details.php';
        }
    }
}