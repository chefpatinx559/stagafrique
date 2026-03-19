<?php
require_once './models/api.php';

class api{
    function apiC(){
    $apiC = new apimodel();
    $result=$apiC->GetCandidature();
    echo $result;
    }

    function imprimer(){

    include 'views/admin/paiements/facture_paie.php';
    }

    function impression(){


    include 'views/partials/fiche_inscription.php';
    }

    function download(){

    include 'views/partials/fichier.php';
    }
}