<?php
class utilisateurmodel{
    public $id, $email, $mdp, $role, $con;

    public function __construct(){
        $this->con = Database::getInstance()->getConnection();
    }

    public function AjouterUtilisateurs(){
        $req=$this->con->prepare("INSERT INTO utilisateurs(id, email, mdp, role) VALUES(null,:email,:mdp,:role)");
        $req->bindParam(":email",$this->email);
        $req->bindParam(":mdp",$this->mdp );
        $req->bindParam(":role",$this->role);
        try {
            return $req->execute();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }
    }

    public function ModifierUtilisateurs(){
        $req=$this->con->prepare("UPDATE utilisateurs SET email=:email,mdp=:mdp WHERE id=:id");
        $req->bindParam(":email",$this->email);
        $req->bindParam(":mdp",$this->mdp);
        $req->bindParam(":id",$this->id);
        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors de la modification de l'utilisateur ". $th->getMessage();
        }
    }

    public function SupprimerUtilisateurs(){
        $req=$this->con->prepare("DELETE FROM utilisateurs WHERE id=:id");
        $req->bindParam(":id",$this->id);
        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors de la suppression de l'utilisateur ". $th->getMessage();
        }
    }

    public function ListeUtilisateurs(){
        $req=$this->con->prepare("SELECT * FROM utilisateurs");
        try {
            return $req->execute();
        } catch (\Throwable $th) {
            return "Erreur lors du listage de l'utilisateur ". $th->getMessage();
        }
    }

    public function GetUtilisateurs(){
    $req = $this->con->prepare("SELECT * FROM utilisateurs WHERE id=:id");
    $req->bindParam(":id", $this->id);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);

    
    }

    public function GetUtilisateursEmail(){
    $req = $this->con->prepare("SELECT * FROM utilisateurs WHERE email=:email");
    $req->bindParam(":email", $this->email);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetUtilisateursEmailP(){
    $req = $this->con->prepare("SELECT * FROM utilisateurs WHERE email=:email AND mdp=:mdp");
    $req->bindParam(":email", $this->email);
    $req->bindParam(":mdp", $this->mdp);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nombre de demandes (Candidatures) soumises
    public function getCandCount(){
        $req=$this->con->prepare("SELECT count(id) as Tcandit from candidatures WHERE statut_demande = 'soumis' ");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nombre de demandes (Candidatures) acceptées
    public function getCandCountConf(){
        $req=$this->con->prepare("SELECT count(id) as Tcandit from candidatures WHERE statut_demande = 'approuve' ");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nombre de nationnalitées
    public function getCandCountNat(){
        $req=$this->con->prepare("SELECT COUNT(DISTINCT nationalite) AS Tcandit FROM candidatures;");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Montant totale reçu
    public function getMontTotal(){
        $req=$this->con->prepare(" SELECT SUM(montant) as Mont FROM paiements WHERE statut = 'reussi' ");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Candidatures -24h
    public function candJ(){
        $req=$this->con->prepare("SELECT *
FROM candidatures
WHERE date_creation >= NOW() - INTERVAL 1 DAY
ORDER BY date_creation DESC");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}