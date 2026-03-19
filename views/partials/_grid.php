<?php if (empty($listeC)): ?>
  <div class="alert alert-info text-center py-10 my-8">
    Aucune candidature trouvée<?= $search ? " pour « " . htmlspecialchars($search) . " »" : "" ?>.
  </div>
<?php else: ?>
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
    <?php foreach ($listeC as $c):
    $cLight = $c;
    $cLight['has_doc'] = !empty($c['doc']);
    $cLight['has_autre_doc'] = !empty($c['autre_doc']);
    
    // TRÈS IMPORTANT : On supprime le contenu binaire pour ne pas casser le JSON
    unset($cLight['doc'], $cLight['autre_doc']);
      // Préparation des fichiers BLOB pour le passage à Alpine.js
      $c['doc_base64'] = !empty($c['doc']) ? base64_encode($c['doc']) : null;
      $c['autre_doc_base64'] = !empty($c['autre_doc']) ? base64_encode($c['autre_doc']) : null;
      
      $statut = $c['statut_demande'] ?? 'soumis';
      $badgeClass = match(true) {
        str_contains($statut, 'étude') || str_contains($statut, 'cours') || $statut === 'en_etude' => 'bg-info/10 text-info dark:bg-info/20',
        str_contains($statut, 'approuv') || str_contains($statut, 'accept') || $statut === 'approuve' => 'bg-success/10 text-success dark:bg-success/20',
        str_contains($statut, 'rejet') || str_contains($statut, 'refus') || $statut === 'rejete' => 'bg-error/10 text-error dark:bg-error/20',
        default => 'bg-warning/10 text-warning dark:bg-warning/20',
      };
    ?>
      <div class="card p-5 flex flex-col justify-between h-full hover:shadow-md transition-shadow duration-200">
        <div class="space-y-3">
          <div class="flex items-start justify-between gap-2">
            <h4 class="text-base font-semibold text-slate-800 dark:text-navy-50 line-clamp-1">
              <?= htmlspecialchars($c['prenoms'] . ' ' . $c['nom']) ?>
            </h4>
            <span class="badge rounded-full px-2.5 py-0.5 text-xs font-medium whitespace-nowrap <?= $badgeClass ?>">
              <?= htmlspecialchars(ucfirst($statut)) ?>
            </span>
          </div>
          <div class="space-y-1.5 text-sm text-slate-600 dark:text-navy-200">
            <p class="truncate"><span class="font-medium">Email :</span> <?= htmlspecialchars($c['email'] ?: '—') ?></p>
            <p class="truncate"><span class="font-medium">WhatsApp :</span> <?= htmlspecialchars($c['telephone_whatsapp'] ?: '—') ?></p>
            <p class="truncate"><span class="font-medium">Filière :</span> <?= htmlspecialchars($c['filiere_etudes'] ?: '—') ?></p>
          </div>
        </div>
        <div class="mt-5 pt-4 border-t border-slate-200 dark:border-navy-600">
          <button
  @click="$dispatch('open-candidature-modal', <?= htmlspecialchars(json_encode($cLight, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8') ?>)"
  class="block w-full text-center py-2 px-4 bg-primary text-white font-medium rounded-lg hover:bg-primary-focus transition-colors">
  Voir la candidature complète
</button>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div
  x-data="{ isShow: false, c: {} }"
  @open-candidature-modal.window="isShow = true; c = $event.detail"
  class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6"
  x-show="isShow"
  x-cloak
  role="dialog"
  aria-modal="true"
  @keydown.escape.window="isShow = false"
>
  <div @click="isShow = false" class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm" x-show="isShow" x-transition.opacity></div>

  <div
    class="relative w-full max-w-4xl bg-white dark:bg-navy-700 rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]"
    x-show="isShow"
    x-transition
  >
    <div class="flex items-center justify-between px-5 py-4 sm:px-6 border-b dark:border-navy-600 bg-slate-50 dark:bg-navy-800">
      <h3 class="text-lg sm:text-xl font-bold text-slate-800 dark:text-navy-50 truncate pr-4">
        Dossier : <span x-text="c.prenoms + ' ' + c.nom"></span>
      </h3>
      <button @click="isShow = false" class="p-2 rounded-full hover:bg-slate-200 dark:hover:bg-navy-600" aria-label="Fermer">
        <svg class="w-6 h-6 text-slate-700 dark:text-navy-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <div class="flex-1 overflow-y-auto px-5 py-6 sm:px-8 space-y-8 text-sm leading-relaxed">

      <section>
        <h4 class="font-bold text-primary dark:text-accent-light mb-4 border-b pb-2 uppercase text-xs">1. Informations personnelles</h4>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Nationalité / Sexe</span><p x-text="(c.nationalite || '—') + ' / ' + (c.sexe || '—')"></p></div>
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Naissance</span><p x-text="c.date_naissance || '—'"></p></div>
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Email</span><p class="text-primary font-medium" x-text="c.email || '—'"></p></div>
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">WhatsApp</span><p x-text="c.telephone_whatsapp || '—'"></p></div>
          <div class="sm:col-span-2"><span class="text-slate-500 text-xs uppercase font-semibold block">Adresse</span><p x-text="c.adresse_complete || '—'"></p></div>
        </div>
      </section>

      <section>
        <h4 class="font-bold text-primary dark:text-accent-light mb-4 border-b pb-2 uppercase text-xs">2. Parcours Académique</h4>
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Établissement</span><p x-text="c.etablissement_enseignement + (c.pays_etablissement ? ' ('+c.pays_etablissement+')' : '')"></p></div>
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Filière & Niveau</span><p x-text="c.filiere_etudes + ' - ' + c.niveau_etudes"></p></div>
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Langues</span><p x-text="c.langues_parlees || '—'"></p></div>
        </div>
      </section>

      <section>
        <h4 class="font-bold text-primary dark:text-accent-light mb-4 border-b pb-2 uppercase text-xs">3. Projet de Stage</h4>
        <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg space-y-3">
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Domaine souhaité</span><p class="font-bold text-slate-800 dark:text-navy-100" x-text="c.domaine_stage_souhaite"></p></div>
          <div><span class="text-slate-500 text-xs uppercase font-semibold block">Objectifs</span><p class="italic text-slate-600 dark:text-navy-200" x-text="c.objectifs_stage"></p></div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
             <div><span class="text-slate-500 text-xs uppercase font-semibold block">Période</span><p x-text="'Du ' + c.date_arrivee_souhaitee + ' au ' + c.date_depart_souhaitee"></p></div>
             <div><span class="text-slate-500 text-xs uppercase font-semibold block">Durée / Lieu</span><p x-text="c.duree_souhaitee + ' / ' + c.preference_lieu"></p></div>
          </div>
        </div>
      </section>


      <section>
  <h4 class="font-bold text-primary dark:text-accent-light mb-4 border-b pb-2 uppercase text-xs">4. Documents fournis</h4>
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    
    <template x-if="c.has_doc">
      <a :href="'http://localhost/stagafrique/api/download?id=' + c.id + '&type=principal'" 
         class="flex items-center gap-3 p-4 bg-slate-100 dark:bg-navy-800 rounded-xl hover:bg-slate-200 transition border border-slate-200 dark:border-navy-500">
        <i class="bi bi-file-earmark-pdf text-xl"></i>
        <div>
          <p class="font-bold">Document Principal</p>
          <p class="text-xs text-slate-500">Cliquez pour télécharger</p>
        </div>
      </a>
    </template>

    <template x-if="c.has_autre_doc">
      <a :href="'http://localhost/stagafrique/api/download?id=' + c.id + '&type=autre'" 
         class="flex items-center gap-3 p-4 bg-slate-100 dark:bg-navy-800 rounded-xl hover:bg-slate-200 transition border border-slate-200 dark:border-navy-500">
        <i class="bi bi-file-earmark-zip text-xl"></i>
        <div>
          <p class="font-bold">Document Autre</p>
          <p class="text-xs text-slate-500">Cliquez pour télécharger</p>
        </div>
      </a>
    </template>

  </div>
</section>
<br>

      <section class="space-y-6">
        <div class="flex justify-center">
            <a :href="'http://localhost/stagafrique/api/impression?id=' + c.id" 
               target="_blank" 
               class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 dark:bg-navy-500 dark:text-navy-50 py-3 px-8 rounded-full border border-slate-300">
              <i class="bi bi-printer text-lg"></i>
              <span>Imprimer la fiche d'inscription</span>
            </a>
        </div>

        <div class="bg-slate-50 dark:bg-navy-800 p-5 rounded-xl border-2 border-primary/20 sticky bottom-0">
          <form action="/stagafrique/candidatures/modifier_statut" method="POST" class="space-y-4">
            <input type="hidden" name="sai_id" :value="c.id">
            <label class="block">
              <span class="font-bold text-primary dark:text-accent-light block mb-2">DÉCISION ADMINISTRATIVE</span>
              <select name="sai_statut" class="form-select w-full rounded-lg border border-slate-300 bg-white px-4 py-3 focus:border-primary dark:bg-navy-700 dark:border-navy-600">
                <option value="soumis"   :selected="c.statut_demande === 'soumis'">🆕 Soumis</option>
                <option value="en_etude" :selected="c.statut_demande === 'en_etude'">⏳ En cours d'étude</option>
                <option value="approuve" :selected="c.statut_demande === 'approuve'">✅ Approuvé</option>
                <option value="rejete"   :selected="c.statut_demande === 'rejete'">❌ Rejeté</option>
              </select>
            </label>
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t dark:border-navy-600">
              <button type="button" @click="isShow = false" class="btn px-6 py-2.5 bg-slate-200 text-slate-800 hover:bg-slate-300 dark:bg-navy-600 dark:text-navy-100">
                Fermer
              </button>
              <button type="submit" class="btn px-6 py-2.5 bg-primary text-white hover:bg-primary-focus" name="btn-update">
                Enregistrer la décision
              </button>
            </div>
          </form>
        </div>
      </section>

    </div>
  </div>
</div>