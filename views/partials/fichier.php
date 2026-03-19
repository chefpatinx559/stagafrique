<?php
require_once dirname(dirname(__DIR__)) . '/config/database.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
$bdd = new PDO($dsn, DB_USER, DB_PASS);
$id = $_GET['id'] ?? 0;
$type = $_GET['type'] ?? 'principal'; // 'principal' ou 'autre'

$query = $bdd->prepare("SELECT doc, type_doc, autre_doc, autre_doc_type, nom FROM candidatures WHERE id = ?");
$query->execute([$id]);
$c = $query->fetch();

if ($type === 'principal') {
    header("Content-Type: " . $c['type_doc']);
    header("Content-Disposition: attachment; filename=CV_" . $c['nom'] . ".pdf");
    echo $c['doc'];
} else {
    header("Content-Type: " . $c['autre_doc_type']);
    header("Content-Disposition: attachment; filename=Document_" . $c['nom'] . ".pdf");
    echo $c['autre_doc'];
}