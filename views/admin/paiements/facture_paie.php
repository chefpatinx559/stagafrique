<?php
// On démarre le tampon de sortie pour éviter que les avertissements PHP ne bloquent le PDF
ob_start();

require('./libraries/fpdf/fpdf.php');

// 1. Configuration et Sécurité
$id_paiement = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_paiement <= 0) {
    ob_end_clean();
    die("ID de paiement invalide.");
}

// Fonction utilitaire pour l'encodage (Remplace utf8_decode qui est déprécié)
function cleanStr($str) {
    if (empty($str)) return '';
    return mb_convert_encoding($str, 'ISO-8859-1', 'UTF-8');
}

// 2. Connexion PDO
try {
    require_once dirname(dirname(dirname(__DIR__))) . '/config/database.php';
    
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("
        SELECT p.*, c.nom, c.prenoms, c.email, c.telephone_whatsapp 
        FROM paiements p 
        LEFT JOIN candidatures c ON p.candidature_id = c.id 
        WHERE p.id = ?
    ");
    $stmt->execute([$id_paiement]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        ob_end_clean();
        die("Paiement non trouvé.");
    }
} catch (Exception $e) {
    ob_end_clean();
    die("Erreur base de données : " . $e->getMessage());
}

// 3. Classe PDF personnalisée
class InvoicePDF extends FPDF {
    function Header() {
        // Logo / Titre (Couleur Indigo du design STARCODEKH)
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(255, 127, 0); 
        $this->Cell(100, 10, 'STAG\'Afrique', 0, 0, 'L');
        
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(90, 10, 'FACTURE', 0, 1, 'R');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128, 128, 128);
        $this->Cell(0, 10, 'StagAfrique - Facture genere automatique - Page '.$this->PageNo(), 0, 0, 'C');
    }

}

// 4. Construction du document
$pdf = new InvoicePDF();
$pdf->AddPage();

// --- Infos Entreprise & Facture ---
$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(50, 50, 50);
$pdf->Cell(100, 5, 'StagAfrique Services Inc.', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(65, 5, 'Facture #:', 0, 0, 'R');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(25, 5, $data['id'], 0, 1, 'R');

$pdf->Cell(100, 5, 'Abidjan, Cote d\'Ivoire', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(65, 5, cleanStr('Payé le: '), 0, 0, 'R');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(25, 5, date('F d, Y', strtotime($data['date_paiement'])), 0, 1, 'R');

$pdf->Cell(100, 5, 'Plateau, Avenue Marchand', 0, 0, 'L');

$pdf->Ln(15);

// --- Section Client et Paiement ---
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(80, 80, 80);
$pdf->Cell(100, 8, cleanStr('Facturé à: '), 0, 0, 'L');
$pdf->Cell(90, 8, cleanStr('Méthode de paiement: '), 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(0);
$nom_complet = ($data['nom']) ? strtoupper($data['nom']) . ' ' . $data['prenoms'] : 'Client Externe';
$pdf->Cell(100, 5, cleanStr($nom_complet), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 5, cleanStr($data['methode_paiement']), 0, 1, 'R');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(100, 5, $data['email'] ?? 'contact@client.com', 0, 0, 'L');
$pdf->Cell(90, 5, 'Ref: ' . ($data['reference_transaction'] ?? 'MANUAL'), 0, 1, 'R');

$pdf->Ln(15);
// --- En-tête du Tableau ---
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 127, 0);
$pdf->Cell(15, 10, '#', 0, 0, 'L');
$pdf->Cell(145, 10, 'DESCRIPTION', 0, 0, 'L');
$pdf->Cell(30, 10, 'TOTAL', 0, 1, 'R');

// Ligne de séparation
$pdf->SetDrawColor(230, 230, 230);
$pdf->Cell(190, 0, '', 'T', 1);
$pdf->Ln(4);

// --- Ligne d'article ---
$pdf->SetTextColor(0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 6, '1', 0, 0, 'L');
$pdf->Cell(145, 6, cleanStr('Frais de dossier et traitement de candidature'), 0, 0, 'L');
$pdf->Cell(30, 6, number_format($data['montant'], 0, '.', ' ') . ' ' . $data['devise'], 0, 1, 'R');

$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(15, 5, '', 0, 0);
$desc_detail = "Candidature #" . $data['candidature_id'] . " - Statut du paiement: " . strtoupper($data['statut']);
$pdf->MultiCell(145, 5, cleanStr($desc_detail), 0, 'L');

$pdf->Ln(20);

// --- Bloc Totaux (Inspiré de l'image) ---
$pdf->SetX(130);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(80, 80, 80);
$pdf->Cell(40, 7, cleanStr('Résumé: '), 0, 0, 'R');
$pdf->SetTextColor(0);
$pdf->Cell(30, 7, number_format($data['montant'], 0, '.', ' ') . ' ' . $data['devise'], 0, 1, 'R');

$pdf->SetX(130);
$pdf->SetTextColor(80, 80, 80);
$pdf->Cell(40, 7, 'Taxe (0%):', 0, 0, 'R');
$pdf->SetTextColor(0);
$pdf->Cell(30, 7, '0 ' . $data['devise'], 0, 1, 'R');

$pdf->Ln(2);
$pdf->SetX(130);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 127, 0);
$pdf->Cell(40, 10, 'Total:', 0, 0, 'R');
$pdf->Cell(30, 10, number_format($data['montant'], 0, '.', ' ') . ' ' . $data['devise'], 0, 1, 'R');

// 5. Sortie du PDF
// On vide le tampon avant d'envoyer les headers du PDF
ob_end_clean();
$pdf->Output('I', 'Facture_' . $data['reference_transaction'] . '.pdf');