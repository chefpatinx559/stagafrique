<?php
$page = 'paiements';
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
        Historique des paiements
      </h2>
</div>
  </div>
          <!-- From HTML Table -->
          <div class="card pb-4">
            <div class="my-3 flex h-8 items-center justify-between px-4 sm:px-5">
            
              
            </div>
            <div>
              <div x-data="" x-init="$el._x_grid = new Gridjs.Grid({
    from: $refs.table,
    sort: true,
    search: true,
    pagination: {
        limit: 10, // Nombre de lignes par page
        summary: true, // Affiche 'Affichage de 1 à 10 sur 20'
        buttonsCount: 5 // Nombre de boutons de pages à afficher
    },
    language: {
        search: { placeholder: 'Rechercher...' },
        pagination: {
            previous: 'Précédent',
            next: 'Suivant',
            showing: 'Affichage de',
            results: () => 'résultats',
            of: 'sur',
            to: 'à'
        }
    }
}).render($refs.wrapper);">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  <table x-ref="table" class="w-full text-left">
                    <thead>
                      <tr>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          #
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Montant
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Devise
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Reference_transaction
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Paiement_methode
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Statut
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($listeP)) {
                        foreach ($listeP as $key => $p) {
                         ?>
                      <tr>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?= $p['id'] ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?= $p['montant'] ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?= $p['devise'] ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?= $p['reference_transaction'] ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?= $p['methode_paiement'] ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <?= $p['statut'] ?>
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                          <a href="http://localhost/stagafrique/api/imprimer?id=<?= $p['id'] ?>" target="_blank" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90"">
    Imprimer
</a>
                        </td>
                      </tr>
                       <?php   }
                      } ?>
                    </tbody>
                  </table>
                </div>
                <div><div x-ref="wrapper"></div></div>
              </div>
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
</body>

</html>