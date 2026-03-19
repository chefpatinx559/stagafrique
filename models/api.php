<?php
class apimodel{
    public $con;

    function __construct()
    {
        $this->con = Database::getInstance()->getConnection();
    }

    function GetCandidature(){
        $req=$this->con->prepare("SELECT id, nom, prenoms, email, telephone_whatsapp, 
                       etablissement_enseignement, filiere_etudes, 
                       domaine_stage_souhaite, date_arrivee_souhaitee, statut_demande 
                FROM candidatures 
                ORDER BY date_creation DESC");
        $req->execute();
        $result=$req->fetchAll(PDO::FETCH_ASSOC);

        $res= json_encode($result);
        echo $res;
    }
}