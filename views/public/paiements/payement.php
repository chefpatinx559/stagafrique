<?php

if (isset($_POST['btn-pay'])) {
        $data = array(
        'merchantId' => API_KEY,
        'amount' => $_GET['amount'],
        'description' => "Api PHP",
        'channel' => $_POST['methode_paiement'],
        'countryCurrencyCode' => "978",
        'referenceNumber' => "REF-".time(),
        'customerEmail' => "test@gmail.com",
        'customerFirstName' => $_GET['firstname'],
        'customerLastname' => $_GET['lastname'],
        'customerPhoneNumber' => $_GET['phone'],
        'notificationURL' => "callback_url",
        'returnURL' => "callback_url",
        'returnContext' => '{"data":"data 1","data2":"data 2"}',
    );

    $data = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.paiementpro.net/webservice/onlinepayment/init/curl-init.php");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

    $response = curl_exec($ch);
   
    curl_close($ch);
    $responseData = json_decode($response, true);

if (isset($responseData['url'])) {
    header('Location: ' . $responseData['url']);
    exit;
} else {
    echo "Erreur de paiement";
}

}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Simplifié - Stag'AFRIQUE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        .method-card input:checked + div {
            border-color: #f97316;
            background-color: #fff7ed;
            ring: 2px;
            ring-color: #f97316;
        }
        .logo {
      color: #ff6b00;  
      font-weight: bold;
      font-size: 1.5rem;
      text-decoration: none;
    }
    </style>
</head>
<body class="bg-slate-50 antialiased text-slate-900">

<div class="max-w-xl mx-auto py-16 px-6">
    <div class="text-center mb-12">
        <h1 class="text-2xl font-extrabold tracking-tight">Règlement sécurisé</h1>
        <p class="text-slate-500 mt-2">Finalisez votre inscription en quelques secondes.</p>
    </div>

    <form id="paymentForm" action="" method="POST" class="space-y-8">
        
        <input type="hidden" name="candidature_id" value="<?php echo $_SESSION['last_candidature_id'] ?? ''; ?>">
        <input type="hidden" name="montant" id="input_montant" value="<?= $_GET['amount'] ?>">

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
            <div class="flex justify-between items-center">
                <span class="text-slate-600 font-medium">Montant total</span>
                <span id="display_total" class="text-3xl font-black text-slate-900 tracking-tighter"><?= $_GET['amount'] ?> €</span>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-400 ml-1">Choisir un mode de paiement</h3>
            
            <div class="grid grid-cols-1 gap-3">
                <label class="method-card relative cursor-pointer">
                    <input type="radio" name="methode_paiement" value="CARD" class="sr-only" checked>
                    <div class="flex items-center justify-between p-5 border-2 border-slate-200 rounded-2xl transition-all hover:border-slate-300 bg-white">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <div>
                                <p class="font-bold">Carte Bancaire</p>
                                <p class="text-xs text-slate-500">Visa, Mastercard...</p>
                            </div>
                        </div>
                        <i class="bi bi-chevron-right text-slate-300"></i>
                    </div>
                </label>

                <label class="method-card relative cursor-pointer">
                    <input type="radio" name="methode_paiement" value="PAYPAL" class="sr-only">
                    <div class="flex items-center justify-between p-5 border-2 border-slate-200 rounded-2xl transition-all hover:border-slate-300 bg-white">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center text-xl">
                                <i class="bi bi-paypal"></i>
                            </div>
                            <div>
                                <p class="font-bold">PayPal</p>
                                <p class="text-xs text-slate-500">Paiement rapide et sécurisé</p>
                            </div>
                        </div>
                        <i class="bi bi-chevron-right text-slate-300"></i>
                    </div>
                </label>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" name="btn-pay" class="w-full bg-slate-900 hover:bg-black text-white font-bold py-5 rounded-2xl shadow-lg transition-transform active:scale-[0.98]">
                Payer maintenant
            </button>
            <p class="flex items-center justify-center gap-2 text-xs text-slate-400 mt-6">
                <i class="bi bi-lock-fill"></i>
                Paiement crypté SSL 256-bits
            </p>
        </div>
    </form>

    <footer class="mt-12 text-center">
        <div class="logo" >Stag'AFRIQUE</div>
    </footer>
</div>

</body>
</html>