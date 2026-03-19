<?php
$page = 'tableau';
$etat = 'flex size-11 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags  -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Tableau de bord</title>
  <link rel="icon" type="image/png" href="../assets/images/favicon.png">

  <!-- CSS Assets -->
  <link rel="stylesheet" href="../assets/css/app.css">

  <!-- Javascript Assets -->
  <script src="../assets/js/app.js" defer=""></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link
    href="css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  
  <script>
    /**
     * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
     */
    localStorage.getItem("_x_darkMode_on") === "true" &&
      document.documentElement.classList.add("dark");
  </script>
</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block size-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
    <!-- Sidebar -->
 <?php require_once './config/dashboard.php' ?>

    <!-- Main Content Wrapper -->
<main class="main-content w-full px-[var(--margin-x)] pb-8">
  <div class="flex items-center justify-between py-5 lg:py-6">
    <div class="flex items-center space-x-1">
      <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
        Vue d'ensemble des Stages
      </h2>
    </div>
    <!-- <div class="flex items-center space-x-2">
      <p class="hidden text-sm text-slate-400 dark:text-navy-300 sm:block">Filtre rapide:</p>
      <select class="form-select rounded-full border-slate-300 bg-white px-3 py-1 text-xs hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700">
        <option>Aujourd'hui</option>
        <option>7 derniers jours</option>
        <option selected>Ce mois-ci</option>
      </select>
    </div> -->
  </div>

  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-4 lg:gap-6">
    
    <div class="card flex-row justify-between p-4">
      <div>
        <p class="text-xs+ font-semibold uppercase text-slate-400 dark:text-navy-300">Nouvelles Demandes</p>
        <div class="mt-1 flex items-center space-x-2">
          <span class="text-2xl font-semibold text-slate-700 dark:text-navy-100"><?= $countNC[0]['Tcandit'] ?></span>
          <!-- <span class="text-xs text-success">+12%</span> -->
        </div>
      </div>
      <div class="flex size-12 items-center justify-center rounded-xl bg-primary/10 text-primary dark:bg-accent-light/10 dark:text-accent-light">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
      </div>
    </div>

    <div class="card flex-row justify-between p-4">
      <div>
        <p class="text-xs+ font-semibold uppercase text-slate-400 dark:text-navy-300">Stages Confirmés</p>
        <div class="mt-1 flex items-center space-x-2">
          <span class="text-2xl font-semibold text-slate-700 dark:text-navy-100"><?= $countAC[0]['Tcandit'] ?></span>
        </div>
      </div>
      <div class="flex size-12 items-center justify-center rounded-xl bg-success/10 text-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>

    <div class="card flex-row justify-between p-4">
      <div>
        <p class="text-xs+ font-semibold uppercase text-slate-400 dark:text-navy-300">Pays d'origine</p>
        <div class="mt-1 flex items-center space-x-2">
          <span class="text-2xl font-semibold text-slate-700 dark:text-navy-100"><?= $countNat[0]['Tcandit'] ?></span>
        </div>
      </div>
      <div class="flex size-12 items-center justify-center rounded-xl bg-info/10 text-info">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" />
        </svg>
      </div>
    </div>

    <div class="card flex-row justify-between p-4">
      <div>
        <p class="text-xs+ font-semibold uppercase text-slate-400 dark:text-navy-300">Paiements Reçus</p>
        <div class="mt-1 flex items-center space-x-2">
          <span class="text-2xl font-semibold text-slate-700 dark:text-navy-100"><?= $montantT[0]['Mont'] ?></span>
          <span class="text-xs text-slate-400">FCFA</span>
        </div>
      </div>
      <div class="flex size-12 items-center justify-center rounded-xl bg-warning/10 text-warning">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
  </div>
<div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
  
  <div class="card col-span-12 p-4 sm:p-5 lg:col-span-12">
    <div class="flex items-center justify-between">
      <h2 class="text-base font-medium tracking-wide text-slate-700 dark:text-navy-100">
        Évolution des Candidatures
      </h2>
      <div x-data="{showMenu:false}" class="relative">
        <button @click="showMenu = !showMenu" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
          </svg>
        </button>
      </div>
    </div>
    <div class="mt-3 h-72">
        <div id="chart-evolution"></div>
    </div>
  </div>
<br>
</div>
  <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
    
    <div class="card col-span-12 pb-4 sm:col-span-12 lg:col-span-12">
      <div class="flex items-center justify-between px-4 py-4 sm:px-5">
        <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
          Dernières Candidatures
        </h2>
        <a href="http://localhost/stagafrique/candidatures/liste" class="text-xs+ font-medium text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent">Voir tout</a>
      </div>
      
      <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
        <table class="w-full text-left">
          <thead>
            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
              <th class="whitespace-nowrap px-4 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">Étudiant</th>
              <th class="whitespace-nowrap px-4 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">Nationalité</th>
              <th class="whitespace-nowrap px-4 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">Statut</th>
              <th class="whitespace-nowrap px-4 py-3 font-semibold uppercase text-slate-800 dark:text-navy-100 lg:px-5">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($cand24h)) {
              foreach ($cand24h as $key => $value) {
                
           ?>
            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
              <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                <div class="flex items-center space-x-3">
                  
                    <div class="is-initial rounded-full bg-soft-primary text-primary uppercase"><?= $value['nom'] ?? '-' ?></div>
                  
                  <span class="font-medium"><?= $value['prenoms'] ?? '-' ?></span>
                </div>
              </td>
              <td class="whitespace-nowrap px-4 py-3 sm:px-5"><?= $value['nationalite'] ?? '-' ?></td>
              <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                <?php
                $statut = $value['statut_demande'] ?? 'soumis';
                
                $badgeClasses = match($statut) {
                    'soumis'    => 'bg-warning/10 text-warning',
                    'en_etude'  => 'bg-info/10 text-info',
                    'approuve'  => 'bg-success/10 text-success',
                    'rejete'    => 'bg-error/10 text-error',
                    default     => 'bg-gray-100 text-gray-600',
                };

                $libelle = match($statut) {
                    'soumis'    => 'Soumis',
                    'en_etude'  => 'En étude',
                    'approuve'  => 'Approuvée',
                    'rejete'    => 'Rejete',
                    default     => ucfirst($statut),
                };
                ?> 

                <div class="badge rounded-full <?= $badgeClasses ?>">
                    <?= $libelle ?>
                </div>
            </td>
              <td class="whitespace-nowrap px-4 py-3 sm:px-5"><?= $value['date_creation'] ?></td>
            </tr>
<?php   }
            }else {
              ?>
              <tr>
            <td colspan="4" class="text-center py-10 text-slate-400">
                Aucune demande récente (24h)
            </td>
        </tr>
           <?php } ?>
          </tbody>
        </table>
      </div>
    </div>


    <div x-data="{ 
    showNotify: <?= isset($_GET['succes']) ? 'true' : 'false' ?>
}"
x-init="if(showNotify) { 
    $notification({
        text: 'Bienvenue sur votre interface <?= $_SESSION['role'] ?>.',
        variant: 'success'
    }) 
}">
    </div>
        <div x-data="{ 
    showNotify: <?= isset($_GET['success']) ? 'true' : 'false' ?>
}"
x-init="if(showNotify) { 
    $notification({
        text: 'Profil modifié avec succes.',
        variant: 'success'
    }) 
}">
    </div>

  </div>
</main>
  </div>
  <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
  <div id="x-teleport-target"></div>
  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
  </script>
  <?php
// Connexion PDO
$pdo = new PDO('mysql:host=localhost;dbname=stagafrique;charset=utf8mb4', 'root', '');

// Initialiser un tableau avec 12 zéros (un pour chaque mois)
$stats_mensuelles = array_fill(1, 12, 0);

// Requête pour compter les candidatures par mois pour l'année en cours
$sql_stats = "SELECT MONTH(date_creation) as mois, COUNT(*) as total 
              FROM candidatures 
              WHERE YEAR(date_creation) = 2026 
              GROUP BY MONTH(date_creation)";

$res_stats = $pdo->query($sql_stats);

while ($row = $res_stats->fetch(PDO::FETCH_ASSOC)) {
    $stats_mensuelles[(int)$row['mois']] = (int)$row['total'];
}

// Convertir en format JSON pour ApexCharts (on ne garde que les valeurs)
$data_graphique = json_encode(array_values($stats_mensuelles));
?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const options = {
      series: [{
        name: 'Candidatures',
        data: <?php echo $data_graphique; ?> // [5, 0, 0, 0, ...]
      }],
      chart: {
        type: 'area',
        height: 350,
        toolbar: { show: false },
        fontFamily: 'Inter, sans-serif',
        sparkline: { enabled: false }, // Assure-toi que c'est false
      },
      dataLabels: { enabled: false },
      stroke: { 
        curve: 'smooth', 
        width: 3,
        lineCap: 'round'
      },
      colors: ['#4f46e5'], 
      xaxis: {
        categories: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
        axisBorder: { show: false },
        axisTicks: { show: false },
        tooltip: { enabled: false }
      },
      yaxis: {
        min: 0,
        // On laisse ApexCharts décider du nombre de paliers pour éviter les doublons
        labels: {
          style: { colors: '#64748b' },
          formatter: (val) => val.toFixed(0) 
        }
      },
      fill: {
        type: 'gradient',
        gradient: { 
            shadeIntensity: 1, 
            opacityFrom: 0.4, 
            opacityTo: 0.0, // On descend à 0 pour un effet plus moderne
            stops: [0, 90]
        }
      },
      grid: {
        borderColor: '#f1f5f9',
        strokeDashArray: 4,
        padding: { left: 10, right: 10 }
      },
      tooltip: {
        theme: 'light',
        x: { show: true },
        marker: { show: true }
      }
    };

    const chart = new ApexCharts(document.querySelector("#chart-evolution"), options);
    chart.render();
  });
</script>
</body>
</html>