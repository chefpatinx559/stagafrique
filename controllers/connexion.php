<?php
require_once dirname(__DIR__) . '/config/database.php';

$dsn = "mysql:host=" . DB_HOST_API . ";dbname=" . DB_NAME_API . ";charset=utf8";
$con = new PDO($dsn, DB_USER_API, DB_PASS_API);
if($_SERVER['REQUEST_METHOD']=='POST')
    
    {

    $req= $con->prepare('SELECT users_id,matricule,nom_prenom,login,mdp,telephone,email,role,date_saisie,TO_BASE64(photo) AS photo64,type,etat FROM users WHERE login=:login AND mdp=:mdp');
    $req->bindParam(":login",$_POST["sai_login"]);
    $req->bindParam(":mdp",$_POST["sai_mdp"]);
    $req->execute();
    $res= $req->fetchAll();
    if(!empty($res)){
        $out = $res;
    }else
    {
        $out = '';
    }
    print_r(json_encode($out));

}

?>