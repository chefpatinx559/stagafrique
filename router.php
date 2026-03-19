<?php
require_once 'config/app.php';
require_once 'config/database.php';
require_once 'libraries/Database.php';


require 'controllers/UtilisateursController.php';
require 'controllers/CandidaturesController.php';
require 'controllers/PaiementsController.php';
require 'controllers/ErreurController.php';
require 'controllers/ApiController.php';
require 'controllers/PublicController.php';

if (isset($_GET['c']) and isset($_GET['a'])) {
	$controller = $_GET['c'];	$action = $_GET['a'];
	if (!empty($_GET['deconnexion'])) {
		session_destroy();
		header('location:' . BASE_URL . 'utilisateurs/connexion');
	}
	if (class_exists($controller) and method_exists($controller, $action)) {
		$ekra = new $controller();
		$ekra->$action();	}
	else {
		header("location:" . BASE_URL . "erreur/erreur404");	}

}
else {
	header("location:" . BASE_URL . "erreur/erreur500");
}


?>