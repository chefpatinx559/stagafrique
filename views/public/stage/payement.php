<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options de paiement - Stag'AFRIQUE</title>
    <link rel="stylesheet" href="payment-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>

<div class="payment-module">
    <header class="payment-header">
        <h1>Options de paiement</h1>
        <p>Nous proposons plusieurs méthodes de paiement sécurisées et flexibles pour faciliter votre inscription.</p>
    </header>

    <form id="paymentForm" class="payment-card">
        <section class="section">
            <h3>Modes de paiement acceptés</h3>
            <div class="payment-methods">
                <div class="method active"><i class="bi bi-credit-card-2-front"></i><span>Visa</span></div>
                <div class="method"><i class="bi bi-credit-card"></i><span>Mastercard</span></div>
                <div class="method"><i class="bi bi-paypal"></i><span>PayPal</span></div>
                <div class="method"><i class="bi bi-bank"></i><span>Virement</span></div>
            </div>
        </section>

        <section class="section">
            <div class="form-group">
                <label for="clientName">Nom complet</label>
                <input type="text" id="clientName" placeholder="Ex: Jean Dupont" required>
            </div>
            <div class="form-group">
                <label for="clientEmail">Email de contact</label>
                <input type="email" id="clientEmail" placeholder="votre@email.com" required>
            </div>
        </section>

        <section class="section">
            <h3>Options de paiement flexibles</h3>
            <div class="flexible-options">
                <label class="option-row">
                    <input type="radio" name="plan" value="100" checked>
                    <span class="label">Paiement intégral</span>
                    <span class="benefit">-5% de réduction</span>
                </label>
                <label class="option-row">
                    <input type="radio" name="plan" value="33">
                    <span class="label">Paiement en 3 fois</span>
                    <span class="benefit">Sans frais</span>
                </label>
            </div>
        </section>

        <section class="recap-section">
            <h3>Récapitulatif des frais</h3>
            <div class="recap-row"><span>Programme 6 mois</span> <span>2 600 €</span></div>
            <div class="recap-row"><span>Frais d'inscription</span> <span>150 €</span></div>
            <div class="recap-row"><span>Assurance internationale</span> <span>180 €</span></div>
            <hr>
            <div class="recap-row total">
                <span>Total</span>
                <span id="totalAmount">2 430 €</span>
            </div>
        </section>

        <button type="submit" id="payBtn" class="btn-pay">
            <span class="btn-text">Procéder au paiement</span>
            <span class="loader"></span>
        </button>

        <div class="garantie">
           <i class="bi bi-shield-check"></i>
            <p><strong>Garantie satisfait ou remboursé</strong><br>
            Remboursement à 100% jusqu'à 30 jours avant le début du programme.</p>
        </div>
    </form>
</div>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = document.getElementById('payBtn');
        const email = document.getElementById('clientEmail').value;
        const total = document.getElementById('totalAmount').innerText;

        // État de chargement
        btn.classList.add('loading');
        btn.disabled = true;

        /* ===========================================================
           BRANCHEMENT API (Stripe, CinetPay, PayPal, etc.)
           ===========================================================
           Ici, vous appelez votre backend ou le SDK du fournisseur :
           
           Example Stripe:
           stripe.redirectToCheckout({ sessionId: session.id });

           Example CinetPay:
           CinetPay.setSignatureData({ ... });
           CinetPay.getCheckout({ ... });
           ===========================================================
        */

        // Simulation de délai réseau
        setTimeout(() => {
            // Simulation logique : Succès si l'email ne contient pas "error"
            if (!email.includes('error')) {
                window.location.href = `success.html?amount=${total}&email=${email}`;
            } else {
                window.location.href = 'error.html';
            }
        }, 2000);
    });
</script>
</body>
</html>