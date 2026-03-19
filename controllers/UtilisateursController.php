<?php 
session_start();
require_once './models/utilisateurs.php'; 

class utilisateurs {

    public $message='';
    function enregistrement(){
        if (isset($_POST['btn-ajouter'])) {
            $utilisateur = new utilisateurmodel();
            $utilisateur->email=htmlspecialchars($_POST['sai_email']);
            $utilisateur->mdp=htmlspecialchars($_POST['sai_mdp']);
            $utilisateur->role='stagiaire';

            $result=$utilisateur->AjouterUtilisateurs();
            if ($result==true) {
                echo 'bon';
            } else {
                echo 'dorhi';
            }
        }

        if (isset($_POST['btn-edit'])) {
                   $utilisateur = new utilisateurmodel();
                   
           // 1. Récupération des infos actuelles de l'utilisateur
           $utilisateur->id = $_SESSION['id'];
           $u = $utilisateur->GetUtilisateurs(); // On suppose que ça retourne les infos de l'ID chargé
    
           $old_password_input = $_POST['old_password'];
           $hashed_password_db = $u[0]['mdp'];

    // 2. Vérification de l'ancien mot de passe (Sécurité)
    if ($_POST['old_password']==$u[0]['mdp']) {
        
        // Préparation de l'email
        $utilisateur->email = htmlspecialchars($_POST['sai_email']);
        
        // 3. Gestion du nouveau mot de passe
        if (!empty($_POST['sai_mdp'])) {
            // L'utilisateur veut changer de mot de passe
            $utilisateur->mdp = $_POST['sai_mdp'];
        } else {
            // L'utilisateur garde son mot de passe actuel
            $utilisateur->mdp = $hashed_password_db;
        }

        // 4. Exécution de la modification
        if ($utilisateur->ModifierUtilisateurs()) {
            $_SESSION['email'] = $utilisateur->email; // Update de la session
            $message = "Profil mis à jour avec succès !";
            // Redirection pour éviter le renvoi du formulaire au rafraîchissement
            header("Location: dashboard?success=1");
            exit();
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
        
    } else {
        // L'ancien mot de passe est incorrect
        $message = "L'ancien mot de passe est incorrect.";
    }
}

        if (isset($_POST['btn-supprimer'])) {
            $utilisateur = new utilisateurmodel();
            $utilisateur->id=htmlspecialchars($_POST['sai_id']);

            $result=$utilisateur->AjouterUtilisateurs();
            if ($result==true) {
                echo 'bon';
            } else {
                echo 'dorhi';
            }
        }
        //Liste des utilisateurs
        $utilisateurs = new utilisateurmodel();
        $listeU=$utilisateurs->ListeUtilisateurs();

        
        
    }

    function connexion(){

    if (isset($_POST['btn-connexion'])) {
        $utilisateur = new utilisateurmodel();
        $utilisateur->email=htmlspecialchars($_POST['sai_email']);
        $utilisateur->mdp=htmlspecialchars($_POST['sai_mdp']);
        // Vérification du mot de passe
        $result = $utilisateur->GetUtilisateursEmailP(); 
        if(!empty($result) && $result[0]['role']=="admin"){
            $_SESSION['email']=$result[0]['email'];
            $_SESSION['mdp']=$result[0]['mdp'];
            $_SESSION['role']=$result[0]['role'];
            $_SESSION['id']=$result[0]['id'];

            header('location:http://localhost/stagafrique/utilisateurs/dashboard?succes=1');
        } else {
            $this->message="Email ou Mot de passe incorrecte.";
        }
    }
    $message = $this->message;
    include 'views/admin/utilisateurs/connexion.php';

    }

    function inscription(){

    if (isset($_POST['btn-inscription'])) {
        $utilisateur = new utilisateurmodel();
        $utilisateur->email = htmlspecialchars($_POST['sai_email']);
        
        $res = $utilisateur->GetUtilisateursEmail();

        if (!empty($res)) {
            $this->message = 'Cet email existe déjà !';
        } else {
            $mdp1 = $_POST['sai_mdp1'];
            $mdp2 = $_POST['sai_mdp2'];

            if ($mdp1 == $mdp2) {
                $utilisateur->mdp = $_POST['sai_mdp1'];
                $utilisateur->role = 'admin';

                $result = $utilisateur->AjouterUtilisateurs();

                if ($result == true) {
                    header("location:http://localhost/stagafrique/utilisateurs/dashboard?succes=1");
                    exit(); 
                } else {
                    $this->message = "Erreur lors de l'inscription.";
                }
            } else {
                $this->message = 'Les mots de passes sont incompatibles !';
            }
        }
    }

    $message = $this->message;
    include 'views/admin/utilisateurs/inscription.php';
}

    function dashboard(){
    $utilisateur=new utilisateurmodel();
    $countNC=$utilisateur->getCandCount();
    $countAC=$utilisateur->getCandCountConf();
    $countNat=$utilisateur->getCandCountNat();
    $montantT=$utilisateur->getMontTotal();
    $montantT[0]['Mont']*=560.60;

    $cand24h=$utilisateur->candJ();
    include 'views/admin/utilisateurs/tableau-de-bord.php';
    }


    
}