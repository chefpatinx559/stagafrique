<?php
$page = 'candidatures';
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

  <!-- Traduction en Français du tableau -->
  <!-- <script src="https://unpkg.com/gridjs/l10n/fr_FR.umd.js"></script> -->


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
        Liste des candidatures
      </h2>
    </div>
    <div class="flex items-center space-x-3">
  <label class="relative">
    <input
      id="searchInput"
      class="form-input peer h-9 w-64 rounded-full border border-slate-300 bg-transparent px-4 py-2 pl-10 text-xs+ placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary focus:ring-1 focus:ring-primary/30 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/30 transition-all duration-200"
      placeholder="Rechercher une candidature..."
      type="text"
      autocomplete="off"
    >
  </label>
</div>
  </div>

  <!-- Zone qui sera mise à jour via JS -->
  <div id="candidaturesContainer">
    <?php include 'views/partials/_grid.php'; ?>
  </div>

</main>
<div id="x-teleport-target"></div>



<script>
// Débouncing pour éviter trop de requêtes
let searchTimeout;

function loadCandidatures(page = 1) {
  const search = document.getElementById('searchInput').value.trim();
  
  const url = new URL(window.location.href);
  url.searchParams.set('page', page);
  if (search) {
    url.searchParams.set('search', search);
  } else {
    url.searchParams.delete('search');
  }

  fetch(url, {
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(response => response.json())
  .then(data => {
    document.getElementById('candidaturesContainer').innerHTML = data.html;
    // Optionnel : mettre à jour l'URL sans recharger
    history.replaceState(null, '', url);
  })
  .catch(err => console.error('Erreur chargement candidatures:', err));
}

// Recherche live (avec debounce 400ms)
document.getElementById('searchInput').addEventListener('input', function() {
  clearTimeout(searchTimeout);
  searchTimeout = setTimeout(() => {
    loadCandidatures(1); // toujours revenir à la page 1 lors d'une nouvelle recherche
  }, 450);
});

// Délégation pour les clics sur pagination
document.addEventListener('click', function(e) {
  const link = e.target.closest('.pagination-link');
  if (link) {
    e.preventDefault();
    const page = parseInt(link.dataset.page, 10);
    if (!isNaN(page)) {
      loadCandidatures(page);
    }
  }
});
</script>
  </div>
  <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->

  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
    // import { Grid } from "gridjs";
    // import { frFR } from "gridjs/l10n";
  </script>

</body>

</html>