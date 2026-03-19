<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement réussi</title>
    <link rel="stylesheet" href="payment-style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body class="status-page">
    <div class="status-card success">
        <div class="icon-circle">
            <i class="fa-solid fa-check"></i>
        </div>
        <h1>Paiement réussi !</h1>
        <p>Votre inscription a été validée avec succès. Un email de confirmation vous a été envoyé.</p>
        
        <div class="summary-box">
            <div class="recap-row"><span>Montant payé :</span> <strong id="resAmount">---</strong></div>
            <div class="recap-row"><span>Email :</span> <strong id="resEmail">---</strong></div>
        </div>

        <a href="index1.html" class="btn-pay">Retour à l'accueil</a>
    </div>

    <script>
        const params = new URLSearchParams(window.location.search);
        document.getElementById('resAmount').innerText = params.get('amount') || '---';
        document.getElementById('resEmail').innerText = params.get('email') || '---';
    </script>
</body>
</html>