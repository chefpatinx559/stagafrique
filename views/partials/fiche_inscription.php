<?php
require('./libraries/fpdf/fpdf.php'); 

class PDF extends FPDF {
    // Fonction utilitaire pour remplacer utf8_decode
    // Elle convertit le texte de l'UTF-8 vers l'ISO-8859-1 (format attendu par FPDF)
    protected function toISO($text) {
        return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $text ?? '');
    }

    function Header() {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, $this->toISO('FICHE D’INSCRIPTION – STAGES EN CÔTE D’IVOIRE'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Stag\'AFRIQUE - Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function SectionTitle($title) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(230, 230, 230);
        $this->Cell(0, 8, $this->toISO($title), 0, 1, 'L', true);
        $this->Ln(2);
    }

    function InfoLine($label, $value) {
        $this->SetFont('Arial', 'B', 10);
        $this->Write(7, $this->toISO($label . " : "));
        $this->SetFont('Arial', '', 10);
        $this->Write(7, $this->toISO($value));
        $this->Ln(8);
    }

    // Version publique pour l'utiliser hors de la classe si besoin
    public function encode($text) {
        return $this->toISO($text);
    }
}

// Nettoyage du tampon de sortie pour éviter l'erreur "Output already started"
if (ob_get_length()) ob_end_clean();

// 1. Récupération des données
$id = $_GET['id'] ?? 0;

require_once dirname(dirname(__DIR__)) . '/config/database.php';

// Votre connexion BDD ici...
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
$bdd = new PDO($dsn, DB_USER, DB_PASS);
$query = $bdd->prepare("SELECT * FROM candidatures WHERE id = ?");
$query->execute([$id]);
$c = $query->fetch();

if (!$c) { die("Candidature introuvable."); }

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// --- Utilisation des fonctions corrigées ---
$pdf->SectionTitle('1. Informations personnelles');
$pdf->InfoLine('Nom', $c['nom']);
$pdf->InfoLine('Prénom(s)', $c['prenoms']);
$pdf->InfoLine('Date de naissance', $c['date_naissance']);
$pdf->InfoLine('Nationalité', $c['nationalite']);
$pdf->InfoLine('Sexe', $c['sexe']);
$pdf->InfoLine('Adresse complète', $c['adresse_complete']);
$pdf->InfoLine('Téléphone (WhatsApp)', $c['telephone_whatsapp']);
$pdf->InfoLine('Adresse e-mail', $c['email']);
$pdf->InfoLine('Contact d’urgence', $c['contact_urgence']);
$pdf->Ln(5);

$pdf->SectionTitle('2. Situation académique');
$pdf->InfoLine('Établissement', $c['etablissement_enseignement']);
$pdf->InfoLine('Pays de l’établissement', $c['pays_etablissement']);
$pdf->InfoLine('Filière / Domaine', $c['filiere_etudes']);
$pdf->InfoLine('Niveau d’études', $c['niveau_etudes']);
$pdf->InfoLine('Langues parlées', $c['langues_parlees']);
$pdf->Ln(5);

$pdf->SectionTitle('3. Stage souhaité');
$pdf->InfoLine('Domaine souhaité', $c['domaine_stage_souhaite']);
$pdf->InfoLine('Objectifs', $c['objectifs_stage']);
$pdf->InfoLine('Durée', $c['duree_souhaitee']);
$pdf->InfoLine('Période', "Du " . $c['date_arrivee_souhaitee'] . " au " . $c['date_depart_souhaitee']);
$pdf->InfoLine('Lieu préféré', $c['preference_lieu']);
$pdf->InfoLine('Type d\'organisation', $c['type_organisation_souhaitee']);
$pdf->Ln(5);

$pdf->SectionTitle('4. Expériences et documents requis');
$pdf->InfoLine('Expériences passées', $c['experiences_passees']);
$pdf->InfoLine('Numéro de passeport', $c['numero_passeport']);
$pdf->InfoLine('Date d’expiration', $c['date_expiration_passeport']);
$pdf->Ln(5);

$pdf->SectionTitle('5. Logistique et besoins spécifiques');
$pdf->InfoLine('Accompagnement', $c['besoin_accompagnement']);
$pdf->InfoLine('Besoins médicaux', $c['besoins_specifiques_medicaux']);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'I', 9);
$pdf->MultiCell(0, 5, $pdf->encode("Je certifie l’exactitude des informations fournies et j’autorise leur utilisation dans le cadre du processus de placement en stage."));
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, $pdf->encode("Fait à ____________________, le " . date('d/m/Y')), 0, 1, 'R');
$pdf->Ln(5);
$pdf->Cell(0, 10, 'Signature :', 0, 1, 'R');

$pdf->Output('I', 'Fiche_Inscription_' . $c['nom'] . '.pdf');