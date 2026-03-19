<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Échec du paiement</title>
    <link rel="stylesheet" href="payment-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body class="status-page">
    <div class="status-card error">
        <div class="icon-circle">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <h1>Paiement échoué</h1>
        <p>Nous n'avons pas pu traiter votre transaction. Cela peut être dû à un solde insuffisant ou une autorisation refusée par votre banque.</p>
        
        <a href="payement.php" class="btn-pay">Réessayer le paiement</a>
        <a href="index.html" class="btn-secondary">Contacter le support</a>
    </div>
</body>
</html>